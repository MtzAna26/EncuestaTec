<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServicioSocialController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.servicio_social');
    }

}
