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
    // Validar los datos del formulario
    $request->validate([
        'nip' => 'required|unique:alumnos,nip',
        'no_control' => 'required|unique:alumnos,no_control',
        'carrera' => 'required',
        'semestre' => 'required',
    ]);

    // Crear una nueva instancia del modelo Alumno
    $alumno = new Alumno();
    $alumno->nip = $request->nip;
    $alumno->no_control = $request->no_control;
    $alumno->carrera = $request->carrera;
    $alumno->semestre = $request->semestre;

    // Intentar guardar el alumno en la base de datos
    if ($alumno->save()) {
        // Redirigir al usuario a la página de inicio de sesión u otra página de confirmación
        return redirect()->route('alumno.login')->with('success', '¡Registro exitoso! Por favor, inicia sesión.');
    } else {
        // Manejar el caso en que no se pudo guardar el alumno
        return back()->withInput()->withErrors(['error' => 'Hubo un problema al guardar el registro. Por favor, intenta de nuevo.']);
    }
}
}
