<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Paquete;
use App\Models\Anuncio;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Llamada para mostrar los paquetes via fetch
Route::get('/paquetes', function () {
    $paquetes = Paquete::with('detalles')->orderBy('id_paquete','desc')->get();
    return response()->json($paquetes);
});

// Ruta para modal de un solo paquete
Route::get('/paquetes/{id}', function ($id) {
    $paquete = \App\Models\Paquete::with('detalles')->findOrFail($id);
    return response()->json([
        'id' => $paquete->id_paquete,
        'nombre' => $paquete->titulo,
        'descripcion' => $paquete->descripcion,
        'detalles' => $paquete->detalles->pluck('texto'), // solo texto
        'precio' => $paquete->precio
    ]);
});

Route::post('/paquetes/nuevo', [HomeController::class, 'store'])->name('home');
Route::put('/paquetes/{id}', [HomeController::class, 'update']);
Route::delete('/paquetes/{id}', [HomeController::class, 'destroy']);

// Llamada para mostrar los anuncios via fetch
Route::get('/anuncios', function () {
    $anuncios = Anuncio::with('paquete.detalles')
        ->where('visible', true)
        ->orderBy('orden')
        ->get();
    return response()->json($anuncios);
});