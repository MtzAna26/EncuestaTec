<?php

namespace App\Http\Controllers;

use App\Models\ServiciosEscolares;
use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;

class ServiciosEscolaresController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.servicios_escolares');
    }

    public function guardarRespuestas(Request $request)
    {
        $request->validate([
            'no_control' => 'unique:alumnos',
            'carrera' => 'unique:alumnos',
            'Serpregunta_1' => 'required',
            'Serpregunta_2' => 'required',
            'Serpregunta_3' => 'required',
            'Serpregunta_4' => 'required',
        ]);

        $alumnos = Alumno::all();
        
        foreach ($alumnos as $alumno) {
            $evaluacion = new ServiciosEscolares();
            $evaluacion->fill($request->all());
            $evaluacion->alumno_id = $alumno->id;
            $evaluacion->no_control = $alumno->no_control;
            $evaluacion->carrera = $alumno->carrera;
            
        }
        $evaluacion->save();
        return redirect()->route('encuestas.becas')->with('success', '¡Encuesta enviada correctamente!');
    }
}
