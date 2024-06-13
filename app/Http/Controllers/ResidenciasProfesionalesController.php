<?php

namespace App\Http\Controllers;

use App\Models\ResidenciasProfesionales;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Periodo;
use App\Models\Alumno;
use Illuminate\Http\Request;

class ResidenciasProfesionalesController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.residencias_profesionales');
    }

    public function guardarRespuestas(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'no_control' => 'unique:alumnos',
            'carrera' => 'unique:alumnos',
            'Serpregunta_1' => 'required|integer',
            'Serpregunta_2' => 'required|integer',
            'Serpregunta_3' => 'required|integer',
            'Serpregunta_4' => 'required|integer',
            'Serpregunta_5' => 'required|integer',
            'Serpregunta_6' => 'required|integer',
            'Serpregunta_7' => 'required|integer',
            'Serpregunta_8' => 'required|integer',
            'Serpregunta_9' => 'required|integer',
            'comentario' => 'required|string',
        ]);
    
        // Crear una nueva evaluación
        $periodos = Periodo::all();
        $alumnos = Alumno::all();
        
        foreach ($alumnos as $alumno) { 
            foreach ($periodos as $periodo) {
                $evaluacion = new ResidenciasProfesionales();
                $evaluacion->fill($request->all());
                $evaluacion->alumno_id = $alumno->id;
                $evaluacion->no_control = $alumno->no_control;
                $evaluacion->carrera = $alumno->carrera;
                $evaluacion->periodo_id = $periodo->id;  
                $evaluacion->calcularPromedioFinal();
            }
        }
        $evaluacion->save();
        $evaluacion->fill($validatedData);
        return redirect()->route('alumno.fin_encuestas')->with('success', '¡Encuesta enviada correctamente!');
    }

    // Para el Admin 

    public function mostrarFormularioGrafica($periodoId)
    {
        $periodoActual = Periodo::findOrFail($periodoId);
        return view('graficas.grafica_residencias_profesionales', compact('periodoActual'));
    }

    
    // Otra alternativa para poder gráficar
    public function getChartData()
    {
        $data = ResidenciasProfesionales::select(
            'Serpregunta_1',
            'Serpregunta_2',
            'Serpregunta_3',
            'Serpregunta_4',
            'Serpregunta_5',
            'Serpregunta_6',
            'Serpregunta_7',
            'Serpregunta_8',
            'Serpregunta_9'
        )->get();
    
        return response()->json($data);
    }
    
    public function mostrarPeriodosResidencias()
    {
        $periodos = Periodo::select('nombre', 'fecha_inicio', 'fecha_fin', DB::raw('MIN(id) as id'))
        ->groupBy('nombre', 'fecha_inicio', 'fecha_fin')
        ->distinct()
        ->get();
        return view('periodos.residencias_profesionales_periodos', compact('periodos'));
    }

}

