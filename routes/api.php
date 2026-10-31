<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

// Route publik: bisa diakses tanpa login
Route::apiResource('genres', GenreController::class)
    ->only(['index', 'show']);

Route::apiResource('authors', AuthorController::class)
    ->only(['index', 'show']);

// Route khusus admin: wajib login dan memiliki role admin
Route::middleware(['auth:sanctum', 'admin'])->group(function () {

    Route::apiResource('genres', GenreController::class)
        ->only(['store', 'update', 'destroy']);

    Route::apiResource('authors', AuthorController::class)
        ->only(['store', 'update', 'destroy']);

});
