<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;
use App\Models\Paquetes;
use App\Models\DetallesPaquetes;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id_rol' => 1,
                'nombre' => 'Admin',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_rol' => 2,
                'nombre' => 'Cliente',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}