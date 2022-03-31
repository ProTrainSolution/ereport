<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data, $id)
    {
        //
        $this->data = $data;
        $this->id = $id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //return $this->view('view.name');
        if ($this->id == 1){
            return $this->from('proazrin@yahoo.com')->subject('Feedback email from admin.')->view('dynamic_email_template')->with('data', $this->data);
        } else {
            return $this->from('proazrin@yahoo.com')->subject('Feedback email from admin.')->view('admins.users.submission-notification')->with('data', $this->data);

        }
    }
}
