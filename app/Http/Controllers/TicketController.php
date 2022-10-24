<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Validator;

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
        return view('tickets.index', compact('tickets'));
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
