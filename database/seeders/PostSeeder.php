<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        $admin = Admin::first(); // Asume el primer usuario existe

        Post::create([
            'title' => 'Post de Prueba 1',
            'slug' => Str::slug('Post de Prueba 1'),
            'content' => 'Contenido de prueba para el primer post.',
            'excerpt' => 'Resumen del primer post.',
            'admin_id' => $admin->id,
            'status' => 'published',
            'published_at' => now(),
        ]);

        Post::create([
            'title' => 'Post de Prueba 2',
            'slug' => Str::slug('Post de Prueba 2'),
            'content' => 'Contenido de prueba para el segundo post.',
            'excerpt' => 'Resumen del segundo post.',
            'admin_id' => $admin->id,
            'status' => 'draft',
        ]);

        // Agrega más si necesitas
    }
}
