<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use App\Http\Controllers\Controller;

class PortfolioController extends Controller
{
    public function portfolio() 
    {
        $portfolio = Portfolio::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.portfolio', ['portfolio' => $portfolio]);
    }
    
    public function add() 
    {
        $portfolio = new Portfolio(['name' => 'Name']);
        $portfolio->save();

        return redirect()->route('admin.portfolio_edit', $portfolio->id);
    }
    
    public function update(Request $request, int $id) 
    {
        $portfolio = Portfolio::where(['id' => $id])->firstOrFail();
        $portfolio->setImage($request->file('image'));
        $portfolio->fill($request->post());

        if (!$portfolio->save())
        {
            return redirect()->back()->withErrors(['Save error']);
        }
        
        return redirect()->back()->with(['message' => 'Portfolio updated']);
    }
    
    public function delete(Request $request, int $id) 
    {
        Portfolio::where(['id' => $id])->delete();
        return redirect()->route('admin.portfolio');
    }
    
    public function edit(Request $request, int $id) 
    {
        $portfolio = Portfolio::where(['id' => $id])->firstOrFail();
        return view('admin.portfolio-edit', ['portfolio' => $portfolio]);
    }
}