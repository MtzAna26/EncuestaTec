<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class DepartamentoLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('departamento.login');
    }

    public function login(Request $request)
    {
        // Validar las credenciales del formulario
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);
    
       // Intentar autenticar al departamento utilizando el guard 'departamento'
    if (Auth::guard('departamento')->attempt($credentials)) {
        // Autenticación exitosa, obtener el departamento actual
        $departamento = Auth::guard('departamento')->user();

        // Redirigir al área protegida del departamento correspondiente
        return redirect()->route("departamento.show", $departamento->nombre); // Aquí asumo que el departamento tiene un atributo "nombre"
    } else {
        // Autenticación fallida, redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
        return back()->withErrors(['usuario' => 'Credenciales incorrectas.'])->withInput();
    }
    }

    public function ingresar(Request $request)
    {
        $departamento = $request->input('departamento');

        // Redirigir al departamento seleccionado
        return redirect()->route($departamento . '.login');
    }
}
