<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('logIn', LoginController::class);
Route::apiResource('signIn', RegisterController::class);
Route::middleware('auth:sanctum')->apiResource('logout', LogoutController::class);

require 'admin.php';
require 'user.php';
