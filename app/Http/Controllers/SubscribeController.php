<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscriber;

class SubscribeController extends Controller 
{
    public function subscribe(SubscriptionRequest $request) 
    {
        $name = $request->name;
        $email = $request->email;
        
        $subscription = Subscriber::firstOrCreate(['email' => $email], ['name' => $name]);
        
        $subscription->subscribe();
        
        return redirect()->back();
    }
}
