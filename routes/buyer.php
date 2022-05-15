<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;

Route::get('/', [BuyerController::class, 'index'])
    ->name('welcome');

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

Route::post('buyer/orders/store', [OrderController::class, 'store'])
    ->middleware('auth', 'verified')
    ->name('buyer.orders.store');

Route::get('buyer/orders/{order}/show', [OrderController::class, 'show'])
    ->middleware('auth', 'verified')
    ->name('buyer.orders.show');

Route::get('buyer/orders/{order}/retry', [OrderController::class, 'retry'])
    ->middleware('auth', 'verified')
    ->name('buyer.orders.retry');

Route::get('buyer/orders/index', [OrderController::class, 'index'])
    ->middleware('auth', 'verified')
    ->name('buyer.orders.index');
