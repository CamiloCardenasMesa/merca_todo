<?php

use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware('auth', 'verified')
    ->name('admin.users.index');

Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
    ->middleware('auth', 'verified')
    ->name('admin.users.destroy');

Route::get('/admin/users/create', [UserController::class, 'create'])
    ->middleware('auth', 'verified')
    ->name('admin.users.create');

Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])
    ->middleware('auth', 'verified')
    ->name('admin.users.edit');

Route::put('/admin/users/{user}', [UserController::class, 'update'])
    ->middleware('auth', 'verified')
    ->name('admin.users.update');

Route::get('/admin/users/{user}', [UserController::class, 'show'])
    ->middleware('auth', 'verified')
    ->name('admin.users.show');

Route::post('/admin/users/store', [UserController::class, 'store'])
    ->middleware('auth', 'verified')
    ->name('admin.users.store');

Route::put('/admin/users/{user}/toggle', [UserController::class, 'toggle'])
    ->middleware('auth', 'verified')
    ->name('admin.users.toggle');

//Products Routes

Route::get('/products', [ProductsController::class, 'index'])
    ->middleware('auth', 'verified')
    ->name('admin.products.index');

Route::get('/products/create', [ProductsController::class, 'create'])
    ->middleware('auth', 'verified')
    ->name('admin.products.create');

Route::get('/products/{product}', [ProductsController::class, 'show'])
    ->middleware('auth', 'verified')
    ->name('admin.products.show');

Route::post('/products/store', [ProductsController::class, 'store'])
    ->middleware('auth', 'verified')
    ->name('admin.products.store');

Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])
    ->middleware('auth', 'verified')
    ->name('admin.products.edit');

Route::delete('/products/{product}', [ProductsController::class, 'destroy'])
    ->middleware('auth', 'verified')
    ->name('admin.products.destroy');

Route::put('/products/{product}', [ProductsController::class, 'update'])
   ->middleware('auth', 'verified')
   ->name('admin.products.update');

Route::put('/products/{product}/toggle', [ProductsController::class, 'toggle'])
    ->middleware('auth', 'verified')
    ->name('admin.products.toggle');
