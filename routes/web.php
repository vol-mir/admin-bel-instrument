<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ShopImageController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', function () {
        return redirect('dashboard');
    });

    Route::get('login', [AuthController::class, 'create'])->name('login');
    Route::post('login', [AuthController::class, 'store']);
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::post('logout', [AuthController::class, 'destroy'])->name('logout');
    Route::put('password', [AuthController::class, 'updatePassword'])->name('password.update');

    Route::resource('shops', ShopController::class);

    Route::get('/settings', [SettingController::class, 'edit'])->name('settings.edit');
    Route::patch('/settings', [SettingController::class, 'update'])->name('settings.update');

    Route::get('{type}/{id}/phones', [PhoneController::class, 'index'])->name('phones.index');
    Route::get('{type}/{id}/phones/create', [PhoneController::class, 'create'])->name('phones.create');
    Route::post('{type}/{id}/phones', [PhoneController::class, 'store'])->name('phones.store');
    Route::get('{type}/{id}/phones/{phone}', [PhoneController::class, 'edit'])->name('phones.edit');
    Route::put('{type}/{id}/phones/{phone}', [PhoneController::class, 'update'])->name('phones.update');
    Route::delete('/phones/{phone}', [PhoneController::class, 'destroy'])->name('phones.destroy');

    Route::get('shops/{shop}/images', [ShopImageController::class, 'index'])->name('shops.images.index');
    Route::get('shops/{shop}/images/create', [ShopImageController::class, 'create'])->name('shops.images.create');
    Route::post('shops/{shop}/images', [ShopImageController::class, 'store'])->name('shops.images.store');
    Route::get('shops/{shop}/images/{image}', [ShopImageController::class, 'edit'])->name('shops.images.edit');
    Route::patch('shops/{shop}/images/{image}', [ShopImageController::class, 'update'])->name('shops.images.update');
    Route::delete('shops/images/{image}', [ShopImageController::class, 'destroy'])->name('shops.images.destroy');

    Route::get('brands', [BrandController::class, 'index'])->name('brands.index');
    Route::get('brands/create', [BrandController::class, 'create'])->name('brands.create');
    Route::post('brands', [BrandController::class, 'store'])->name('brands.store');
    Route::get('brands/{brand}', [BrandController::class, 'edit'])->name('brands.edit');
    Route::patch('brands/{brand}', [BrandController::class, 'update'])->name('brands.update');
    Route::delete('brands/{brand}', [BrandController::class, 'destroy'])->name('brands.destroy');
});
