<?php

namespace App\Http\Controllers;

use App\Models\Evento;

class EventoController extends Controller
{
    /**
     * Muestra todos los eventos registrados.
     */
    public function index()
    {
        $eventos = Evento::with('sensor', 'bomba')->get();
        return response()->json($eventos);
    }
}

