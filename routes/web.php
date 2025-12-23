<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ChickenController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\FrontController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [FrontController::class, 'index'])->name('home');
Route::resource('chickens', ChickenController::class);

// Route Dashboard (Setelah Login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Semua Route yang butuh Login ditaruh di sini
Route::middleware('auth')->group(function () {
    
    // Profile (Bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Modul 1: Manajemen Ayam
    Route::resource('chickens', ChickenController::class);

    // Modul 2: Manajemen Produk
    Route::resource('products', ProductController::class);

    // Modul 3: Manajemen Pesanan
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
    Route::post('/admin/orders/{id}/status', [OrderController::class, 'updateStatus'])->name('orders.update');
});
Route::middleware('auth')->group(function () {
    // Route untuk tombol "Buka Manajemen" (Stok Ayam)
    Route::resource('chickens', ChickenController::class);

    // Route untuk tombol "Kelola Produk" (Katalog Produk)
    Route::resource('products', ProductController::class);

    // Route untuk tombol "Cek Pesanan" (Pesanan Masuk)
    Route::get('/admin/orders', [OrderController::class, 'index'])->name('orders.index');
});
// Halaman depan yang bisa diakses publik
Route::get('/', [ProductController::class, 'welcome'])->name('welcome');
require __DIR__.'/auth.php';
// Satu-satunya route dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Route Admin (Pastikan namanya admin.orders.index)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('orders.index');
    Route::patch('/orders/{id}/status', [AdminOrderController::class, 'updateStatus'])->name('orders.update');
});