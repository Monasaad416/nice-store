<?php

use App\Http\Controllers\Dashboard\Auth\Admin\AuthenticatedSessionController As AdminAuthenticatedSessionController;
use App\Http\Controllers\Dashboard\Auth\Admin\ConfirmablePasswordController;
use App\Http\Controllers\Dashboard\Auth\Admin\EmailVerificationNotificationController;
use App\Http\Controllers\Dashboard\Auth\Admin\EmailVerificationPromptController;
use App\Http\Controllers\Dashboard\Auth\Admin\NewPasswordController;
use App\Http\Controllers\Dashboard\Auth\Admin\PasswordController;
use App\Http\Controllers\Dashboard\Auth\Admin\PasswordResetLinkController;
use App\Http\Controllers\Dashboard\Auth\Admin\RegisteredUserController;
use App\Http\Controllers\Dashboard\Auth\Admin\VerifyEmailController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest:admin')->prefix('/admin')->name('admin.')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
    Route::get('/login', [AdminAuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AdminAuthenticatedSessionController::class, 'store']);
    Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])->name('password.reset');
    Route::post('/reset-password', [NewPasswordController::class, 'store'])->name('password.store');
});

Route::middleware('auth:admin')->prefix('/admin/dashboard')->name('admin.dashboard.')->group(function () {


    Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])->name('verification.notice');
    Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])->middleware(['signed', 'throttle:6,1'])->name('verification.verify');
    Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])->middleware('throttle:6,1')->name('verification.send');
    Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])->name('password.confirm');
    Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store']);
    Route::put('/password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('/logout', [AdminAuthenticatedSessionController::class, 'destroy'])->name('logout');
});
