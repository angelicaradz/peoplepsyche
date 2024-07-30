<?php

use App\Http\Controllers\SuperadminAuth\AuthenticatedSessionController;
use App\Http\Controllers\SuperadminAuth\ConfirmablePasswordController;
use App\Http\Controllers\SuperadminAuth\EmailVerificationNotificationController;
use App\Http\Controllers\SuperadminAuth\EmailVerificationPromptController;
use App\Http\Controllers\SuperadminAuth\NewPasswordController;
use App\Http\Controllers\SuperadminAuth\PasswordController;
use App\Http\Controllers\SuperadminAuth\PasswordResetLinkController;
use App\Http\Controllers\SuperadminAuth\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:superadmin')->group(function () {

    Route::get('superadmin/login', [AuthenticatedSessionController::class, 'create'])
                ->name('superadmin.login');

    Route::post('superadmin/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('superadmin/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('superadmin.password.request');

    Route::post('superadmin/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('superadmin.password.email');

    Route::get('superadmin/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('superadmin.password.reset');

    Route::post('superadmin/reset-password', [NewPasswordController::class, 'store'])
                ->name('superadmin.password.store');
});

Route::middleware('auth:superadmin')->group(function () {
    Route::get('superadmin/verify-email', EmailVerificationPromptController::class)
                ->name('superadmin.verification.notice');

    Route::get('superadmin/verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('superadmin.verification.verify');

    Route::post('superadmin/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('superadmin.verification.send');

    Route::get('superadmin/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('superadmin.password.confirm');

    Route::post('superadmin/confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('superadmin/password', [PasswordController::class, 'update'])->name('superadmin.password.update');

    Route::post('superadmin/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('superadmin.logout');
});
