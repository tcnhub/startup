<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Actividad;

class ActividadSeeder extends Seeder
{
    public function run(): void
    {
        $actividades = [
            [
                'nombre' => 'Aventura en los Andes',
                'email' => 'info@aventuraandes.com',
                'password' => Hash::make('password'),
                'telefono' => '944555666',
                'direccion' => 'Km 5 Carretera Central',
                'descripcion' => 'Trekking y escalada en los Andes con guías certificados. Experiencia única para aventureros.',
                'tipo_actividad' => 'trekking',
                'duracion_horas' => 8,
                'precio_desde' => 80.00,
                'precio_hasta' => 150.00,
                'capacidad_maxima' => 12,
                'edad_minima' => 14,
                'incluye_transporte' => true,
                'incluye_guia' => true,
                'incluye_equipo' => true,
                'dificultad' => 'dificil',
                'sitio_web' => 'https://www.aventuraandes.com',
                'latitud' => -11.9862,
                'longitud' => -76.7542,
            ],
            [
                'nombre' => 'Surf & Playa',
                'email' => 'hola@surfplaya.com',
                'password' => Hash::make('password'),
                'telefono' => '955666777',
                'direccion' => 'Playa Los Órganos, Piura',
                'descripcion' => 'Clases de surf para todos los niveles en las mejores olas del norte del Perú.',
                'tipo_actividad' => 'surf',
                'duracion_horas' => 3,
                'precio_desde' => 45.00,
                'precio_hasta' => 75.00,
                'capacidad_maxima' => 8,
                'edad_minima' => 10,
                'incluye_transporte' => false,
                'incluye_guia' => true,
                'incluye_equipo' => true,
                'dificultad' => 'facil',
                'sitio_web' => null,
                'latitud' => -4.1783,
                'longitud' => -81.1267,
            ],
            [
                'nombre' => 'Canotaje Río Urubamba',
                'email' => 'reservas@canotajerio.com',
                'password' => Hash::make('password'),
                'telefono' => '966777888',
                'direccion' => 'Santa Teresa, Cusco',
                'descripcion' => 'Emocionante canotaje por los rápidos del río Urubamba, cerca de Machu Picchu.',
                'tipo_actividad' => 'canotaje',
                'duracion_horas' => 5,
                'precio_desde' => 65.00,
                'precio_hasta' => 90.00,
                'capacidad_maxima' => 10,
                'edad_minima' => 12,
                'incluye_transporte' => true,
                'incluye_guia' => true,
                'incluye_equipo' => true,
                'dificultad' => 'moderado',
                'sitio_web' => 'https://www.canotajerio.com',
                'latitud' => -13.1500,
                'longitud' => -72.6333,
            ],
        ];

        foreach ($actividades as $actividad) {
            Actividad::create($actividad);
        }
    }
}
