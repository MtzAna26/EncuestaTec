<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuzonController extends Controller
{
    public function quejas()
    {
        
        return view('alumno.buzonquejas');
    }
}
