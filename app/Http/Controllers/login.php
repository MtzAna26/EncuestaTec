<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;

class login extends Controller
{
    public function login()
    {
        return response()->json(['message' => 'Logged in successfully'], 200);
         //return redirect('/departamento/inicio/CAFETERIA');
        /*$credentials = $request->only('usuario', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return response()->json(['message' => 'Logged in successfully'], 200);
        } else {
            // Autenticación fallida
            return response()->json(['message' => 'Invalid credentials'], 401);
        }*/
    }

    public function logout()
    {
        //Auth::logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}
