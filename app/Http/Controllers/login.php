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

        
        foreach ($registros as $item) {
            if( $item->email == $credentials['email']){
                if ($item->password == $credentials['password']) {
                    $Autenticado = true;
                    break;
                }
            }
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
        //Auth::logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }
}