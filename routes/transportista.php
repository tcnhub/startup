<?php

use App\Http\Controllers\Transportista\Auth\LoginController as TransportistaLoginController;
use App\Http\Controllers\Transportista\DashboardController as TransportistaDashboardController;
use App\Http\Controllers\Transportista\ProfileController as TransportistaProfileController;
use App\Http\Controllers\Transportista\PostController as TransportistaPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('transportista')->name('transportista.')->group(function () {

    Route::middleware('transportista.guest')->group(function () {
        Route::get('login',  [TransportistaLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [TransportistaLoginController::class, 'login']);
    });

    Route::middleware('transportista')->group(function () {
        Route::get('dashboard', [TransportistaDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout',   [TransportistaLoginController::class, 'logout'])->name('logout');

        // Posts
        Route::resource('posts', TransportistaPostController::class);

        // Profile
        Route::get('perfil',           [TransportistaProfileController::class, 'edit'])->name('profile.edit');
        Route::put('perfil',           [TransportistaProfileController::class, 'update'])->name('profile.update');
        Route::get('perfil/contrasena',[TransportistaProfileController::class, 'editPassword'])->name('profile.password');
        Route::put('perfil/contrasena',[TransportistaProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('perfil/galeria',   [TransportistaProfileController::class, 'gallery'])->name('profile.gallery');
        Route::post('perfil/galeria',  [TransportistaProfileController::class, 'uploadPhoto'])->name('profile.gallery.upload');
        Route::delete('perfil/galeria/{photo}', [TransportistaProfileController::class, 'deletePhoto'])->name('profile.gallery.delete');
    });
});
