<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Guia;

class GuiaSeeder extends Seeder
{
    public function run(): void
    {
        $guias = [
            [
                'nombre' => 'Carlos',
                'apellido' => 'Mamani Quispe',
                'email' => 'carlos@guiaturistico.com',
                'password' => Hash::make('password'),
                'telefono' => '911100200',
                'descripcion' => 'Guía certificado con amplia experiencia en rutas andinas, Machu Picchu y el Camino Inca.',
                'numero_licencia' => 'GT-001234',
                'especialidades' => ['Camino Inca', 'Machu Picchu', 'Valle Sagrado', 'Cusco Colonial'],
                'idiomas' => ['español', 'inglés', 'quechua'],
                'experiencia_anios' => 12,
                'precio_por_dia' => 150.00,
                'precio_por_hora' => 25.00,
                'disponible' => true,
            ],
            [
                'nombre' => 'María',
                'apellido' => 'Torres Vega',
                'email' => 'maria@guiatours.com',
                'password' => Hash::make('password'),
                'telefono' => '922200300',
                'descripcion' => 'Especialista en Lima colonial e histórica, arqueología precolombina y gastronomía peruana.',
                'numero_licencia' => 'GT-002345',
                'especialidades' => ['Lima Colonial', 'Museos', 'Gastronomía', 'Arqueología'],
                'idiomas' => ['español', 'inglés', 'francés'],
                'experiencia_anios' => 8,
                'precio_por_dia' => 120.00,
                'precio_por_hora' => 20.00,
                'disponible' => true,
            ],
            [
                'nombre' => 'Roberto',
                'apellido' => 'Flores Huanca',
                'email' => 'roberto@amazoniaguia.com',
                'password' => Hash::make('password'),
                'telefono' => '933300400',
                'descripcion' => 'Guía nativo de la Amazonía peruana. Experto en fauna, flora y comunidades nativas del Amazonas.',
                'numero_licencia' => 'GT-003456',
                'especialidades' => ['Amazonía', 'Fauna Silvestre', 'Comunidades Nativas', 'Iquitos'],
                'idiomas' => ['español', 'inglés', 'portugués'],
                'experiencia_anios' => 15,
                'precio_por_dia' => 180.00,
                'precio_por_hora' => 30.00,
                'disponible' => false,
            ],
        ];

        foreach ($guias as $guia) {
            Guia::create($guia);
        }
    }
}
