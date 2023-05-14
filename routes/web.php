<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PhoneController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\ShopController;
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
});
