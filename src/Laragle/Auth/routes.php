<?php

use Laragle\Auth\Http\Controllers\LoginController;

Route::post('login', LoginController::class)->name('auth.login');