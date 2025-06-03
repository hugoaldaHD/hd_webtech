<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            [
                'id_usuario' => 1,
                'nombre' => 'Elsa',
                'correo' => null,
                'password' => 'QWEqew123@',
                'telefono' => null,
                'id_rol' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}