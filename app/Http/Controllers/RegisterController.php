<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('component.auth.register');
    }

    public function register(Request $request)
    {
        // Validasi data yang dikirimkan oleh form
        $credential = $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Pengecekan konfirmasi password
        if ($request->password_confirmation === $credential['password']) {
            // Jika password dan konfirmasi password cocok, buat user baru
            User::create([
                'name' => $credential['fullname'],
                'email' => $credential['email'],
                'password' => Hash::make($credential['password']),
            ]);

            // Redirect ke halaman login dengan pesan sukses
            return redirect('/login')->with('success', 'Registration successful. Please login.');
        } else {
            // Jika password dan konfirmasi password tidak cocok, kembalikan dengan error
            return back()->withErrors(['password_confirmation' => 'Konfirmasi password tidak cocok']);
        }
    }
}
