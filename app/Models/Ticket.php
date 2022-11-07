<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\TicketJob;


class Ticket extends Model
{
    use HasFactory;

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function payment(){
        return $this->hasOne(Payment::class);
    }

    //send ticket
    public function sendTicket($email, $ticketnumber){
        TicketJob::dispatch($email, $ticketnumber);
    }

    public function ticketsSold()
    {
        return $this->event()->ticketsSold();
    }
    
   
}
