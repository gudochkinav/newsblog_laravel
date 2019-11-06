<?php

namespace App\Http\Controllers\Admin;

use App\Models\Subscriber;
use App\Models\Service;
use App\Http\Controllers\Controller;
use App\Http\Requests\SubscriptionRequest;
use App\Http\Requests\ServiceRequest;
use Illuminate\Http\Request;

class AdminController extends Controller 
{
    public function index() {
        return view('admin.home');
    }

    public function subscribers() 
    {
        $subscribers = Subscriber::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.subscribers', ['subscribers' => $subscribers]);
    }
    
    public function addSubscriber() 
    {
        $subscriber = new Subscriber(['name' => 'Name', 'email' => 'Email', 'status' => 'Off']);
        $subscriber->save();

        return redirect()->route('admin.subscriber_edit', $subscriber->id);
    }
    
    public function editSubscriber(Request $request, int $id) {
        $subscriber = Subscriber::where(['id' => $id])->firstOrFail();
        return view('admin.subscriber', ['subscriber' => $subscriber]);
    }
    
    public function deleteSubscriber(Request $request, int $id) 
    {
        Subscriber::where(['id' => $id])->delete();
        return redirect()->back();
    }

    public function updateSubscriber(SubscriptionRequest $request, int $id)
    {
        $subscriber = Subscriber::where(['id' => $id])->firstOrFail();
        $subscriber->fill($request->post());
        $subscriber->save();

        return redirect()->back()->with(['message' => 'Subscription updated']);
    }
    
    public function services() 
    {
        $services = Service::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.services', ['services' => $services]);
    }
    
    public function addService() 
    {
        $service = new Service(['name' => 'New service']);
        $service->save();
        
        return redirect()->route('admin.service_edit', $service->id);
    }
    
    public function editService(Request $request, int $id) 
    {
        $service = Service::where(['id' => $id])->firstOrFail();
        return view('admin.service', ['service' => $service]);
    }

    public function updateService(ServiceRequest $request, int $id) 
    {
        $data = $request->post();

        $service = Service::where(['id' => $id])->firstOrFail();
        $service->setImage($request->file('image'));
        $service->setDescription($request->post('description'));
        $service->fill($data);

        if ($service->save()) 
        {
            return redirect()->back()->with(['message' => 'Service updated']);
        }

        return redirect()->back()->withErrors(['Save error']);
    }

    public function deleteService(Request $request, int $id) 
    {
        Service::where(['id' => $id])->delete();
        return redirect()->back();
    }
}
