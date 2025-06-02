<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallesPaquetesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detalles_paquete')->insert([
            // Butifarra
            ['id_paquete' => 1, 'texto' => '200 gramos', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 1, 'texto' => 'Con cebolla', 'created_at' => now(), 'updated_at' => now()],

            // Pechuga de pollo
            ['id_paquete' => 2, 'texto' => '8 unidades por paquete', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 2, 'texto' => '400 gramos', 'created_at' => now(), 'updated_at' => now()],

            // Chorizo
            ['id_paquete' => 3, 'texto' => '500 gramos', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 3, 'texto' => 'Lleva picante', 'created_at' => now(), 'updated_at' => now()],

            // Queso
            ['id_paquete' => 4, 'texto' => '200 gramos', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 4, 'texto' => 'Queso de cuña', 'created_at' => now(), 'updated_at' => now()],

            // Paté
            ['id_paquete' => 5, 'texto' => '100 gramos', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 5, 'texto' => 'Para untar', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}