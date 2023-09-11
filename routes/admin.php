<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// User Routes
Route::middleware(['auth', 'verified'])->prefix('/admin/users')->name('admin.users.')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('index');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    Route::get('/{user}', [UserController::class, 'show'])->name('show');
    Route::get('/{user}/edit', [UserController::class, 'edit'])->name('edit');
    Route::put('/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/{user}', [UserController::class, 'destroy'])->name('destroy');
    Route::put('/{user}/toggle', [UserController::class, 'toggle'])->name('toggle');
});

// Products Routes
Route::middleware(['auth', 'verified'])->prefix('/admin/products')->name('admin.products.')->group(function () {
    Route::get('/', [ProductsController::class, 'index'])->name('index');
    Route::get('/create', [ProductsController::class, 'create'])->name('create');
    Route::post('/store', [ProductsController::class, 'store'])->name('store');
    Route::get('/{product}', [ProductsController::class, 'show'])->name('show');
    Route::get('/edit/{product}', [ProductsController::class, 'edit'])->name('edit');
    Route::put('/{product}', [ProductsController::class, 'update'])->name('update');
    Route::delete('/{product}', [ProductsController::class, 'destroy'])->name('destroy');
    Route::put('/toggle/{product}', [ProductsController::class, 'toggle'])->name('toggle');
});
