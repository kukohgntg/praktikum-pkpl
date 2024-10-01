<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
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

    public function lending_book(Request $request)
    {
        $request['loan_date'] = Carbon::now()->toDateTimeString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateTimeString();
        // dd($request->all());

        $book = Book::findOrFail($request->book_id)->only('status');
        // dd($book);

        if ($book['status'] == 'not available') {
            // dd('buku sedang dipinjam');
        }
        // dd('buku berhasil dipinjam');
    }
}
