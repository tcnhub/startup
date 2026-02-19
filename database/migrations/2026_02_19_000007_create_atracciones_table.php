<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('atracciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('tipo_atraccion')->nullable();
            $table->time('horario_apertura')->nullable();
            $table->time('horario_cierre')->nullable();
            $table->decimal('precio_adulto', 10, 2)->nullable();
            $table->decimal('precio_nino', 10, 2)->nullable();
            $table->decimal('precio_estudiante', 10, 2)->nullable();
            $table->decimal('tiempo_visita_horas', 5, 2)->nullable();
            $table->boolean('tiene_guia_disponible')->default(false);
            $table->boolean('es_accesible')->default(false);
            $table->string('sitio_web')->nullable();
            $table->decimal('latitud', 10, 8)->nullable();
            $table->decimal('longitud', 11, 8)->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('atracciones');
    }
};
