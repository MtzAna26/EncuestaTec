<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno; // Asegúrate de importar el modelo Alumno

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

        // Crear un nuevo alumno en la base de datos
        Alumno::create([
            'nip' => $request->nip,
            'no_control' => $request->no_control,
            'carrera' => $request->carrera,
            'semestre' => $request->semestre,
        ]);

        // Redirigir al usuario a la página de inicio de sesión u otra página de confirmación
        return redirect()->route('alumno.login')->with('success', '¡Registro exitoso! Por favor, inicia sesión.');
    }
}
