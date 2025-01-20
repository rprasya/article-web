<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\CategoryController;
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

// category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/category/create', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::post('/category/post', [CategoryController::class, 'store'])->name('category.post');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.delete');