<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
            $table->string('nombre')->nullable();
            $table->string('correo')->nullable()->unique();
            $table->string('password')->nullable();
            $table->string('telefono', 20)->nullable();
            $table->unsignedBigInteger('id_rol');
            $table->timestamps();

            $table->foreign('id_rol')->references('id_rol')->on('roles');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};