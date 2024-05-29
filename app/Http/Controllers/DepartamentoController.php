<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;

use App\Models\Departamento;

class DepartamentoController extends Controller
{
    public function dashboard()
    {
        // Lógica para mostrar el panel de control del departamento
        return view('departamento.dashboard');
    }
    
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
        if (view()->exists("departamentos.$departamento")) {
            return view("departamentos.$departamento");
        } else {
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
            'password' => bcrypt($request->password), 
        ]);


        $usuarioDepartamento = User::create([
            'name' => $request->usuario, 
            'email' => $request->usuario.'@example.com', 
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
        'email' => 'required|string',
        'password' => 'required|string',
    ]);

    if (Auth::attempt($credentials)) {
        
        $redirectTo = Session::pull('departamento.redirect', route('departamento.dashboard'));
        return redirect()->intended($redirectTo);
    }

    return back()->withErrors(['usuario' => 'Credenciales incorrectas.'])->withInput();
    }


    //Para el admin 
    public function desactivarEncuestas(Departamento $departamento)
    {
        $departamento->update(['activo' => false]);
    
        return response()->json(['message' => 'Encuestas desactivadas para el departamento'], 200);
    }
}