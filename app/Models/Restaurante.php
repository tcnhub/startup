<?php

namespace App\Models;

use App\Models\Concerns\HasPhotos;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Restaurante extends Authenticatable
{
    use HasPhotos, SoftDeletes;

    protected $guard = 'restaurante';
    protected $table = 'restaurantes';

    protected $fillable = [
        'nombre', 'email', 'password', 'telefono', 'direccion', 'descripcion',
        'tipo_cocina', 'tipo_servicio', 'precio_promedio', 'hora_apertura', 'hora_cierre',
        'capacidad', 'acepta_reservas', 'tiene_delivery', 'tiene_terraza', 'tiene_wifi',
        'tiene_estacionamiento', 'sitio_web', 'latitud', 'longitud',
        'profile_photo', 'email_verified_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'acepta_reservas' => 'boolean',
        'tiene_delivery' => 'boolean',
        'tiene_terraza' => 'boolean',
        'tiene_wifi' => 'boolean',
        'tiene_estacionamiento' => 'boolean',
    ];
}
