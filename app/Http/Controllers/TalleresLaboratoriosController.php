<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Periodo;
use App\Models\Alumno;
use App\Models\TalleresLaboratorios;

class TalleresLaboratoriosController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.talleres_laboratorios');
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
            'Serpregunta_5' => 'required',
        ]);

        $alumnos = Alumno::all();
        $periodos = Periodo::all();
        foreach ($alumnos as $alumno) {
            foreach ($periodos as $periodo) {
                $evaluacion = new TalleresLaboratorios();
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
        return redirect()->route('encuestas.becas')->with('success', '¡Encuesta enviada correctamente!');
    }

    public function omitirEncuesta(Request $request)
    {
        return redirect()->route('encuestas.becas')->with('success', '¡Encuesta omitida correctamente!');
    }
    
    //Para el admin
    public function mostrarGrafica($periodo_id)
    {
        $periodo = Periodo::find($periodo_id);
        $datosGrafica = $this->obtenerDatosGrafica($periodo_id);
        return view('graficas.grafica_talleres_laboratorios', compact('periodo', 'datosGrafica'));
    }
    

        public function mostrarPeriodos()
        {
            $periodos = Periodo::select('nombre', 'fecha_inicio', 'fecha_fin', DB::raw('MIN(id) as id'))
                            ->groupBy('nombre', 'fecha_inicio', 'fecha_fin')
                            ->distinct()
                            ->get();
            return view('periodos.talleres_laboratorio', compact('periodos'));
        }

        private function obtenerDatosGrafica($periodo_id)
        {
            $becas =TalleresLaboratorios::where('periodo_id', $periodo_id)->get();
            $datosGrafica = [];
            return $datosGrafica;
        }
}
