<?php

namespace App\Http\Controllers;

use App\Models\Anuncio;
use App\Models\Paquete;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $anuncios = Anuncio::where('visible', true)->orderBy('orden')->get();
        $paquetes = Paquete::with('detalles')->get();

        return view('home', compact('anuncios', 'paquetes'));
    }
}