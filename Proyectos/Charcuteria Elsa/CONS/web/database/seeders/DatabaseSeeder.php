<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            PaquetesSeeder::class,
            DetallesPaquetesSeeder::class,
            AnunciosSeeder::class,
            RolesSeeder::class,
            UsersSeeder::class,
            TiposSeeder::class,
            TiposPaquetesSeeder::class
        ]);
    }
}