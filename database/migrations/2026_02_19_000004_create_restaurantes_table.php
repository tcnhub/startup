<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('restaurantes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('tipo_cocina')->nullable();
            $table->string('tipo_servicio')->nullable();
            $table->decimal('precio_promedio', 10, 2)->nullable();
            $table->time('hora_apertura')->nullable();
            $table->time('hora_cierre')->nullable();
            $table->unsignedSmallInteger('capacidad')->nullable();
            $table->boolean('acepta_reservas')->default(true);
            $table->boolean('tiene_delivery')->default(false);
            $table->boolean('tiene_terraza')->default(false);
            $table->boolean('tiene_wifi')->default(false);
            $table->boolean('tiene_estacionamiento')->default(false);
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
        Schema::dropIfExists('restaurantes');
    }
};
