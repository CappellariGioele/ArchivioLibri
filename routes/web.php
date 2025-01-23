<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BookController::class, 'index'])->name('home');
Route::resource('/book', BookController::class);
Route::resource('/author', AuthorController::class);
Route::resource('/category', CategoryController::class);
