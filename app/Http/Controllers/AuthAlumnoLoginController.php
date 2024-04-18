<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAlumnoLoginController extends Controller
{
    /**
     * Muestra el formulario de inicio de sesión para alumnos.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('alumno.login');
    }

    /**
     * Procesa la solicitud de inicio de sesión para alumnos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
          // Validar los datos del formulario
    $credentials = $request->validate([
        'no_control' => 'required',
        'nip' => 'required',
    ]);

    // Intentar autenticar al alumno utilizando el guard 'alumno'
    if (Auth::guard('alumno')->attempt($credentials)) {
        // La autenticación fue exitosa
        return redirect()->intended('/dashboard');
    }

    // La autenticación falló, redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
    return redirect()->route('alumno.login')->withErrors([
        'nip' => 'Las credenciales proporcionadas son incorrectas.',
        'no_control' => 'Las credenciales proporcionadas son incorrectas.',
    ]);
    }
}
