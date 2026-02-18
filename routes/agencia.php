<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agencia\Auth\LoginController as AgenciaLoginController;
use App\Http\Controllers\Agencia\DashboardController as AgenciaDashboardController;

// =====================
// RUTAS DE AGENCIA
// =====================
Route::prefix('agencia')->name('agencia.')->group(function () {

    // Rutas de invitado (no autenticado)
    Route::middleware('agencia.guest')->group(function () {
        Route::get('login', [AgenciaLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [AgenciaLoginController::class, 'login']);
    });

    // Rutas protegidas
    Route::middleware('agencia')->group(function () {
        Route::get('dashboard', [AgenciaDashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [AgenciaLoginController::class, 'logout'])->name('logout');
    });
});
