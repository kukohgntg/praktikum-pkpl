<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    // public function delete_book_view($slug)
    // {
    //     // dd($request->all());
    //     $book = Book::where('slug', $slug)->first();
    //     return view('delete-book', ['book' => $book]);
    // }

    // // Fungsi Untuk Menghapus Book *Delete
    // public function delete_book($slug)
    // {
    //     $book = Book::where('slug', $slug)->first();
    //     $book->delete();
    //     return redirect('books')->with('status', 'Book Deleted Successfully');
    // }
    
    // public function deleted_books_view()
    // {
    //     // dd($deleted_books);
    //     $deleted_books = Book::onlyTrashed()->get();
    //     return view('deleted-books', ['deleted_books' => $deleted_books]);
    // }

    // public function restore_book_view($slug)
    // {
    //     // dd($book);
    //     $book = Book::withTrashed()->where('slug', $slug)->first();
    //     return view('restore-book', ['book' => $book]);
    // }

    // // Fungsi Untuk Memulihkan Book *Restore
    // public function restored_book($slug)
    // {
    //     $book = Book::withTrashed()->where('slug', $slug)->first();
    //     $book->restore();
    //     return redirect('deleted-books')->with('status', 'Book Restored Successfully');
    // }
}
