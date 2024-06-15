<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\ServicioSocial;
use App\Models\Alumno;
use App\Models\User;
use App\Models\Periodo;
use Illuminate\Http\Request;

class ServicioSocialController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.servicio_social');
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
            'Serpregunta_6' => 'required',
            'Serpregunta_7' => 'required',
            'Serpregunta_8' => 'required',
        ]);

        $alumnos = Alumno::all();
        $periodos = Periodo::all();

        foreach ($alumnos as $alumno) {
            foreach ($periodos as $periodo) {
                $evaluacion = new ServicioSocial();
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
        return redirect()->route('encuestas.servicios_escolares')->with('success', '¡Encuesta enviada correctamente!');
    }

    public function omitirEncuesta()
{
    return redirect()->route('encuestas.servicios_escolares');
}

    //Para el admin
    public function mostrarFormularioGrafica(Request $request)
    {
        $periodo_id = $request->input('periodo_id');
        $periodo = Periodo::find($periodo_id);
        return view('graficas.grafica_servicio_social', compact('periodo'));
    }


    public function obtenerRespuestas()
    {
        $respuestas = ServicioSocial::all();
        if ($respuestas->isNotEmpty()) {
            return response()->json($respuestas);
        } else {
            return response()->json(['error' => 'No se encontraron respuestas'], 404);
        }
    }

    public function mostrarPeriodos()
    {
        $periodos = Periodo::select('nombre', 'fecha_inicio', 'fecha_fin', DB::raw('MIN(id) as id'))
                            ->groupBy('nombre', 'fecha_inicio', 'fecha_fin')
                            ->distinct()
                            ->get();
        return view('periodos.servicio_social_periodos', compact('periodos'));
    }
    /*public function mostrarPeriodos()
    {
        $periodos = Periodo::all();
        return view('periodos.servicio_social_periodos', compact('periodos'));
    }*/

    public function mostrarGraficaPorPeriodo($periodo_id)
    {
        $periodo = Periodo::findOrFail($periodo_id);
        $data = $this->obtenerDatosGrafica($periodo_id);

        return view('graficas.grafica_servicio_social', compact('periodo', 'data'));
    }
    
    private function obtenerDatosGrafica($periodo_id)
    {
        $respuestas = ServicioSocial::where('periodo_id', $periodo_id)->get();
        return $respuestas;
    }
}
