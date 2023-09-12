<?php

use App\Http\Controllers\AuthApiController;
use App\Http\Controllers\ProductsApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', [AuthApiController::class, 'login']);
Route::post('register', [AuthApiController::class, 'register']);
Route::post('logout', [AuthApiController::class, 'logOut']);

Route::middleware('auth:sanctum')->apiResource('products', ProductsApiController::class);
