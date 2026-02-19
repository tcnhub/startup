<?php

namespace App\Models;

use App\Models\Concerns\HasPhotos;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Actividad extends Authenticatable
{
    use HasPhotos, SoftDeletes;

    protected $guard = 'actividad';
    protected $table = 'actividades';

    protected $fillable = [
        'nombre', 'email', 'password', 'telefono', 'direccion', 'descripcion',
        'tipo_actividad', 'duracion_horas', 'precio_desde', 'precio_hasta',
        'capacidad_maxima', 'edad_minima', 'incluye_transporte', 'incluye_guia',
        'incluye_equipo', 'dificultad', 'sitio_web', 'latitud', 'longitud',
        'profile_photo', 'email_verified_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'incluye_transporte' => 'boolean',
        'incluye_guia' => 'boolean',
        'incluye_equipo' => 'boolean',
    ];
}
