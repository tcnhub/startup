<?php

namespace App\Models;

use App\Models\Concerns\HasPhotos;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Guia extends Authenticatable
{
    use HasPhotos, SoftDeletes;

    protected $guard = 'guia';
    protected $table = 'guias';

    protected $fillable = [
        'nombre', 'apellido', 'email', 'password', 'telefono', 'descripcion',
        'numero_licencia', 'especialidades', 'idiomas', 'experiencia_anios',
        'precio_por_dia', 'precio_por_hora', 'disponible',
        'profile_photo', 'email_verified_at',
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'especialidades' => 'array',
        'idiomas' => 'array',
        'disponible' => 'boolean',
    ];
}
