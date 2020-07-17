<?php

use Laragle\Authorization\Http\Controllers\RoleController;

Route::middleware('auth:sanctum')
    ->name('laragle.')
    ->group(function () {
        Route::apiResource('roles', RoleController::class);
    });