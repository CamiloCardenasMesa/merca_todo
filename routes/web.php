<?php

use App\Http\Controllers\ProductsExportController;
use App\Http\Controllers\ProductsImportController;
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

Route::get('/products/export', [ProductsExportController::class, 'export'])
    ->name('products.export');

Route::get('/products/import/show', [ProductsImportController::class, 'showImport'])
    ->name('products.import.show');

Route::post('/products/import', [ProductsImportController::class, 'storeImport'])
    ->name('import.store');

    require __DIR__ . '/auth.php';
    require __DIR__ . '/admin.php';
    require __DIR__ . '/buyer.php';
