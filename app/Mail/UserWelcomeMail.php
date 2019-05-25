<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserWelcomeMail extends Mailable
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
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->data['sender_email'], $this->data['sender_name'])
                    ->to($this->data['receiver_email'], $this->data['receiver_name'])
                    ->view('emails.user_welcome')
                    ->text('emails.text')
                    ->with(
                      [
                            'Var1' => '1',
                            'Var2' => '2',
                      ])
                      ->attach(public_path('/files/images').'/1547788415.jpg', [
                              'as' => '1547788415.jpg',
                              'mime' => 'image/jpeg',
                      ]);
    }
}
