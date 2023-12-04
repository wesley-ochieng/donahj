<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\TicketJob;
use App\Mail\TicketMail;
use App\Mail\ThirdPartyMail;
use Mail;

class Ticket extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class, 'merchantRequestId', 'merchantRequestId');
    }

    //send ticket
    public function sendTicket($email, $ticketnumber, $event){
        // TicketJob::dispatch($email, $ticketnumber);
        Mail::to($email)->send(new TicketMail($ticketnumber, $event));
    }

    public function sendThirdPartyTicket($email, $attachmentPaths, $event)
    {
        Mail::to($email)->send(new ThirdPartyMail($attachmentPaths, $event));
    }

    public function ticketsSold()
    {
        return $this->event()->ticketsSold();
    }
    
   
}
