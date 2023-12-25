<?php

use App\Http\Controllers\User\BookController;
use App\Http\Controllers\User\CardController;
use App\Http\Controllers\User\CategoryController;
use Illuminate\Support\Facades\Route;


Route::group([
    'prefix'     => 'user',
    'as'         => 'user.',
    'middleware' => ['auth:sanctum', 'ability:admin,superAdmin, user'],
],
    function () {
        Route::apiResources([
            'categories' => CategoryController::class,
            'carts' => CardController::class,
        ]);
        Route::get('/categories/{category:slug}/books', [BookController::class, 'index']);
        Route::get('/books/{book:slug}', [BookController::class, 'show']);
    });
