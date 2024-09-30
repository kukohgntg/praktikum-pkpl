<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $books = Book::all();
        return view('index', ['books' => $books, 'categories' => $categories]);
    }
}
