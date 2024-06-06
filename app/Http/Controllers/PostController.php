<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Estado_Encuesta;

class PostController extends Controller
{
   

     public function verficar()  {
        $estado = Estado_Encuesta::findOrFail(1);
        return $estado;
     }

     public function modificar($Estado)  {
        $estado = Estado_Encuesta::findOrFail(1);
        $updatedData = [
            'title' =>$Estado
            
        ];
    
        $estado ->update($updatedData);
     }
}
