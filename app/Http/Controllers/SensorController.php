<?php

namespace App\Http\Controllers;

use App\Models\Sensor;
use App\Models\Bomba;
use Illuminate\Http\Request;

class SensorController extends Controller
{
    public function index()
    {
        $sensores = Sensor::with('bomba')->get();
        return view('sensores.index', compact('sensores'));
    }

    public function create()
    {
        $bombas = Bomba::all(); // Obtener todas las bombas para asignar al sensor
        return view('sensores.create', compact('bombas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'nivel_agua' => 'required|numeric',
            'bomba_id' => 'required|exists:bombas,id',
        ]);

        Sensor::create($request->all());

        return redirect()->route('sensores.index')->with('success', 'Sensor creado exitosamente.');
    }
}

