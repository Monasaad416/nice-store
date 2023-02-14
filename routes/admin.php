<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\Admin\StoreController;
use App\Http\Controllers\Dashboard\Admin\ProductController;
use App\Http\Controllers\Dashboard\Admin\CategoryController;
use App\Http\Controllers\Dashboard\Admin\DashboardController;
use App\Http\Controllers\Dashboard\SelectionController;




Route::get('/dashboard',[SelectionController::class,'selectUserType'])->name('dashboard.select');

Route::middleware(['auth:admin','isAdmin'])->prefix('/admin/dashboard')->name('admin.dashboard.')->group(function () {
    Route::get('/',[DashboardController::class,'index'])->name('index');

    Route::resources([
        'categories' => CategoryController::class,
        'products' => ProductController::class,
        'stores' => StoreController::class,
]   );


});
// Route::middleware(['auth:admin'])->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });



require __DIR__.'/admin-auth.php';







