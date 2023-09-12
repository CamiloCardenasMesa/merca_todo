<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('/admin')->group(function () {
    Route::resource('roles', RoleController::class);
});
