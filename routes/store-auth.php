<?php

use App\Http\Controllers\Dashboard\Auth\Store\AuthenticatedSessionController;
use App\Http\Controllers\Dashboard\Auth\Store\ConfirmablePasswordController;
use App\Http\Controllers\Dashboard\Auth\Store\EmailVerificationNotificationController;
use App\Http\Controllers\Dashboard\Auth\Store\EmailVerificationPromptController;
use App\Http\Controllers\Dashboard\Auth\Store\NewPasswordController;
use App\Http\Controllers\Dashboard\Auth\Store\PasswordController;
use App\Http\Controllers\Dashboard\Auth\Store\PasswordResetLinkController;
use App\Http\Controllers\Dashboard\Auth\Store\RegisteredUserController;
use App\Http\Controllers\Dashboard\Auth\Store\VerifyEmailController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest:store')->name('store.')->group(function () {
    Route::get('/store/register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('/store/register', [RegisteredUserController::class, 'store']);

    Route::get('/store/login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('/store/login', [AuthenticatedSessionController::class, 'store']);

    Route::get('/store/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('/store/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('/store/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('/store/reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth:store')->name('store.dashboard.')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});
