<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ComplimentaryTicketMail extends Mailable
{
    use Queueable, SerializesModels;
    use Queueable, SerializesModels;
    public $ticket_number;
    public $event;
    public $organization_name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket_number, $event, $organization_name)
    {
        $this->ticket_number = $ticket_number;
        $this->event = $event;
        $this->organization_name = $organization_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->organization_name."'s complimentaryticket")
        ->view('mails.ticket');
    }
}
