<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Models\Paquete;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Llamada para mostrar los paquetes via fetch
Route::get('/paquetes', function () {
    return Paquete::with('detalles')->get();
});