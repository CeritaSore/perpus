<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
    //
    public function index()
    {
        return view('component.auth.forget');
    }
    public function sendResetLinkEmail(Request $request)
    {
        // dd($request);
        $data = $request->validate([
            'email' => 'required|email',
        ]);
        $user = User::where('email', $data['email'])->first();
        if (!$user) {
            return back()->withErrors(['email' => 'Email not found']);
        }
        return redirect()->route('reset', ['email' => $request->email]);
    }
}
