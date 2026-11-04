<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

// Login dan Logout Admin
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.submit');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

// Halaman Admin
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // Genre
    Route::get('/genres', [AdminController::class, 'genres'])
        ->name('genres');

    Route::post('/genres', [AdminController::class, 'storeGenre'])
        ->name('genres.store');

    // Author
    Route::get('/authors', [AdminController::class, 'authors'])
        ->name('authors');

    Route::post('/authors', [AdminController::class, 'storeAuthor'])
        ->name('authors.store');
        // Update dan Delete Genre
Route::put('/genres/{genre}', [AdminController::class, 'updateGenre'])
    ->name('genres.update');

Route::delete('/genres/{genre}', [AdminController::class, 'destroyGenre'])
    ->name('genres.destroy');

// Update dan Delete Author
Route::put('/authors/{author}', [AdminController::class, 'updateAuthor'])
    ->name('authors.update');

Route::delete('/authors/{author}', [AdminController::class, 'destroyAuthor'])
    ->name('authors.destroy');
});
