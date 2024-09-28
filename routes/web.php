<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProfilController;
use App\Http\Controllers\Customer\DashboarController_C;
use App\Http\Controllers\Merchant\ListOrderController;
use App\Http\Controllers\InvoiceController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('menu', MenuController::class);
Route::resource('order', OrderController::class);
Route::resource('profil', ProfilController::class);
Route::get('dash-customer', [DashboarController_C::class, 'index'])->name('dashboard-customer');
Route::get('merchant-order', [ListOrderController::class, 'index']);
Route::get('/order/{id}/invoice', [OrderController::class, 'invoice'])->name('order.invoice');


require __DIR__.'/auth.php';