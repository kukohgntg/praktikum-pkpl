<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Book;
use App\Models\LoanRecord;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LendController extends Controller
{
    public function lend_book_view()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::where('status', '!=', 'not available')->get();
        return view('lend-book', ['users' => $users, 'books' => $books]);
    }

    public function lending_book(Request $request)
    {
        $request['loan_date'] = Carbon::now()->toDateTimeString();
        $request['return_date'] = Carbon::now()->addDay(3)->toDateTimeString();

        // Ambil objek book, bukan array
        $book = Book::findOrFail($request->book_id);

        if ($book->status == 'not available') {
            // Buku tidak tersedia untuk dipinjam
            Session::flash('message', 'Cannot loan, the book is not available');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/lend');
        } else {
            // Hitung buku yang sedang dipinjam oleh user (actual_return_date masih null)
            $count = LoanRecord::where('user_id', $request->user_id)->whereNull('actual_return_date')->count();

            if ($count >= 3) {
                // Jika user telah meminjam 3 buku dan belum mengembalikan
                Session::flash('message', 'Cannot loan, user has reached the limit of book');
                Session::flash('alert-class', 'alert-danger');
                return redirect('/admin/lend');
            } else {
                try {
                    DB::beginTransaction();

                    // Proses insert data di tabel loan_records
                    LoanRecord::create($request->all());

                    // Proses update status buku menjadi 'not available'
                    $book->status = 'not available';
                    $book->save();

                    // Transaksi selesai
                    DB::commit();

                    Session::flash('message', 'Successful Lending Of The Book');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('/admin/lend');
                } catch (\Throwable $throwable) {
                    // Jika terjadi kesalahan, rollback transaksi
                    DB::rollBack();
                    Session::flash('message', 'Error When Lending Of The Book');
                    Session::flash('alert-class', 'alert-danger');
                    return redirect('/admin/lend');
                }
            }
        }
    }

    public function return_lending_view()
    {
        $users = User::where('role_id', '!=', 1)->where('status', '!=', 'inactive')->get();
        $books = Book::where('status', '!=', 'in stock')->get();
        return view('return-lending', ['users' => $users, 'books' => $books]);
    }

    public function returning_lending(Request $request)
    {
        // Mengecek data peminjaman dari table loan_records
        $loanRecord = LoanRecord::where('user_id', $request->user_id)
            ->where('book_id', $request->book_id)
            ->where('actual_return_date', null);

        // Mendapatkan data dari table loan_records
        $loanData = $loanRecord->first();

        // Menghitung jumlah record yang ditemukan
        $dataExists = $loanRecord->count();

        // Jika ditemukan satu record yang valid
        if ($dataExists == 1) {
            // Mengembalikan buku dengan memperbarui tanggal pengembalian
            $loanData->actual_return_date = Carbon::now()->toDateTimeString();
            $loanData->save();

            // Mendapatkan buku yang dipinjam berdasarkan book_id
            $book = Book::findOrFail($request->book_id);

            // Memperbarui status buku menjadi 'in stock'
            $book->status = 'in stock';
            $book->save();

            Session::flash('message', 'Successful Return Of The Book');
            Session::flash('alert-class', 'alert-success');
            return redirect('/admin/lend/return');
        } else {
            // Jika data peminjaman tidak ditemukan atau salah user/buku
            Session::flash('message', 'Error, check the borrowing history and match the name and book');
            Session::flash('alert-class', 'alert-danger');
            return redirect('/admin/lend/return');
        }
    }
}
