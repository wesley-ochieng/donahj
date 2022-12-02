<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class FrontEndController extends Controller
{
    //
    public function index(){
        return view('about');
    }

    public function home(){
        //  retrun first event where status is upcoming
        $upcoming_event = Event::where('status', 'upcoming')
        ->orWhere('status', 'active')
        ->first();

        if(!$upcoming_event){
            $events = Event::all();
        }else{
            $events = Event::where('status', 'upcoming')
            ->orWhere('status', 'active')
            ->where('id', '!=', $upcoming_event->id)
            ->orderBy('id', 'desc')->get();
        }
        return view('welcome', compact('upcoming_event', 'events'));
    }
    public function homeEvent($event){
        $upcoming_event = Event::find($event); 
        if(!$upcoming_event){
            $events = Event::all();
        }else{
        $events = Event::where('status', 'upcoming')->where('id', '!=', $event)->orderBy('id', 'desc')->get();
        }
        return view('event', compact('upcoming_event', 'events'));
    }
}
