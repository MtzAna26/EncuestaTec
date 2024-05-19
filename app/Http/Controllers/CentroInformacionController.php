<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\CentroInformacion;
use App\Models\User;
use Illuminate\Http\Request;

class CentroInformacionController extends Controller
{

    public function mostrarFormulario(Alumno $alumno)
    {
        return view('encuestas.centro_informacion', ['alumno' => $alumno]);
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
            'Estrucpregunta_1' => 'required',
            'Estrucpregunta_2' => 'required',
            'Estrucpregunta_3' => 'required',
            'Estrucpregunta_4' => 'required',
            'Estrucpregunta_5' => 'required',
            'Estrucpregunta_6' => 'required',
            'comentario' => 'required',
        ]);

        $alumnos = Alumno::all();
        
        foreach ($alumnos as $alumno) {
            $evaluacion = new CentroInformacion();
            $evaluacion->fill($request->all());
            $evaluacion->alumno_id = $alumno->id;
            $evaluacion->no_control = $alumno->no_control;
            $evaluacion->carrera = $alumno->carrera;
            
        }
        $evaluacion->save();
        return redirect()->route('encuestas.coordinacion_carreras')->with('success', '¡Encuesta enviada correctamente!');
    }


    //Para el admin
    public function mostrarFormularioGrafica()
    {
        return view('encuestas.grafica_centro_informacion');
    }
    

    public function obtenerRespuestas()
    {
        $respuestas = CentroInformacion::all();
        if ($respuestas->isNotEmpty()) {
            return response()->json($respuestas);
        } else {
            return response()->json(['error' => 'No se encontraron respuestas'], 404);
        }
    }

    
}
