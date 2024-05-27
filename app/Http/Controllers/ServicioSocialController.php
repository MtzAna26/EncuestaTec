<?php

namespace App\Http\Controllers;

use App\Models\ServicioSocial;
use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;

class ServicioSocialController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.servicio_social');
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
            'Serpregunta_5' => 'required',
            'Serpregunta_6' => 'required',
            'Serpregunta_7' => 'required',
            'Serpregunta_8' => 'required',
        ]);

        $alumnos = Alumno::all();
        
        foreach ($alumnos as $alumno) {
            $evaluacion = new ServicioSocial();
            $evaluacion->fill($request->all());
            $evaluacion->alumno_id = $alumno->id;
            $evaluacion->no_control = $alumno->no_control;
            $evaluacion->carrera = $alumno->carrera;
            
        }
        $evaluacion->save();
        return redirect()->route('encuestas.servicios_escolares')->with('success', '¡Encuesta enviada correctamente!');
    }

    //Para el admin
    public function mostrarFormularioGrafica()
    {
        return view('graficas.grafica_servicio_social');
    }
    

    public function obtenerRespuestas()
    {
        $respuestas = ServicioSocial::all();
        if ($respuestas->isNotEmpty()) {
            return response()->json($respuestas);
        } else {
            return response()->json(['error' => 'No se encontraron respuestas'], 404);
        }
    }

    
}
