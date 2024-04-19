<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartamentoLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('departamento.login');
    }

    public function login(Request $request)
    {
        // Validar los datos del formulario
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        // Intentar autenticar al departamento
        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, redirigir al departamento a su área protegida
            return redirect()->intended('/departamento/dashboard');
        }

        // Si la autenticación falla, redirigir de vuelta al formulario de inicio de sesión con un mensaje de error
        return back()->withErrors(['usuario' => 'Credenciales incorrectas.'])->withInput();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function ingresar(Request $request)
    {
        $departamento = $request->input('departamento');

        // Redirigir al departamento seleccionado
        return redirect()->route($departamento . '.login');
    }
}
