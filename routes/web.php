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
Route::prefix('user')->middleware(['auth'])->group(function () {

    // Dashboard untuk admin
    Route::get('dashboard', [DashboardController::class, 'dashboard_view'])->middleware([OnlyAdmin::class]);

    // Halaman profil pengguna khusus client
    Route::get('profile', [UserController::class, 'profile_view'])->middleware([OnlyClient::class]);

    // Proses logout
    Route::get('logout', [AuthController::class, 'logout']);
});

// Group Route khusus Admin untuk manajemen kategori
Route::prefix('admin/categories')->middleware(['auth', OnlyAdmin::class])->group(function () {

    // Daftar kategori
    Route::get('/', [CategoryController::class, 'categories_view']);

    // Tambah kategori
    Route::get('add', [CategoryController::class, 'add_category_view']);
    Route::post('add', [CategoryController::class, 'adding_category']);

    // Edit kategori
    Route::get('edit/{slug}', [CategoryController::class, 'edit_category_view']);
    Route::put('edit/{slug}', [CategoryController::class, 'editing_category']);

    // Hapus kategori (soft delete)
    Route::get('delete/{slug}', [CategoryController::class, 'delete_category_view']);
    Route::get('delete-confirm/{slug}', [CategoryController::class, 'deleting_category']);

    // Restore kategori yang dihapus
    Route::get('deleted', [CategoryController::class, 'deleted_categories_view']);
    Route::get('restore/{slug}', [CategoryController::class, 'restore_category_view']);
    Route::get('restore-confirm/{slug}', [CategoryController::class, 'restoring_category']);
});

// Group Route khusus Admin untuk manajemen buku
Route::prefix('admin/books')->middleware(['auth', OnlyAdmin::class])->group(function () {

    // Daftar buku
    Route::get('/', [BookController::class, 'books_view']);

    // Tambah buku
    Route::get('add', [BookController::class, 'add_book_view']);
    Route::post('add', [BookController::class, 'adding_book']);

    // Edit buku
    Route::get('edit/{slug}', [BookController::class, 'edit_book_view']);
    Route::put('edit/{slug}', [BookController::class, 'editing_book']);

    // Hapus buku (soft delete)
    Route::get('delete/{slug}', [BookController::class, 'delete_book_view']);
    Route::get('delete-confirm/{slug}', [BookController::class, 'deleting_book']);

    // Restore buku yang dihapus
    Route::get('deleted', [BookController::class, 'deleted_books_view']);
    Route::get('restore/{slug}', [BookController::class, 'restore_book_view']);
    Route::get('restore-confirm/{slug}', [BookController::class, 'restoring_book']);
});

// Group Route khusus Admin untuk manajemen pengguna
Route::prefix('admin/users')->middleware(['auth', OnlyAdmin::class])->group(function () {

    // Daftar pengguna aktif
    Route::get('/', [UserController::class, 'users_view']);

    // Daftar pengguna tidak aktif
    Route::get('inactive', [UserController::class, 'inactive_users_view']);

    // Detail pengguna
    Route::get('detail/{slug}', [UserController::class, 'detail_user_view']);

    // Aktivasi pengguna
    Route::get('activate/{slug}', [UserController::class, 'activating_user']);

    // Banned pengguna (soft delete)
    Route::get('ban/{slug}', [UserController::class, 'ban_user_view']);
    Route::get('ban-confirm/{slug}', [UserController::class, 'banning_user']);

    // Daftar pengguna yang dibanned
    Route::get('banned', [UserController::class, 'banned_users_view']);

    // Unban pengguna
    Route::get('unban/{slug}', [UserController::class, 'unban_user_view']);
    Route::get('unban-confirm/{slug}', [UserController::class, 'unbanning_user']);
});

// Group Route khusus Admin untuk peminjaman dan pengembalian buku
Route::prefix('admin/lend')->middleware(['auth', OnlyAdmin::class])->group(function () {

    // Peminjaman buku
    Route::get('/', [LendController::class, 'lend_book_view']);
    Route::post('/', [LendController::class, 'lending_book']);

    // Pengembalian buku
    Route::get('return', [LendController::class, 'return_lending_view']);
    Route::post('return', [LendController::class, 'returning_lending']);

    // Histori peminjaman
    Route::get('records', [LoanRecordController::class, 'loan_records_view']);
});
