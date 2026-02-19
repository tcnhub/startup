<?php

namespace App\Models;

use App\Models\Concerns\HasPhotos;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Hotel extends Authenticatable
{
    use HasPhotos, SoftDeletes;

    protected $guard = 'hotel';
    protected $table = 'hoteles';

    protected $fillable = [
        'nombre', 'email', 'password', 'telefono', 'direccion', 'descripcion',
        'numero_estrellas', 'tipo_hotel', 'sitio_web', 'check_in_hora', 'check_out_hora',
        'numero_habitaciones', 'precio_desde', 'tiene_piscina', 'tiene_spa',
        'tiene_restaurante', 'tiene_wifi', 'tiene_gym', 'latitud', 'longitud',
        'profile_photo', 'email_verified_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'tiene_piscina' => 'boolean',
        'tiene_spa' => 'boolean',
        'tiene_restaurante' => 'boolean',
        'tiene_wifi' => 'boolean',
        'tiene_gym' => 'boolean',
    ];
}
