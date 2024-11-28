<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Halaman login
Route::get('login', function () {
    return view('auth.login');
})->name('login');

// Halaman register
Route::get('register', function () {
    return view('auth.register');
})->name('register');

// Proses register
Route::post('register', [AuthController::class, 'register']);

// Proses login
Route::post('login', [AuthController::class, 'login']);

// Proses logout
Route::post('logout', [AuthController::class, 'logout'])->name('logout');

// Halaman yang memerlukan login (misalnya halaman dashboard)
Route::middleware('auth')->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
