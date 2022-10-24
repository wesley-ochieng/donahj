<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return response()->json($events);
        // return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'required',
            'amount' => 'required|integer',
            'capacity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        $event = new Event();
        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->amount = $request->amount;
        //check if event is active or not based on start date if it is in the past or not
        $event->status = $request->start_date > date('Y-m-d') ? 'upcoming' :( $request-> start_date == date('Y-m-d') ? 'active' : 'passed');
        $event->capacity = $request->capacity;
        $event->save();

        return response()->json([
            'success' => true,
            'message' => 'Event created successfully',
            'data' => $event
        ]);
        // return redirect()->back()->with('success', 'Event created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return response()->json($event, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Event $event)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'start_time' => 'required',
            'amount' => 'required|integer',
            'capacity' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->all(), 400);
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        $event->name = $request->name;
        $event->description = $request->description;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->start_time = $request->start_time;
        $event->amount = $request->amount;
        //check if event is active or not based on start date if it is in the past or not
        $event->status = $request->start_date > date('Y-m-d') ? 'upcoming' :( $request-> start_date == date('Y-m-d') ? 'active' : 'passed');
        $event->capacity = $request->capacity;
        $event->save();

        return response()->json($event, 200);
        // return redirect()->back()->with('success', 'Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response()->json($event, 200);
        // return redirect()->back()->with('success', 'Event deleted successfully');
    }
}
