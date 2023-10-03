<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'verified'])->prefix('/admin')->resource('roles', RoleController::class);
