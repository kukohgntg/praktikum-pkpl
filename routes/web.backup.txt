<?php

use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyGuest;
use App\Http\Middleware\OnlyClient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentLogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LendController;
use App\Http\Controllers\LoanRecordController;
use App\Http\Controllers\PublicController;

// Route untuk halaman awal (index page)
Route::get('/', [PublicController::class, 'index']);

// Group Route khusus untuk pengguna yang belum login (guest)
Route::middleware([OnlyGuest::class])->group(function () {

    // Route untuk login dan register
    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register_view']); // Form register
    Route::post('register', [AuthController::class, 'registering']);  // Proses register
});

// Group Route untuk pengguna yang sudah login (auth)
Route::middleware(['auth'])->group(function () {

    // Route untuk Dashboard Admin (hanya Admin yang bisa mengakses)
    Route::get('dashboard', [DashboardController::class, 'dashboard_view'])->middleware([OnlyAdmin::class]);

    // Route untuk menampilkan log penyewaan buku (dapat diakses semua user)
    Route::get('rentlogs', [RentLogController::class, 'rentlogs_view']);

    // Route untuk melihat profil user (hanya untuk client)
    Route::get('profile', [UserController::class, 'profile_view'])->middleware([OnlyClient::class]);

    // Route untuk logout
    Route::get('logout', [AuthController::class, 'logout']);
});

// Group Route khusus Admin, meliputi manajemen kategori
Route::middleware(['auth', OnlyAdmin::class])->group(function () {

    // Route untuk kategori buku
    Route::get('categories', [CategoryController::class, 'categories_view']); // Tampilkan daftar kategori

    Route::get('add-category', [CategoryController::class, 'add_category_view']); // Form tambah kategori
    Route::post('adding-category', [CategoryController::class, 'adding_category']); // Proses tambah kategori

    Route::get('edit-category/{slug}', [CategoryController::class, 'edit_category_view']); // Form edit kategori
    Route::put('editing-category/{slug}', [CategoryController::class, 'editing_category']); // Proses edit kategori

    Route::get('delete-category/{slug}', [CategoryController::class, 'delete_category_view']); // Form hapus kategori
    Route::get('deleting-category/{slug}', [CategoryController::class, 'deleting_category']); // Proses hapus kategori

    Route::get('deleted-categories', [CategoryController::class, 'deleted_categories_view']); // Kategori yang sudah dihapus (soft delete)

    Route::get('restore-category/{slug}', [CategoryController::class, 'restore_category_view']); // Form restore kategori
    Route::get('restoring-category/{slug}', [CategoryController::class, 'restoring_category']); // Proses restore kategori
});

// Group Route khusus Admin, meliputi manajemen buku
Route::middleware(['auth', OnlyAdmin::class])->group(function () {

    // Route untuk manajemen buku
    Route::get('books', [BookController::class, 'books_view']); // Tampilkan daftar buku

    Route::get('add-book', [BookController::class, 'add_book_view']); // Form tambah buku
    Route::post('adding-book', [BookController::class, 'adding_book']); // Proses tambah buku

    Route::get('edit-book/{slug}', [BookController::class, 'edit_book_view']); // Form edit buku
    Route::put('editing-book/{slug}', [BookController::class, 'editing_book']); // Proses edit buku

    Route::get('delete-book/{slug}', [BookController::class, 'delete_book_view']); // Form hapus buku
    Route::get('deleting-book/{slug}', [BookController::class, 'deleting_book']); // Proses hapus buku

    Route::get('deleted-books', [BookController::class, 'deleted_books_view']); // Buku yang sudah dihapus (soft delete)

    Route::get('restore-book/{slug}', [BookController::class, 'restore_book_view']); // Form restore buku
    Route::get('restoring-book/{slug}', [BookController::class, 'restoring_book']); // Proses restore buku
});

// Group Route khusus Admin, meliputi manajemen pengguna
Route::middleware(['auth', OnlyAdmin::class])->group(function () {

    // Route untuk manajemen pengguna
    Route::get('users', [UserController::class, 'users_view']); // Tampilkan daftar pengguna

    Route::get('inactive-users', [UserController::class, 'inactive_users_view']); // Tampilkan daftar pengguna tidak aktif

    Route::get('detail-user/{slug}', [UserController::class, 'detail_user_view']); // Detail pengguna
    Route::get('activating-user/{slug}', [UserController::class, 'activating_user']); // Proses aktivasi pengguna

    Route::get('ban-user/{slug}', [UserController::class, 'ban_user_view']); // Form banned pengguna
    Route::get('banning-user/{slug}', [UserController::class, 'banning_user']); // Proses banned pengguna

    Route::get('banned-users', [UserController::class, 'banned_users_view']); // Pengguna yang sudah dibanned

    Route::get('unban-user/{slug}', [UserController::class, 'unban_user_view']); // Form unban pengguna
    Route::get('unbanning-user/{slug}', [UserController::class, 'unbanning_user']); // Proses unban pengguna
});

Route::middleware(['auth', OnlyAdmin::class])->group(function () {
    // Rute peminjaman buku oleh admin
    // Route::get('lends-books', [LendController::class, 'lends_books_view']);

    Route::get('lend-book', [LendController::class, 'lend_book_view']);
    Route::post('lending-book', [LendController::class, 'lending_book']);

    // Rute pengembalian buku oleh admin
    Route::get('return-lending ', [LendController::class, 'return_lending_view']);
    Route::post('returning-lending ', [LendController::class, 'returning_lending']);

    Route::get('loan-records', [LoanRecordController::class, 'loan_records_view']);
});
