<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('pages.auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->intended('/')->with('success', 'Berhasil Login');
        }
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    public function register()
    {
        return view('pages.auth.register');
    }

    public function createAdmin(Request $request){
        $request->validate([
            'name' => 'required|min:3,unique:users,name',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6|confirmed', //menggunakan validasi 'confirmed'
        ]);

        $adminUser = ([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ]);

        User::create($adminUser);

        return redirect()->route('login.page.admin')->with('success', 'Berhasil Registrasi');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login.page.admin');
    }
}
