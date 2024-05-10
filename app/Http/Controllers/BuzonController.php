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
        //dd($request->all()); 
        $request->validate([
            'carrera' => 'required',
            'tipo_comentario' => 'required',
            'departamento' => 'required',
            'contacto' => ['required', 'regex:/^([0-9\s\-\+\(\)]*)?$|^[\w\.-]+@[\w\.-]+\.\w{2,4}$/'],

            'mensaje' => 'required',
        ]);
        
        $queja = new Buzon();
        $queja->carrera = $request->carrera;
        $queja->tipo_comentario = $request->tipo_comentario;
        $queja->departamento = $request->departamento;
        $queja->contacto = $request->contacto;
        $queja->mensaje = $request->mensaje;

        $queja->save();
        if ($queja->exists) {
            return redirect()->back()->with('success', 'Tu queja ha sido enviada correctamente');
        } else {
            return redirect()->back()->with('error', 'Hubo un problema al enviar tu queja');
        }
        
    }
    

    // Para el admin
    public function verQuejas()
    {
        $quejas = Buzon::all();
        return view('administrador.quejas', compact('quejas'));
    }
}
