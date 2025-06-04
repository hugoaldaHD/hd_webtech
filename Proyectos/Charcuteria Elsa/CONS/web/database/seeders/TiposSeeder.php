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
                'nombre_tipos' => 'Carne',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipos' => 'Pescado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipos' => 'Lacteo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipos' => 'Cereal',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipos' => 'Verdura',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre_tipos' => 'Fruta',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}