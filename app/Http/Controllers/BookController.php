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
    public function adding_book(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $validated = $request->validate([
            'book_code' => 'required|unique:books|max:255',
            'title'     => 'required|max:255',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk file gambar
        ]);

        // Menyimpan file gambar jika ada
        $newImageName = '';
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            $newImageName = $request->title . '-' . now()->timestamp . '.' . $extension;

            // Menyimpan file di disk 'public'
            $request->file('image')->storeAs('cover', $newImageName, 'public');
        }

        // Mengisi kolom cover dengan nama file yang disimpan
        $request['cover'] = $newImageName;

        // Membuat buku baru dengan data yang telah divalidasi
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);

        // Redirect ke halaman books dengan pesan sukses
        return redirect('books')->with('status', 'Book Added Successfully');
    }

    public function edit_book_view($slug)
    {
        // dd($request->all());
        $book = Book::where('slug', $slug)->first();
        $categories = Category::all();
        return view('edit-book', ['book' => $book, 'categories' => $categories]);
    }

    // Fungsi untuk mengedit buku *Update
    public function editing_book(Request $request, $slug)
    {
        // Validasi input
        $validated = $request->validate([
            'book_code' => 'required|max:255',
            'title'     => 'required|max:255',
            'image'     => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Validasi untuk file gambar
        ]);

        $book = Book::where('slug', $slug)->first();

        // Cek jika ada gambar baru yang diunggah
        if ($request->hasFile('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();

            // Bersihkan title untuk nama file yang aman
            $cleanedTitle = preg_replace('/[^\w\-]+/', '-', $request->title);
            $cleanedTitle = str_replace('"', '', $cleanedTitle); // Menghapus tanda petik ganda

            // Buat nama file baru yang aman
            $newImageName = $cleanedTitle . '-' . now()->timestamp . '.' . $extension;

            // Hapus gambar lama jika ada
            if ($book->cover && Storage::disk('public')->exists('cover/' . $book->cover)) {
                Storage::disk('public')->delete('cover/' . $book->cover);
            }

            // Menyimpan file di disk 'public'
            $request->file('image')->storeAs('cover', $newImageName, 'public');

            // Mengisi kolom cover dengan nama file yang disimpan
            $request['cover'] = $newImageName;
        }

        // Update slug menjadi null untuk diupdate lagi sesuai dengan slug yang baru
        $book->slug = null;
        $book->update($request->all());

        if ($request->categories) {
            // Jika kategori dipilih, sinkronkan
            $book->categories()->sync($request->categories);
        }

        // Redirect ke halaman books dengan pesan sukses
        return redirect('books')->with('status', 'Book Updated Successfully');
    }

    public function delete_book_view($slug)
    {
        // dd($request->all());
        $book = Book::where('slug', $slug)->first();
        return view('delete-book', ['book' => $book]);
    }

    // Fungsi Untuk Menghapus Book *Delete
    public function deleting_book($slug)
    {
        $book = Book::where('slug', $slug)->first();
        $book->delete();
        return redirect('books')->with('status', 'Book Deleted Successfully');
    }

    public function deleted_books_view()
    {
        // dd($deleted_books);
        $deleted_books = Book::onlyTrashed()->get();
        return view('deleted-books', ['deleted_books' => $deleted_books]);
    }

    public function restore_book_view($slug)
    {
        // dd($book);
        $book = Book::withTrashed()->where('slug', $slug)->first();
        return view('restore-book', ['book' => $book]);
    }

    // Fungsi Untuk Memulihkan Book *Restore
    public function restoring_book($slug)
    {
        $book = Book::onlyTrashed()->where('slug', $slug)->first();
        $book->restore();
        return redirect('deleted-books')->with('status', 'Book Restored Successfully');
    }
}
