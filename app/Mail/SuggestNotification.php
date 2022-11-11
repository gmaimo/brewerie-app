<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuggestNotification extends Mailable
{
    use Queueable, SerializesModels;

    public String $email;
    public String $name;
    public String $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(String $email, String $name, String $message)
    {
        //
        $this->email = $email;
        $this->name = $name;
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from ($this->email)
                    ->subject('Nueva sugerencia de cervecería; ' . $this->name)
                    ->markdown('emails.suggest');
    }
}
