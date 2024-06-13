<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Periodo;
use Carbon\Carbon;
use App\Models\Alumno;
use App\Models\ActividadesCulturalesDeportivas;

class CulturalesDeportivasController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.actividades_culturales_deportivas');
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
            'comentario' => 'string',
        ]);

        $alumnos = Alumno::all();
        $periodos = Periodo::all();
        foreach ($alumnos as $alumno) {
            foreach ($periodos as $periodo) {
                $evaluacion = new ActividadesCulturalesDeportivas();
                $evaluacion->fill($request->all());
                $evaluacion->alumno_id = $alumno->id;
                $evaluacion->no_control = $alumno->no_control;
                $evaluacion->carrera = $alumno->carrera;
                $evaluacion->periodo_id = $periodo->id;  
                $evaluacion->calcularPromedioFinal();
            }
        }
        $evaluacion->save();
        return redirect()->route('alumno.fin_encuestas')->with('success', '¡Encuesta enviada correctamente!');
    }

    // Para el admin 
    public function obtenerPeriodoActual()
    {
        return Periodo::whereDate('fecha_inicio', '<=', Carbon::now())
            ->whereDate('fecha_fin', '>=', Carbon::now())
            ->first();
    }

public function mostrarFormularioGrafica()
    {
        $periodoActual = $this->obtenerPeriodoActual();
        return view('graficas.grafica_culturales_deportivas', compact('periodoActual'));
    }

    public function mostrarPeriodos()
    {
        $periodos = Periodo::select('nombre', 'fecha_inicio', 'fecha_fin', DB::raw('MIN(id) as id'))
                            ->groupBy('nombre', 'fecha_inicio', 'fecha_fin')
                            ->distinct()
                            ->get();
        return view('periodos.culturales_deportivas_periodos', compact('periodos'));
    }
}
