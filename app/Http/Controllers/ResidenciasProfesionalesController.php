<?php

namespace App\Http\Controllers;

use App\Models\ResidenciasProfesionales;
use App\Models\Alumno;
use App\Models\User;
use Illuminate\Http\Request;

class ResidenciasProfesionalesController extends Controller
{
    public function mostrarFormulario()
    {
        return view('encuestas.residencias_profesionales');
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
            'Serpregunta_8' => 'required|integer',
            'Serpregunta_9' => 'required|integer',
            'comentario' => 'required|string',
        ]);
    
        // Crear una nueva evaluación
        $alumnos = Alumno::all();
        
        foreach ($alumnos as $alumno) {
            $evaluacion = new ResidenciasProfesionales();
            $evaluacion->fill($request->all());
            $evaluacion->alumno_id = $alumno->id;
            $evaluacion->no_control = $alumno->no_control;
            $evaluacion->carrera = $alumno->carrera;
        }
        $evaluacion->save();
    
        return redirect()->route('encuestas.centro_computo')->with('success', '¡Encuesta enviada correctamente!');
    }
}
