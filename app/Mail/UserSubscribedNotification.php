<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserSubscribedNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    
    public $email;
    
    public $subject;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(string $name, string $email, string $subject = '')
    {
        $this->name = $name;
        $this->email = $email;
        $subject = $subject ? $subject : trans('mail.user_subscribed_notification.subject');

        $this->from(config('app.support_email'));
        $this->subject($subject);
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.user-subscribed-notification');
    }
}
