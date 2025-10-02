<?php

use App\Http\Controllers\Api\BookController;
use Illuminate\Support\Facades\Route;

// Route::apiResource('books', BookController::class);

Route::get('/books', [bookController::class, 'index']);

Route::get('/books/{id}', [bookController::class, 'show']);

Route::post('/books', [bookController::class, 'store']);

Route::delete('/books/{id}', [bookController::class, 'destroy']);

Route::put('/books/{id}', [bookController::class, 'update']);