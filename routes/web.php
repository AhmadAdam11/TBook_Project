<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\AdminAuthController;
use App\Http\Controllers\BookController;

Route::get('/login', [AdminAuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::post('/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');


//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth:admin')
    ->name('dashboard');


//category

Route::get('/category', [CategoryController::class, 'index'])->name('category.index');

Route::middleware('auth:admin')->group(function () {
    Route::resource('category', CategoryController::class);
});


//book


Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/create', [BookController::class, 'createForm']);
Route::post('/books/create', [BookController::class, 'create']);
Route::get('/books/edit/{id}', [BookController::class, 'editForm']);
Route::post('/books/update/{id}', [BookController::class, 'update']);
Route::delete('/books/delete/{id}', [BookController::class, 'delete']);