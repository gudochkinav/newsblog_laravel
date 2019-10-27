<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Models\Subscription;

class SubscribeController extends Controller 
{
    public function subscribe(SubscriptionRequest $request) 
    {
        $name = $request->name;
        $email = $request->email;
        
        $subscription = Subscription::firstOrCreate(['email' => $email], ['name' => $name]);
        
        $subscription->subscribe();
        
        return redirect()->back();
    }
}
