<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // for admin
    public function users_view()
    {
        $users = User::where('role_id', 2)->get();
        return view('users', ['users' => $users]);
    }

    public function inactive_users_view()
    {
        $users = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('inactive-users', ['users' => $users]);
    }

    public function detail_users_view($slug)
    {
        $user = User::where('slug', $slug)->first();
        return view('detail-users', ['user' => $user]);
    }

    // for client
    public function profile_view()
    {
        return view('profile');
    }
}
