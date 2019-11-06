<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories() 
    {
        $categories = Category::paginate(10);
        return view('admin.categories', ['categories' => $categories]);
    }
    
    public function add() 
    {
        $category = new Category(['name' => 'Name']);
        $category->save();
        
        return redirect()->route('admin.category_edit', $category->id);
    }
    
    public function edit(Request $request, int $id) 
    {
        $category = Category::where('id', $id)->firstOrFail();
        return view('admin.category', ['category' => $category]);
    }
    
    public function update(Request $request, int $id) 
    {
        $category = Category::where('id', $id)->firstOrFail();
        $category->fill($request->post());
        if (!$category->save())
        {
            return redirect()->back()->withErrors('Save error');
        }
        
        return redirect()->back()->with(['message' => 'Category updated']);
    }
    
    public function delete(Request $request, int $id) 
    {
        Category::where('id', $id)->delete();
        return redirect()->route('admin.categories');
    }
}