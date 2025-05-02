<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DetallesPaqueteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('detalles_paquete')->insert([
            // Landing Básica
            ['id_paquete' => 1, 'texto' => '1 sola página (Inicio + Contacto)', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 1, 'texto' => 'Responsive (móviles)', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 1, 'texto' => 'WhatsApp integrado', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 1, 'texto' => 'Formulario de contacto', 'created_at' => now(), 'updated_at' => now()],
            // Web Estándar
            ['id_paquete' => 2, 'texto' => 'Hasta 5 páginas (Inicio, Nosotros, Servicios, Contacto...)', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 2, 'texto' => 'Diseño personalizado', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 2, 'texto' => 'Integración con redes sociales', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 2, 'texto' => 'Formularios y mapas', 'created_at' => now(), 'updated_at' => now()],
            // Catálogo Online
            ['id_paquete' => 3, 'texto' => 'Galería de productos/servicios', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 3, 'texto' => 'Filtros o categorías básicas', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 3, 'texto' => 'Optimización básica para Google', 'created_at' => now(), 'updated_at' => now()],
            // Landing Plus
            ['id_paquete' => 4, 'texto' => 'Incluye diseño extendido', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 4, 'texto' => '1 página más: testimonio o galería', 'created_at' => now(), 'updated_at' => now()],
            // Tienda Online
            ['id_paquete' => 5, 'texto' => 'Catálogo con productos', 'created_at' => now(), 'updated_at' => now()],
            ['id_paquete' => 5, 'texto' => 'Carrito y compra vía WhatsApp', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
}