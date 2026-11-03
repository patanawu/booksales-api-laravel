<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\TransactionController;

// ==========================================
// ROUTE GENRE
// ==========================================

// Publik: Read All dan Show
Route::apiResource('genres', GenreController::class)
    ->only(['index', 'show']);

// Admin: Create, Update, dan Delete
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('genres', GenreController::class)
        ->only(['store', 'update', 'destroy']);
});


// ==========================================
// ROUTE AUTHOR
// ==========================================

// Publik: Read All dan Show
Route::apiResource('authors', AuthorController::class)
    ->only(['index', 'show']);

// Admin: Create, Update, dan Delete
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('authors', AuthorController::class)
        ->only(['store', 'update', 'destroy']);
});


// ==========================================
// ROUTE TRANSACTION
// ==========================================

// Customer yang sudah login: Create, Show, dan Update
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('transactions', TransactionController::class)
        ->only(['store', 'show', 'update']);
});

// Admin: Read All dan Delete
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('transactions', TransactionController::class)
        ->only(['index', 'destroy']);
});
