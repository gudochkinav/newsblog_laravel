<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use App\Models\Services;
use App\Models\Testimonials;
use App\Models\Articles;
use App\Http\Requests\PhotosLoadMoreRequest;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactFeedback;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class SiteController extends Controller {
    public function index(Request $request) 
    {
        return view('home-page')->with([
            'portfolio_short_list' => Portfolio::orderBy('created_at', 'desc')->limit(3)->get(),
            'services_short_list'  => Services::orderBy('created_at', 'desc')->limit(4)->get(),
            'testimonials_list'    => Testimonials::orderBy('created_at', 'desc')->limit(3)->get(),
            'articles_short_list'  => Articles::orderBy('created_at', 'desc')->limit(6)->get()
        ]);
    }

    public function services(Request $request) 
    {
        $servicesList = Services::orderBy('created_at', 'desc')->paginate(10);
        return view('services', ['services_list' => $servicesList]);
    }

    public function blog(Request $request) 
    {
        $articlesList = Articles::orderBy('created_at', 'desc')->limit(12)->get();
        return view('blog', ['articles_list' => $articlesList]);
    }
    
    public function article(Request $request) 
    {
        $article = Articles::where(['slug' => $request->name])->firstOrFail();

        return view('article', ['article' => $article]);
    }

    public function portfolio(Request $request) 
    {
        $photosList = Portfolio::orderBy('created_at', 'desc')->paginate(3);
        if ($request->ajax()) {
            if (!$photosList->count()) {
                return '';
            }

            $content['photos_list'] = view('layouts.photos-list', ['photos_list' => $photosList, 'offset' => ($request->page - 1) * 3, 'current_page' => $request->page - 1])->render();
            $content['modal_photos_list'] = view('layouts.modal-photos-list', ['photos_list' => $photosList, 'offset' => ($request->page - 1) * 3 ])->render();

            return $content;
        }

        return view('portfolio', ['photos_list' => $photosList]);
    }

    public function loadMore(PhotosLoadMoreRequest $request)
    {
        $photosList = Portfolio::orderBy('created_at', 'desc')->paginate(1);
        return view('layouts.photos-list', ['photos_list' => $photosList]);
    }
    
    public function contact() 
    {
        return view('contact');
    }
    
    public function sendFeedback(ContactRequest $request) {
        $result = Mail::to($request->email)
            ->send(new ContactFeedback($request->name, $request->email, $request->phone, $request->text));
        
        return redirect()->back()->with(['message' => 'Email was sending.']);
    }
}
