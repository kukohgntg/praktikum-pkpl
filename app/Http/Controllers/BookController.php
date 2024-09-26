<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function books_view()
    {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }

    public function add_book_view()
    {
        return view('add-book');
    }

    public function add_book(Request $request)
    {
        // dd($request->all);
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title' => 'required|max:255',
        ]);

        $category = Book::create($request->all());
        return redirect('books')->with('status', 'Category Added Successfully');
    }
}
