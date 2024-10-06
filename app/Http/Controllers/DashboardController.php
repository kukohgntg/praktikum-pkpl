<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use App\Models\LoanRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    // public function dashboard(Request $request)
    // {
    //     $request->session()->flush();
    //     // dd(Auth::user());
    // }

    public function dashboard_view()
    {
        $bookCount = Book::count();
        $categoryCount = Category::count();
        $userCount = User::count();
        $records = LoanRecord::with('users', 'books')->get();
        return view('dashboard', ['book_count' => $bookCount, 'category_count' => $categoryCount, 'user_count' => $userCount, 'records' => $records]);
    }
}
