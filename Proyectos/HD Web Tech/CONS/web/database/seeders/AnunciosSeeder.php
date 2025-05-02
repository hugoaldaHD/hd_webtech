<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnunciosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('anuncios')->insert([
            ['id_paquete' => 1, 'imagen_url' => null, 'orden' => 0, 'visible' => true, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 2, 'imagen_url' => null, 'orden' => 1, 'visible' => true, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 3, 'imagen_url' => null, 'orden' => 2, 'visible' => true, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}