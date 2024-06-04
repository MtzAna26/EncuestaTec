<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    public function showRegistrationForm(): View
    {
        return view('dashboard');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
{
    try {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string', 'in:admin,departamento'], 
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role = $request->input('role');
        $user->save();

        Session::flash('success', '¡Usuario registrado exitosamente!');
        return redirect()->route('dashboard');
    } catch (\Exception $e) {
        // Manejo de errores
        Session::flash('error', 'Hubo un problema al registrar el usuario. Por favor, inténtalo de nuevo.');
        return redirect()->back();
    }
}


// Para el admin pueda ver los usuarios creados

   public function index(): View
    {
        $users = User::all();
        return view('administrador.lista_usuarios', compact('users'));
    }

    
}
