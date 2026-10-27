<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');

Route::get('/genres', [GenreController::class, 'index'])
    ->name('genres.index');

Route::get('/authors', [AuthorController::class, 'index'])
    ->name('authors.index');
