<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailContact extends Mailable
{
    use Queueable, SerializesModels;
     
    /**
     * Create a new message instance.
     * 
     *
     * @return void
     */
    public function __construct($data)
    {
        $data=$data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()    
    {
        $from_email =env('MAIL_FROM_ADDRESS');      

        return $this->view('view.name');
    }
}
