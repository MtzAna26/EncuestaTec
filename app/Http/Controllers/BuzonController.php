<?php

namespace App\Http\Controllers;

use App\Models\Buzon;

use Illuminate\Http\Request;

class BuzonController extends Controller
{
    public function quejas()
    {
        return view('alumno.buzonquejas');
    }

    public function create(Request $request)
    {
        $request->validate([
            'carrera' => 'required',
            'tipo_comentario' => 'required',
            'departamento' => 'required',
            'contacto' => 'required|email',
            'mensaje' => 'required',
        ]);

        $queja = new Buzon();
        $queja->carrera = $request->carrera;
        $queja->tipo_comentario = $request->tipo_comentario;
        $queja->departamento = $request->departamento;
        $queja->contacto = $request->contacto;
        $queja->mensaje = $request->mensaje;
        $queja->user_id = 1;
        $queja->save();

        return redirect()->back()->with('success', 'Tu queja ha sido enviada correctamente');
    }
}
