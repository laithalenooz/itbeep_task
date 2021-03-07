<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    public $data;

    /**
     * Create a new message instance.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data= $data;
    }

    /**
     * Build the message.
     *
     * @return SendMail
     */
    public function build(): SendMail
    {

      return $this->from('testm3404@gmail.com')->subject('No-replay')->view('dynamic_email_template')
          ->with(['name'=>$this->data['name'],
                  'mobile'=>$this->data['mobile'],
                  'interest'=>$this->data['interest'],
                  'services'=>$this->data['services']]);

    }
}
