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
        $buku = Books::all();
        if (Auth::check()) {
            $user = Auth::user();
            return view('component.frontend.index', compact('user', 'buku'));
        } else {
            return view('component.frontend.index', compact('buku'));
        }
    }
}
