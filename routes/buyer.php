<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;

Route::get('buyer/products/{product}', [BuyerController::class, 'show'])
    ->name('buyer.products.show');

Route::put('buyer/{product}/toggle', [BuyerController::class, 'toggle'])
    ->middleware('auth', 'verified')
    ->name('buyer.products.toggle');

Route::post('buyer/cart', [CartController::class, 'store'])
    ->name('buyer.cart.store');

Route::get('buyer/cart', [CartController::class, 'index'])
    ->middleware('auth', 'verified')
    ->name('buyer.cart.index');

Route::delete('buyer/cart/{rowId}', [CartController::class, 'destroy'])
    ->middleware('auth', 'verified')
    ->name('buyer.cart.destroy');

Route::patch('buyer/cart/update/{rowId}', [CartController::class, 'update'])
    ->middleware('auth', 'verified')
    ->name('buyer.cart.update');
