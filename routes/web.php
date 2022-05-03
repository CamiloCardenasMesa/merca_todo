<?php

use App\Http\Controllers\BuyerController;
use App\Http\Controllers\GuestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [GuestController::class, 'index'])
    ->name('welcome');

Route::get('guest/products/{product}', [GuestController::class, 'show'])
    ->name('guest.products.show');

Route::get('/dashboard', [BuyerController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
require __DIR__.'/buyer.php';
require __DIR__.'/roles.php';
