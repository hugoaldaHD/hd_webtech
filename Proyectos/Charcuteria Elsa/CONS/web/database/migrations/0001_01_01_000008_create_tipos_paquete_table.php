<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tipos_paquete', function (Blueprint $table) {
            $table->id('id_tipos_paquete');
            $table->unsignedBigInteger('id_tipo')->nullable();
            $table->unsignedBigInteger('id_paquete')->nullable();
            $table->timestamps();

            $table->foreign('id_tipo')->references('id_tipo')->on('tipos')->onDelete('cascade');
            $table->foreign('id_paquete')->references('id_paquete')->on('paquetes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tipos_paquete');
    }
};