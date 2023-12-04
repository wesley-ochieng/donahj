<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Storage;

class ThirdPartyMail extends Mailable
{
    use Queueable, SerializesModels;
    public $attachmentPaths;
    public $event;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($attachmentPaths, $event)
    {
        $this->attachmentPaths = $attachmentPaths;
        $this->event = $event;

    }

//     public function build()
//     {
//         $email = $this->view('mails.third-party')
//             ->subject('Your Tickets for ' . $this->event)
//             ->with(['content' => "Thamk you for working with us"]);
// ;

//         foreach ($this->attachmentPaths as $attachmentPath) {
//             $email->attach(public_path($attachmentPath));

//         }

//         return $email;
//     }

public function build()
{
    $email = $this->view('mails.third-party')
        ->subject('Your Tickets for ' . $this->event)
        ->with(['content' => "Thank you for working with us"]);

    foreach ($this->attachmentPaths as $attachmentPath) {
        $attachmentPath = 'public/' . $attachmentPath;
        $attachmentFullPath = Storage::path($attachmentPath);
        $email->attach($attachmentFullPath);
    }

    return $email;
}
// file:///home/wesley/projects/ticket/storage/app/public/storage/qr_codes/9ac4ea55-94c1-4153-983c-4602ff6502f9.png
// file:///home/wesley/projects/ticket/storage/app/public/qr_codes/9ac4eb65-c38c-4098-86a7-7823ca1ecc5f.png
//         /home/wesley/projects/ticket/storage/app/public/storage/qr_codes/9ac4edb1-9a16-490f-9715-10b679336815.png
// "/home/wesley/projects/ticket/storage/app/storage/qr_codes/".

    
}
