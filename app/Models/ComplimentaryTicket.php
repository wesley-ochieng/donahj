<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Jobs\TicketJob;
use App\Mail\TicketMail;
use Mail;

class ComplimentaryTicket extends Model
{
    use HasFactory;

    protected $fillable = [
        'ticket_number',
        'event_id',
        'organization_name',
        'quantity',
        'email',
        'status',
        'qr_code',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
        //send ticket
        public function sendTicket($email, $ticketnumber, $event){
            // TicketJob::dispatch($email, $ticketnumber);
            Mail::to($email)->send(new TicketMail($ticketnumber, $event));
        }


}
