<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class sendAdmin extends Mailable
{
    use Queueable, SerializesModels;

    public $winner_email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($winner_email)
    {
        $this->winner_email = $winner_email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.admin');
    }
}
