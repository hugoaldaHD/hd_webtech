<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id_usuario(BIGINCREMENT);
            $table->nombre(STRING(20));
            $table->correo(STRING UNIQUE);
            $table->password(STRING);
            $table->telefono(STRING(20).nullable());
            $table->id_rol(UNSIGNEDBIGINTEGER);
            $table->timestamps();
            $table->foreign id_rol references id_rol on roles;
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};