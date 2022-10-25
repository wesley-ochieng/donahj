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
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket_number)
    {
        $this->ticket_number = $ticket_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.ticket');
    }
}
