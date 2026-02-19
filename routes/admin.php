<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\ActividadController;
use App\Http\Controllers\Admin\RestauranteController;
use App\Http\Controllers\Admin\GuiaController;
use App\Http\Controllers\Admin\TransportistaController;
use App\Http\Controllers\Admin\AtraccionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Models\Photo;

Route::prefix('admin')->name('admin.')->group(function () {

    Route::middleware('admin.guest')->group(function () {
        Route::get('login',  [AdminLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AdminLoginController::class, 'login']);
    });

    Route::middleware('admin')->group(function () {
        Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout',   [AdminLoginController::class, 'logout'])->name('logout');

        // Posts
        Route::resource('posts', PostController::class);

        // Admin profile
        Route::get('perfil',            [AdminProfileController::class, 'edit'])->name('profile.edit');
        Route::put('perfil',            [AdminProfileController::class, 'update'])->name('profile.update');
        Route::get('perfil/contrasena', [AdminProfileController::class, 'editPassword'])->name('profile.password');
        Route::put('perfil/contrasena', [AdminProfileController::class, 'updatePassword'])->name('profile.password.update');
        Route::get('perfil/galeria',    [AdminProfileController::class, 'gallery'])->name('profile.gallery');
        Route::post('perfil/galeria',   [AdminProfileController::class, 'uploadPhoto'])->name('profile.gallery.upload');
        Route::delete('perfil/galeria/{photo}', [AdminProfileController::class, 'deletePhoto'])->name('profile.gallery.delete');

        // CRUD Hoteles
        Route::get('hoteles/{hotel}/restore', [HotelController::class, 'restore'])->name('hoteles.restore');
        Route::resource('hoteles', HotelController::class)->parameters(['hoteles' => 'hotel']);

        // CRUD Actividades
        Route::get('actividades/{actividad}/restore', [ActividadController::class, 'restore'])->name('actividades.restore');
        Route::resource('actividades', ActividadController::class)->parameters(['actividades' => 'actividad']);

        // CRUD Restaurantes
        Route::get('restaurantes/{restaurante}/restore', [RestauranteController::class, 'restore'])->name('restaurantes.restore');
        Route::resource('restaurantes', RestauranteController::class)->parameters(['restaurantes' => 'restaurante']);

        // CRUD Guías
        Route::get('guias/{guia}/restore', [GuiaController::class, 'restore'])->name('guias.restore');
        Route::resource('guias', GuiaController::class)->parameters(['guias' => 'guia']);

        // CRUD Transportistas
        Route::get('transportistas/{transportista}/restore', [TransportistaController::class, 'restore'])->name('transportistas.restore');
        Route::resource('transportistas', TransportistaController::class)->parameters(['transportistas' => 'transportista']);

        // CRUD Atracciones
        Route::get('atracciones/{atraccion}/restore', [AtraccionController::class, 'restore'])->name('atracciones.restore');
        Route::resource('atracciones', AtraccionController::class)->parameters(['atracciones' => 'atraccion']);
    });
});
