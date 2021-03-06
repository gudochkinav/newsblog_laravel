<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactFeedback extends Mailable
{
    use Queueable, SerializesModels;
    
    public $name;
    public $email;
    public $phone;
    public $text;
    public $subject;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email, string $phone, string $text, string $subject = '')
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->text = $text;
        $this->subject = $subject ? $subject : trans('mail.contact_feedback.subject');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from($this->email)
                    ->to(config('app.admin_email'))
                    ->subject($this->subject)
                    ->view('mail.contact');
    }
}
