<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TicketMail extends Mailable
{
    use Queueable, SerializesModels;
    use Queueable, SerializesModels;
    public $ticket_number;
    public $event;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket_number, $event)
    {
        $this->ticket_number = $ticket_number;
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.ticket')
        ->attach(public_path('storage/qr_codes/' . $this->ticket_number . '.png'))
        ->subject('Your Ticket for ' . $this->event);
    }
}
