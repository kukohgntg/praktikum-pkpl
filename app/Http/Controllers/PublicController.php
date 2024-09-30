<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        // menampilkan daftar kategori di filter kategori
        $categories = Category::all();

        // Query dasar untuk buku
        $query = Book::query();

        // Filter berdasarkan judul buku jika ada
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Filter berdasarkan kategori jika ada
        if ($request->filled('category')) {
            $query->whereHas('categories', function ($query) use ($request) {
                $query->where('category_id', $request->category);
            });
        }

        // Mendapatkan hasil akhir
        $books = $query->get();

        return view('index', ['books' => $books, 'categories' => $categories]);
    }
}
