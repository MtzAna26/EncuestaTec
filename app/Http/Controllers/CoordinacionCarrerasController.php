<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoordinacionCarrerasController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.coordinacion_carreras');
    }
}
