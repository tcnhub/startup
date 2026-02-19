<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::middleware('web')->group(base_path('routes/admin.php'));
            Route::middleware('web')->group(base_path('routes/agencia.php'));
            Route::middleware('web')->group(base_path('routes/hotel.php'));
            Route::middleware('web')->group(base_path('routes/actividad.php'));
            Route::middleware('web')->group(base_path('routes/restaurante.php'));
            Route::middleware('web')->group(base_path('routes/guia.php'));
            Route::middleware('web')->group(base_path('routes/transportista.php'));
            Route::middleware('web')->group(base_path('routes/atraccion.php'));
        },
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'admin'               => \App\Http\Middleware\AdminAuthenticate::class,
            'agencia'             => \App\Http\Middleware\AgenciaAuthenticate::class,
            'admin.guest'         => \App\Http\Middleware\RedirectIfAdmin::class,
            'agencia.guest'       => \App\Http\Middleware\RedirectIfAgencia::class,
            'hotel'               => \App\Http\Middleware\HotelAuthenticate::class,
            'hotel.guest'         => \App\Http\Middleware\RedirectIfHotel::class,
            'actividad'           => \App\Http\Middleware\ActividadAuthenticate::class,
            'actividad.guest'     => \App\Http\Middleware\RedirectIfActividad::class,
            'restaurante'         => \App\Http\Middleware\RestauranteAuthenticate::class,
            'restaurante.guest'   => \App\Http\Middleware\RedirectIfRestaurante::class,
            'guia'                => \App\Http\Middleware\GuiaAuthenticate::class,
            'guia.guest'          => \App\Http\Middleware\RedirectIfGuia::class,
            'transportista'       => \App\Http\Middleware\TransportistaAuthenticate::class,
            'transportista.guest' => \App\Http\Middleware\RedirectIfTransportista::class,
            'atraccion'           => \App\Http\Middleware\AtraccionAuthenticate::class,
            'atraccion.guest'     => \App\Http\Middleware\RedirectIfAtraccion::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
