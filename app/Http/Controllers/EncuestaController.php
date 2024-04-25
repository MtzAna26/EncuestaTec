<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EncuestaController extends Controller
{
    public function menu()
    {
        
        return view('encuestas.menu');
    }
}
