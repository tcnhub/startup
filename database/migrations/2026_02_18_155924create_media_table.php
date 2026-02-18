<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('filename');                   // nombre guardado en disco
            $table->string('original_name');              // nombre original del archivo
            $table->string('path');                       // ruta relativa en storage/app/public
            $table->string('disk')->default('public');
            $table->string('mime_type');
            $table->unsignedBigInteger('size');           // bytes
            $table->string('extension', 20);
            $table->string('alt_text')->nullable();       // texto alternativo (accesibilidad/SEO)
            $table->text('caption')->nullable();          // descripción/pie de foto
            $table->string('title')->nullable();
            $table->unsignedInteger('width')->nullable(); // dimensiones (solo imágenes)
            $table->unsignedInteger('height')->nullable();
            $table->foreignId('uploaded_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();

            $table->index('mime_type');
            $table->index('created_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
