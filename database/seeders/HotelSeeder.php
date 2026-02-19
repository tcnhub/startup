<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Hotel;

class HotelSeeder extends Seeder
{
    public function run(): void
    {
        $hoteles = [
            [
                'nombre' => 'Hotel Gran Plaza',
                'email' => 'hotel@granplaza.com',
                'password' => Hash::make('password'),
                'telefono' => '911222333',
                'direccion' => 'Av. Gran Plaza 100',
                'descripcion' => 'Hotel de lujo en el centro de la ciudad con vistas panorámicas y servicios de primera clase.',
                'numero_estrellas' => 5,
                'tipo_hotel' => 'hotel',
                'sitio_web' => 'https://www.granplaza.com',
                'check_in_hora' => '14:00',
                'check_out_hora' => '12:00',
                'numero_habitaciones' => 120,
                'precio_desde' => 250.00,
                'tiene_piscina' => true,
                'tiene_spa' => true,
                'tiene_restaurante' => true,
                'tiene_wifi' => true,
                'tiene_gym' => true,
                'latitud' => -12.0464,
                'longitud' => -77.0428,
            ],
            [
                'nombre' => 'Hostal El Viajero',
                'email' => 'info@hostalviajero.com',
                'password' => Hash::make('password'),
                'telefono' => '922333444',
                'direccion' => 'Jr. Los Viajeros 45',
                'descripcion' => 'Hostal acogedor ideal para mochileros y viajeros con presupuesto ajustado.',
                'numero_estrellas' => 2,
                'tipo_hotel' => 'hostal',
                'sitio_web' => null,
                'check_in_hora' => '13:00',
                'check_out_hora' => '11:00',
                'numero_habitaciones' => 20,
                'precio_desde' => 35.00,
                'tiene_piscina' => false,
                'tiene_spa' => false,
                'tiene_restaurante' => false,
                'tiene_wifi' => true,
                'tiene_gym' => false,
                'latitud' => -12.0534,
                'longitud' => -77.0538,
            ],
            [
                'nombre' => 'Boutique Casa Colonial',
                'email' => 'reservas@casacolonial.com',
                'password' => Hash::make('password'),
                'telefono' => '933444555',
                'direccion' => 'Calle Colonial 78',
                'descripcion' => 'Hotel boutique en casona colonial restaurada, ambiente único y personalizado.',
                'numero_estrellas' => 4,
                'tipo_hotel' => 'boutique',
                'sitio_web' => 'https://www.casacolonial.com',
                'check_in_hora' => '15:00',
                'check_out_hora' => '12:00',
                'numero_habitaciones' => 15,
                'precio_desde' => 180.00,
                'tiene_piscina' => false,
                'tiene_spa' => true,
                'tiene_restaurante' => true,
                'tiene_wifi' => true,
                'tiene_gym' => false,
                'latitud' => -12.0590,
                'longitud' => -77.0480,
            ],
        ];

        foreach ($hoteles as $hotel) {
            Hotel::create($hotel);
        }
    }
}
