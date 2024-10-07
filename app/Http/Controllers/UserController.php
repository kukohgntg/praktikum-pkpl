<?php

namespace App\Http\Controllers;

use App\Models\LoanRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // for admin
    public function users_view()
    {
        $users = User::where('status', 'active')->where('role_id', 2)->get();
        return view('users', ['users' => $users]);
    }

    public function inactive_users_view()
    {
        $users = User::where('status', 'inactive')->where('role_id', 2)->get();
        return view('inactive-users', ['users' => $users]);
    }

    public function detail_user_view($slug)
    {
        $user = User::where('slug', $slug)->first();
        //menampilkan data loan records di tiap user 
        $records = LoanRecord::with(['users', 'books'])->where('user_id', $user->id)->get();
        return view('detail-users', ['user' => $user, 'records' => $records]);
    }

    public function activating_user($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->status = 'active';
        $user->save();
        return redirect('/admin/users/detail/' . $slug)->with('status', 'User Activated Successfully');
    }

    public function ban_user_view($slug)
    {
        // dd($request->all());
        $user = User::where('slug', $slug)->first();
        return view('ban-user', ['user' => $user]);
    }

    // Fungsi Untuk Menghapus Category *Delete
    public function banning_user($slug)
    {
        $user = User::where('slug', $slug)->first();
        $user->delete();
        return redirect('/admin/users')->with('status', 'User Banned Successfully');
    }

    public function banned_users_view()
    {
        $banned_users = User::onlyTrashed()->get();
        return view('banned-users', ['banned_users' => $banned_users]);
    }

    public function unban_user_view($slug)
    {
        // dd($user);
        $user = User::withTrashed()->where('slug', $slug)->first();
        return view('unban-user', ['user' => $user]);
    }

    // Fungsi Untuk Memulihkan User *Restore
    public function unbanning_user($slug)
    {
        $user = User::onlyTrashed()->where('slug', $slug)->first();
        $user->restore();
        return redirect('/admin/users/banned')->with('status', 'User Unbanned Successfully');
    }

    // for client
    public function profile_view()
    {
        // dd(Auth::user());
        $user = Auth::user();
        $records = LoanRecord::with(['users', 'books'])->where('user_id', $user->id)->get();
        return view('profile', ['user' => $user, 'records' => $records]);
    }
}
