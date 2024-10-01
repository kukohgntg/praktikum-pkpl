<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class LendController extends Controller
{
    public function lend_book_view()
    {
        $users = User::where('role_id', '!=', 1)->get();
        $books = Book::where('status', '!=', 'not available')->get();
        return view('lend-book', ['users' => $users, 'books' => $books]);
    }
}
