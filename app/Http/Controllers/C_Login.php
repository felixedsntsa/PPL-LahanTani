<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class C_Login extends Controller
{
    public function masuk() {
        return view('auth.login');
    }

    public function proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');

        // Untuk admin login
        if (Auth::guard('web')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard'); // ganti sesuai route dashboard admin kamu
        }

        // Untuk cabang login
        if (Auth::guard('cabang')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/cabang/dashboard'); // Ganti dengan route dashboard cabang
        }

        return back()->with('error', 'Email atau password salah.');
    }

    public function logout(Request $request)
    {
    Auth::guard('web')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
}
}
