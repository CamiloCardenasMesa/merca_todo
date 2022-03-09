<?php

use App\Http\Controllers\BuyerController;
use Illuminate\Support\Facades\Route;

Route::get('buyer/products/{product}', [BuyerController::class, 'show'])
    ->middleware('auth', 'verified')
    ->name('buyer.products.show');

Route::put('buyer/{product}/toggle', [BuyerController::class, 'toggle'])
    ->middleware('auth', 'verified')
    ->name('buyer.products.toggle');
