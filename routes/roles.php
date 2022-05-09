<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::get('/roles', [RoleController::class, 'index'])
    ->middleware(['auth'])
    ->name('roles.index');

Route::get('/roles/create', [RoleController::class, 'create'])
    ->middleware(['auth'])
    ->name('roles.create');

Route::post('/roles/store', [RoleController::class, 'store'])
    ->middleware(['auth'])
    ->name('roles.store');

Route::get('/roles/{role}', [RoleController::class, 'show'])
    ->middleware(['auth'])
    ->name('roles.show');

Route::get('/roles/{role}/edit', [RoleController::class, 'edit'])
    ->middleware(['auth'])
    ->name('roles.edit');

Route::patch('/roles/{role}', [RoleController::class, 'update'])
    ->middleware(['auth'])
    ->name('roles.update');

Route::delete('/roles/{role}', [RoleController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('roles.destroy');
