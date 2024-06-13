<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Support\Facades\DB;
use App\Models\Becas;
use App\Models\User;
use App\Models\Periodo;
use Illuminate\Http\Request;

class BecasController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.becas');
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
            'comentario' => 'required',
        ]);

        $alumnos = Alumno::all();
        $periodos = Periodo::all();
        foreach ($alumnos as $alumno) {
            foreach ($periodos as $periodo) {
                $evaluacion = new Becas();
                $evaluacion->fill($request->all());
                $evaluacion->alumno_id = $alumno->id;
                $evaluacion->no_control = $alumno->no_control;
                $evaluacion->carrera = $alumno->carrera;
                $evaluacion->periodo_id = $periodo->id;  
                $evaluacion->calcularPromedioFinal();
            }
        }
        $evaluacion->save();
        return redirect()->route('encuestas.cafeteria')->with('success', '¡Encuesta enviada correctamente!');
    }

    // Para el admin
    public function mostrarFormularioGrafica($periodo_id)
    {
        $periodo = Periodo::find($periodo_id);
        $datosGrafica = $this->obtenerDatosGrafica($periodo_id);
        return view('graficas.grafica_becas', compact('periodo', 'datosGrafica'));
    }

    // Para mostrar todos los periodos

    public function mostrarPeriodos()
    {
        $periodos = Periodo::select('nombre', 'fecha_inicio', 'fecha_fin', DB::raw('MIN(id) as id'))
                            ->groupBy('nombre', 'fecha_inicio', 'fecha_fin')
                            ->distinct()
                            ->get();
        return view('periodos.becas', compact('periodos'));
    }
    
    private function obtenerDatosGrafica($periodo_id)
    {
        $becas = Becas::where('periodo_id', $periodo_id)->get();
        $datosGrafica = [];
        return $datosGrafica;
    }
    
}
