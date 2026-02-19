<?php

use App\Http\Controllers\Atraccion\Auth\LoginController as AtraccionLoginController;
use App\Http\Controllers\Atraccion\DashboardController as AtraccionDashboardController;
use App\Http\Controllers\Atraccion\ProfileController as AtraccionProfileController;
use App\Http\Controllers\Atraccion\PostController as AtraccionPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('atraccion')->name('atraccion.')->group(function () {

    Route::middleware('atraccion.guest')->group(function () {
        Route::get('login',  [AtraccionLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AtraccionLoginController::class, 'login']);
    });

    Route::middleware('atraccion')->group(function () {
        Route::get('dashboard', [AtraccionDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout',   [AtraccionLoginController::class, 'logout'])->name('logout');

        // Posts
        Route::resource('posts', AtraccionPostController::class);

        // Profile
        Route::get('perfil',           [AtraccionProfileController::class, 'edit'])->name('profile.edit');
        Route::put('perfil',           [AtraccionProfileController::class, 'update'])->name('profile.update');
        Route::get('perfil/contrasena',[AtraccionProfileController::class, 'editPassword'])->name('profile.password');
        Route::put('perfil/contrasena',[AtraccionProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('perfil/galeria',   [AtraccionProfileController::class, 'gallery'])->name('profile.gallery');
        Route::post('perfil/galeria',  [AtraccionProfileController::class, 'uploadPhoto'])->name('profile.gallery.upload');
        Route::delete('perfil/galeria/{photo}', [AtraccionProfileController::class, 'deletePhoto'])->name('profile.gallery.delete');
    });
});
