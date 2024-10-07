<?php

use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyGuest;
use App\Http\Middleware\OnlyClient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\LoanRecordController;
use App\Http\Controllers\PublicController;

// Route untuk halaman awal (index page)
Route::get('/', [PublicController::class, 'index']);

// Group Route khusus untuk pengguna yang belum login (guest)
Route::middleware([OnlyGuest::class])->group(function () {

    // Halaman login dan proses autentikasi
    Route::get('login', [AuthController::class, 'login_view'])->name('login'); // Halaman login
    Route::post('authenticating', [AuthController::class, 'authenticating']); // Proses autentikasi login

    // Halaman register dan proses registrasi
    Route::get('register', [AuthController::class, 'register_view']); // Halaman register
    Route::post('registering', [AuthController::class, 'registering']); // Proses pendaftaran user baru
});

// Group Route untuk pengguna yang sudah login (auth)
Route::middleware(['auth'])->group(function () {

    // Halaman Dashboard Admin (akses hanya untuk admin)
    Route::get('dashboard', [DashboardController::class, 'dashboard_view'])->middleware([OnlyAdmin::class]);

    // Halaman profil pengguna (akses hanya untuk client)
    Route::get('profile', [UserController::class, 'profile_view'])->middleware([OnlyClient::class]);

    // Proses logout user
    Route::get('logout', [AuthController::class, 'logout']);
});

// Group Route khusus Admin untuk manajemen kategori
Route::middleware(['auth', OnlyAdmin::class])->group(function () {

    // Manajemen kategori buku
    Route::get('categories', [CategoryController::class, 'categories_view']); // Halaman daftar kategori

    Route::get('add-category', [CategoryController::class, 'add_category_view']); // Halaman tambah kategori
    Route::post('adding-category', [CategoryController::class, 'adding_category']); // Proses tambah kategori

    Route::get('edit-category/{slug}', [CategoryController::class, 'edit_category_view']); // Halaman edit kategori
    Route::put('editing-category/{slug}', [CategoryController::class, 'editing_category']); // Proses edit kategori

    Route::get('delete-category/{slug}', [CategoryController::class, 'delete_category_view']); // Halaman konfirmasi hapus kategori
    Route::get('deleting-category/{slug}', [CategoryController::class, 'deleting_category']); // Proses hapus kategori (soft delete)

    Route::get('deleted-categories', [CategoryController::class, 'deleted_categories_view']); // Halaman kategori yang sudah dihapus

    Route::get('restore-category/{slug}', [CategoryController::class, 'restore_category_view']); // Halaman restore kategori
    Route::get('restoring-category/{slug}', [CategoryController::class, 'restoring_category']); // Proses restore kategori
});

// Group Route khusus Admin untuk manajemen buku
Route::middleware(['auth', OnlyAdmin::class])->group(function () {

    // Manajemen buku
    Route::get('books', [BookController::class, 'books_view']); // Halaman daftar buku

    Route::get('add-book', [BookController::class, 'add_book_view']); // Halaman tambah buku
    Route::post('adding-book', [BookController::class, 'adding_book']); // Proses tambah buku

    Route::get('edit-book/{slug}', [BookController::class, 'edit_book_view']); // Halaman edit buku
    Route::put('editing-book/{slug}', [BookController::class, 'editing_book']); // Proses edit buku

    Route::get('delete-book/{slug}', [BookController::class, 'delete_book_view']); // Halaman konfirmasi hapus buku
    Route::get('deleting-book/{slug}', [BookController::class, 'deleting_book']); // Proses hapus buku (soft delete)

    Route::get('deleted-books', [BookController::class, 'deleted_books_view']); // Halaman buku yang sudah dihapus

    Route::get('restore-book/{slug}', [BookController::class, 'restore_book_view']); // Halaman restore buku
    Route::get('restoring-book/{slug}', [BookController::class, 'restoring_book']); // Proses restore buku
});

// Group Route khusus Admin untuk manajemen pengguna
Route::middleware(['auth', OnlyAdmin::class])->group(function () {

    // Manajemen pengguna
    Route::get('users', [UserController::class, 'users_view']); // Halaman daftar pengguna aktif

    Route::get('inactive-users', [UserController::class, 'inactive_users_view']); // Halaman daftar pengguna tidak aktif

    Route::get('detail-user/{slug}', [UserController::class, 'detail_user_view']); // Halaman detail pengguna
    Route::get('activating-user/{slug}', [UserController::class, 'activating_user']); // Proses aktivasi pengguna tidak aktif

    Route::get('ban-user/{slug}', [UserController::class, 'ban_user_view']); // Halaman konfirmasi banned pengguna
    Route::get('banning-user/{slug}', [UserController::class, 'banning_user']); // Proses banned pengguna (soft delete)

    Route::get('banned-users', [UserController::class, 'banned_users_view']); // Halaman pengguna yang sudah dibanned

    Route::get('unban-user/{slug}', [UserController::class, 'unban_user_view']); // Halaman konfirmasi unban pengguna
    Route::get('unbanning-user/{slug}', [UserController::class, 'unbanning_user']); // Proses unban pengguna
});

// Group Route khusus Admin untuk peminjaman dan pengembalian buku
Route::middleware(['auth', OnlyAdmin::class])->group(function () {

    // Peminjaman buku oleh admin
    Route::get('lend-book', [LendController::class, 'lend_book_view']); // Halaman peminjaman buku
    Route::post('lending-book', [LendController::class, 'lending_book']); // Proses peminjaman buku oleh pengguna

    // Pengembalian buku oleh admin
    Route::get('return-lending ', [LendController::class, 'return_lending_view']); // Halaman pengembalian buku
    Route::post('returning-lending ', [LendController::class, 'returning_lending']); // Proses pengembalian buku oleh pengguna

    // Histori peminjaman buku
    Route::get('loan-records', [LoanRecordController::class, 'loan_records_view']); // Halaman histori peminjaman buku
});
