<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('guias', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellido');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('telefono')->nullable();
            $table->text('descripcion')->nullable();
            $table->string('numero_licencia')->nullable();
            $table->json('especialidades')->nullable();
            $table->json('idiomas')->nullable();
            $table->unsignedTinyInteger('experiencia_anios')->nullable();
            $table->decimal('precio_por_dia', 10, 2)->nullable();
            $table->decimal('precio_por_hora', 10, 2)->nullable();
            $table->boolean('disponible')->default(true);
            $table->string('profile_photo')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('guias');
    }
};
