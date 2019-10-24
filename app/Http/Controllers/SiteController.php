<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class SiteController extends Controller {
    public function index(Request $request) 
    {
        return view('index')->with(['content' => 'content']);
    }
}
