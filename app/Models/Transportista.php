<?php

namespace App\Models;

use App\Models\Concerns\HasPhotos;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Transportista extends Authenticatable
{
    use HasPhotos, SoftDeletes;

    protected $guard = 'transportista';
    protected $table = 'transportistas';

    protected $fillable = [
        'nombre', 'email', 'password', 'telefono', 'direccion', 'descripcion',
        'tipo_servicio', 'tipo_vehiculo', 'capacidad_pasajeros', 'precio_por_km',
        'precio_base', 'tiene_ac', 'tiene_wifi', 'acepta_mascotas', 'cobertura_zonas',
        'licencia_numero', 'profile_photo', 'email_verified_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'tiene_ac' => 'boolean',
        'tiene_wifi' => 'boolean',
        'acepta_mascotas' => 'boolean',
        'cobertura_zonas' => 'array',
    ];
}
