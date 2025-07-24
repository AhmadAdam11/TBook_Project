<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AdminAuthController;

Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/dashboard', function () {
    return 'Selamat datang, Admin!';
})->middleware('auth:admin')->name('dashboard');
