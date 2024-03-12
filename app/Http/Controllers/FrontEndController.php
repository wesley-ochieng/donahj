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

        // test sending sms to env SMS_URL  with apikey service id and phone number
        // $url = env('SMS_URL');
        // $apikey = env('SMS_API_KEY');
        // $service_id = 0;
        // $mobile = '0726580246';
        // $shortcode = 'Tilil';
        // $message = 'Hello Jane, this is a test message from Jane Aller Music';
  
        // $sms = json_encode(array(
        //     "api_key" => "c8rZzMlB1dL45HtwpY93JKCmau2qeVDoTUX6bOWiSygQjhNkPns0vARfIFxE7G",
        //     "service_id" => $service_id,
        //     "mobile" => $mobile,
        //     "response_type" => "json",
        //     "shortcode" => $shortcode,
        //     "message" => $message
        // ));
        // $ch = curl_init();
        // curl_setopt($ch, CURLOPT_URL, $url);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        // curl_setopt($ch, CURLOPT_POST, 1);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $sms);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // $response = curl_exec($ch);
        // curl_close($ch);

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
