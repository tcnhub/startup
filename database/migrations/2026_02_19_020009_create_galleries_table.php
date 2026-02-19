<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Galería de fotos vinculada a un post (opcional)
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();

            $table->foreignId('post_id')
                ->nullable()
                ->constrained('posts')
                ->nullOnDelete();

            $table->foreignId('agencia_id') // mejor en singular 👇
            ->nullable()
                ->constrained('agencias')
                ->nullOnDelete();

            $table->string('name')->nullable();       // nombre descriptivo de la galería
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Tabla pivot: qué imágenes pertenecen a cada galería, con orden
        Schema::create('gallery_media', function (Blueprint $table) {

            $table->primary(['gallery_id', 'media_id']);
            $table->foreignId('gallery_id')
                ->constrained('galleries')
                ->cascadeOnDelete();
            $table->foreignId('media_id')
                ->constrained('media')
                ->cascadeOnDelete();

            $table->unsignedSmallInteger('order')->default(0);
            $table->string('caption')->nullable();    // caption específico por imagen en la galería
            $table->timestamps();

            $table->unique(['gallery_id', 'media_id']);
            $table->index(['gallery_id', 'order']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gallery_media');
        Schema::dropIfExists('galleries');
    }
};
