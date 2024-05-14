<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno; 

class AuthAlumnoRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('alumno.register');
    }

    public function register(Request $request)
    {
    
    $request->validate([
        'nip' => 'required|unique:alumnos,nip',
        'no_control' => 'required|unique:alumnos,no_control',
        'carrera' => 'required',
        'semestre' => 'required',
    ]);

    
    $alumno = new Alumno();
    $alumno->nip = $request->nip;
    $alumno->no_control = $request->no_control;
    $alumno->carrera = $request->carrera;
    $alumno->semestre = $request->semestre;

    
    if ($alumno->save()) {
        
        return redirect()->route('alumno.login')->with('success', '¡Registro exitoso! Por favor, inicia sesión.');
    } else {
        
        return back()->withInput()->withErrors(['error' => 'Hubo un problema al guardar el registro. Por favor, intenta de nuevo.']);
    }
    }


    // Para el administrador
    public function mostrarAlumnosPorCarreraYSemestre($carrera, $semestre)
    {
    $alumnos = Alumno::where('carrera', $carrera)
                        ->where('semestre', $semestre)
                        ->get();
                        $alumnos = Alumno::all();
                        return view('alumno.lista', compact('alumnos', 'carrera', 'semestre'));
    }

    public function eliminarAlumnosSeleccionados(Request $request, $carrera, $semestre)
    {
        $alumnosSeleccionados = $request->input('alumnosSeleccionados', []);
        $alumnos = Alumno::whereIn('id', $alumnosSeleccionados)->get();
        foreach ($alumnos as $alumno) {
            $alumno->delete();
        }
        return redirect()->route('carreras.semestres.alumnos.lista', ['carrera' => $carrera, 'semestre' => $semestre])
                        ->with('success', 'Alumnos eliminados correctamente.');
    }
}
