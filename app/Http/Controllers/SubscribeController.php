<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Events\UserSubscribed;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;

class SubscribeController extends Controller 
{
    public function subscribe(SubscriptionRequest $request) 
    {
        $name = $request->name;
        $email = $request->email;
        
        $subscription = Subscriber::firstOrCreate(['email' => $email], ['name' => $name]);
        
        $subscription->subscribe();
        
        event(new UserSubscribed($subscription));
        
        return redirect()->back();
    }
}
