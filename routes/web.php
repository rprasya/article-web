<?php

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
