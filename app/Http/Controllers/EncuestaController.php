<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function menu()
    {
        // Aquí puedes agregar lógica adicional antes de mostrar la vista del menú de encuestas
        return view('encuestas.menu');
    }
}
