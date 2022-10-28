<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Mail;
use App\Mail\TicketMail;

class TicketJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    public $email;
    public $ticket_number;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($email, $ticket_number)
    {
        $this->email = $email;
        $this->ticket_number = $ticket_number;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd('test');
        Mail::to($this->email)->send(new TicketMail($this->ticket_number));
    }
}
