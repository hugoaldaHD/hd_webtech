<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class TiposSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipos')->insert([
            [
                'nombre_tipo' => 'Carne',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipo' => 'Pescado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipo' => 'Lacteo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipo' => 'Cereal',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipo' => 'Verdura',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipo' => 'Fruta',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}