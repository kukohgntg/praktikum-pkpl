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

    public function add_category(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::create($request->all());
        return redirect('categories')->with('status', 'Category Added Successfully');
    }

    public function edit_category_view($slug)
    {
        // dd($request->all());

        $category = Category::where('slug', $slug)->first();
        return view('edit-category', ['category' => $category]);
    }

    public function edit_category(Request $request, $slug)
    {
        // dd(request()->all());
        // dd($slug);
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('categories')->with('status', 'Category Updated Successfully');
    }
}
