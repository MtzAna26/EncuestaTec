<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\CentroInformacion;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CentroInformacionController extends Controller
{

    public function mostrarFormulario()
    {
        $alumno = Auth::user();
        return view('encuestas.centro_informacion', ['alumno' => $alumno]);
    }

    public function guardarRespuestas(Request $request)
    {
        $request->validate([
            'Serpregunta_1' => 'required',
            'Serpregunta_2' => 'required',
            'Serpregunta_3' => 'required',
            'Serpregunta_4' => 'required',
            'Serpregunta_5' => 'required',
            'Serpregunta_6' => 'required',
            'Serpregunta_7' => 'required',
            'Estrucpregunta_1' => 'required',
            'Estrucpregunta_2' => 'required',
            'Estrucpregunta_3' => 'required',
            'Estrucpregunta_4' => 'required',
            'Estrucpregunta_5' => 'required',
            'Estrucpregunta_6' => 'required',
            'comentario' => 'required',
        ]);

        $alumnoId = Alumno::first()->id;
        $no_control = Alumno::first()->no_control;
        $carrera = Alumno::first()->carrera;

        $evaluacion = new CentroInformacion();

        $evaluacion->Serpregunta_1 = $request->Serpregunta_1;
        $evaluacion->Serpregunta_2 = $request->Serpregunta_2;
        $evaluacion->Serpregunta_3 = $request->Serpregunta_3;
        $evaluacion->Serpregunta_4 = $request->Serpregunta_4;
        $evaluacion->Serpregunta_5 = $request->Serpregunta_5;
        $evaluacion->Serpregunta_6 = $request->Serpregunta_6;
        $evaluacion->Serpregunta_7 = $request->Serpregunta_7;
        $evaluacion->Estrucpregunta_1 = $request->Estrucpregunta_1;
        $evaluacion->Estrucpregunta_2 = $request->Estrucpregunta_2;
        $evaluacion->Estrucpregunta_3 = $request->Estrucpregunta_3;
        $evaluacion->Estrucpregunta_4 = $request->Estrucpregunta_4;
        $evaluacion->Estrucpregunta_5 = $request->Estrucpregunta_5;
        $evaluacion->Estrucpregunta_6 = $request->Estrucpregunta_6;
        $evaluacion->comentario = $request->comentario;
    

        $evaluacion->alumno_id = $alumnoId;
        $evaluacion->no_control = $no_control;
        $evaluacion->carrera = $carrera;
        $evaluacion->save();

        return redirect()->route('encuestas.coordinacion_carreras')->with('success', '¡Encuesta enviada correctamente!');
    }
}

