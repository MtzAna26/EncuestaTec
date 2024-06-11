<?php

namespace App\Http\Controllers;

use App\Models\ServiciosEscolares;
use App\Models\Alumno;
use App\Models\User;
use App\Models\Periodo;
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
            'comentario' => 'required|string',
        ]);

        $alumnos = Alumno::all();
        $periodos = Periodo::all();
        foreach ($alumnos as $alumno) {
            foreach ($periodos as $periodo) {
                $evaluacion = new ServiciosEscolares();
                $evaluacion->fill($request->all());
                $evaluacion->alumno_id = $alumno->id;
                $evaluacion->no_control = $alumno->no_control;
                $evaluacion->carrera = $alumno->carrera;
                $evaluacion->periodo_id = $periodo->id; 
                $evaluacion->calcularPromedioFinal();
            }
        }
        $evaluacion->save();
        return redirect()->route('encuestas.talleres_laboratorios')->with('success', '¡Encuesta enviada correctamente!');
    }

        //Para el admin
        public function mostrarFormularioGrafica(Request $request)
        {
            $periodo_id = $request->input('periodo_id');
            $periodo = Periodo::findOrFail($periodo_id);
            return view('graficas.grafica_servicios_escolares', compact('periodo'));
        }
        
    
        public function obtenerRespuestas()
        {
            $respuestas = ServiciosEscolares::all();
            if ($respuestas->isNotEmpty()) {
                return response()->json($respuestas);
            } else {
                return response()->json(['error' => 'No se encontraron respuestas'], 404);
            }
        }

        public function mostrarPeriodos()
        {
            $periodos = Periodo::all();
            return view('periodos.periodos_servicios_escolares', compact('periodos'));
        }
}
