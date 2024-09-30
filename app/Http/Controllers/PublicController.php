<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PublicController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        if ($request->category || $request->title) {
            // $books = Book::where('title', 'like', '%' . $request->title . '%')->get();

            $books = Book::whereHas('categories', function ($q) use ($request) {
                $q->where('category_id', $request->category);
            })->get();
        } else {
            $books = Book::all();
        }
        return view('index', ['books' => $books, 'categories' => $categories]);
    }
}
