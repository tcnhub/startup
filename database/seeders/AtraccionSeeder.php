<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Atraccion;

class AtraccionSeeder extends Seeder
{
    public function run(): void
    {
        $atracciones = [
            [
                'nombre' => 'Museo Larco',
                'email' => 'info@museoLarco.pe',
                'password' => Hash::make('password'),
                'telefono' => '977700800',
                'direccion' => 'Av. Bolívar 1515, Pueblo Libre',
                'descripcion' => 'Museo privado con la más importante colección de arte precolombino del Perú, ubicado en una hacienda del siglo XVIII.',
                'tipo_atraccion' => 'museo',
                'horario_apertura' => '09:00',
                'horario_cierre' => '22:00',
                'precio_adulto' => 30.00,
                'precio_nino' => 15.00,
                'precio_estudiante' => 20.00,
                'tiempo_visita_horas' => 2,
                'tiene_guia_disponible' => true,
                'es_accesible' => true,
                'sitio_web' => 'https://www.museolarco.org',
                'latitud' => -12.0784,
                'longitud' => -77.0605,
            ],
            [
                'nombre' => 'Parque de las Aguas',
                'email' => 'contacto@parqueaguas.com',
                'password' => Hash::make('password'),
                'telefono' => '988800900',
                'direccion' => 'Jr. Madre de Dios s/n, Cercado de Lima',
                'descripcion' => 'El circuito mágico del agua más grande del mundo según el Libro Guinness. 13 fuentes interactivas con shows nocturnos.',
                'tipo_atraccion' => 'parque',
                'horario_apertura' => '15:00',
                'horario_cierre' => '22:30',
                'precio_adulto' => 6.00,
                'precio_nino' => 3.00,
                'precio_estudiante' => 4.00,
                'tiempo_visita_horas' => 2,
                'tiene_guia_disponible' => false,
                'es_accesible' => true,
                'sitio_web' => null,
                'latitud' => -12.0586,
                'longitud' => -77.0295,
            ],
            [
                'nombre' => 'Huaca Pucllana',
                'email' => 'visitas@huacapucllana.pe',
                'password' => Hash::make('password'),
                'telefono' => '999900100',
                'direccion' => 'Calle General Borgoño s/n, Miraflores',
                'descripcion' => 'Gran pirámide construida por la cultura Lima hace 1,700 años. Centro ceremonial y administrativo en pleno corazón de Miraflores.',
                'tipo_atraccion' => 'sitio arqueológico',
                'horario_apertura' => '09:00',
                'horario_cierre' => '17:00',
                'precio_adulto' => 15.00,
                'precio_nino' => 8.00,
                'precio_estudiante' => 10.00,
                'tiempo_visita_horas' => 1,
                'tiene_guia_disponible' => true,
                'es_accesible' => false,
                'sitio_web' => 'https://www.huacapucllana.pe',
                'latitud' => -12.1102,
                'longitud' => -77.0382,
            ],
        ];

        foreach ($atracciones as $atraccion) {
            Atraccion::create($atraccion);
        }
    }
}
