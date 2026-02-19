<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('transportistas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('tipo_servicio')->nullable();
            $table->string('tipo_vehiculo')->nullable();
            $table->unsignedSmallInteger('capacidad_pasajeros')->nullable();
            $table->decimal('precio_por_km', 10, 2)->nullable();
            $table->decimal('precio_base', 10, 2)->nullable();
            $table->boolean('tiene_ac')->default(true);
            $table->boolean('tiene_wifi')->default(false);
            $table->boolean('acepta_mascotas')->default(false);
            $table->json('cobertura_zonas')->nullable();
            $table->string('licencia_numero')->nullable();
            $table->string('profile_photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('transportistas');
    }
};
