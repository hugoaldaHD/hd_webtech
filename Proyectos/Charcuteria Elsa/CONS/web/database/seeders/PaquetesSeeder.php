<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncios;
use App\Models\Paquetes;
use App\Models\DetallesPaquetes;

class PaquetesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('paquetes')->insert([
            ['id_paquete' => 1, 'titulo' => 'Butifarra', 'descripcion' => 'Butifarra de cerdo casera.', 'precio' => 4.00, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 2, 'titulo' => 'Pechuga de pollo', 'descripcion' => 'Pechuga de pollo casera.', 'precio' => 5.00, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 3, 'titulo' => 'Chorizo', 'descripcion' => 'Chorizo casero.', 'precio' => 6.00, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 4, 'titulo' => 'Queso', 'descripcion' => 'Queso de cabra casero.', 'precio' => 7.00, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 5, 'titulo' => 'Paté', 'descripcion' => 'Paté de pato casero.', 'precio' => 8.00, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}