<?php

namespace App\Models;

use App\Models\Concerns\HasPhotos;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Atraccion extends Authenticatable
{
    use HasPhotos, SoftDeletes;

    protected $guard = 'atraccion';
    protected $table = 'atracciones';

    protected $fillable = [
        'nombre', 'email', 'password', 'telefono', 'direccion', 'descripcion',
        'tipo_atraccion', 'horario_apertura', 'horario_cierre', 'precio_adulto',
        'precio_nino', 'precio_estudiante', 'tiempo_visita_horas', 'tiene_guia_disponible',
        'es_accesible', 'sitio_web', 'latitud', 'longitud',
        'profile_photo', 'email_verified_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'tiene_guia_disponible' => 'boolean',
        'es_accesible' => 'boolean',
    ];
}
