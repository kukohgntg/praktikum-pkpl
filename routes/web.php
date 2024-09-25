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
use App\Http\Controllers\RentLogContrller;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware([OnlyGuest::class])->group(function () {
    Route::get('login', [AuthController::class, 'login_view'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register_view']); //rename register to register_view
    Route::post('register', [AuthController::class, 'registering']);
});

// Route::get('login', [AuthController::class, 'login'])->name('login')->middleware(OnlyGuest::class);
// Route::post('login', [AuthController::class, 'authenticating'])->middleware(OnlyGuest::class);
// Route::get('register', [AuthController::class, 'register'])->middleware(OnlyGuest::class);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard_view'])->middleware([OnlyAdmin::class]);

    Route::get('books', [BookController::class, 'books_view']);

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

});


// Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', OnlyAdmin::class]);
// Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', OnlyClient::class]);
// Route::get('books', [BookController::class, 'books'])->middleware('auth');
