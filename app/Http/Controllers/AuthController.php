<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login_view()
    {
        return view('login');
    }

    public function authenticating(Request $request)
    {
        // dd('authenticating');
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        // cek apakah login valid
        if (Auth::attempt($credentials)) {
            // cek apakah user active
            if (Auth::user()->status != 'active') {

                // user tidak active dilempar ke logout
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();

                Session::flash('status', 'failed');
                Session::flash('message', 'Your acount inactive, please contact admin!');
                return redirect('/auth/login');
            }
            // dd(Auth::user());
            // $request->session()->regenerate();
            if (Auth::user()->role_id == 1) {
                return redirect('/user/dashboard');
            }

            if (Auth::user()->role_id == 2) {
                return redirect('/');
            }
        }

        Session::flash('status', 'failed');
        Session::flash('message', 'Login invalid');
        return redirect('/auth/login');
    }

    public function register_view()
    {
        return view('register');
    }

    public function registering(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'phone' => 'max:255',
            'address' => 'required',
        ]);

        // dd($validated);
        $user = User::create($request->all());
        Session::flash('status', 'success');
        Session::flash('message', 'Register success, wait admin approveal');
        return redirect('/auth/login');
    }


    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
