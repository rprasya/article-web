<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if(!Auth::check()){
            return redirect()->route('login.page.admin')->with('error-unauthorized', 'Silahkan login terlebih dahulu!');
        } else

        $categoryCount = Category::count();
        $articleCount = Article::count();

        return view('pages.dashboard.admin', compact('categoryCount', 'articleCount'));
    }
}
