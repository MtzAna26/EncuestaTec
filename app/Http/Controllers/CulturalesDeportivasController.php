<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
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
        
        foreach ($alumnos as $alumno) {
            $evaluacion = new ActividadesCulturalesDeportivas();
            $evaluacion->fill($request->all());
            $evaluacion->alumno_id = $alumno->id;
            $evaluacion->no_control = $alumno->no_control;
            $evaluacion->carrera = $alumno->carrera;
            
        }
        $evaluacion->save();
        return redirect()->route('alumno.fin_encuestas')->with('success', '¡Encuesta enviada correctamente!');
    }

    // Para el admin 
    public function mostrarFormularioGrafica()
    {
        return view('graficas.grafica_culturales_deportivas');
    }
}
