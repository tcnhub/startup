<?php

use App\Http\Controllers\Actividad\Auth\LoginController as ActividadLoginController;
use App\Http\Controllers\Actividad\DashboardController as ActividadDashboardController;
use App\Http\Controllers\Actividad\ProfileController as ActividadProfileController;
use App\Http\Controllers\Actividad\PostController as ActividadPostController;
use Illuminate\Support\Facades\Route;

Route::prefix('actividad')->name('actividad.')->group(function () {

    Route::middleware('actividad.guest')->group(function () {
        Route::get('login',  [ActividadLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [ActividadLoginController::class, 'login']);
    });

    Route::middleware('actividad')->group(function () {
        Route::get('dashboard', [ActividadDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout',   [ActividadLoginController::class, 'logout'])->name('logout');

        // Posts
        Route::resource('posts', ActividadPostController::class);

        // Profile
        Route::get('perfil',           [ActividadProfileController::class, 'edit'])->name('profile.edit');
        Route::put('perfil',           [ActividadProfileController::class, 'update'])->name('profile.update');
        Route::get('perfil/contrasena',[ActividadProfileController::class, 'editPassword'])->name('profile.password');
        Route::put('perfil/contrasena',[ActividadProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('perfil/galeria',   [ActividadProfileController::class, 'gallery'])->name('profile.gallery');
        Route::post('perfil/galeria',  [ActividadProfileController::class, 'uploadPhoto'])->name('profile.gallery.upload');
        Route::delete('perfil/galeria/{photo}', [ActividadProfileController::class, 'deletePhoto'])->name('profile.gallery.delete');
    });
});
