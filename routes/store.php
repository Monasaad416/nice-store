<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Store\SDashboardController;
use App\Http\Controllers\Dashboard\ProductController;



Route::middleware(['auth:store','isStore'])->prefix('/store/dashboard')->name('store.dashboard.')->group(function () {

    Route::get('/',[SDashboardController::class,'index'])->name('index');
    Route::get('/notifications/all',[SDashboardController::class,'getAll'])->name('notifications.all');
    Route::resources([
        'products' => ProductController::class,
    ]);
});

require __DIR__ .'/store-auth.php';
