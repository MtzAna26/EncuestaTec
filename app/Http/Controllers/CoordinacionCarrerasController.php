<?php

namespace App\Http\Controllers;

use App\Models\CoordinacionCarreras;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Periodo;
use App\Models\Alumno;
use Illuminate\Http\Request;

class CoordinacionCarrerasController extends Controller
{
    public function mostrarFormulario()
    {
        $periodos = Periodo::all();
        return view('encuestas.coordinacion_carreras');
    }

    public function guardarRespuestas(Request $request)
    {
        // Validación de los datos del formulario
        $validatedData = $request->validate([
            'no_control' => 'required|unique:alumnos,no_control',
            'carrera' => 'required|unique:alumnos,carrera',
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
        $alumnos = Alumno::all();
        
        if ($request->has('periodos')) {
            foreach ($alumnos as $alumno) {
                foreach ($request->periodos as $periodo_id) {
                    $evaluacion = new CoordinacionCarreras();
                    $evaluacion->fill($request->all());
                    $evaluacion->alumno_id = $alumno->id;
                    $evaluacion->no_control = $alumno->no_control;
                    $evaluacion->carrera = $alumno->carrera;
                    $evaluacion->periodo_id = $periodo_id;  
                    $evaluacion->calcularPromedioFinal();
                    $evaluacion->save(); // Mueve el save() dentro del bucle para que se guarde cada evaluación
                }
            }
        } else {
            return back()->withErrors(['periodos' => 'Debe seleccionar al menos un periodo.']);
        }

        return redirect()->route('encuestas.recursos_financieros')->with('success', '¡Encuesta enviada correctamente!');
    }
        // Admin pueda ver gráficas

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
        $periodos = Periodo::all();
        return view('encuestas.coordinacion_carreras_periodos', compact('periodos'));
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