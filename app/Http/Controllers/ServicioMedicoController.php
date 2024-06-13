<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Support\Facades\DB;
use App\Models\ServicioMedico;
use App\Models\Periodo;
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
            'semestre' => 'unique:alumnos',
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
                $evaluacion = new ServicioMedico();
                $evaluacion->fill($request->all());
                $evaluacion->alumno_id = $alumno->id;
                $evaluacion->no_control = $alumno->no_control;
                $evaluacion->carrera = $alumno->carrera;
                $evaluacion->semestre = $alumno->semestre;
                $evaluacion->periodo_id = $periodo->id;
                $evaluacion->calcularPromedioFinal();
            }
        }
        $evaluacion->save();
        return redirect()->route('encuestas.actividades_culturales_deportivas')->with('success', '¡Encuesta enviada correctamente!');
    }

    //Para el admin
    public function mostrarFormularioGrafica(Request $request)
    {
        $periodo_id = $request->input('periodo_id');
        $periodo = Periodo::findOrFail($periodo_id);
        return view('graficas.grafica_servicio_medico', compact('periodo'));
    }


    // PARA MOSTRAR LOS PERIODOS

    public function mostrarPeriodos()
    {
        $periodos = Periodo::select('nombre', 'fecha_inicio', 'fecha_fin', DB::raw('MIN(id) as id'))
                            ->groupBy('nombre', 'fecha_inicio', 'fecha_fin')
                            ->distinct()
                            ->get();
        return view('periodos.periodos_servicio_medico', compact('periodos'));
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
