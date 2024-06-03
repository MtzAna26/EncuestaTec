<?php

namespace App\Http\Controllers;

use App\Models\CoordinacionCarreras;
use App\Models\User;
use App\Models\Periodo;
use App\Models\Alumno;
use Illuminate\Http\Request;

class CoordinacionCarrerasController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.coordinacion_carreras');
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
    
        // Admin pueda ver gráficas

        public function mostrarFormularioGrafica()
        {
            return view('encuestas.grafica_coordinacion_carreras');
        }
}
