<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // public function books(Request $request)
    // {
    //     $request->session()->flush();
    //     // dd(Auth::user());
    // }

    public function books()
    {
        return view('books');
    }
}
