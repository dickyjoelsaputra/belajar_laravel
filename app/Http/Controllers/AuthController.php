<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        // return back()->withErrors([
        //     'email' => 'The provided credentials do not match our records.',
        // ])->onlyInput('email');

        session()->flash('status', 'failed');
        session()->flash('message', $request->email . ' Gak ada / Salah Cok');
        session()->flash('email', $request->email);

        return redirect('/login');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function changepassword()
    {
        return view('auth.change-password');
    }
    public function changepasswordProcess(Request $request)
    {
        $cek = Hash::check($request->old_password, Auth::user()->password);
        if (!$cek) {
            return back()->with(
                'status',
                'The provided credentials do not match our records.',
            );
            // session()->flash('status', 'failed');
            // session()->flash('message', ' Gak ada / Salah Cok');
            // session()->flash('email', $request->email);

            // return redirect('/change-password');
        }

        $cek2 = $request->new_password == $request->new_password;

        if (!$cek2) {
            return back()->with(
                'status',
                'New password and password repeat not same',
            );
        }

        Auth::user()->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with(
            'status',
            'Password Berhasil diubah',
        );
    }
}
