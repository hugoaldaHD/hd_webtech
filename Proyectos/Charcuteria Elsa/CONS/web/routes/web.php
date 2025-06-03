<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Models\Paquete;
use App\Models\Anuncio;

// Cliente

Route::get('/', [HomeController::class, 'novedades'])->name('novedades');
Route::get('/productos', [HomeController::class, 'productos'])->name('productos');
Route::get('/como-llegar', [HomeController::class, 'comoLlegar'])->name('como-llegar');

// Administrador

Route::get('/admin', [AdminController::class, 'index'])->name('admin');

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

Route::post('/paquetes/nuevo', [AdminController::class, 'store']);
Route::put('/paquetes/{id}', [AdminController::class, 'update']);
Route::delete('/paquetes/{id}', [AdminController::class, 'destroy']);

// Llamada para mostrar los anuncios via fetch
Route::get('/anuncios', [AdminController::class, 'getAnuncios']);