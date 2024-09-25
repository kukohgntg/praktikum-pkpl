<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories_view()
    {
        $categories = Category::all();
        return view('categories', ['categories' => $categories]);
    }


    public function add_category_view()
    {
        return view('add-category');
    }
}
