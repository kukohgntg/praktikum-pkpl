<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\OnlyAdmin;
use App\Http\Middleware\OnlyClient;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticating']);
Route::get('register', [AuthController::class, 'register']);

Route::get('dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth', OnlyAdmin::class]);
Route::get('profile', [UserController::class, 'profile'])->middleware(['auth', OnlyClient::class]);
