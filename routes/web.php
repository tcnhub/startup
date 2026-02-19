<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Aquí solo rutas públicas...


Route::middleware('auth')->group(function () {
    Route::resource('posts', \App\Http\Controllers\PostController::class);
});
