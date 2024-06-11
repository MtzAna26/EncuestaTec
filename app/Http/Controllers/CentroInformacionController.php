<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\CentroInformacion;
use App\Models\User;
use App\Models\Periodo;
use App\Models\Departamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CentroInformacionController extends Controller
{

    public function mostrarFormulario(Alumno $alumno)
    {
        // Obtener el periodo actual
        $periodoActual = Periodo::where('fecha_inicio', '<=', now())
            ->where('fecha_fin', '>=', now())
            ->first();
    
        // Obtener los periodos disponibles
        $periodos = Periodo::all();
    
        // Pasar los periodos, el alumno y el periodo actual a la vista
        return view('encuestas.centro_informacion', [
            'alumno' => $alumno,
            'periodos' => $periodos,
            'periodoActual' => $periodoActual,
        ]);
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
        $periodo = Periodo::where('fecha_inicio', '<=', now())
        ->where('fecha_fin', '>=', now())
        ->first();
    
        $alumnos = Alumno::all();
    
    // Iterar sobre los alumnos y guardar las respuestas para el periodo actual
    foreach ($alumnos as $alumno) {
        $evaluacion = new CentroInformacion();
        $evaluacion->fill($request->all());
        $evaluacion->alumno_id = $alumno->id;
        $evaluacion->no_control = $alumno->no_control;
        $evaluacion->carrera = $alumno->carrera;
        $evaluacion->periodo_id = $periodo->id; 
        $evaluacion->calcularPromedioFinal();
        
    }
    $evaluacion->save();
    return redirect()->route('encuestas.coordinacion_carreras')->with('success', '¡Encuesta enviada correctamente!');
    }

    //Para el admin
    public function mostrarFormularioGrafica()
    {
        // Obtener el período actual basado en la fecha actual
        $fechaActual = now();
        $periodoActual = Periodo::where('fecha_inicio', '<=', $fechaActual)
                                ->where('fecha_fin', '>=', $fechaActual)
                                ->orderBy('fecha_inicio', 'DESC')
                                ->first();
        
        return view('encuestas.grafica_centro_informacion', [
            'periodoActual' => $periodoActual,
        ]);
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


    public function verPeriodos()
    {
        $periodos = Periodo::distinct()->get(['nombre', 'fecha_inicio', 'fecha_fin']);
        return view('encuestas.periodos', ['periodos' => $periodos]);
    }

    public function obtenerDatosGraficaPeriodo($periodoId)
    {
        // Obtener los datos necesarios para la gráfica del período dado
        $datosGrafica = DB::table('centros_informacion')
                        ->where('periodo_id', $periodoId)
                        ->select(DB::raw('AVG(promedio_final) as promedio'), DB::raw('COUNT(*) as cantidad_alumnos'))
                        ->first();
    
        if (!$datosGrafica) {
            return response()->json(['error' => 'No hay datos disponibles para este período.'], 404);
        }
    
        // Devolver los datos en formato JSON
        return response()->json($datosGrafica);
    }

}