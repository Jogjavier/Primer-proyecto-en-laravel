<?php

namespace App\Http\Controllers;

use App\Models\Bomba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class BombaController extends Controller
{
    public function index()
    {
        $bombas = Bomba::all();
        return view('bombas.index', compact('bombas'));
    }

    public function create()
    {
        return view('bombas.create');
    }
    

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'estado' => 'required|boolean',
            'imagen' => 'nullable|image|max:2048',
        ]);
    
        $data = $request->only(['nombre', 'estado']);
    
        if ($request->hasFile('imagen')) {
            $data['imagen'] = $request->file('imagen')->store('imagenes_bombas', 'public');
        }
    
        Bomba::create($data);
    
        return redirect()->route('bombas.index')->with('success', 'Bomba creada exitosamente.');
    
    }
    public function destroy(string $id)
    {
        try {
            // Buscar la bomba
            $bomba = Bomba::findOrFail($id);

            // Obtener la ruta del archivo de la imagen
            $file_path = $bomba->imagen;

            // Eliminar la bomba de la base de datos
            if ($bomba->delete()) {
                // Verificar si la imagen existe físicamente y eliminarla
                if ($file_path && Storage::disk('public')->exists($file_path)) {
                    Storage::disk('public')->delete($file_path);
                }

                // Redirigir con mensaje de éxito
                return redirect()->route('bombas.index')
                    ->with('success', 'Bomba e imagen eliminadas correctamente.');
            }

            // Redirigir si no se pudo eliminar
            return redirect()->route('bombas.index')
                ->with('error', 'No se pudo eliminar la bomba.');
        } catch (\Exception $e) {
            // Registrar el error en los logs
            Log::error('Error al eliminar la bomba: '.$e->getMessage());

            // Redirigir con mensaje de error
            return redirect()->route('bombas.index')
                ->with('error', 'Ocurrió un error al intentar eliminar la bomba.');
        }
    }

    public function edit($id)
    {
    $bomba = Bomba::findOrFail($id);
    return view('bombas.edit', compact('bomba'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'estado' => 'required|boolean',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $bomba = Bomba::findOrFail($id);

        
        $bomba->nombre = $request->nombre;
        $bomba->estado = $request->estado;

        
        if ($request->hasFile('imagen')) {
            if ($bomba->imagen && Storage::exists($bomba->imagen)) {
                Storage::delete($bomba->imagen);
            }
            $bomba->imagen = $request->file('imagen')->store('public/imagenes_bombas');
        }

        $bomba->save();

        return redirect()->route('bombas.index')->with('success', 'Bomba actualizada correctamente.');
    }

    public function generatePDF()
    {
        // Obtener todos los registros de bombas
        $bombas = Bomba::all();

        // Cargar la vista con los datos de las bombas
        $pdf = PDF::loadView('bombas.pdf', compact('bombas'));

        // Generar el PDF y devolverlo al navegador
        return $pdf->download('bombas.pdf');
    }

    public function search(Request $request)
{
    $query = $request->input('query');
    $bombas = Bomba::search($query)->get();

    return view('bombas.index', compact('bombas'));
}

}
