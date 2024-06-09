<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Estado_Encuesta;

class PostController extends Controller
{
   

     public function verficar()  {
      //$jsonString = file_get_contents('C:\xampp\htdocs\prorecto\EncuestaTec\configEncuesta.json');
      //$data = json_decode($jsonString, true);
      return "f" ;
     }

     public function modificar($Estado)  {
        $estado = Estado_Encuesta::findOrFail(1);
        $updatedData = [
            'title' =>$Estado
            
        ];
    
        $estado ->update($updatedData);
     }
}
