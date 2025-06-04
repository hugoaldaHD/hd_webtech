<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Usuario;

class TiposPaquetesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tipos_paquete')->insert([
            [
                'id_tipos' => 1,
                'id_paquete' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_tipos' => 1,
                'id_paquete' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_tipos' => 1,
                'id_paquete' => 3,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_tipos' => 3,
                'id_paquete' => 4,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_tipos' => 1,
                'id_paquete' => 5,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}