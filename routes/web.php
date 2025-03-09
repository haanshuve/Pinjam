<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::middleware(['auth'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });    

    Route::get('/peminjam/dashboard', function () {
        return view('peminjam.dashboard');
    })->middleware('peminjam');
});

Route::get('/', function () {
    return view('login');
});

Route::resource('users', DashboardController::class);

Route::get('/pinjam-kendaraan', function () {
    return view('admin/pinjam-kendaraan');
});
