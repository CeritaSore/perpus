<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    //
    public function index()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $buku = Books::all();
            return view('component.frontend.index', compact('user', 'buku'));
        } else {
            return view('component.frontend.index');
        }
    }
}
