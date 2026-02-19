<?php

namespace App\Models;

use App\Models\Concerns\HasPhotos;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Agencia extends Authenticatable
{
    use Notifiable, HasPhotos;

    protected $guard = 'agencia';
    protected $table = 'agencias';

    protected $fillable = [
        'nombre',
        'email',
        'telefono',
        'direccion',
        'password',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
