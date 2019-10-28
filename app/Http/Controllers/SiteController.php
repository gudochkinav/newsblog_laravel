<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Models\Services;
use App\Models\Testimonials;
use App\Models\Articles;

class SiteController extends Controller {
    public function index(Request $request) 
    {
        $portfolio = new Portfolio();
        $portfolioShortList = $portfolio->getShortList();

        $services = new Services();
        $servicesShortList = Services::orderBy('created_at', 'desc')->limit(4)->get();

        $testimonials = new Testimonials();
        $testimonialsList = $testimonials->get();

        $articles = new Articles();
        $articlesShortList = $articles->get(6);

        return view('home-page')
                ->with([
                    'portfolio_short_list' => $portfolioShortList,
                    'services_short_list' => $servicesShortList,
                    'testimonials_list' => $testimonialsList,
                    'articles_short_list' => $articlesShortList
                ]);
    }

    public function services(Request $request) 
    {
        $servicesList = Services::orderBy('created_at', 'desc')->paginate(10);
        return view('services', ['services_list' => $servicesList]);
    }
}
