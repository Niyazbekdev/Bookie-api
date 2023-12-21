<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

Route::apiResource('admin/logins', LoginController::class);

Route::group([
    'prefix'     => 'admin',
    'as'         => 'admin.',
    'middleware' => ['auth:sanctum', 'abilities:admin'],
], function () {
    Route::apiResources([
        'categories' => CategoryController::class,
        'authors' => AuthorController::class,
    ]);
});
