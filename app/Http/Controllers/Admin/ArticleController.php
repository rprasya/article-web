<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::with('category')->latest()->paginate(5);
        return view('pages.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('pages.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|unique:articles,title',
            'content' => 'required|unique:articles,content',
            'author' => 'required|min:3',
            'category_id' => 'required' 
        ]);
        
        $article = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->input('author'),
            'category_id' => $request->input('category_id'),
        ];

        Article::create($article);

        return redirect()->route('article')->with('succes-post', "Berhasil menambahkan article");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categories = Category::all();
        $article = Article::findOrFail($id);

        return view('pages.article.edit', [
            'categories' => $categories,
            'article' => $article,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'content' => 'required',
            'author' => 'required|min:3',
            'category_id' => 'required' 
        ]);
        
        $article = [
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'author' => $request->input('author'),
            'category_id' => $request->input('category_id'),
        ];

        Article::where('id', $id)->update($article);

        return redirect()->route('article')->with('success', 'Berhasil mengubah article');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Article::where('id', $id)->delete();

        return redirect()->route('article')->with('success', 'Berhasil menghapus article');
    }
}
