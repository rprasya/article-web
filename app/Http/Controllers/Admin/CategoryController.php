<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->paginate(5);
        return view('pages.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   
        return view('pages.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|min:3|unique:categories,name',
        ]);

        $category = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'))
        ];

        Category::create($category);
        
        return redirect()->route('category')->with('success', 'Berhasil menambahkan category');
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
        $category = Category::find($id);
        return view('pages.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name'=>'required|min:3',
        ]);

        $category = [
            'name' => $request->input('name'),
            'slug' => Str::slug($request->input('name'))
        ];

        Category::where('id', $id)->update($category);
        
        return redirect()->route('category')->with('success', 'Berhasil update category');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id', $id)->delete();

        return redirect()->route('category')->with('success', 'Berhasil menghapus category');
    }
}
