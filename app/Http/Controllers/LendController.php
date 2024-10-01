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
        $users = User::where('role_id', '!=', 1)->get();
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
            return redirect('lend-book');
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

                Session::flash('message', 'Successful Loan Of The Book');
                Session::flash('alert-class', 'alert-success');
                return redirect('lend-book');
            } catch (\Throwable $throwable) {
                // Jika terjadi kesalahan, rollback transaksi
                DB::rollBack();
                Session::flash('message', 'Error When Loan Of The Book');
                Session::flash('alert-class', 'alert-danger');
                return redirect('lend-book');
            }
        }
    }
}
