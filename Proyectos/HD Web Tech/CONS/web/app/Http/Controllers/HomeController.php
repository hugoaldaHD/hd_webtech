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

    public function update(Request $request, $id)
    {
        $paquete = Paquete::find($id);
        if (!$paquete) {
            return response()->json(['message' => 'Paquete no encontrado'], 404);
        }

        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'precio' => 'required|numeric',
            'detalles' => 'array',
            'detalles.*' => 'string|max:255',
        ]);

        $paquete->nombre = $data['nombre'];
        $paquete->precio = $data['precio'];

        // Aquí guardas detalles, depende cómo tengas la relación (asumo campo JSON)
        $paquete->detalles = $data['detalles'] ?? [];
        
        $paquete->save();

        return response()->json(['message' => 'Paquete actualizado']);
    }

    public function destroy($id)
    {
        $paquete = Paquete::find($id);
        if (!$paquete) {
            return response()->json(['message' => 'Paquete no encontrado'], 404);
        }

        $paquete->delete();

        return response()->json(['message' => 'Paquete eliminado']);
    }
}