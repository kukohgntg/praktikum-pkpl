<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // for admin
    public function users_view()
    {
        return view('users');
    }

    // for client
    public function profile_view()
    {
        return view('profile');
    }
}
