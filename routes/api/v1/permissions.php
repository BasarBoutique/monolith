<?php

use App\Http\Controllers\Permission\RolController;
use App\Http\Controllers\Permission\RolUserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:api', 'can:isAdmin'])->group(function () {
    Route::post('create-rol', [RolController::class, 'createRol']);
    Route::get('roles', [RolController::class, 'showRoles']);
    Route::post('assign-rol-user', [RolUserController::class, 'assignRolToUser']);
});
