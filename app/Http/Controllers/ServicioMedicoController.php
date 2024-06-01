<?php

namespace App\Http\Controllers;
use App\Models\Alumno;
use App\Models\ServicioMedico;
use App\Models\User;

use Illuminate\Http\Request;

class ServicioMedicoController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.servicio_medico');
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
            'comentario' => 'required|string',
        ]);

        $alumnos = Alumno::all();
        
        foreach ($alumnos as $alumno) {
            $evaluacion = new ServicioMedico();
            $evaluacion->fill($request->all());
            $evaluacion->alumno_id = $alumno->id;
            $evaluacion->no_control = $alumno->no_control;
            $evaluacion->carrera = $alumno->carrera;
            $evaluacion->calcularPromedioFinal();
        }
        $evaluacion->save();
        return redirect()->route('encuestas.actividades_culturales_deportivas')->with('success', '¡Encuesta enviada correctamente!');
    }

     //Para el admin
        public function mostrarFormularioGrafica()
        {
            return view('graficas.grafica_servicio_medico');
        }
        
    
        public function obtenerRespuestas()
        {
            $respuestas = ServicioMedico::all();
            if ($respuestas->isNotEmpty()) {
                return response()->json($respuestas);
            } else {
                return response()->json(['error' => 'No se encontraron respuestas'], 404);
            }
        }
}
