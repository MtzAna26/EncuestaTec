<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\User;


class login extends Controller
{
    public function login(Request $request)
    {
        $Autenticado = false;
        $credentials = $request->only('email', 'password');
        $registros = User::all();

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $Autenticado = true;
            
        }

        if ($Autenticado) {
            $request->session()->put('user',$credentials['email']);
            return response()->json(['message' => 'Logged in successfully']);
            
        }else {
            return response()->json(['message' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
