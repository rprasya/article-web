<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/main', function () {
    return view('layouts.main');
});


// Auth
Route::get('/login', [AuthController::class, 'login'])->name('login.page');
Route::get('/register', [AuthController::class, 'register'])->name('login.register');

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// article
Route::get('/article', [ArticleController::class, 'index'])->name('article');
Route::get('/article/create', [ArticleController::class, 'create'])->name('article.create');
Route::get('/article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
Route::post('/article/post', [ArticleController::class, 'store'])->name('article.post');
Route::put('/article/{id}', [ArticleController::class, 'update'])->name('article.update');
Route::delete('/article/{id}', [ArticleController::class, 'destroy'])->name('article.delete');