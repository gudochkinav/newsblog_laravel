<?php

namespace App\Events;

use App\Models\Subscriber;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserSubscribed
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    
    private $subscriber;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }
    
    public function getSubscriber() : Subscriber
    {
        return $this->subscriber;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
