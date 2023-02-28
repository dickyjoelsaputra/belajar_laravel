<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        // dd('ini halaman login');
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        //https://laravel.com/docs/9.x/authentication#authenticating-users
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        // session()->flash('status', 'failed');
        // session()->flash('message', $request->email . ' Gak ada / Salah Cok');
        // session()->flash('email', $request->email);

        // return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
