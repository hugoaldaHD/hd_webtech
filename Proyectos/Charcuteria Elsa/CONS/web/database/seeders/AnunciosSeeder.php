<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnunciosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('anuncios')->insert([
            ['id_paquete' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 3, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}