<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyClient;
use App\Http\Middleware\OnlyGuest;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware([OnlyGuest::class])->group(function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authenticating']);
    Route::get('register', [AuthController::class, 'register']);
});

// Route::get('login', [AuthController::class, 'login'])->name('login')->middleware(OnlyGuest::class);
// Route::post('login', [AuthController::class, 'authenticating'])->middleware(OnlyGuest::class);
// Route::get('register', [AuthController::class, 'register'])->middleware(OnlyGuest::class);

Route::middleware(['auth'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware([OnlyAdmin::class]);
    Route::get('profile', [UserController::class, 'profile'])->middleware([OnlyClient::class]);
    Route::get('books', [BookController::class, 'books']);
});

// Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', OnlyAdmin::class]);
// Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', OnlyClient::class]);
// Route::get('books', [BookController::class, 'books'])->middleware('auth');
