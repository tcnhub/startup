<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Transportista;

class TransportistaSeeder extends Seeder
{
    public function run(): void
    {
        $transportistas = [
            [
                'nombre' => 'Lima Transfer Express',
                'email' => 'info@limatransfer.com',
                'password' => Hash::make('password'),
                'telefono' => '944400500',
                'direccion' => 'Av. Javier Prado 3500, San Borja',
                'descripcion' => 'Servicio de traslados privados al aeropuerto y tour en Lima. Vehículos modernos y conductores profesionales.',
                'tipo_servicio' => 'traslado privado',
                'tipo_vehiculo' => 'minivan',
                'capacidad_pasajeros' => 7,
                'precio_por_km' => 2.50,
                'precio_base' => 40.00,
                'tiene_ac' => true,
                'tiene_wifi' => true,
                'acepta_mascotas' => false,
                'cobertura_zonas' => ['Miraflores', 'San Isidro', 'Barranco', 'Chorrillos', 'Aeropuerto'],
                'licencia_numero' => 'TR-001111',
            ],
            [
                'nombre' => 'Andes Bus Turístico',
                'email' => 'reservas@andesbus.com',
                'password' => Hash::make('password'),
                'telefono' => '955500600',
                'direccion' => 'Terminal Terrestre Plaza Norte, Los Olivos',
                'descripcion' => 'Servicio de bus turístico de primera clase entre Lima, Cusco, Arequipa y principales destinos del país.',
                'tipo_servicio' => 'bus interprovincial',
                'tipo_vehiculo' => 'bus',
                'capacidad_pasajeros' => 40,
                'precio_por_km' => 0.35,
                'precio_base' => 0.00,
                'tiene_ac' => true,
                'tiene_wifi' => true,
                'acepta_mascotas' => false,
                'cobertura_zonas' => ['Lima', 'Cusco', 'Arequipa', 'Puno', 'Ica', 'Nazca'],
                'licencia_numero' => 'TR-002222',
            ],
            [
                'nombre' => 'Taxi Turístico Seguro',
                'email' => 'contacto@taxituristico.com',
                'password' => Hash::make('password'),
                'telefono' => '966600700',
                'direccion' => 'Jr. Las Magnolias 88, Surco',
                'descripcion' => 'Taxis privados con conductores bilingües para turistas. Tarifas fijas y transparentes.',
                'tipo_servicio' => 'taxi privado',
                'tipo_vehiculo' => 'automóvil',
                'capacidad_pasajeros' => 4,
                'precio_por_km' => 1.80,
                'precio_base' => 15.00,
                'tiene_ac' => true,
                'tiene_wifi' => false,
                'acepta_mascotas' => true,
                'cobertura_zonas' => ['Lima Metropolitana', 'Callao'],
                'licencia_numero' => 'TR-003333',
            ],
        ];

        foreach ($transportistas as $transportista) {
            Transportista::create($transportista);
        }
    }
}
