<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ArticleController extends Controller 
{
    public function articles() 
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.articles', ['articles' => $articles]);
    }

    public function edit(Request $request, int $id) 
    {
        $categories = Category::all();
        $article = Article::where(['id' => $id])->firstOrFail();

        return view('admin.article', ['article' => $article, 'categories' => $categories]);
    }
    
    public function update(Request $request, int $id) 
    {
        $article = Article::where(['id' => $id])->firstOrFail();
        $data = $request->post();

        $article->setImage($request->file('image'));
        $article->setSlug($request->post('name'));
        $article->fill($data);

        if (!$article->save())
        {
            return redirect()->back()->withErrors('Save error');
        }
        
        return redirect()->back()->with(['message' => 'Article updated']);
    }
    
    public function delete(Request $request, int $id)
    {
        Article::where(['id' => $id])->delete();
        return redirect()->route('admin.articles');
    }
    
    public function add() 
    {
        $article = new Article(['name' => 'Name', 'slug' => 'Slug', 'text' => 'Text']);
        $article->save();

        return redirect()->route('admin.article_edit', $article->id);
    }
}