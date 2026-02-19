<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('actividades', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('tipo_actividad')->nullable();
            $table->decimal('duracion_horas', 5, 2)->nullable();
            $table->decimal('precio_desde', 10, 2)->nullable();
            $table->decimal('precio_hasta', 10, 2)->nullable();
            $table->unsignedSmallInteger('capacidad_maxima')->nullable();
            $table->unsignedTinyInteger('edad_minima')->nullable();
            $table->boolean('incluye_transporte')->default(false);
            $table->boolean('incluye_guia')->default(false);
            $table->boolean('incluye_equipo')->default(false);
            $table->enum('dificultad', ['facil','moderado','dificil'])->default('facil');
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
        Schema::dropIfExists('actividades');
    }
};
