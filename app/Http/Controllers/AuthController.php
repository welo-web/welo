<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            return redirect('/admin/dashboard');
        }

        return back()->with('error', 'بيانات تسجيل الدخول غير صحيحة');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }
}
