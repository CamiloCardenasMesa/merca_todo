<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware('auth', 'verified')
    ->name('admin.users.index');

Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('admin.users.destroy');

Route::get('/admin/{user}/edit', [UserController::class, 'edit'])
    ->middleware('auth', 'verified')
    ->name('admin.users.edit');

Route::put('/admin/{user}', [UserController::class, 'update'])
    ->middleware('auth', 'verified')
    ->name('admin.users.update');

Route::get('/admin/{user}/show', [UserController::class, 'show'])
    ->middleware('auth', 'verified')
    ->name('admin.users.show');

Route::get('/prueba', function () {
    return view('admin.users.prueba');
});
