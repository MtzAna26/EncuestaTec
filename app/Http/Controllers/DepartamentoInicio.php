<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoInicio extends Controller
{
    public function inicio($Departamento)
    {
        if ($Departamento == "CENTRO DE INFORMACIÓN") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,49,23],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }
      
        if ($Departamento == "CAFETERIA") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }

        if ($Departamento == "COORDINACIÓN DE CARRERAS") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,49,23],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }
        
        if ($Departamento == "RECURSOS FINANCIEROS") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }
        
        if ($Departamento == "RESIDENCIAS PROFESIONALES") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,49,23],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }
        
        if ($Departamento == "CENTRO DE CÓMPUTO") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }

        if ($Departamento == "SERVICIO SOCIAL") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,49,23],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }
        
        if ($Departamento == "SERVICIOS ESCOLARES") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }

        if ($Departamento == "BECAS") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }
        if ($Departamento == "TALLERES Y LABORATORIOS") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }
        if ($Departamento == "SERVICIO MÉDICO") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }
        if ($Departamento == "ACTIVIDADES CULTURALES Y DEPORTIVAS") {
            return view('departamento.DepartamentoInicio',['datos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"],"dep"=>$Departamento]);
        }
       
    }
    
}
