<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('hoteles', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->text('descripcion')->nullable();
            $table->unsignedTinyInteger('numero_estrellas')->default(3);
            $table->enum('tipo_hotel', ['hotel','hostal','boutique','resort','apart-hotel','bed_and_breakfast','motel'])->default('hotel');
            $table->string('sitio_web')->nullable();
            $table->time('check_in_hora')->nullable();
            $table->time('check_out_hora')->nullable();
            $table->unsignedSmallInteger('numero_habitaciones')->nullable();
            $table->decimal('precio_desde', 10, 2)->nullable();
            $table->boolean('tiene_piscina')->default(false);
            $table->boolean('tiene_spa')->default(false);
            $table->boolean('tiene_restaurante')->default(false);
            $table->boolean('tiene_wifi')->default(true);
            $table->boolean('tiene_gym')->default(false);
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
        Schema::dropIfExists('hoteles');
    }
};
