<?php

use App\Http\Controllers\Admin\AudioController;
use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\BookImagesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NarratorController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

Route::apiResource('admin/logins', LoginController::class);

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth:sanctum', 'ability:admin,superAdmin'],
],
    function () {
    Route::apiResources([
        'categories' => CategoryController::class,
        'authors' => AuthorController::class,
        'narrators' => NarratorController::class,
        'books' => BookController::class,
        'reviews' => ReviewController::class,
        'orders' => OrderController::class,
        'users' => UserController::class,
        'books.images' => BookImagesController::class,
        'books.audio' => AudioController::class,
    ]);
});
