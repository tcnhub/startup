<?php

use App\Http\Controllers\Guia\Auth\LoginController as GuiaLoginController;
use App\Http\Controllers\Guia\DashboardController as GuiaDashboardController;
use App\Http\Controllers\Guia\ProfileController as GuiaProfileController;
use App\Http\Controllers\Guia\PostController as GuiaPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('guia')->name('guia.')->group(function () {

    Route::middleware('guia.guest')->group(function () {
        Route::get('login',  [GuiaLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [GuiaLoginController::class, 'login']);
    });

    Route::middleware('guia')->group(function () {
        Route::get('dashboard', [GuiaDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout',   [GuiaLoginController::class, 'logout'])->name('logout');

        // Posts
        Route::resource('posts', GuiaPostController::class);

        // Profile
        Route::get('perfil',           [GuiaProfileController::class, 'edit'])->name('profile.edit');
        Route::put('perfil',           [GuiaProfileController::class, 'update'])->name('profile.update');
        Route::get('perfil/contrasena',[GuiaProfileController::class, 'editPassword'])->name('profile.password');
        Route::put('perfil/contrasena',[GuiaProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('perfil/galeria',   [GuiaProfileController::class, 'gallery'])->name('profile.gallery');
        Route::post('perfil/galeria',  [GuiaProfileController::class, 'uploadPhoto'])->name('profile.gallery.upload');
        Route::delete('perfil/galeria/{photo}', [GuiaProfileController::class, 'deletePhoto'])->name('profile.gallery.delete');
    });
});
