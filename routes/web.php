<?php

use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyGuest;
use App\Http\Middleware\OnlyClient;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RentLogContrller;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware([OnlyGuest::class])->group(function () {
    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register_view']); //rename register to register_view
    Route::post('register', [AuthController::class, 'registering']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard_view'])->middleware([OnlyAdmin::class]);

    Route::get('rentlogs', [RentLogContrller::class, 'rentlogs_view']);

    Route::get('users', [UserController::class, 'users_view']);

    Route::get('profile', [UserController::class, 'profile_view'])->middleware([OnlyClient::class]);

    Route::get('logout', [AuthController::class, 'logout']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('categories', [CategoryController::class, 'categories_view']);

    Route::get('add-category', [CategoryController::class, 'add_category_view']);
    Route::post('add-category', [CategoryController::class, 'add_category']);

    Route::get('edit-category/{slug}', [CategoryController::class, 'edit_category_view']);
    Route::put('edit-category/{slug}', [CategoryController::class, 'edit_category']);

    Route::get('delete-category/{slug}', [CategoryController::class, 'delete_category_view']);
    Route::get('deleted-category/{slug}', [CategoryController::class, 'delete_category']);

    Route::get('deleted-categories', [CategoryController::class, 'deleted_categories_view']);

    Route::get('restore-category/{slug}', [CategoryController::class, 'restore_category_view']);
    Route::get('restored-category/{slug}', [CategoryController::class, 'restored_category']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('books', [BookController::class, 'books_view']);

    Route::get('add-book', [BookController::class, 'add_book_view']);
    Route::post('add-book', [BookController::class, 'add_book']);

    Route::get('edit-book/{slug}', [BookController::class, 'edit_book_view']);
    Route::put('edit-book/{slug}', [BookController::class, 'edit_book']);
});

// Route::get('login', [AuthController::class, 'login'])->name('login')->middleware(OnlyGuest::class);
// Route::post('login', [AuthController::class, 'authenticating'])->middleware(OnlyGuest::class);
// Route::get('register', [AuthController::class, 'register'])->middleware(OnlyGuest::class);

// Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', OnlyAdmin::class]);
// Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', OnlyClient::class]);
// Route::get('books', [BookController::class, 'books'])->middleware('auth');
