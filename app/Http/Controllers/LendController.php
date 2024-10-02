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
            return redirect('lend-book');
        } else {
            // Hitung buku yang sedang dipinjam oleh user (actual_return_date masih null)
            $count = LoanRecord::where('user_id', $request->user_id)->whereNull('actual_return_date')->count();

            if ($count >= 3) {
                // Jika user telah meminjam 3 buku dan belum mengembalikan
                Session::flash('message', 'Cannot loan, user has reached the limit of book');
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

                    Session::flash('message', 'Successful Lending Of The Book');
                    Session::flash('alert-class', 'alert-success');
                    return redirect('lend-book');
                } catch (\Throwable $throwable) {
                    // Jika terjadi kesalahan, rollback transaksi
                    DB::rollBack();
                    Session::flash('message', 'Error When Lending Of The Book');
                    Session::flash('alert-class', 'alert-danger');
                    return redirect('lend-book');
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
        // dd($request);
        //user & buku yang dipilih benar & buku belum dikembalikan, maka berhasil mengembalikan buku
        // mengecek data peminjaman dari table loan_records 
        $loanRecord = LoanRecord::where('user_id', $request->user_id)->where('book_id', $request->book_id)->where('actual_return_date', null);

        // mendapatkan data dari table loan_records
        $loanData = $loanRecord->first();

        //mengambil data buku yang telah dipilih dipilah
        $dataExists = $loanRecord->count();
        // dd($dataExists);

        //mendapatkan kondisi benar
        if ($dataExists == 1) {
            //menggembalikan buku
            $loanData->actual_return_date = Carbon::now()->toDateTimeString();
            $loanData->save();

            Session::flash('message', 'Successful Rerurn Of The Book');
            Session::flash('alert-class', 'alert-success');
            return redirect('return-lending');
        } else {
            //user / buku yang dipilih salah, maka muncul pesan kesalahan
            Session::flash('message', 'error, check the borrowing history and match the name and book');
            Session::flash('alert-class', 'alert-danger');
            return redirect('lend-book');
        }
    }
}
