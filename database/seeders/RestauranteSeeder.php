<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Restaurante;

class RestauranteSeeder extends Seeder
{
    public function run(): void
    {
        $restaurantes = [
            [
                'nombre' => 'La Huaca Restaurante',
                'email' => 'reservas@lahuaca.com',
                'password' => Hash::make('password'),
                'telefono' => '977888999',
                'direccion' => 'Av. La Marina 2000, Miraflores',
                'descripcion' => 'Alta cocina peruana con ingredientes locales de temporada y maridaje de piscos artesanales.',
                'tipo_cocina' => 'peruana',
                'tipo_servicio' => 'a la carta',
                'precio_promedio' => 120.00,
                'hora_apertura' => '12:00',
                'hora_cierre' => '23:00',
                'capacidad' => 80,
                'acepta_reservas' => true,
                'tiene_delivery' => false,
                'tiene_terraza' => true,
                'tiene_wifi' => true,
                'tiene_estacionamiento' => true,
                'sitio_web' => 'https://www.lahuaca.com',
                'latitud' => -12.1328,
                'longitud' => -77.0267,
            ],
            [
                'nombre' => 'Pizzeria Napoli',
                'email' => 'info@pizzerianapoli.com',
                'password' => Hash::make('password'),
                'telefono' => '988999000',
                'direccion' => 'Calle Italia 45, San Isidro',
                'descripcion' => 'Auténtica pizza napolitana horneada en horno de leña importado de Italia.',
                'tipo_cocina' => 'italiana',
                'tipo_servicio' => 'a la carta',
                'precio_promedio' => 55.00,
                'hora_apertura' => '12:00',
                'hora_cierre' => '22:30',
                'capacidad' => 50,
                'acepta_reservas' => true,
                'tiene_delivery' => true,
                'tiene_terraza' => false,
                'tiene_wifi' => true,
                'tiene_estacionamiento' => false,
                'sitio_web' => null,
                'latitud' => -12.1000,
                'longitud' => -77.0366,
            ],
            [
                'nombre' => 'Cevichería El Puerto',
                'email' => 'contacto@cevicheriaelpuerto.com',
                'password' => Hash::make('password'),
                'telefono' => '999000111',
                'direccion' => 'Jr. Las Flores 12, Chorrillos',
                'descripcion' => 'Los mejores ceviches y tiraditos frescos del mar. Ingredientes del día traídos directamente del puerto.',
                'tipo_cocina' => 'marina',
                'tipo_servicio' => 'a la carta',
                'precio_promedio' => 40.00,
                'hora_apertura' => '10:00',
                'hora_cierre' => '17:00',
                'capacidad' => 60,
                'acepta_reservas' => false,
                'tiene_delivery' => true,
                'tiene_terraza' => true,
                'tiene_wifi' => false,
                'tiene_estacionamiento' => true,
                'sitio_web' => null,
                'latitud' => -12.1817,
                'longitud' => -77.0219,
            ],
        ];

        foreach ($restaurantes as $restaurante) {
            Restaurante::create($restaurante);
        }
    }
}
