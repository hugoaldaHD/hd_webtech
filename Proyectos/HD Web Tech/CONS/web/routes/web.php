<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Paquete;
use App\Models\Anuncio;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Llamada para mostrar los paquetes via fetch
Route::get('/paquetes', function () {
    $paquetes = Paquete::with('detalles')->get();
    return response()->json($paquetes);
});

// Llamada para mostrar los anuncios via fetch
Route::get('/anuncios', function () {
    $anuncios = Anuncio::with('paquete.detalles')
        ->where('visible', true)
        ->orderBy('orden')
        ->get();
    return response()->json($anuncios);
});