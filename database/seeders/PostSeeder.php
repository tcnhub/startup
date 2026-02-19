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
        $admin = Admin::first(); // o el admin que quieras usar

        $faker = \Faker\Factory::create('es_ES');

        $statuses = ['draft', 'published', 'scheduled', 'archived'];

        for ($i = 0; $i < 100; $i++) {

            $title = $faker->unique()->sentence(rand(3, 6));

            $status = $faker->randomElement($statuses);

            Post::create([
                'title'          => $title,
                'slug'           => Str::slug($title),
                'content'        => $faker->paragraphs(rand(5, 12), true),
                'excerpt'        => $faker->sentence(15),
                'admin_id'       => $admin->id,
                'status'         => $status,
                'is_featured'    => $faker->boolean(20), // 20% destacados
                'allow_comments' => $faker->boolean(80), // 80% permiten comentarios
                'published_at'   => $status === 'published'
                    ? $faker->dateTimeBetween('-6 months', 'now')
                    : null,
            ]);
        }
    }
}
