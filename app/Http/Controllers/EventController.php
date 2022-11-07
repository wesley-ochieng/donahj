<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Validator;
use Storage;
use  DB;
use App\Models\EventPrice;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('events.create');
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
            'poster_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        if ($validator->fails()) {
            // return response()->json($validator->errors()->all(), 400);
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            //conver the start date to the format 2022-11-05
            $start_date = date('Y-m-d', strtotime($request->start_date));
            $end_date = date('Y-m-d', strtotime($request->end_date));

            $event = new Event();
            $event->name = $request->name;
            $event->description = $request->description;
            $event->start_date = $start_date;
            $event->end_date = $end_date;
            $event->start_time = $request->start_time;
            $event->venue = $request->venue;
            $event->venue_latitude = $request->venue_latitude;
            $event->venue_longitude = $request->venue_longitude;
            //check if event is active or not based on start date if it is in the past or not
            $event->status = $start_date > date('Y-m-d') ? 'upcoming' :( $start_date == date('Y-m-d') ? 'active' : 'passed');
            // $event->capacity = $request->capacity;
            $event->save();
            if($request->hasFile('poster_image')){
                $image_path = Storage::disk('public')->put('/Images/poser_image/'.$event->id, $request->poster_image);
            }
            $event->poster_image = $image_path;
            $event->save();
            // adding event capacity and prices
            $event_price = new EventPrice();
            $event_price->event_id = $event->id;
            $event_price->regular_quantity = $request->regular_quantity;
            $event_price->regular_advance_price = $request->regular_advance_price;
            $event_price->regular_gate_price = $request->regular_gate_price;
            $event_price->vip_quantity = $request->vip_quantity;
            $event_price->vip_advance_price = $request->vip_advance_price;
            $event_price->vip_gate_price = $request->vip_gate_price;
            $event_price->vvip_quantity = $request->vvip_quantity;
            $event_price->vvip_advance_price = $request->vvip_advance_price;
            $event_price->vvip_gate_price = $request->vvip_gate_price;
            $event_price->save();

            $event->capacity = $event_price->regular_quantity + $event_price->vip_quantity + $event_price->vvip_quantity;
            $event->save();
            DB::commit();
            toastr()->success('Event created successfully');
            return redirect()->route('events.list');
        } catch (\Throwable $th) {
            DB::rollBack();
            dd($th);
            toastr()->error($th->getMessage());
            return redirect()->back();
        }
        

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
            toastr()->warning('Event not updated');
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            DB::beginTransaction();
            $start_date = date('Y-m-d', strtotime($request->start_date));
            $end_date = date('Y-m-d', strtotime($request->end_date));


            $event->name = $request->name;
            $event->description = $request->description;
            $event->start_date = $start_date;
            $event->end_date = $end_date;
            $event->start_time = $request->start_time;
            $event->amount = $request->amount;
            //check if event is active or not based on start date if it is in the past or not
            $event->status = $start_date > date('Y-m-d') ? 'upcoming' :( $start_date == date('Y-m-d') ? 'active' : 'passed');
            // $event->capacity = $request->capacity;
            $event->save();
            DB::commit();
            toastr()->success('Event updated successfully');
            return redirect()->route('events.list');

        } catch (\Throwable $th) {
            DB::rollBack();
            toastr()->error($th->getMessage());
            return redirect()->back();
        }
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
