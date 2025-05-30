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

    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string',
            'precio' => 'required|numeric',
            'detalles' => 'nullable|array',
            'detalles.*.texto' => 'required|string|max:255',
        ]);
    
        $paquete = Paquete::create([
            'titulo' => $validated['titulo'],
            'descripcion' => $validated['descripcion'],
            'precio' => $validated['precio']
        ]);
    
        // Guardar detalles si los hay
        if (!empty($validated['detalles'])) {
            foreach ($validated['detalles'] as $detalleData) {
                $paquete->detalles()->create([
                    'texto' => $detalleData['texto']
                ]);
            }
        }
    
        // Devolver con detalles cargados
        return response()->json($paquete->load('detalles'), 201);
    }
}