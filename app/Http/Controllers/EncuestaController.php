<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Encuesta;

class EncuestaController extends Controller
{
    public function menu()
    {
        return view('encuestas.menu');
    }

    public function comenzarEncuestasCentroDeInformacion()
    {
        $encuestas = Encuesta::where('departamento_id', 1)->get();
        return view('encuestas.centro_informacion', compact('encuestas'));
    }

    public function completarEncuesta()
    {
        return view('alumno.fin_encuestas')->with('success', '¡Encuesta enviada correctamente!');
    }
}