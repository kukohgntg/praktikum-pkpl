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

/*
|--------------------------------------------------------------------------
| Routes untuk Halaman Publik
|--------------------------------------------------------------------------
| Rute ini terbuka untuk semua pengunjung, baik yang sudah login maupun belum.
| Hanya menyediakan halaman utama (homepage).
*/

Route::get('/', [PublicController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Routes Khusus untuk Pengguna yang Belum Login (Guest)
|--------------------------------------------------------------------------
| Rute di dalam grup ini hanya bisa diakses oleh pengguna yang belum login.
| Prefix digunakan untuk mempermudah pengelompokan URL terkait autentikasi.
*/
Route::prefix('auth')->middleware([OnlyGuest::class])->group(function () {

    // Halaman login dan proses autentikasi
    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::post('authenticating', [AuthController::class, 'authenticating']);

    // Halaman registrasi dan proses pendaftaran pengguna baru
    Route::get('register', [AuthController::class, 'register_view']);
    Route::post('registering', [AuthController::class, 'registering']);
});

/*
|--------------------------------------------------------------------------
| Routes untuk Pengguna yang Sudah Login
|--------------------------------------------------------------------------
| Rute ini hanya bisa diakses oleh pengguna yang telah melakukan login.
| Prefix 'user' digunakan untuk fitur terkait pengguna secara umum.
*/
Route::prefix('user')->middleware(['auth'])->group(function () {

    // Dashboard untuk admin
    Route::get('dashboard', [DashboardController::class, 'dashboard_view'])->middleware([OnlyAdmin::class]);

    // Halaman profil pengguna khusus client
    Route::get('profile', [UserController::class, 'profile_view'])->middleware([OnlyClient::class]);

    // Proses logout
    Route::get('logout', [AuthController::class, 'logout']);
});

/*
|--------------------------------------------------------------------------
| Routes Khusus Admin untuk Manajemen Kategori
|--------------------------------------------------------------------------
| Rute ini dikelompokkan dengan prefix 'admin/categories' dan hanya bisa diakses oleh admin.
| Menyediakan fitur CRUD (Create, Read, Update, Delete) untuk kategori buku.
*/
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

/*
|--------------------------------------------------------------------------
| Routes Khusus Admin untuk Manajemen Buku
|--------------------------------------------------------------------------
| Dikelompokkan dengan prefix 'admin/books', hanya bisa diakses oleh admin.
| Menyediakan fitur CRUD (Create, Read, Update, Delete) untuk buku.
*/
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

/*
|--------------------------------------------------------------------------
| Routes Khusus Admin untuk Manajemen Pengguna
|--------------------------------------------------------------------------
| Prefix 'admin/users' digunakan untuk pengelompokan rute manajemen pengguna.
| Menyediakan fitur aktivasi, banned, unban, dan manajemen pengguna lain.
*/
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

/*
|--------------------------------------------------------------------------
| Routes Khusus Admin untuk Peminjaman dan Pengembalian Buku
|--------------------------------------------------------------------------
| Rute dengan prefix 'admin/lend' menyediakan fitur peminjaman, pengembalian, 
| dan histori peminjaman buku yang hanya dapat diakses oleh admin.
*/
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
