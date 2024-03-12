<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use DB;
use App\Models\C2b;
use App\Models\Payment;
use App\Models\Event;
use App\Models\EventPrice;
use App\Models\Ticket;
use Str;
use Storage;
use Carbon\Carbon;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use DataTables;
use Mail;
use App\Mail\TicketMail;
use Session;
use Validator;
class C2bController extends Controller
{
    public function createValidationResponse($result_code, $result_description)
    {
        $result = json_encode(["ResultCode" => $result_code, "ResultDesc" => $result_description]);
        $response = new Response();
        $response->headers->set("Content-Type", "application/json; charset=utf-8");
        $response->setContent($result);
        return $response;
    }

    public function mpesaValidation()
    {
        $result_code = 0;
        $result_description = "Accepted";
        return $this->createValidationResponse($result_code, $result_description);
    }

    public function mpesaAccessToken()
    {
        $consumer_key = "VEGwK94WHyGg7LvoJ7tAfsmAstspsNSOyAAaHMIair04Uq3G";
        $consumer_secret = "zzdyakREQPNWjDJp0kQ6mLFvhRUTKf4mNEhTPNyhtyK8tpF2ksswLZWBtTxZ2bG7";
        $credentials = base64_encode($consumer_key . ':' . $consumer_secret);
        $url = "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic ' . $credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
        $curl_response = curl_exec($curl);
        $access_token = json_decode($curl_response)->access_token;
        return $access_token;
    }

    public function mpesaRegisterUrls()
    {
        // dd("here");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'https://api.safaricom.co.ke/mpesa/c2b/v2/registerurl');
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer ' . $this->mpesaAccessToken())); //setting custom header
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode([
            'ShortCode' => "4130571",
            'ResponseType' => 'Completed',
            'ConfirmationURL' => "https://8e2a-105-163-158-77.ngrok-free.app/janealler/payment/confirmation",
            'ValidationURL' => "https://8e2a-105-163-158-77.ngrok-free.app/janealler/validation"
        ]));

        $curl_response = curl_exec($curl);
        dd($curl_response);
    }

    public function mpesaConfirmation(Request $request)
    {
        try {
            DB::beginTransaction();
            $content = json_decode($request->getContent());
            Log::info("message", ["content" => $content]);
            $mpesa_transaction = new C2b();
            $mpesa_transaction->TransactionType = $content->TransactionType;
            $mpesa_transaction->TransID = $content->TransID;
            $mpesa_transaction->TransTime = $content->TransTime;
            $mpesa_transaction->TransAmount = $content->TransAmount;
            $mpesa_transaction->BusinessShortCode = $content->BusinessShortCode;
            $mpesa_transaction->BillRefNumber = $content->BillRefNumber;
            $mpesa_transaction->InvoiceNumber = $content->InvoiceNumber;
            $mpesa_transaction->OrgAccountBalance = $content->OrgAccountBalance;
            $mpesa_transaction->ThirdPartyTransID = $content->ThirdPartyTransID;
            $mpesa_transaction->MSISDN = $content->MSISDN;
            $mpesa_transaction->FirstName = $content->FirstName;
            $mpesa_transaction->MiddleName = '';
            $mpesa_transaction->LastName = '';
            $mpesa_transaction->save();
            DB::commit();
            //generate ticket and send message
            function isDateInPast($date) {
                $parsedDate = Carbon::createFromFormat('m/d/Y', $date);
            
                return $parsedDate->isPast();
            }
            $regularGradient = [0,0,0,0,0,0,'radial'];
            $vipGradient = [100, 220, 150,3, 192, 75, 'radial'];
            $kidsGradient = [231, 76, 60, 255, 135, 120,'radial'];
            $vvipGradient = [100, 220, 150,3, 192, 75, 'radial'];
            $event = Event::where('status', 'upcoming')->first();
            $eventPrice = EventPrice::where('event_id', $event->id)->first();

            $billRefNumber = $content->BillRefNumber;
            $phoneNumber = explode("#", $billRefNumber)[0];
            $quantity = explode("#", $billRefNumber)[1];
            preg_match('/[A-Za-z](\d+)$/', $quantity, $matches);
            $number = $matches[1];
            preg_match('/([A-Za-z])(\d+)$/', $quantity, $matches);
            $letter = $matches[1];
            if($letter == 'R'){
                $gradientValues = $regularGradient;
                $ticketType = 'Regular';
                $ticketPrice = $eventPrice->regular_price;
                $ticketQuantity = $eventPrice->regular_quantity;
            }elseif($letter == 'V'){
                $gradientValues = $vipGradient;
                $ticketType = 'VIP';
                $ticketPrice = $eventPrice->vip_price;
                $ticketQuantity = $eventPrice->vip_quantity;
            }elseif($letter == 'K'){
                $gradientValues = $kidsGradient;
                $ticketType = 'Kids';
                $ticketPrice = $eventPrice->kids_price;
                $ticketQuantity = $eventPrice->kids_quantity;
            }elseif($letter == 'VV'){
                $gradientValues = $vvipGradient;
                $ticketType = 'VVIP';
                $ticketPrice = $eventPrice->vvip_price;
                $ticketQuantity = $eventPrice->vvip_quantity;
            }
            $number = (int)$number;
            //check for transaction amount, if it is less than the ticket price, save on temporary table and
           
            for ($i=0; $i < $number; $i++) { 
                $ticket = new Ticket();
                $ticket->event_id = $event->id;
                $ticket->ticket_type = $ticketType;
                $ticket->ticket_price = $ticketPrice;
                $ticket->ticket_number = Str::orderedUuid();
                $qrCode = QrCode::format('png')->merge(public_path('assets/images/janefinal.png'), 0.2, true)
                ->gradient($gradientValues[0], $gradientValues[1], $gradientValues[2], $gradientValues[3], $gradientValues[4], $gradientValues[5], $gradientValues[6])
                ->backgroundColor(255,255,255)->size(300)->generate($ticket->ticket_number);
                $path = 'qr_codes/'.$ticket->ticket_number.'.png';
                Storage::disk('public')->put($path, $qrCode);
                $ticket->qr_code = $ticket->ticket_number.'.png';
                $ticket->status = 'paid';
                $ticket->name = $phoneNumber;
                $ticket->phone = $phoneNumber;
                $ticket->quantity = $number;
                $ticket->merchant_request_id = $content->TransID;
                $ticket->save();

                $url = env('SMS_URL');
                $apikey = env('SMS_API_KEY');
                $service_id = 0;
                $mobile = $phoneNumber;
                $shortcode = 'Tilil';
                $message = 'Welcome to Soaked live recording on June 22ND 2024 at KICC from 12:00 noon. Your booking of xxx was successful heres a link to your ticket';

                $sms = json_encode(array(
                    "api_key" => "c8rZzMlB1dL45HtwpY93JKCmau2qeVDoTUX6bOWiSygQjhNkPns0vARfIFxE7G",
                    "service_id" => $service_id,
                    "mobile" => $mobile,
                    "response_type" => "json",
                    "shortcode" => $shortcode,
                    "message" => $message
                ));
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $sms);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($ch);
                curl_close($ch);
            }

        } catch (\Throwable $th) {
            DB::rollback();
            Log::error($th->getMessage());
        }
    }
}
