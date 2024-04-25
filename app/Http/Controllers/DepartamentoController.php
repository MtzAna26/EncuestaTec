<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Departamento;

class DepartamentoController extends Controller
{

    /**
     * Muestra la vista del departamento especificado.
     *
     * @param  string  $departamento
     * @return \Illuminate\View\View
     */
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
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Error al guardar el departamento: ' . $e->getMessage()])->withInput();
        }
        
        return redirect()->route('departamento.dashboard');
    }

    public function redirectToDepartamento(Request $request, $departamento)
    {
        Session::put('departamento.redirect', route("departamento.show", $departamento));
        return redirect()->route("departamento.login");
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'usuario' => 'required|string',
            'password' => 'required|string',
        ]);

        if (Auth::attempt($credentials)) {
            // Si la autenticación es exitosa, redirigir al área protegida del departamento o a la página de destino
            $redirectTo = Session::pull('departamento.redirect', route('departamento.dashboard'));
            return redirect()->intended($redirectTo);
        }

        return back()->withErrors(['usuario' => 'Credenciales incorrectas.'])->withInput();
    }
}
