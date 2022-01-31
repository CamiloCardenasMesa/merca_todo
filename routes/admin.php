<?php

use App\Constants\Roles;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/users', [UserController::class, 'index'])
    ->middleware('auth', 'verified', 'role:'.Roles::ADMIN)
    ->name('admin.users.index');

Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth', 'verified', 'role:'.Roles::ADMIN])
    ->name('admin.users.destroy');

Route::get('/admin/{user}/edit', [UserController::class, 'edit'])
    ->middleware('auth', 'verified', 'role:'.Roles::ADMIN)
    ->name('admin.users.edit');

Route::put('/admin/{user}', [UserController::class, 'update'])
    ->middleware('auth', 'verified', 'role:'.Roles::ADMIN)
    ->name('admin.users.update');

Route::get('/admin/{user}/show', [UserController::class, 'show'])
    ->middleware('auth', 'verified', 'role:'.Roles::ADMIN)
    ->name('admin.users.show');
