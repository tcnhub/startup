<?php

use App\Http\Controllers\Agencia\Auth\LoginController as AgenciaLoginController;
use App\Http\Controllers\Agencia\DashboardController as AgenciaDashboardController;
use App\Http\Controllers\Agencia\ProfileController as AgenciaProfileController;
use App\Http\Controllers\Agencia\PostController as AgenciaPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('agencia')->name('agencia.')->group(function () {

    Route::middleware('agencia.guest')->group(function () {
        Route::get('login',  [AgenciaLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AgenciaLoginController::class, 'login']);
    });

    Route::middleware('agencia')->group(function () {
        Route::get('dashboard', [AgenciaDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout',   [AgenciaLoginController::class, 'logout'])->name('logout');

        // Posts
        Route::resource('posts', AgenciaPostController::class);

        // Profile
        Route::get('perfil',            [AgenciaProfileController::class, 'edit'])->name('profile.edit');
        Route::put('perfil',            [AgenciaProfileController::class, 'update'])->name('profile.update');
        Route::get('perfil/contrasena', [AgenciaProfileController::class, 'editPassword'])->name('profile.password');
        Route::put('perfil/contrasena', [AgenciaProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('perfil/galeria',    [AgenciaProfileController::class, 'gallery'])->name('profile.gallery');
        Route::post('perfil/galeria',   [AgenciaProfileController::class, 'uploadPhoto'])->name('profile.gallery.upload');
        Route::delete('perfil/galeria/{photo}', [AgenciaProfileController::class, 'deletePhoto'])->name('profile.gallery.delete');
    });
});
