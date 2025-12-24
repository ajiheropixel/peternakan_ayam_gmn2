<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChickenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminOrderController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes (Bisa diakses tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/', [ProductController::class, 'welcome'])->name('welcome');


/*
|--------------------------------------------------------------------------
| Authenticated Routes (Harus Login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'verified'])->group(function () {

    // 1. Dashboard Utama (Logika Admin vs User ada di DashboardController)
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Profile User (Bawaan Laravel Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // 3. Modul Manajemen (Hanya untuk Admin/User yang diizinkan)
    Route::resource('chickens', ChickenController::class);
    Route::resource('products', ProductController::class);

    /*
    |--------------------------------------------------------------------------
    | Admin Specific Routes (Prefix: admin, Name: admin.*)
    |--------------------------------------------------------------------------
    */
    Route::prefix('admin')->name('admin.')->group(function () {
        // Kelola Pesanan Masuk
        Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
        Route::patch('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.update');
        Route::delete('/orders/{id}', [AdminOrderController::class, 'destroy'])->name('orders.destroy');
    });

});

require __DIR__.'/auth.php';