<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->middleware(['auth', 'verified'])->group(function () {
    Route::resource('roles', RoleController::class);
});
