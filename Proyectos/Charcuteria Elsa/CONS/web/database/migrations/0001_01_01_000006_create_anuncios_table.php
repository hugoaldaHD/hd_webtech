<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('anuncios', function (Blueprint $table) {
            $table->id('id_anuncio');
            $table->string('descripcion', 255)->nullable();
            $table->unsignedBigInteger('id_paquete');
            $table->timestamps();

            $table->foreign('id_paquete')->references('id_paquete')->on('paquetes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anuncios');
    }
};