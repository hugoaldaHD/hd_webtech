<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaquetesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('paquetes')->insert([
            ['id_paquete' => 1, 'titulo' => 'Landing Básica', 'descripcion' => 'Sitio de una sola página ideal para presentar servicios rápidamente.', 'precio' => 150.00, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 2, 'titulo' => 'Web Estándar', 'descripcion' => 'Página completa para negocios con información general.', 'precio' => 300.00, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 3, 'titulo' => 'Catálogo Online', 'descripcion' => 'Web con galería de productos o servicios sin carrito.', 'precio' => 450.00, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 4, 'titulo' => 'Landing Plus', 'descripcion' => 'Una landing extendida con opciones adicionales de personalización.', 'precio' => 180.00, 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 5, 'titulo' => 'Tienda Online', 'descripcion' => 'Sitio con carrito y pasarela de pago básico.', 'precio' => 600.00, 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}