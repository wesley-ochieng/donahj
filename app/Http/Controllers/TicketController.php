<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Event;
use Illuminate\Http\Request;
use Validator;
use DataTables;

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
            return '<a href="#" class="btn btn-sm btn-primary">View</a>';
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
        return view('events.tickets', compact('tickets','event'));
    }
    public function eventTicketsTables($event)
    {
        $tickets = Ticket::where('event_id', $event)->get();
        return DataTables::of($tickets)
        ->addColumn('action', function($ticket){
            return '<a href="#" class="btn btn-sm btn-primary">View</a>';
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
            'event_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
        }

        //check if the ticket exists
        $ticket = Ticket::where('ticket_number', $request->ticket_number)->where('event_id', $request->event_id)->first();
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
}
