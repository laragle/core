<?php

use Laragle\Auth\Http\Controllers\EmailResetPasswordLinkController;
use Laragle\Auth\Http\Controllers\EmailVerificationController;
use Laragle\Auth\Http\Controllers\LoginController;
use Laragle\Auth\Http\Controllers\LogoutController;
use Laragle\Auth\Http\Controllers\RegisterController;
use Laragle\Auth\Http\Controllers\ResetPasswordController;

Route::middleware('web')
    ->name('laragle.auth.')
    ->group(function () {
        Route::post('login', LoginController::class)->name('login');
        Route::post('logout', LogoutController::class)->name('logout');
        Route::post('register', RegisterController::class)->name('register');
        Route::post('password/email', EmailResetPasswordLinkController::class)->name('password.email');
        Route::post('password/reset', ResetPasswordController::class)->name('password.reset');
        Route::post('verify/email', [EmailVerificationController::class, 'verify'])->name('verify.email');
        Route::post('verify/email/resend', [EmailVerificationController::class, 'resend'])->name('verify.email.resend');
    });
