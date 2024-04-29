<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use App\Models\Departamento;

class DepartamentoController extends Controller
{

    /**
     * Muestra la vista del departamento especificado.
     *
     * @param  string  $departamento
     * @return \Illuminate\View\View
     */

    public function showLoginForm()
    {
        return view('departamento.login');
    }
    
    public function show($departamento)
    {
        // Verificar si existe una vista para el departamento
        if (view()->exists("departamentos.$departamento")) {
            // Si existe, mostrar la vista del departamento
            return view("departamentos.$departamento");
        } else {
            // Si no existe, redirigir a una página de error o a una vista por defecto
            abort(404);
        }
    }
    
    /**
     * Almacena un nuevo departamento en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
{
    try {
        $departamento = Departamento::create([
            'usuario' => $request->usuario,
            'password' => bcrypt($request->password), // Asegurar el hash de la contraseña
        ]);

        // Crear un usuario de departamento correspondiente
        $usuarioDepartamento = User::create([
            'name' => $request->usuario, // Puedes utilizar el nombre del departamento como nombre de usuario
            'email' => $request->usuario.'@example.com', // Opcional: crear un correo electrónico único para el departamento
            'password' => bcrypt($request->password),
            'role' => 'departamento',
        ]);

    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Error al guardar el departamento: ' . $e->getMessage()])->withInput();
    }
    
    return redirect()->route('departamento.dashboard');
}

    public function login(Request $request)
    {
    $credentials = $request->validate([
        'usuario' => 'required|string',
        'password' => 'required|string',
    ]);

    // Intenta autenticar al usuario usando el modelo Departamento
    if (Auth::guard('departamento')->attempt($credentials)) {
        // Autenticación exitosa, redirigir al área protegida del departamento o a la página de destino
        $redirectTo = Session::pull('departamento.redirect', route('departamento.dashboard'));
        return redirect()->intended($redirectTo);
    }

    // Si la autenticación falla, redirigir de vuelta con un mensaje de error
    return back()->withErrors(['usuario' => 'Credenciales incorrectas.'])->withInput();
    }
}