<?php

namespace App\Http\Controllers;

use App\Models\CentroComputo;
use Illuminate\Support\Facades\DB;
use App\Models\Alumno;
use App\Models\Periodo;
use App\Models\User;
use Illuminate\Http\Request;

class CentroComputoController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.centro_computo');
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
                $evaluacion = new CentroComputo();
                $evaluacion->fill($request->all());
                $evaluacion->alumno_id = $alumno->id;
                $evaluacion->no_control = $alumno->no_control;
                $evaluacion->carrera = $alumno->carrera;
                $evaluacion->periodo_id = $periodo->id;  
                $evaluacion->calcularPromedioFinal();
            }
        }
        $evaluacion->save();
    
        return redirect()->route('encuestas.servicio_social')->with('success', '¡Encuesta enviada correctamente!');
    }

    // Para el admin 

    public function mostrarFormularioGrafica($periodo_id){
        $periodoActual = Periodo::findOrFail($periodo_id);
        return view('graficas.grafica_centro_computo', compact('periodoActual'));
    }
    
    public function mostrarPeriodos()
    {
        $periodos = Periodo::select('nombre', 'fecha_inicio', 'fecha_fin', DB::raw('MIN(id) as id'))
                            ->groupBy('nombre', 'fecha_inicio', 'fecha_fin')
                            ->distinct()
                            ->get();
        return view('periodos.centro_computo_periodos', compact('periodos'));
    }
}
