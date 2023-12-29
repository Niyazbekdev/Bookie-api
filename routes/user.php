<?php

use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\LastAddedBookController;
use App\Http\Controllers\User\ManyShowBookController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\ReviewController;
use App\Http\Controllers\User\SearchBookController;
use Illuminate\Support\Facades\Route;


Route::get('user/categories', [CategoryController::class, 'index']);
Route::get('user/categories/{category:slug}/books', [BookController::class, 'index']);
Route::get('user/books', [SearchBookController::class, 'index']);

Route::group([
    'prefix'     => 'user',
    'as'         => 'user.',
    'middleware' => ['auth:sanctum', 'ability:admin,superAdmin,user'],
],
    function () {
        Route::get('/books/{book:slug}', [BookController::class, 'show']);
        Route::get('/books/{book:slug}/reviews', [ReviewController::class, 'index']);
        Route::post('/books/{book:slug}/reviews', [ReviewController::class, 'store']);
        Route::get('/orders', [OrderController::class, 'index']);
        Route::post('/orders', [OrderController::class, 'store']);
        Route::get('/trends', [ManyShowBookController::class, 'index']);
        Route::get('/last-books', [LastAddedBookController::class, 'index']);
    });
