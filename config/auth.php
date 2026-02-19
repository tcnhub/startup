<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'agencia' => [
            'driver' => 'session',
            'provider' => 'agencias',
        ],
        'hotel' => [
            'driver' => 'session',
            'provider' => 'hoteles',
        ],
        'actividad' => [
            'driver' => 'session',
            'provider' => 'actividades',
        ],
        'restaurante' => [
            'driver' => 'session',
            'provider' => 'restaurantes',
        ],
        'guia' => [
            'driver' => 'session',
            'provider' => 'guias',
        ],
        'transportista' => [
            'driver' => 'session',
            'provider' => 'transportistas',
        ],
        'atraccion' => [
            'driver' => 'session',
            'provider' => 'atracciones',
        ],
    ],

    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ],
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'agencias' => [
            'driver' => 'eloquent',
            'model' => App\Models\Agencia::class,
        ],
        'hoteles' => [
            'driver' => 'eloquent',
            'model' => App\Models\Hotel::class,
        ],
        'actividades' => [
            'driver' => 'eloquent',
            'model' => App\Models\Actividad::class,
        ],
        'restaurantes' => [
            'driver' => 'eloquent',
            'model' => App\Models\Restaurante::class,
        ],
        'guias' => [
            'driver' => 'eloquent',
            'model' => App\Models\Guia::class,
        ],
        'transportistas' => [
            'driver' => 'eloquent',
            'model' => App\Models\Transportista::class,
        ],
        'atracciones' => [
            'driver' => 'eloquent',
            'model' => App\Models\Atraccion::class,
        ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'agencias' => [
            'provider' => 'agencias',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'hoteles' => [
            'provider' => 'hoteles',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'actividades' => [
            'provider' => 'actividades',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'restaurantes' => [
            'provider' => 'restaurantes',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'guias' => [
            'provider' => 'guias',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'transportistas' => [
            'provider' => 'transportistas',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
        'atracciones' => [
            'provider' => 'atracciones',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),

];
