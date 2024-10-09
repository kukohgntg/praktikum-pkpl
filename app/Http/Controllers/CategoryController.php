<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories_view()
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }

    public function add_category_view()
    {
        return view('categories.add');
    }

    // Fungsi Untuk Menambah Category *Create
    public function adding_category(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::create($request->all());
        return redirect('/admin/categories')->with('status', 'Category Added Successfully');
    }

    public function edit_category_view($slug)
    {
        // dd($request->all());
        $category = Category::where('slug', $slug)->first();
        return view('categories.edit', ['category' => $category]);
    }

    // Fungsi Untuk Menganti Nama Category *Update
    public function editing_category(Request $request, $slug)
    {
        // dd(request()->all());
        // dd($slug);
        $validated = $request->validate([
            'name' => 'required|unique:categories|max:100'
        ]);

        $category = Category::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('/admin/categories')->with('status', 'Category Updated Successfully');
    }

    public function delete_category_view($slug)
    {
        // dd($request->all());
        $category = Category::where('slug', $slug)->first();
        return view('categories.delete', ['category' => $category]);
    }

    // Fungsi Untuk Menghapus Category *Delete
    public function deleting_category($slug)
    {
        $category = Category::where('slug', $slug)->first();
        $category->delete();
        return redirect('/admin/categories')->with('status', 'Category Deleted Successfully');
    }

    public function deleted_categories_view()
    {
        // dd($deleted_categories);
        $deleted_categories = Category::onlyTrashed()->get();
        return view('categories.deleted', ['deleted_categories' => $deleted_categories]);
    }

    public function restore_category_view($slug)
    {
        // dd($category);
        $category = Category::withTrashed()->where('slug', $slug)->first();
        return view('categories.restore', ['category' => $category]);
    }

    // Fungsi Untuk Memulihkan Category *Restore
    public function restoring_category($slug)
    {
        $category = Category::withTrashed()->where('slug', $slug)->first();
        $category->restore();
        return redirect('/admin/categories/deleted')->with('status', 'Category Restored Successfully');
    }
}
