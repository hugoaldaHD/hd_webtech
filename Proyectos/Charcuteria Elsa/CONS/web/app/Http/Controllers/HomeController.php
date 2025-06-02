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
        try {
            $paquete = Paquete::findOrFail($id);
        
            $data = $request->validate([
                'titulo' => 'required|string|max:255',
                'precio' => 'required|numeric',
                'descripcion' => 'required|string',
                'detalles' => 'nullable|array',
                'detalles.*.texto' => 'required|string|max:255',
            ]);
        
            $paquete->titulo = $data['titulo'];
            $paquete->precio = $data['precio'];
            $paquete->descripcion = $data['descripcion'];
        
            $paquete->save();
        
            // Actualizar detalles
            $paquete->detalles()->delete();
            if (!empty($data['detalles'])) {
                foreach ($data['detalles'] as $detalle) {
                    $paquete->detalles()->create([
                        'texto' => $detalle['texto']
                    ]);
                }
            }
        
            return response()->json(['message' => 'Paquete actualizado']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }


    public function destroy($id)
    {
        $paquete = Paquete::find($id);

        if (!$paquete) {
            return response()->json(['mensaje' => 'Paquete no encontrado'], 404);
        }

        // Eliminar detalles relacionados si la relación existe
        if (method_exists($paquete, 'detalles')) {
            $paquete->detalles()->delete();
        }

        $paquete->delete();

        return response()->json(['mensaje' => 'Paquete y sus detalles eliminados correctamente']);
    }

}