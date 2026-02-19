<?php

use App\Http\Controllers\Hotel\Auth\LoginController as HotelLoginController;
use App\Http\Controllers\Hotel\DashboardController as HotelDashboardController;
use App\Http\Controllers\Hotel\ProfileController as HotelProfileController;
use App\Http\Controllers\Hotel\PostController as HotelPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('hotel')->name('hotel.')->group(function () {

    Route::middleware('hotel.guest')->group(function () {
        Route::get('login',  [HotelLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [HotelLoginController::class, 'login']);
    });

    Route::middleware('hotel')->group(function () {
        Route::get('dashboard', [HotelDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout',   [HotelLoginController::class, 'logout'])->name('logout');

        // Posts
        Route::resource('posts', HotelPostController::class);

        // Profile
        Route::get('perfil',           [HotelProfileController::class, 'edit'])->name('profile.edit');
        Route::put('perfil',           [HotelProfileController::class, 'update'])->name('profile.update');
        Route::get('perfil/contrasena',[HotelProfileController::class, 'editPassword'])->name('profile.password');
        Route::put('perfil/contrasena',[HotelProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('perfil/galeria',   [HotelProfileController::class, 'gallery'])->name('profile.gallery');
        Route::post('perfil/galeria',  [HotelProfileController::class, 'uploadPhoto'])->name('profile.gallery.upload');
        Route::delete('perfil/galeria/{photo}', [HotelProfileController::class, 'deletePhoto'])->name('profile.gallery.delete');
    });
});
