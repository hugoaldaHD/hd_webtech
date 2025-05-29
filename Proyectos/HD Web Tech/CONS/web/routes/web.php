<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Paquete;
use App\Models\Anuncio;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Llamada para mostrar los paquetes via fetch
Route::get('/paquetes', function () {
    return Paquete::with('detalles')->get();
});

// Llamada para mostrar los anuncios via fetch
Route::get('/anuncios', function () {
    return Anuncio::with('paquete.detalles')
        ->where('visible', true)
        ->orderBy('orden')
        ->get();
});