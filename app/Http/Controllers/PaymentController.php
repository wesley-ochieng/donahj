<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Event;
use App\Models\EventPrice;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Validator;
use Str;
use DB;
use Log;
use Storage;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use DataTables;
use Mail;
use App\Mail\TicketMail;

class PaymentController extends Controller
{
    public function lipaNaMpesaPassword() {
        //timestamp
        $timestamp = Carbon::rawParse('now')->format('YmdHms');
        //passkey
        $passkey = "bfb279f9aa9bdbcf158e97dd71a467cd2e0c893059b10f78e6b72ada1ed2c919";
        //businessShortCode
        $businessShortCode = env('MPESA_BUSINESS_SHORT_CODE');
        //generate password
        $mpesaToken = base64_encode($businessShortCode.$passkey.$timestamp);

        return $mpesaToken;
    }

  /**
   * Generate Access Token
   */

    public function generateAccessToken() {
        $consumer_key= env('MPESA_CONSUMER_KEY');
        $consumer_secret= env('MPESA_CONSUMER_SECRET');
        $credentials = base64_encode($consumer_key.":".$consumer_secret);
        $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Authorization: Basic ".$credentials,"Content-Type:application/json"));
        curl_setopt($curl, CURLOPT_HEADER,false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        $access_token=json_decode($curl_response);
        curl_close($curl);

        return $access_token->access_token;

    }

    public function stkPush(Request $request, Event $event) {
        $validator = Validator::make($request->all(), [
        'quantity' => 'required|integer',
        'email' => 'required|email',
        'phone' => 'required',
        'ticket_type' => 'required',
        // 'TransactionDescription' => 'required'
        ]);

        if($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
            // return $this->errorResponse($validator->errors()->all(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $eventprice = EventPrice::where('event_id', $event->id)->first();
        //check the price of the particular ticket type
        if($request->ticket_type == 'regular') {
            $amount = $eventprice->regular_advance_price;
        } else if($request->ticket_type == 'vip') {
            $amount = $eventprice->vip_advance_price;
        } else if($request->ticket_type == 'vvip') {
            $amount = $eventprice->vvip_advance_price;
        } else {
            $amount = $eventprice->regular_price;
        }

        try {
        DB::beginTransaction();
        //check if the capacity is available
        $availableCapacity = $event->capacity - $event->tickets()->count();
        if($event->capacity < $request->quantity) {
            return response()->json('The capacity is not available', 400);
        }
        
        //check if quantity is more than one and if it is, create multiple tickets
        if($request->quantity > 1) {
            for($i = 0; $i < $request->quantity; $i++) {


                $ticket = new Ticket();
                $ticket->email = $request->email;
                $ticket->event_id = $event->id;
                $ticket->ticket_number = Str::orderedUuid();
                //generate qr code and store it in the storage folder
                $qrCode = QrCode::format('svg')->size(500)->generate($ticket->ticket_number);
                $path = 'qr_codes/'.$ticket->ticket_number.'.svg';
                Storage::disk('public')->put($path, $qrCode);
                $ticket->qr_code = $ticket->ticket_number.'.svg';
                $ticket->status = 'unpaid';
                $ticket->save();
                
            }
        } else {
            $ticket = new Ticket();
            $ticket->email = $request->email;
            $ticket->event_id = $event->id;
            $ticket->ticket_number = Str::orderedUuid();
            //generate qr code and store it in the storage folder
            $qrCode = QrCode::format('svg')->size(500)->generate($ticket->ticket_number);
            $path = 'qr_codes/'.$ticket->ticket_number.'.svg';
            Storage::disk('public')->put($path, $qrCode);
            $ticket->qr_code = $ticket->ticket_number.'.svg';
            $ticket->status = 'unpaid';
            $ticket->save();
        }

        //deduct the quantity from the capacity
        $event->capacity = $availableCapacity;
        $event->save();

        //mpesa
        $amount = $amount * $request->quantity;
        $phone = $request->phone;
        $formatedPhone = substr($phone, 1);//712345678
        $code = "254";
        $phoneNumber = $code.$formatedPhone;//254712345678
        $url = 'https://sandbox.safaricom.co.ke/mpesa/stkpush/v1/processrequest';

        $curl_post_data = [
            'BusinessShortCode' => env('MPESA_BUSINESS_SHORT_CODE'),
            'Password' => $this->lipaNaMpesaPassword(),
            'Timestamp' => Carbon::rawParse('now')->format('YmdHms'),
            'TransactionType' => 'CustomerPayBillOnline',
            'Amount' => $amount,
            'PartyA' => $phoneNumber,
            'PartyB' => env('MPESA_BUSINESS_SHORT_CODE'),
            'PhoneNumber' => $phoneNumber,
            'CallBackURL' => env('NGROK_URL').'/api/mpesa/callback',
            'AccountReference' => 'Praise Atmosphere',
            'TransactionDesc' => $event->name,
        ];

        $data_string = json_encode($curl_post_data);


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.$this->generateAccessToken()));
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        $curl_response = curl_exec($curl);

        //create a payment
        $payment = new payment();
        $payment->merchantRequestId = json_decode($curl_response)->MerchantRequestID;
        $payment->phone_number = $phoneNumber;
        $payment->quantity = $request->quantity;
        // $payment->status = 'pending';
        $payment->save();

        //update a ticket
        //getting all the tickets with the same email that are unpaid and merchantRequestId is null
        $tickets = Ticket::where('email', $request->email)->where('status', 'unpaid')->where('merchantRequestId', null)->where('event_id', $event->id)->get();
        foreach($tickets as $ticket) {
            $ticket->merchantRequestId = $payment->merchantRequestId;
            $ticket->save();
        }

        DB::commit();
        return response()->json(json_decode($curl_response), 200);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($th->getMessage(), 500);
        }

    }

    public function MpesaResponse(Request $request) {
        try {
            $contents = json_decode($request->getContent(), true);
            $merchantRequestId = $contents['Body']['stkCallback']['MerchantRequestID'];
            $checkoutRequestId = $contents['Body']['stkCallback']['CheckoutRequestID'];
            $content = $contents['Body']['stkCallback']['CallbackMetadata']['Item'];

            $contentLength = count($content);
            //get the payment
            $payment = Payment::where('merchantRequestID', $merchantRequestId)->first();
            $payment->checkoutRequestID = $checkoutRequestId;
            // $mpesa_transaction = new MpesaTransaction();
            $payment->merchantRequestId = $merchantRequestId;
            $payment->checkoutRequestId = $checkoutRequestId;
            for($i=0;$i<$contentLength;$i++) {
            if ($content[$i]['Name'] == 'Amount') {
                $payment->TransAmount = $content[$i]['Value'];
            }
            if ($content[$i]['Name'] == 'MpesaReceiptNumber') {
                $payment->TransID = $content[$i]['Value'];
            }
            if ($content[$i]['Name'] == 'TransactionDate') {
                $payment->TransTime = $content[$i]['Value'];
            }
            if ($content[$i]['Name'] == 'PhoneNumber') {
                $payment->MSISDN = $content[$i]['Value'];
            }
            }
            $payment->save();

            //update tickets to paid
            $ticket = Ticket::where('merchantRequestID', $merchantRequestId)->get();
            foreach($ticket as $t) {
                $t->status = 'paid';
                $t->payment_id = $payment->id;
                $t->save();

                //send email
                $t->sendTicket($t->email, $t->ticket_number);
            }

            //return redirect to / with success toastr
            toastr()->success('Payment successful kindly check your email for your ticket');
            return redirect('/');

        } catch (\Throwable $th) {
            Log::error($th->getMessage());
            return response()->json($th->getMessage(), 500);
        }
    }

    public function autoConfirmPayment($phone, $merchantRequestId, $checkoutRequestId) {
        try {
        $transaction = MpesaTransaction::where('MSISDN', $phone)
        ->where('merchantRequestId', $merchantRequestId)->where('checkoutRequestId', $checkoutRequestId)->first();

        return $this->successResponse($transaction);
        } catch (\Throwable $th) {
        return $this->errorResponse($th->getMessage(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

    }

    public function index(){
        $payments = Payment::all();
        return view('payments.index', compact('payments'));
    }
    public function allPaymentsTable(){
        $payments = Payment::all();
        $payments = $payments->map(function($payment) {
            $payment_ticket = Ticket::where('payment_id', $payment->id)->select('ticket_number','event_id')->first();
           
            if($payment_ticket){
                $payment->ticket_number = $payment_ticket->ticket_number;
                $event = Event::where('id', $payment_ticket->event_id)->select('name')->first();
                if($event){
                    $payment->event_name = $event->name;
                }else{
                    $payment->event_name = 'N/A';
                }
            }else{
                $payment->ticket_number = 'N/A';
            }
            

            return $payment;
        });

        return DataTables::of($payments)
        ->addColumn('action', function($payment){
            return '<a href="#" class="btn btn-sm btn-primary">View</a>';
        })
        ->addColumn('quantity', function($payment){
            return $payment->quantity;
        })
        ->addColumn('phone_number', function($payment){
            return $payment->phone_number;
        })
        ->addColumn('TransID', function($payment){
            return $payment->TransID;
        })
        ->addColumn('TransTime', function($payment){
            return $payment->TransTime;
        })
        ->addColumn('TransAmount', function($payment){
            return $payment->TransAmount;
        })
        ->addColumn('ticket_number', function($payment){
            return $payment->ticket_number;
        })
        ->addColumn('event_name', function($payment){
            return $payment->event_name;
        })
        ->addColumn('status', function($payment){
            $ticket = Ticket::where('payment_id', $payment->id)->first();
            return 'active';
            // return $ticket->status;
        })
        ->rawColumns(['action', 'quantity', 'phone_number', 'TransID', 'TransTime', 'TransAmount', 'ticket_number', 'event_name', 'status'])
        ->make(true);
    }

    public function eventPayments($event){
        $event = Event::where('id', $event)->first();
        return view('events.payments', compact('event'));
    }

    public function eventPaymentsTable($event){
        $event = Event::where('id', $event)->first();
        $tickets = Ticket::where('event_id', $event->id)->get();
        $payments = $tickets->map(function($ticket) use ($event) {
            $payment = Payment::where('merchantRequestId', $ticket->merchantRequestId)->first();
            if($payment){
                $payment->ticket_number = $ticket->ticket_number;
                $payment->event_name = $event->name;
                $payment->status = $ticket->status;
            }
            return $payment;
        });

        return DataTables::of($payments)
        ->addColumn('action', function($payment){
            return '<a href="#" class="btn btn-sm btn-primary">View</a>';
        })
        ->addColumn('quantity', function($payment){
            return $payment->quantity;
        })
        ->addColumn('phone_number', function($payment){
            return $payment->phone_number;
        })
        ->addColumn('TransID', function($payment){
            return $payment->TransID;
        })
        ->addColumn('TransTime', function($payment){
            return $payment->TransTime;
        })
        ->addColumn('TransAmount', function($payment){
            return $payment->TransAmount;
        })
        ->addColumn('ticket_number', function($payment){
            return $payment->ticket_number;
        })
        ->addColumn('event_name', function($payment){
            return $payment->event_name;
        })
        ->addColumn('status', function($payment){
            $ticket = Ticket::where('payment_id', $payment->id)->first();
            return 'active';
            // return $ticket->status;
        })
        ->rawColumns(['action', 'quantity', 'phone_number', 'TransID', 'TransTime', 'TransAmount', 'ticket_number', 'event_name', 'status'])
        ->make(true);
    }
}
