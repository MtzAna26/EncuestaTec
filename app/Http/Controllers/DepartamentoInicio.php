<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CentroInformacion;
use App\Models\CentroComputo;
use App\Models\CoordinacionCarreras;
use App\Models\RecursosFinancieros;
use App\Models\ResidenciasProfesionales;
use App\Models\ServiciosEscolares;
use App\Models\ServicioSocial;
use App\Models\Becas;
use App\Models\TalleresLaboratorios;
use App\Models\Cafeteria;
use App\Models\ServicioMedico;
use App\Models\ActividadesCulturalesDeportivas;

class DepartamentoInicio extends Controller
{
    public function inicio($Departamento)
    {
        
        if ($Departamento == "CENTRO DE INFORMACIÓN") {
            return view('departamento.DepartamentoInicio',$this->ParseCentroDeInformacion($Departamento));
        }
      
        if ($Departamento == "CAFETERIA") {
            return view('departamento.DepartamentoInicio',$this->ParseCafeteria($Departamento));
        }

        if ($Departamento == "COORDINACIÓN DE CARRERAS") {
            return view('departamento.DepartamentoInicio',$this->ParseCoordinacionCarreras($Departamento));
        }
        
        if ($Departamento == "RECURSOS FINANCIEROS") {
            return view('departamento.DepartamentoInicio',$this->ParseRecursosFinancieros($Departamento));
        }
        
        if ($Departamento == "RESIDENCIAS PROFESIONALES") {
            return view('departamento.DepartamentoInicio',$this->ParseResidenciasProfesionales($Departamento));
        }
        
        if ($Departamento == "CENTRO DE CÓMPUTO") {
            return view('departamento.DepartamentoInicio',$this->ParseCentroComputo($Departamento));
        }

        if ($Departamento == "SERVICIO SOCIAL") {
            return view('departamento.DepartamentoInicio',$this->ParseServicioSocial($Departamento));
        }
        
        if ($Departamento == "SERVICIOS ESCOLARES") {
            return view('departamento.DepartamentoInicio',$this->ParseServiciosEscolares($Departamento));
        }

        if ($Departamento == "BECAS") {
            return view('departamento.DepartamentoInicio',$this->ParseBecas($Departamento));
        }
        if ($Departamento == "TALLERES Y LABORATORIOS") {
            return view('departamento.DepartamentoInicio',$this->ParseTalleresLaboratorios($Departamento));
        }
        if ($Departamento == "SERVICIO MÉDICO") {
            return view('departamento.DepartamentoInicio',$this->ParseServicioMedico($Departamento));
        }
        if ($Departamento == "ACTIVIDADES CULTURALES Y DEPORTIVAS") {
            return view('departamento.DepartamentoInicio',$this->ParseActividadesCulturalesDeportivas($Departamento));
        }
       
    }

    public function ParseCentroDeInformacion($DepartamentoP){
        $registros = CentroInformacion::all();
        $Datos = [];
        $preguntas = ['1 ','2','3','4','5','6','7','1','2','3','4','5','6'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];
        $Serpregunta_5=[];
        $Serpregunta_6=[];
        $Serpregunta_7=[];
        $Estrucpregunta_1=[];
        $Estrucpregunta_2=[];
        $Estrucpregunta_3=[];
        $Estrucpregunta_4=[];
        $Estrucpregunta_5=[];
        $Estrucpregunta_6=[];
        $FechaDeAlta=[];

        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            array_push($Serpregunta_5, $item->Serpregunta_5);
            array_push($Serpregunta_6, $item->Serpregunta_6);
            array_push($Serpregunta_7, $item->Serpregunta_7);
            array_push($Estrucpregunta_1, $item->Estrucpregunta_1);
            array_push($Estrucpregunta_2, $item->Estrucpregunta_2);
            array_push($Estrucpregunta_3, $item->Estrucpregunta_3);
            array_push($Estrucpregunta_4, $item->Estrucpregunta_4);
            array_push($Estrucpregunta_5, $item->Estrucpregunta_5);
            array_push($Estrucpregunta_6, $item->Estrucpregunta_6);
            
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);
        $suma5 = array_sum($Serpregunta_5);
        $suma6 = array_sum($Serpregunta_6);
        $suma7 = array_sum($Serpregunta_7);
        $suma8 = array_sum($Estrucpregunta_1);
        $suma9 = array_sum($Estrucpregunta_2);
        $suma10 = array_sum($Estrucpregunta_3);
        $suma11 = array_sum($Estrucpregunta_4);
        $suma12 = array_sum($Estrucpregunta_5);
        $suma13 = array_sum($Estrucpregunta_6);

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        $numElementos5 = count($Serpregunta_5);
        $numElementos6 = count($Serpregunta_6);
        $numElementos7 = count($Serpregunta_7);
        $numElementos8 = count($Estrucpregunta_1);
        $numElementos9 = count($Estrucpregunta_2);
        $numElementos10 = count($Estrucpregunta_3);
        $numElementos11 = count($Estrucpregunta_4);
        $numElementos12 = count($Estrucpregunta_5);
        $numElementos13 = count($Estrucpregunta_6);

       
        
        if ($numElementos1 == 0) {
            array_push($Datos, ($suma1 / 1));
            array_push($Datos, ($suma2 /1));
            array_push($Datos, ($suma3 /1));
            array_push($Datos, ($suma4 /1));
            array_push($Datos, ($suma5 /1));
            array_push($Datos, ($suma6 /1));
            array_push($Datos, ($suma7/  1));
            array_push($Datos, ($suma8 / 1));
            array_push($Datos, ($suma9 / 1));
            array_push($Datos, ($suma10 / 1));
            array_push($Datos, ($suma11 / 1));
            array_push($Datos, ($suma12 / 1));
            array_push($Datos, ($suma13 / 1));
        }else {
            array_push($Datos, ($suma1 / $numElementos1));
            array_push($Datos, ($suma2 / $numElementos2));
            array_push($Datos, ($suma3 / $numElementos3));
            array_push($Datos, ($suma4 / $numElementos4));
            array_push($Datos, ($suma5 / $numElementos5));
            array_push($Datos, ($suma6 / $numElementos6));
            array_push($Datos, ($suma7/ $numElementos7));
            array_push($Datos, ($suma8 / $numElementos8));
            array_push($Datos, ($suma9 / $numElementos9));
            array_push($Datos, ($suma10 / $numElementos10));
            array_push($Datos, ($suma11 / $numElementos11));
            array_push($Datos, ($suma12 / $numElementos12));
            array_push($Datos, ($suma13 / $numElementos13));
        }

    

        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }


    public function ParseCentroComputo($DepartamentoP){
        $registros = CentroComputo::all();
        $Datos = [];
        $preguntas = ['1','2','3','4','5','6','7','8','9'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];
        $Serpregunta_5=[];
        $Serpregunta_6=[];
        $Serpregunta_7=[];
        $Serpregunta_8=[];
        $Serpregunta_9=[];
        

        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            array_push($Serpregunta_5, $item->Serpregunta_5);
            array_push($Serpregunta_6, $item->Serpregunta_6);
            array_push($Serpregunta_7, $item->Serpregunta_7);
            array_push($Serpregunta_8, $item->Serpregunta_8);
            array_push($Serpregunta_9, $item->Serpregunta_9);
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);
        $suma5 = array_sum($Serpregunta_5);
        $suma6 = array_sum($Serpregunta_6);
        $suma7 = array_sum($Serpregunta_7);
        $suma8 = array_sum($Serpregunta_8);
        $suma9 = array_sum($Serpregunta_9);
        
        

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        $numElementos5 = count($Serpregunta_5);
        $numElementos6 = count($Serpregunta_6);
        $numElementos7 = count($Serpregunta_7);
        $numElementos8 = count($Serpregunta_8);
        $numElementos9 = count($Serpregunta_9);
       
        
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_push($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        array_push($Datos, ($suma5 / 1));
        array_push($Datos, ($suma6 / 1));
        array_push($Datos, ($suma7/ 1));
        array_push($Datos, ($suma8 / 1));
        array_push($Datos, ($suma9 / 1));
      
        }else{
            array_push($Datos, ($suma1 / $numElementos1));
            array_push($Datos, ($suma2 / $numElementos2));
            array_push($Datos, ($suma3 / $numElementos3));
            array_push($Datos, ($suma4 / $numElementos4));
            array_push($Datos, ($suma5 / $numElementos5));
            array_push($Datos, ($suma6 / $numElementos6));
            array_push($Datos, ($suma7/ $numElementos7));
            array_push($Datos, ($suma8 / $numElementos8));
            array_push($Datos, ($suma9 / $numElementos9));
        }

        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }


    public function ParseCoordinacionCarreras($DepartamentoP){
        $registros = CoordinacionCarreras::all();
        $Datos = [];
        $preguntas = ['1','2','3','4','5','6','7'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];
        $Serpregunta_5=[];
        $Serpregunta_6=[];
        $Serpregunta_7=[];
     
        
        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            array_push($Serpregunta_5, $item->Serpregunta_5);
            array_push($Serpregunta_6, $item->Serpregunta_6);
            array_push($Serpregunta_7, $item->Serpregunta_7);
          
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);
        $suma5 = array_sum($Serpregunta_5);
        $suma6 = array_sum($Serpregunta_6);
        $suma7 = array_sum($Serpregunta_7);
       
        
        

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        $numElementos5 = count($Serpregunta_5);
        $numElementos6 = count($Serpregunta_6);
        $numElementos7 = count($Serpregunta_7);
       
       
        
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_push($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        array_push($Datos, ($suma5 / 1));
        array_push($Datos, ($suma6 / 1));
        array_push($Datos, ($suma7/ 1));
        }
        else{
        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));
        array_push($Datos, ($suma7/ $numElementos7));
        }
        
      
    

        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }


    public function ParseRecursosFinancieros($DepartamentoP){
        $registros = RecursosFinancieros::all();
        $Datos = [];
        $preguntas = ['1','2','3','4','5','6'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];
        $Serpregunta_5=[];
        $Serpregunta_6=[];
     
        
        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            array_push($Serpregunta_5, $item->Serpregunta_5);
            array_push($Serpregunta_6, $item->Serpregunta_6);
          
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);
        $suma5 = array_sum($Serpregunta_5);
        $suma6 = array_sum($Serpregunta_6);

        
        

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        $numElementos5 = count($Serpregunta_5);
        $numElementos6 = count($Serpregunta_6);

       
        
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 /1));
        array_push($Datos, ($suma2 /1));
        array_push($Datos, ($suma3 /1));
        array_push($Datos, ($suma4 /1));
        array_push($Datos, ($suma5 /1));
        array_push($Datos, ($suma6 /1));
        }
        else{
        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));
        }
      
    

        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }
    
    public function ParseResidenciasProfesionales($DepartamentoP){
        $registros = ResidenciasProfesionales::all();
        $Datos = [];
       
        $preguntas = ['1','2','3','4','5','6','7','8','9'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];
        $Serpregunta_5=[];
        $Serpregunta_6=[];
        $Serpregunta_7=[];
        $Serpregunta_8=[];
        $Serpregunta_9=[];
     
        
        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            array_push($Serpregunta_5, $item->Serpregunta_5);
            array_push($Serpregunta_6, $item->Serpregunta_6);
            array_push($Serpregunta_5, $item->Serpregunta_7);
            array_push($Serpregunta_6, $item->Serpregunta_8);
            array_push($Serpregunta_6, $item->Serpregunta_9);
          
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);
        $suma5 = array_sum($Serpregunta_5);
        $suma6 = array_sum($Serpregunta_6);
        $suma4 = array_sum($Serpregunta_7);
        $suma5 = array_sum($Serpregunta_8);
        $suma6 = array_sum($Serpregunta_9);

        
        

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        $numElementos5 = count($Serpregunta_5);
        $numElementos6 = count($Serpregunta_6);
        $numElementos4 = count($Serpregunta_7);
        $numElementos5 = count($Serpregunta_8);
        $numElementos6 = count($Serpregunta_9);

       
        
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_push($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        array_push($Datos, ($suma5 / 1));
        array_push($Datos, ($suma6 / 1));
        array_push($Datos, ($suma4 / 1));
        array_push($Datos, ($suma5 / 1));
        array_push($Datos, ($suma6 / 1));
        } 
        else {
            array_push($Datos, ($suma1 / $numElementos1));
            array_push($Datos, ($suma2 / $numElementos2));
            array_push($Datos, ($suma3 / $numElementos3));
            array_push($Datos, ($suma4 / $numElementos4));
            array_push($Datos, ($suma5 / $numElementos5));
            array_push($Datos, ($suma6 / $numElementos6));
            array_push($Datos, ($suma4 / $numElementos7));
            array_push($Datos, ($suma5 / $numElementos8));
            array_push($Datos, ($suma6 / $numElementos9));
        } 
      
    

        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }

    public function ParseServiciosEscolares($DepartamentoP){
        $registros = ServiciosEscolares::all();
        $Datos = [];
        $preguntas = ['1','2','3','4'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];


        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_push($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        }
        else{
            array_push($Datos, ($suma1 / $numElementos1));
            array_push($Datos, ($suma2 / $numElementos2));
            array_push($Datos, ($suma3 / $numElementos3));
            array_push($Datos, ($suma4 / $numElementos4));  
        }


        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }

    public function ParseServicioSocial($DepartamentoP){
        $registros = ServicioSocial::all();
        $Datos = [];
        $preguntas = ['1','2','3','4','5','6','7','8'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];
        $Serpregunta_5=[];
        $Serpregunta_6=[];
        $Serpregunta_7=[];
        $Serpregunta_8=[];
        

        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            array_push($Serpregunta_5, $item->Serpregunta_5);
            array_push($Serpregunta_6, $item->Serpregunta_6);
            array_push($Serpregunta_7, $item->Serpregunta_7);
            array_push($Serpregunta_8, $item->Serpregunta_8);
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);
        $suma5 = array_sum($Serpregunta_5);
        $suma6 = array_sum($Serpregunta_6);
        $suma7 = array_sum($Serpregunta_7);
        $suma8 = array_sum($Serpregunta_8);
        
        

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        $numElementos5 = count($Serpregunta_5);
        $numElementos6 = count($Serpregunta_6);
        $numElementos7 = count($Serpregunta_7);
        $numElementos8 = count($Serpregunta_8);
       
        
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_push($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        array_push($Datos, ($suma5 / 1));
        array_push($Datos, ($suma6 / 1));
        array_push($Datos, ($suma7/ 1));
        array_push($Datos, ($suma8 / 1));
        }
        else{
        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));
        array_push($Datos, ($suma7/ $numElementos7));
        array_push($Datos, ($suma8 / $numElementos8)); 
        }
    

        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }

    public function ParseBecas($DepartamentoP){
        $registros = Becas::all();
        $Datos = [];
        $preguntas = ['1','2','3','4','5'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];
        $Serpregunta_5=[];
        
        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            array_push($Serpregunta_5, $item->Serpregunta_5);
          
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);
        $suma5 = array_sum($Serpregunta_5);
        
        

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        $numElementos5 = count($Serpregunta_5);
       
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_push($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        array_push($Datos, ($suma5 / 1));
        }
        else{
            array_push($Datos, ($suma1 / $numElementos1));
            array_push($Datos, ($suma2 / $numElementos2));
            array_push($Datos, ($suma3 / $numElementos3));
            array_push($Datos, ($suma4 / $numElementos4));
            array_push($Datos, ($suma5 / $numElementos5));   
        }
      
    

        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }

    public function ParseTalleresLaboratorios($DepartamentoP){
        $registros = Becas::all();
        $Datos = [];
        $preguntas = ['1','2','3','4','5'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];
        $Serpregunta_5=[];
        
        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            array_push($Serpregunta_5, $item->Serpregunta_5);
          
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);
        $suma5 = array_sum($Serpregunta_5);
        
        

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        $numElementos5 = count($Serpregunta_5);
       
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_push($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        array_push($Datos, ($suma5 / 1));
        }
        else{
        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        } 
        
    

        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }

    public function ParseCafeteria($DepartamentoP){
        $registros = Cafeteria::all();
        $Datos = [];
        $preguntas = ['1','2','3','4','5','6','7'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];
        $Serpregunta_5=[];
        $Serpregunta_6=[];
        $Serpregunta_7=[];
        

        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            array_push($Serpregunta_5, $item->Serpregunta_5);
            array_push($Serpregunta_6, $item->Serpregunta_6);
            array_push($Serpregunta_7, $item->Serpregunta_7);
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);
        $suma5 = array_sum($Serpregunta_5);
        $suma6 = array_sum($Serpregunta_6);
        $suma7 = array_sum($Serpregunta_7);
        
        

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        $numElementos5 = count($Serpregunta_5);
        $numElementos6 = count($Serpregunta_6);
        $numElementos7 = count($Serpregunta_7);
        
        if ($numElementos1 == 0) {
        rray_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_paush($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        array_push($Datos, ($suma5 / 1));
        array_push($Datos, ($suma6 / 1));
        array_push($Datos, ($suma7/ 1));
        }
        else{
        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));
        array_push($Datos, ($suma7/ $numElementos7)); 
        }
    

        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }

    public function ParseServicioMedico($DepartamentoP){
        $registros = ServicioMedico::all();
        $Datos = [];
        $preguntas = ['1','2','3','4'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];


        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_push($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        }
        else{
            array_push($Datos, ($suma1 / $numElementos1));
            array_push($Datos, ($suma2 / $numElementos2));
            array_push($Datos, ($suma3 / $numElementos3));
            array_push($Datos, ($suma4 / $numElementos4));
        }


        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }

    public function ParseActividadesCulturalesDeportivas($DepartamentoP){
        $registros = ActividadesCulturalesDeportivas::all();
        $Datos = [];
        $preguntas = ['1','2','3','4'];

        $Serpregunta_1=[];
        $Serpregunta_2=[];
        $Serpregunta_3=[];
        $Serpregunta_4=[];


        foreach ($registros as $item) {
            array_push($Serpregunta_1, $item->Serpregunta_1);
            array_push($Serpregunta_2, $item->Serpregunta_2);
            array_push($Serpregunta_3, $item->Serpregunta_3);
            array_push($Serpregunta_4, $item->Serpregunta_4);
            
        }

        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);
        
        if ($numElementos1 == 0) {
        array_push($Datos, ($suma1 / 1));
        array_push($Datos, ($suma2 / 1));
        array_push($Datos, ($suma3 / 1));
        array_push($Datos, ($suma4 / 1));
        }
        else{
        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        }
        return ['datos'=> $Datos,'preguntas'=>$preguntas,"dep"=>$DepartamentoP];
    }

}

