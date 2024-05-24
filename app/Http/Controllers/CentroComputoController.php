<?php

namespace App\Http\Controllers;

use App\Models\CentroComputo;
use App\Models\Alumno;
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
        $alumnos = Alumno::all();
        
        foreach ($alumnos as $alumno) {
            $evaluacion = new CentroComputo();
            $evaluacion->fill($request->all());
            $evaluacion->alumno_id = $alumno->id;
            $evaluacion->no_control = $alumno->no_control;
            $evaluacion->carrera = $alumno->carrera;
        }
        $evaluacion->save();
    
        return redirect()->route('encuestas.servicio_social')->with('success', '¡Encuesta enviada correctamente!');
    }

    // Para el admin 

    public function mostrarFormularioGrafica(){
        return view('graficas.grafica_centro_computo');
    }
}
