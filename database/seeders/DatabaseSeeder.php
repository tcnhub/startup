<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Models\Agencia;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        Admin::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
        ]);

        Agencia::create([
            'nombre' => 'Agencia Demo',
            'email' => 'agencia@agencia.com',
            'telefono' => '999888777',
            'direccion' => 'Av. Principal 123',
            'password' => Hash::make('password'),
        ]);

        $this->call([
            PostSeeder::class,
            HotelSeeder::class,
            ActividadSeeder::class,
            RestauranteSeeder::class,
            GuiaSeeder::class,
            TransportistaSeeder::class,
            AtraccionSeeder::class,
        ]);
    }
}
