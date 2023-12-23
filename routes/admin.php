<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\NarratorController;
use App\Http\Controllers\Admin\ReviewController;
use Illuminate\Support\Facades\Route;

Route::apiResource('admin/logins', LoginController::class);

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth:sanctum', 'abilities:admin'],
],
    function () {
    Route::apiResources([
        'categories' => CategoryController::class,
        'authors' => AuthorController::class,
        'narrators' => NarratorController::class,
        'books' => BookController::class,
        'reviews' => ReviewController::class,
    ]);
});
