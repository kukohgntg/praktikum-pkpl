<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Pastikan Anda import Storage

class BookController extends Controller
{
    // View untuk menampilkan list buku
    public function books_view()
    {
        $books = Book::all();
        return view('books', ['books' => $books]);
    }

    // View untuk menambahkan buku
    public function add_book_view()
    {
        $categories = Category::all();
        return view('add-book', ['categories' => $categories]);
    }

    // Fungsi untuk menambahkan buku baru
    public function add_book(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title'     => 'required|max:255',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk file gambar
        ]);

        // Menyimpan file gambar jika ada
        $newName = '';
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newName = $request->title . '-' . now()->timestamp . '.' . $extension;

            // Menyimpan file di disk 'public'
            $request->file('image')->storeAs('cover', $newName, 'public');
        }

        // Mengisi kolom cover dengan nama file yang disimpan
        $request['cover'] = $newName;

        // Membuat buku baru dengan data yang telah divalidasi
        $book = Book::create($request->all());

        // Redirect ke halaman books dengan pesan sukses
        return redirect('books')->with('status', 'Book Added Successfully');
    }
}
