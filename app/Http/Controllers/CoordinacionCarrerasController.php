<?php

namespace App\Http\Controllers;

use App\Models\CoordinacionCarreras;
use App\Models\Periodo;
use App\Models\Alumno;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CoordinacionCarrerasController extends Controller
{
    public function mostrarFormulario()
    {
        $periodos = Periodo::all();
        return view('encuestas.coordinacion_carreras', compact('periodos'));
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
            'comentario' => 'required|string',
        ]);
    
        // Crear una nueva evaluación
        $periodos = Periodo::all();
        $alumnos = Alumno::all();
        
        foreach ($alumnos as $alumno) {
            foreach ($periodos as $periodo) {
                $evaluacion = new CoordinacionCarreras();
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
        return redirect()->route('encuestas.recursos_financieros')->with('success', '¡Encuesta enviada correctamente!');
    }
    
    
    

    public function mostrarFormularioGrafica()
    {
        if (!Session::has('periodoActual')) {
            $periodoActual = $this->obtenerPeriodoActual();
            Session::put('periodoActual', $periodoActual);
        } else {
            $periodoActual = Session::get('periodoActual');
        }

        return view('encuestas.grafica_coordinacion_carreras', compact('periodoActual'));
    }

    public function mostrarPeriodos()
    {
        $periodos = Periodo::distinct()->get(['nombre', 'fecha_inicio', 'fecha_fin']);
        return view('encuestas.coordinacion_carreras_periodos', ['periodos' => $periodos]);
    }

    public function obtenerPeriodoActual()
    {
        if (Session::has('periodoActual')) {
            return Session::get('periodoActual');
        }

        return DB::table('periodos')
            ->whereDate('fecha_inicio', '<=', now())
            ->whereDate('fecha_fin', '>=', now())
            ->first();
    }
}
