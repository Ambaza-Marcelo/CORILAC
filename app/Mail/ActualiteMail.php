<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ActualiteMail extends Mailable
{
    use Queueable, SerializesModels;
    public $subscriber;
    public $actualite;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($subscriber,$actualite,$url)
    {
        $this->subscriber = $subscriber;
        $this->actualite = $actualite;
        $this->url = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Nouvelle publication')
                    ->view('frontend.mail.actualite_mail');
    }
}
