<?php

use App\Http\Controllers\Restaurante\Auth\LoginController as RestauranteLoginController;
use App\Http\Controllers\Restaurante\DashboardController as RestauranteDashboardController;
use App\Http\Controllers\Restaurante\ProfileController as RestauranteProfileController;
use App\Http\Controllers\Restaurante\PostController as RestaurantePostController;
use Illuminate\Support\Facades\Route;

Route::prefix('restaurante')->name('restaurante.')->group(function () {

    Route::middleware('restaurante.guest')->group(function () {
        Route::get('login',  [RestauranteLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [RestauranteLoginController::class, 'login']);
    });

    Route::middleware('restaurante')->group(function () {
        Route::get('dashboard', [RestauranteDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout',   [RestauranteLoginController::class, 'logout'])->name('logout');

        // Posts
        Route::resource('posts', RestaurantePostController::class);

        // Profile
        Route::get('perfil',           [RestauranteProfileController::class, 'edit'])->name('profile.edit');
        Route::put('perfil',           [RestauranteProfileController::class, 'update'])->name('profile.update');
        Route::get('perfil/contrasena',[RestauranteProfileController::class, 'editPassword'])->name('profile.password');
        Route::put('perfil/contrasena',[RestauranteProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('perfil/galeria',   [RestauranteProfileController::class, 'gallery'])->name('profile.gallery');
        Route::post('perfil/galeria',  [RestauranteProfileController::class, 'uploadPhoto'])->name('profile.gallery.upload');
        Route::delete('perfil/galeria/{photo}', [RestauranteProfileController::class, 'deletePhoto'])->name('profile.gallery.delete');
    });
});
