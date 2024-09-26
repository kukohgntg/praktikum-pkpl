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

    // Fungsi Untuk Menambah Category *Create
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

    // Fungsi Untuk Menganti Nama Category *Update
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

    public function delete_category_view($slug)
    {
        // dd($request->all());
        $category = Category::where('slug', $slug)->first();
        return view('delete-category', ['category' => $category]);
    }

    // Fungsi Untuk Menghapus Category *Delete
    public function delete_category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('categories')->with('status', 'Category Deleted Successfully');
    }

    public function deleted_categories_view()
    {
        // dd($deleted_categories);
        $deleted_categories = Category::onlyTrashed()->get();
        return view('deleted-categories', ['deleted_categories' => $deleted_categories]);
    }

    public function restore_category_view($slug)
    {
        // dd($category);
        $category = Category::withTrashed()->where('slug', $slug)->first();
        return view('restore-category', ['category' => $category]);
    }

    // Fungsi Untuk Memulihkan Category *Restore
    public function restored_category($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('deleted-categories')->with('status', 'Category Restored Successfully');
    }
}
