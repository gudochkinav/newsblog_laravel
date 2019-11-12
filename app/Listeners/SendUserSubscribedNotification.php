<?php

namespace App\Listeners;

use App\Events\UserSubscribed;
use App\Jobs\SendUserSubscribedEmail;
use App\Mail\UserSubscribedNotification;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendUserSubscribedNotification implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(UserSubscribed $event)
    {
        $subscriber = $event->getSubscriber();
        dispatch(new SendUserSubscribedEmail(new UserSubscribedNotification($subscriber->name, $subscriber->email)));
    }
}
