<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BecasController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.becas');
    }

}
