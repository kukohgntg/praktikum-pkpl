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

    public function save_category(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::create($request->all());
        return redirect('categories');
    }
}
