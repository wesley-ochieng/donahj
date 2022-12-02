<?php

namespace App\Http\Controllers;

use App\Imports\PaymentImport;
use App\Models\Ticket;
use App\Models\Event;
use App\Models\Payment;
use Illuminate\Http\Request;
use Validator;
use DataTables;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\ComplimentaryTicket;
use Str;
use Storage;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\BulkUpload;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        $total_paid_tickets = Ticket::where('status', 'paid')->count();
        $total_unpaid_tickets = Ticket::where('status', 'unpaid')->count();
        $total_active_tickets = Ticket::where('status', 'active')->count();
        $total_used_tickets = Ticket::where('status', 'used')->count();
        return view('tickets.index', compact('tickets', 'total_paid_tickets', 'total_unpaid_tickets', 'total_active_tickets', 'total_used_tickets'));
    }
    public function allTicketsTable()
    {
        $tickets = Ticket::get();
        return DataTables::of($tickets)
        ->addColumn('action', function($ticket){
            return'<a href="#" id="'.$ticket->id.'" class="btn btn-sm btn-primary show-ticket" >View</a>';
        })
        ->addColumn('status', function($ticket){
            if($ticket->status == 'paid'){
                return '<span class="badge badge-success shadow-sm">Paid</span>';
            }elseif($ticket->status == 'unpaid'){
                return '<span class="badge badge-danger shadow-sm">Unpaid</span>';
            }elseif($ticket->status == 'used'){
                return '<span class="badge badge-secondary shadow-sm">Used</span>';
            }
        })
        ->addColumn('event', function($ticket){
            return $ticket->event->name;
        })
        ->addColumn('ticket_number', function($ticket){
            return $ticket->ticket_number;
        })
        ->addColumn('qr_code', function($ticket){
            return '<img src="'.asset('storage/qr_codes/'.$ticket->qr_code).'" alt="barcode" style="max-width:81px"  />';
        })
        ->rawColumns(['action', 'status', 'ticket_number', 'qr_code', 'event'])
        ->make(true);
    }
    public function eventTickets($event)
    {
        $tickets = Ticket::where('event_id', $event)->get();
        $event = Event::find($event);
        $total_paid_tickets = Ticket::where('status', 'paid')->where('event_id', $event->id)->count();
        $total_unpaid_tickets = Ticket::where('status', 'unpaid')->where('event_id', $event->id)->count();
        $total_active_tickets = Ticket::where('status', 'active')->where('event_id', $event->id)->count();
        $total_used_tickets = Ticket::where('status', 'used')->where('event_id', $event->id)->count();
        return view('events.tickets', compact('tickets','event', 'total_paid_tickets', 'total_unpaid_tickets', 'total_active_tickets', 'total_used_tickets'));
    }
    public function eventTicketsTables($event)
    {
        $tickets = Ticket::where('event_id', $event)
        ->where('status', 'paid')
        ->get();
        return DataTables::of($tickets)
        ->addColumn('action', function($ticket){
            return '<a href="#" id="'.$ticket->id.'" class="btn btn-sm btn-primary">View</a>';
        })
        ->addColumn('status', function($ticket){
            if($ticket->status == 'paid'){
                return '<span class="badge badge-success shadow-sm">Paid</span>';
            }elseif($ticket->status == 'unpaid'){
                return '<span class="badge badge-danger shadow-sm">Unpaid</span>';
            }elseif($ticket->status == 'used'){
                return '<span class="badge badge-secondary shadow-sm">Used</span>';
            }
        })
        ->addColumn('ticket_number', function($ticket){
            return $ticket->ticket_number;
        })
        ->addColumn('qr_code', function($ticket){
            return '<img src="'.asset('storage/qr_codes/'.$ticket->qr_code).'" alt="barcode" style="max-width:81px"  />';
        })
        ->rawColumns(['action', 'status', 'ticket_number', 'qr_code'])
        ->make(true);
    }

    //function to update the ticket status
    public function updateStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ticket_number' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['message' => $validator->errors()->first()], 422);
        }

        //check if the ticket exists
        $ticket = Ticket::where('ticket_number', $request->ticket_number)->first();
        if($ticket){
            //check if the ticket has been used
            if($ticket->status == 'used'){
                return response()->json(['message' => 'Ticket has already been used'], 400);
            }
            //check if the ticket is unpaid
            if($ticket->status == 'unpaid'){
                return response()->json(['message' => 'Ticket is unpaid'], 400);
            }
            //update the ticket status
            $ticket->status = 'used';
            $ticket->save();
            return response()->json(['message' => 'Ticket status updated successfully'], 200);
        }
        return response()->json(['message' => 'Ticket does not exist'], 400);

        // return redirect()->route('tickets.index')->with('success', 'Ticket status updated successfully');
    }
    public function eventPayments(Request $request){
        $event = Event::find($request->event_id);
        $tickets = Ticket::where('event_id', $event->id)
        ->where('status', 'paid')
        ->get();
        $payments = $tickets->map(function($ticket) use ($event) {
            $payment = Payment::where('merchantRequestId', $ticket->merchantRequestId)
            ->whereNotNull('transID')
            ->first();
            if($payment){
                $payment->ticket_number = $ticket->ticket_number;
                $payment->event_name = $event->name;
                $payment->status = $ticket->status;
                $payment->TransID = $payment->TransID;
            }
            return $payment;
        });
        return response()->json(['payments' => $payments], 200);
    }

    public function show($ticket){
        $ticket = Ticket::find($ticket);
        $ticket->payment = Payment::where('merchantRequestId', $ticket->merchantRequestId)->first();
        return response()->json($ticket, 200);

    }

    public function storeComplimentary(Request $request){
        $validator = Validator::make($request->all(), [
            'event_id' => 'required|exists:events,id',
            'organization_name' => 'required',
            'email' => 'required',
            'quantity' => 'required',
        ]);
        if ($validator->fails()) {
            toastr()->error($validator->errors()->first());
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $event = Event::find($request->event_id);
        if($request->quantity > 1) {
            for($i = 0; $i < $request->quantity; $i++) {
                $ticket = new ComplimentaryTicket();
                $ticket->email = $request->email;
                $ticket->event_id = $event->id;
                $ticket->ticket_number = Str::orderedUuid();
                //generate qr code and store it in the storage folder
                $qrCode = QrCode::format('png')->size(500)->generate($ticket->ticket_number);
                $path = 'qr_codes/'.$ticket->ticket_number.'.png';
                Storage::disk('public')->put($path, $qrCode);
                $ticket->qr_code = $ticket->ticket_number.'.png';
                $ticket->status = 'paid';
                $ticket->organization_name = $request->organization_name;
                $ticket->save();
                    
                $ticket->sendTicket($ticket->email, $ticket->ticket_number, $event->name);
                
            }
        } else {
            $ticket = new ComplimentaryTicket();
            $ticket->email = $request->email;
            $ticket->event_id = $event->id;
            $ticket->ticket_number = Str::orderedUuid();
            //generate qr code and store it in the storage folder
            $qrCode = QrCode::format('png')->size(500)->generate($ticket->ticket_number);
            $path = 'qr_codes/'.$ticket->ticket_number.'.png';
            Storage::disk('public')->put($path, $qrCode);
            $ticket->qr_code = $ticket->ticket_number.'.png';
            $ticket->status = 'paid';
            $ticket->organization_name = $request->organization_name;
            $ticket->save();
            $ticket->sendTicket($ticket->email, $ticket->ticket_number, $event->name);
        }
        toastr()->success('Ticket generated successfully');
        return redirect()->back()->with('success', 'Ticket generated successfully');
    }

    public function storeBulk (Request $request) {
        try {
            // upload file
            Excel::import(new PaymentImport, $request->file('file'));
        
            return response()->json([
                'status' => 'success',
                'message' => 'File uploaded successfully'
            ]);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function confirmPayment ($code) {
        // check if the payment code exists
        $payment = BulkUpload::where('payment_code', $code)->first();

        // check if the payment does not exist
        if (!$payment) {
            return response()->json([
                'status' => 'error',
                'message' => 'Payment code does not exist'
            ]);
        }

        // check if the payment code has been used
        if ($payment->status == 'used') {
            return response()->json([
                'status' => 'error',
                'message' => 'Payment code has already been used'
            ]);
        }
        // update the payment code
        $payment->status = 'used';
        $payment->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Payment code confirmed successfully'
        ]);
    }
}
