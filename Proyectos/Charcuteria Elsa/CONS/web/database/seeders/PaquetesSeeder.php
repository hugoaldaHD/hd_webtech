<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Anuncio;
use App\Models\Paquetes;
use App\Models\DetallesPaquetes;

class PaquetesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('paquetes')->insert([
            ['titulo' => 'Butifarra', 'descripcion' => 'Butifarra de cerdo casera.', 'precio' => 4.00, 'created_at' => now(), 'updated_at' => now()],
            ['titulo' => 'Pechuga de pollo', 'descripcion' => 'Pechuga de pollo casera.', 'precio' => 5.00, 'created_at' => now(), 'updated_at' => now()],
            ['titulo' => 'Chorizo', 'descripcion' => 'Chorizo casero.', 'precio' => 6.00, 'created_at' => now(), 'updated_at' => now()],
            ['titulo' => 'Queso', 'descripcion' => 'Queso de cabra casero.', 'precio' => 7.00, 'created_at' => now(), 'updated_at' => now()],
            ['titulo' => 'Paté', 'descripcion' => 'Paté de pato casero.', 'precio' => 8.00, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}