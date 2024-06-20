<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('component.auth.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials) && Auth::user()->status === "Active") {
            return redirect()->intended('/');
        } else {
            return redirect()->back()->with('error', 'Akun masih tertangguhkan oleh admin.');
        }

        return redirect()->back()->with('error', 'Invalid credentials');
    }
    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
