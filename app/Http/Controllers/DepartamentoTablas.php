<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoTablas extends Controller
{
    public function inicio($Departamento,$ciclo)
    {
        $Encuesta = array(
            "pregunta 1" => [80,15,5],
            "pregunta 2" => [5,20,75],
            "pregunta 3" => [25,50,25],
        );

        if ($Departamento == "CENTRO DE INFORMACIÓN") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[23,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }
        
        if ($Departamento == "CAFETERIA") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }

        if ($Departamento == "COORDINACIÓN DE CARRERAS") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }
        
        if ($Departamento == "RECURSOS FINANCIEROS") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }
        
        if ($Departamento == "RESIDENCIAS PROFESIONALES") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }
        
        if ($Departamento == "CENTRO DE CÓMPUTO") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }

        if ($Departamento == "SERVICIO SOCIAL") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }
        
        if ($Departamento == "SERVICIOS ESCOLARES") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }

        if ($Departamento == "BECAS") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }

        if ($Departamento == "TALLERES Y LABORATORIOS") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }

        if ($Departamento == "SERVICIO MÉDICO") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }

        if ($Departamento == "ACTIVIDADES CULTURALES Y DEPORTIVAS") {
            return view('departamento.DepartamentoTablas',['datos'=>$Encuesta,"dep"=>$Departamento,"ciclo"=>$ciclo,'Gdatos'=>[10,34,15],'preguntas'=>["pregunta 1","pregunta 2","pregunta 3"]]);
        }
       
       
    }
}
