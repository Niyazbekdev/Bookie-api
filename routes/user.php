<?php

use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\CategoryController;
use App\Http\Controllers\User\ReviewController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix'     => 'user',
    'as'         => 'user.',
    'middleware' => ['auth:sanctum', 'ability:admin,superAdmin, user'],
],
    function () {
        Route::apiResources([
            'categories' => CategoryController::class,
        ]);
        Route::get('/categories/{category:slug}/books', [BookController::class, 'index']);
        Route::get('/books/{book:slug}', [BookController::class, 'show']);
        Route::get('/books/{book:slug}/reviews', [ReviewController::class, 'index']);
        Route::post('/books/{book:slug}/reviews', [ReviewController::class, 'store']);
    });
