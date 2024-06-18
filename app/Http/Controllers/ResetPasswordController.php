<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\hash;
use App\Models\User;

class ResetPasswordController extends Controller
{
    //
    public function index(Request $request)
    {
        return view('component.auth.reset')->with(['email' => $request->email]);
    }
    public function resetPassword(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
            'retypepassword' => 'required|min:8',
        ]);
        if ($data['password'] != $data['retypepassword']) {
            return back()->withErrors(['password' => 'Password and retype password do not match.']);
        }
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email address not found.']);
        }
        $user->password = Hash::make($data['password']);
        $user->save();
        return redirect('/login')->with('status', 'Password has been reset!');
    }
}
