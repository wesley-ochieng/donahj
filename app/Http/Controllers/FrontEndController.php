<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Storage;
use App\Models\Ticket;
use App\Models\EventPrice;


class FrontEndController extends Controller
{
    public function index(){
        return view('about');
    }

    public function home(){

        // $qrCode = QrCode::format('png')->merge(public_path('assets/images/janefinal.png'), 0.2, true)->backgroundColor(255,255,255)
        // ->style('round')->eye('square')
        // ->gradient (0,0,0,0,0,0,'radial')->size(300)->generate("https://events.janeallermusic.com/"); 
        // Storage::disk('public')->put('qr-codes/promotion.png', $qrCode);
    
        $upcoming_event = Event::where('status', 'upcoming')
        ->orWhere('status', 'active')
        ->first();
       
        
        $paid_tickets = Ticket::where('status','paid')
        ->where('event_id',$upcoming_event->id)
        ->count();

        $regular_quantity = EventPrice::where('event_id',$upcoming_event->id)
        ->first()->regular_quantity;
        $vip_quantity = EventPrice::where('event_id',$upcoming_event->id)
        ->first()->vip_quantity;
        $kids_quantity = EventPrice::where('event_id',$upcoming_event->id)
        ->first()->kids_quantity;

        if(!$upcoming_event){
            $events = Event::all();
        }else{
            $events = Event::where('status', 'upcoming')
            ->orWhere('status', 'active')
            ->where('id', '!=', $upcoming_event->id)
            ->orderBy('id', 'desc')->get();

        }
        return view('welcome', compact('upcoming_event', 'events','paid_tickets','regular_quantity','vip_quantity','kids_quantity' ));
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
