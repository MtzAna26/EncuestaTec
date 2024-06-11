<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Periodo;
use App\Models\User;
use App\Models\Cafeteria;

class CafeteriaController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.cafeteria');
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
            'comentario' => 'required',
        ]);
        $periodos = Periodo::all();
        $alumnos = Alumno::all();
        foreach ($alumnos as $alumno) {
            foreach ($periodos as $periodo) {
                $evaluacion = new Cafeteria();
                $evaluacion->fill($request->all());
                $evaluacion->alumno_id = $alumno->id;
                $evaluacion->no_control = $alumno->no_control;
                $evaluacion->carrera = $alumno->carrera;
                $evaluacion->periodo_id = $periodo->id;
                $evaluacion->calcularPromedioFinal();
            }
        }
        $evaluacion->save();
        return redirect()->route('encuestas.servicio_medico')->with('success', '¡Encuesta enviada correctamente!');
    }

        // Para el admin
        public function mostrarFormularioGrafica()
        {
            return view('graficas.grafica_cafeteria');
        }

        public function mostrarPeriodos()
        {
            $periodos = Periodo::all();
            return view('periodos.cafeteria_periodos', compact('periodos'));
        }

        public function mostrarGraficaPorPeriodo($periodo_id)
    {
        $periodo = Periodo::findOrFail($periodo_id);
        $data = $this->obtenerDatosGrafica($periodo_id);

        return view('graficas.grafica_cafeteria', compact('periodo', 'data'));
    }

    private function obtenerDatosGrafica($periodo_id)
    {
        $respuestas = Cafeteria::where('periodo_id', $periodo_id)->get();
        return $respuestas;
    }
}
