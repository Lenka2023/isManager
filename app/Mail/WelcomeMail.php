<?php

namespace App\Mail;
use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
         \Log::info('welcomemail_construct.');
        $this->data  =  $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
       \Log::info('sendemail_handle.'); 
       return $this->markdown('emails.welcome')->with([
            'title' => $this->data['title'],
            'text' => $this->data['text'],
       ]);
    }
}
