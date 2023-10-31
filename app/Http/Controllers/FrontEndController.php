<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Storage;
use App\Models\Ticket;

class FrontEndController extends Controller
{
    //
    public function index(){
        return view('about');
    }

    public function home(){
       
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
      
        // $ticket = Ticket::where('id', 1)->first();  
        // $ticket->sendTicket('wesleyochix@gmail.com', 'ticket' ,'myname');
        // generate qr code to https://praiseatmosphere.com/events
    //     $qr_code = QrCode::style('dot')->eye('circle')->format('png')->merge(public_path('assets/images/cropped-Praise.png'), 0.2, true)->backgroundColor(255,255,255)->size(900)->generate('https://praiseatmosphere.com/events');
    //     $path = 'qr_codes/website1.png';
    //     Storage::disk('public')->put($path, $qr_code);
    //    dd("image generated");
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
