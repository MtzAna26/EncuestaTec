<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
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

        $alumnos = Alumno::all();
        foreach ($alumnos as $alumno) {
            $evaluacion = new Cafeteria();
            $evaluacion->fill($request->all());
            $evaluacion->alumno_id = $alumno->id;
            $evaluacion->no_control = $alumno->no_control;
            $evaluacion->carrera = $alumno->carrera;
        }
        $evaluacion->save();
        return redirect()->route('encuestas.servicio_medico')->with('success', '¡Encuesta enviada correctamente!');
    }

        // Para el admin
        public function mostrarFormularioGrafica()
        {
            return view('graficas.grafica_cafeteria');
        }
}
