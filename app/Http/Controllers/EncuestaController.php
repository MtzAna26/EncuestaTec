<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuesta; // Importar el modelo Encuesta

class EncuestaController extends Controller
{
    public function menu()
    {
        return view('encuestas.menu');
    }

    public function comenzarEncuestasCentroDeInformacion()
    {
        // Lógica para obtener las encuestas asociadas al departamento "CENTRO DE INFORMACIÓN"
        $encuestas = Encuesta::where('departamento_id', 1)->get();

        
        // Devolver la vista de las encuestas
        return view('encuestas.centro_informacion', compact('encuestas'));
    }
}
