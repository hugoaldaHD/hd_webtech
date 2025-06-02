<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id('id_anuncio');
            $table->unsignedBigInteger('id_paquete');
            $table->string('imagen_url', 255)->nullable();
            $table->integer('orden')->default(0);
            $table->boolean('visible')->default(true);
            $table->timestamps();

            $table->foreign('id_paquete')->references('id_paquete')->on('paquetes');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};