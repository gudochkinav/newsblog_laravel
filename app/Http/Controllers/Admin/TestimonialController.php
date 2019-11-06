<?php

namespace App\Http\Controllers\Admin;

use App\Models\Testimonial;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TestimonialController extends Controller 
{
    public function testimonials() 
    {
        $testimonials = Testimonial::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.testimonials', ['testimonials' => $testimonials]);
    }
    
    public function addTestimonial(Request $request) 
    {
        $testimonial = new Testimonial(['author_name' => 'Name', 'description' => 'Description']);
        $testimonial->save();

        return redirect()->route('admin.testimonial_edit', $testimonial->id);
    }
    
    public function editTestimonial(Request $request, int $id) 
    {
        $testimonial = Testimonial::where(['id' => $id])->firstOrFail();
        return view('admin.testimonial', ['testimonial' => $testimonial]);
    }
    
    public function deleteTestimonial(Request $request, int $id) 
    {
        Testimonial::where(['id' => $id])->delete();
        return redirect()->route('admin.testimonials');
    }

    public function update(Request $request, int $id) 
    {
        $data = $request->post();

        $testimonial = Testimonial::where(['id' => $id])->firstOrFail();
        $testimonial->fill($data);
        $testimonial->setImage($request->file('image'));
        $testimonial->setDescription($request->post('description'));
        
        if (!$testimonial->save())
        {
            return redirect()->back()->withErrors('Save error');
        }

        return redirect()->back()->with(['message' => 'Testimonial updated']);
    }
}