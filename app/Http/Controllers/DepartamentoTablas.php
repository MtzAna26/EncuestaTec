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

class DepartamentoTablas extends Controller
{
    public function inicio($Departamento,$ciclo)
    {
        $Encuesta = array(
            "pregunta 1" => [80,55,20],
            "pregunta 2" => [5,20,75],
            "pregunta 3" => [25,50,25],
        );

        if ($Departamento == "CENTRO DE INFORMACIÓN") {
            return view('departamento.DepartamentoTablas',$this->ParseCentroDeInformacion($Departamento,$ciclo));
        }
        
        if ($Departamento == "CAFETERIA") {
            return view('departamento.DepartamentoTablas',$this->ParseCafeteria($Departamento,$ciclo));
        }

        if ($Departamento == "COORDINACIÓN DE CARRERAS") {
            return view('departamento.DepartamentoTablas',$this->ParseCoordinacionCarreras($Departamento,$ciclo));
        }
        
        if ($Departamento == "RECURSOS FINANCIEROS") {
            return view('departamento.DepartamentoTablas',$this->ParseRecursosFinancieros($Departamento,$ciclo));
        }
        
        if ($Departamento == "RESIDENCIAS PROFESIONALES") {
            return view('departamento.DepartamentoTablas',$this->ParseResidenciasProfesionales($Departamento,$ciclo));
        }
        
        if ($Departamento == "CENTRO DE CÓMPUTO") {
            return view('departamento.DepartamentoTablas',$this->ParseCentroComputo($Departamento,$ciclo));
        }

        if ($Departamento == "SERVICIO SOCIAL") {
            return view('departamento.DepartamentoTablas',$this->ParseServicioSocial($Departamento,$ciclo));
        }
        
        if ($Departamento == "SERVICIOS ESCOLARES") {
            return view('departamento.DepartamentoTablas',$this->ParseServiciosEscolares($Departamento,$ciclo));
        }

        if ($Departamento == "BECAS") {
            return view('departamento.DepartamentoTablas',$this->ParseBecas($Departamento,$ciclo));
        }

        if ($Departamento == "TALLERES Y LABORATORIOS") {
            return view('departamento.DepartamentoTablas',$this->ParseTalleresLaboratorios($Departamento,$ciclo));
        }

        if ($Departamento == "SERVICIO MÉDICO") {
            return view('departamento.DepartamentoTablas',$this->ParseServicioMedico($Departamento,$ciclo));
        }

        if ($Departamento == "ACTIVIDADES CULTURALES Y DEPORTIVAS") {
            return view('departamento.DepartamentoTablas',$this->ParseActividadesCulturalesDeportivas($Departamento,$ciclo));
        }
       
       
    }

    public function ParseCentroDeInformacion($DepartamentoP,$cicloP){
       
        $Comentarios = [];
        $registros = CentroInformacion::all();
        $Datos = [];
        $preguntas = ['1','2','3','4','5','6','7','1','2','3','4','5','6'];

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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
            
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

       
       

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];
        $repeticionesp5=[];
        $repeticionesp6=[];
        $repeticionesp7=[];
        $repeticionesp8=[];
        $repeticionesp9=[];
        $repeticionesp10=[];
        $repeticionesp11=[];
        $repeticionesp12=[];
        $repeticionesp13=[];
       
        

        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));
        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));
        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));
        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));
        array_push($repeticionesp5, $this->c($Serpregunta_5,1));
        array_push($repeticionesp5, $this->c($Serpregunta_5,2));
        array_push($repeticionesp5, $this->c($Serpregunta_5,3));
        array_push($repeticionesp5, $this->c($Serpregunta_5,4));
        array_push($repeticionesp5, $this->c($Serpregunta_5,5));
        array_push($repeticionesp6, $this->c($Serpregunta_6,1));
        array_push($repeticionesp6, $this->c($Serpregunta_6,2));
        array_push($repeticionesp6, $this->c($Serpregunta_6,3));
        array_push($repeticionesp6, $this->c($Serpregunta_6,4));
        array_push($repeticionesp6, $this->c($Serpregunta_6,5));
        array_push($repeticionesp7, $this->c($Serpregunta_7,1));
        array_push($repeticionesp7, $this->c($Serpregunta_7,2));
        array_push($repeticionesp7, $this->c($Serpregunta_7,3));
        array_push($repeticionesp7, $this->c($Serpregunta_7,4));
        array_push($repeticionesp7, $this->c($Serpregunta_7,5));
        array_push($repeticionesp8, $this->c($Estrucpregunta_1,1));
        array_push($repeticionesp8, $this->c($Estrucpregunta_1,2));
        array_push($repeticionesp8, $this->c($Estrucpregunta_1,3));
        array_push($repeticionesp8, $this->c($Estrucpregunta_1,4));
        array_push($repeticionesp8, $this->c($Estrucpregunta_1,5));
        array_push($repeticionesp9, $this->c($Estrucpregunta_2,1));
        array_push($repeticionesp9, $this->c($Estrucpregunta_2,2));
        array_push($repeticionesp9, $this->c($Estrucpregunta_2,3));
        array_push($repeticionesp9, $this->c($Estrucpregunta_2,4));
        array_push($repeticionesp9, $this->c($Estrucpregunta_2,5));
        array_push($repeticionesp10, $this->c($Estrucpregunta_3,1));
        array_push($repeticionesp10, $this->c($Estrucpregunta_3,2));
        array_push($repeticionesp10, $this->c($Estrucpregunta_3,3));
        array_push($repeticionesp10, $this->c($Estrucpregunta_3,4));
        array_push($repeticionesp10, $this->c($Estrucpregunta_3,5));
        array_push($repeticionesp11, $this->c($Estrucpregunta_4,1));
        array_push($repeticionesp11, $this->c($Estrucpregunta_4,2));
        array_push($repeticionesp11, $this->c($Estrucpregunta_4,3));
        array_push($repeticionesp11, $this->c($Estrucpregunta_4,4));
        array_push($repeticionesp11, $this->c($Estrucpregunta_4,5));
        array_push($repeticionesp12, $this->c($Estrucpregunta_5,1));
        array_push($repeticionesp12, $this->c($Estrucpregunta_5,2));
        array_push($repeticionesp12, $this->c($Estrucpregunta_5,3));
        array_push($repeticionesp12, $this->c($Estrucpregunta_5,4));
        array_push($repeticionesp12, $this->c($Estrucpregunta_5,5));
        array_push($repeticionesp13, $this->c($Estrucpregunta_6,1));
        array_push($repeticionesp13, $this->c($Estrucpregunta_6,2));
        array_push($repeticionesp13, $this->c($Estrucpregunta_6,3));
        array_push($repeticionesp13, $this->c($Estrucpregunta_6,4));
        array_push($repeticionesp13, $this->c($Estrucpregunta_6,5));




        $Encuesta1 = array(
            "1. Tiene un horario adecuado de consultas" => $repeticionesp1,
            "2. La información con la que cuenta me apoya en las asignaturas que curso" => $repeticionesp2,
            "3. La bibliografía de la que se dispone es actualizada" => $repeticionesp3,
            "4. Siempre encuentro por lo menos un ejemplar disponible de la bibliografia señalada en las asignaturas que curso" => $repeticionesp4,
            "5. Me orientan adecuadamente para encontrar en caso de carencia, libros equivalentes al requerido" => $repeticionesp5,
            "6. Me atienden en forma amable cuando solicito su apoyo" => $repeticionesp6,
            "7. Mantienen una relación atenta conmigo durante mi estancia" => $repeticionesp7,
            "1. Consideras los espacios disponibles en el Centro de información adecuados para realizar consultas bibliograficas" =>$repeticionesp8,
           "2. Como consideras el estado del mobiliario" => $repeticionesp9,
           "3. Considera adecuado el lugar donde se encuentra ubicado el centro de información" => $repeticionesp10,
           "4. Como consideras el servicio de internet" => $repeticionesp11,
           "5. Como consideras la cantidad de computadoras para la consulta de Bibliotecas Virtuales	" => $repeticionesp12,
           "6. Consideras que la iluminación es adecuada" => $repeticionesp13
        );
        foreach ($Encuesta1 as $clave => &$valor) {
           if (count($valor)  == 0){
            array_push( $valo, 0);
           
           }
        }
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
    }

    public function ParseCentroComputo($DepartamentoP,$cicloP){
        $Comentarios = [];
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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
           
        
           
            
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
       
        

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));
        array_push($Datos, ($suma7 / $numElementos7));
        array_push($Datos, ($suma8 / $numElementos8));
        array_push($Datos, ($suma9 / $numElementos9));


       
       

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];
        $repeticionesp5=[];
        $repeticionesp6=[];
        $repeticionesp7=[];
        $repeticionesp8=[];
        $repeticionesp9=[];
        
       
        

        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));

        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));

        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));

        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));

        array_push($repeticionesp5, $this->c($Serpregunta_5,1));
        array_push($repeticionesp5, $this->c($Serpregunta_5,2));
        array_push($repeticionesp5, $this->c($Serpregunta_5,3));
        array_push($repeticionesp5, $this->c($Serpregunta_5,4));
        array_push($repeticionesp5, $this->c($Serpregunta_5,5));

        array_push($repeticionesp6, $this->c($Serpregunta_6,1));
        array_push($repeticionesp6, $this->c($Serpregunta_6,2));
        array_push($repeticionesp6, $this->c($Serpregunta_6,3));
        array_push($repeticionesp6, $this->c($Serpregunta_6,4));
        array_push($repeticionesp6, $this->c($Serpregunta_6,5));

        array_push($repeticionesp7, $this->c($Serpregunta_7,1));
        array_push($repeticionesp7, $this->c($Serpregunta_7,2));
        array_push($repeticionesp7, $this->c($Serpregunta_7,3));
        array_push($repeticionesp7, $this->c($Serpregunta_7,4));
        array_push($repeticionesp7, $this->c($Serpregunta_7,5));

        /*array_push($repeticionesp8, $this->c($Serpregunta_8,1));
        array_push($repeticionesp8, $this->c($Serpregunta_8,2));
        array_push($repeticionesp8, $this->c($Serpregunta_8,3));
        array_push($repeticionesp8, $this->c($Serpregunta_8,4));
        array_push($repeticionesp8, $this->c($Serpregunta_8,5));

        array_push($repeticionesp9, $this->c($Serpregunta_9,1));
        array_push($repeticionesp9, $this->c($Serpregunta_9,2));
        array_push($repeticionesp9, $this->c($Serpregunta_9,3));
        array_push($repeticionesp9, $this->c($Serpregunta_9,4));
        array_push($repeticionesp9, $this->c($Serpregunta_9,5));*/

        




        $Encuesta1 = array(
            "1. El Servicio de Cómputo tiene un horario adecuado.	" => $repeticionesp1,
            "2. Por lo regular hay máquinas disponibles para realizar mi trabajo." => $repeticionesp2,
            "3. Siempre tengo disponible una conexión de Internet." => $repeticionesp3,
            "4. Me proporcionan atención adecuada en el servicio de Internet." => $repeticionesp4,
            "5. Me proporcionan atención adecuada en caso de presentarse fallas en el equipo que se me asignó.	" => $repeticionesp5,
            "6. Me proporcionan asesoría adecuada para resolver mis dudas sobre el uso de software." => $repeticionesp6,
            "7. Mantienen una relación atenta conmigo durante toda mi estancia en las instalaciones." => $repeticionesp7
           // "Serpregunta_8" => $repeticionesp8,
            //"Serpregunta_9" => $repeticionesp9
           
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
       
    }

    public function ParseCoordinacionCarreras($DepartamentoP,$cicloP){
        $Comentarios = [];
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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
           
        
           
            
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
    
       
        

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));
        array_push($Datos, ($suma7 / $numElementos7));
       

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];
        $repeticionesp5=[];
        $repeticionesp6=[];
        $repeticionesp7=[];
       
        

        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));

        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));

        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));

        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));

        array_push($repeticionesp5, $this->c($Serpregunta_5,1));
        array_push($repeticionesp5, $this->c($Serpregunta_5,2));
        array_push($repeticionesp5, $this->c($Serpregunta_5,3));
        array_push($repeticionesp5, $this->c($Serpregunta_5,4));
        array_push($repeticionesp5, $this->c($Serpregunta_5,5));

        array_push($repeticionesp6, $this->c($Serpregunta_6,1));
        array_push($repeticionesp6, $this->c($Serpregunta_6,2));
        array_push($repeticionesp6, $this->c($Serpregunta_6,3));
        array_push($repeticionesp6, $this->c($Serpregunta_6,4));
        array_push($repeticionesp6, $this->c($Serpregunta_6,5));

        array_push($repeticionesp7, $this->c($Serpregunta_7,1));
        array_push($repeticionesp7, $this->c($Serpregunta_7,2));
        array_push($repeticionesp7, $this->c($Serpregunta_7,3));
        array_push($repeticionesp7, $this->c($Serpregunta_7,4));
        array_push($repeticionesp7, $this->c($Serpregunta_7,5));


        $Encuesta1 = array(
            "1. Tiene un horario adecuado de atención." => $repeticionesp1,
            "2. Me proporciona información necesaria para el manejo de mi retícula de carrera.regunta_2" => $repeticionesp2,
            "3. Me da orientación adecuada cuando requiero realizar trámites en la institución." => $repeticionesp3,
            "4. Me atiende en forma amable cuando solicito su apoyo.	" => $repeticionesp4,
            ". Me orienta sobre el proceso para la reinscripción de alumnos." => $repeticionesp5,
            "6. Me dan la orientación necesaria para la realización de trámites de titulación." => $repeticionesp6,
            "7. Mantienen una relación atenta conmigo durante mi estancia." => $repeticionesp7
               
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
       
    }

    public function ParseRecursosFinancieros($DepartamentoP,$cicloP){
       
        $Comentarios = [];
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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
            
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

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));

       
       

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];
        $repeticionesp5=[];
        $repeticionesp6=[];
        

        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));
        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));
        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));
        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));
        array_push($repeticionesp5, $this->c($Serpregunta_5,1));
        array_push($repeticionesp5, $this->c($Serpregunta_5,2));
        array_push($repeticionesp5, $this->c($Serpregunta_5,3));
        array_push($repeticionesp5, $this->c($Serpregunta_5,4));
        array_push($repeticionesp5, $this->c($Serpregunta_5,5));
        array_push($repeticionesp6, $this->c($Serpregunta_6,1));
        array_push($repeticionesp6, $this->c($Serpregunta_6,2));
        array_push($repeticionesp6, $this->c($Serpregunta_6,3));
        array_push($repeticionesp6, $this->c($Serpregunta_6,4));
        array_push($repeticionesp6, $this->c($Serpregunta_6,5));


        $Encuesta1 = array(
            "1. Tiene un horario adecuado para realizar mis trámites.		" => $repeticionesp1,
            "2. Me proporcionan una lista actualizada de los costos de los diferentes trámites." => $repeticionesp2,
            "3. El tiempo de espera para pagar en caja es aceptable." => $repeticionesp3,
            "4. El personal de Recursos Financieros siempre me cobra el concepto y monto Correcto." => $repeticionesp4,
            "5. Me proporcionan asesoría adecuada cuando desconozco qué o cuánto pagar." => $repeticionesp5,
            "6. Mantienen una relación atenta conmigo durante todo el tiempo en que me otorga el servicio." => $repeticionesp6
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
    }

    public function ParseResidenciasProfesionales($DepartamentoP,$cicloP){
        $Comentarios = [];
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
            array_push($Serpregunta_7, $item->Serpregunta_7);
            array_push($Serpregunta_8, $item->Serpregunta_8);
            array_push($Serpregunta_9, $item->Serpregunta_9);
            array_push($Comentarios, [$item->comentario,$item->carrera]);
           
        
           
            
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
       
        

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));
        array_push($Datos, ($suma7 / $numElementos7));
        array_push($Datos, ($suma8 / $numElementos8));
        array_push($Datos, ($suma9 / $numElementos9));


       
       

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];
        $repeticionesp5=[];
        $repeticionesp6=[];
        $repeticionesp7=[];
        $repeticionesp8=[];
        $repeticionesp9=[];
        
       
        

        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));

        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));

        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));

        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));

        array_push($repeticionesp5, $this->c($Serpregunta_5,1));
        array_push($repeticionesp5, $this->c($Serpregunta_5,2));
        array_push($repeticionesp5, $this->c($Serpregunta_5,3));
        array_push($repeticionesp5, $this->c($Serpregunta_5,4));
        array_push($repeticionesp5, $this->c($Serpregunta_5,5));

        array_push($repeticionesp6, $this->c($Serpregunta_6,1));
        array_push($repeticionesp6, $this->c($Serpregunta_6,2));
        array_push($repeticionesp6, $this->c($Serpregunta_6,3));
        array_push($repeticionesp6, $this->c($Serpregunta_6,4));
        array_push($repeticionesp6, $this->c($Serpregunta_6,5));

        array_push($repeticionesp7, $this->c($Serpregunta_7,1));
        array_push($repeticionesp7, $this->c($Serpregunta_7,2));
        array_push($repeticionesp7, $this->c($Serpregunta_7,3));
        array_push($repeticionesp7, $this->c($Serpregunta_7,4));
        array_push($repeticionesp7, $this->c($Serpregunta_7,5));

        array_push($repeticionesp8, $this->c($Serpregunta_8,1));
        array_push($repeticionesp8, $this->c($Serpregunta_8,2));
        array_push($repeticionesp8, $this->c($Serpregunta_8,3));
        array_push($repeticionesp8, $this->c($Serpregunta_8,4));
        array_push($repeticionesp8, $this->c($Serpregunta_8,5));

        array_push($repeticionesp9, $this->c($Serpregunta_9,1));
        array_push($repeticionesp9, $this->c($Serpregunta_9,2));
        array_push($repeticionesp9, $this->c($Serpregunta_9,3));
        array_push($repeticionesp9, $this->c($Serpregunta_9,4));
        array_push($repeticionesp9, $this->c($Serpregunta_9,5));

        




        $Encuesta1 = array(
            "1. La División de Estudios Profesionales me proporciona información del banco de proyectos de Residencias Profesionales" => $repeticionesp1,
            "2. A lo largo de tu carrera te brindaron la información necesaria para desarrollo de anteproyectos." => $repeticionesp2,
            "3. La División de Estudios Profesionales me da información de las opciones para realizar los Anteproyectos." => $repeticionesp3,
            "4. La División de Estudios me proporciona información acerca de los periodos para la recepción de anteproyectos de Residencias Profesionales." => $repeticionesp4,
            "5. El Docente Asignado para revisar mi anteproyecto de residencias y el Jefe de Carrera dictaminan en el periodo establecido." => $repeticionesp5,
            "6. Mi Asesor Interno me proporciona asesoría para el desarrollo de mi proyecto Residencias Profesionales." => $repeticionesp6,
            "7. Mi Asesor Interno revisa mis informes parciales de Residencias Profesionales y me orienta para realizar las correcciones y cambios." => $repeticionesp7,
            "8. Mi Asesor Interno me da a conocer la calificación durante el periodo Establecido." => $repeticionesp8,
            "9. El Departamento de Gestión Tecnológica y Vinculación me entrega en tiempo la carta de presentación y agradecimiento para la empresa" => $repeticionesp9
           
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
       
    }

    public function ParseServiciosEscolares($DepartamentoP,$cicloP){
       
        $Comentarios = [];
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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
            
        }
        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];

        
        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));
        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));
        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));
        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));

        $Encuesta1 = array(
            "1. El Departamento de Servicios Escolares tiene un horario adecuado de atención" => $repeticionesp1,
            "2. El tiempo de respuesta a mis solicitudes es adecuado	" => $repeticionesp2,
            "3. Me proporcionan información adecuada en caso de que se la solicite." => $repeticionesp3,
            "4. Mantienen una relación atenta conmigo durante toda mi estancia en el departamento." => $repeticionesp4
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
    }

    public function ParseServicioSocial($DepartamentoP,$cicloP){
        $Comentarios = [];
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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
           
        
           
            
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
       
        

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));
        array_push($Datos, ($suma7 / $numElementos7));
        array_push($Datos, ($suma8 / $numElementos8));


       
       

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];
        $repeticionesp5=[];
        $repeticionesp6=[];
        $repeticionesp7=[];
        $repeticionesp8=[];
        
       
        

        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));

        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));

        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));

        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));

        array_push($repeticionesp5, $this->c($Serpregunta_5,1));
        array_push($repeticionesp5, $this->c($Serpregunta_5,2));
        array_push($repeticionesp5, $this->c($Serpregunta_5,3));
        array_push($repeticionesp5, $this->c($Serpregunta_5,4));
        array_push($repeticionesp5, $this->c($Serpregunta_5,5));

        array_push($repeticionesp6, $this->c($Serpregunta_6,1));
        array_push($repeticionesp6, $this->c($Serpregunta_6,2));
        array_push($repeticionesp6, $this->c($Serpregunta_6,3));
        array_push($repeticionesp6, $this->c($Serpregunta_6,4));
        array_push($repeticionesp6, $this->c($Serpregunta_6,5));

        array_push($repeticionesp7, $this->c($Serpregunta_7,1));
        array_push($repeticionesp7, $this->c($Serpregunta_7,2));
        array_push($repeticionesp7, $this->c($Serpregunta_7,3));
        array_push($repeticionesp7, $this->c($Serpregunta_7,4));
        array_push($repeticionesp7, $this->c($Serpregunta_7,5));

        array_push($repeticionesp8, $this->c($Serpregunta_8,1));
        array_push($repeticionesp8, $this->c($Serpregunta_8,2));
        array_push($repeticionesp8, $this->c($Serpregunta_8,3));
        array_push($repeticionesp8, $this->c($Serpregunta_8,4));
        array_push($repeticionesp8, $this->c($Serpregunta_8,5));


        




        $Encuesta1 = array(
            "1. La oficina de Servicio Social tiene un horario adecuado para realizar mis trámites." => $repeticionesp1,
            "2. La oficina de Servicio Social me ofrece un catálogo de instituciones en donde pueda realizarlo." => $repeticionesp2,
            "3. La oficina de Servicio Social me brinda el apoyo para desarrollar mis actividades." => $repeticionesp3,
            "4. Me proporcionan atención adecuada cuando realizo mis trámites." => $repeticionesp4,
            "5. Me apoyan adecuadamente en la búsqueda, en caso de no tener en donde hacerlo." => $repeticionesp5,
            "6. Me proporcionan asesoría para desarrollar en forma adecuada el Servicio Social." => $repeticionesp6,
            "7. Me atienden en forma inmediata al solicitar información.	" => $repeticionesp7,
            "8. Mantienen una relación atenta conmigo durante toda mi estancia en su oficina.s" => $repeticionesp8,

           
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
       
    }

    public function ParseBecas($DepartamentoP,$cicloP){
        $Comentarios = [];
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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
           
        
           
            
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
    
       
        

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];
        $repeticionesp5=[];
       
        

        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));

        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));

        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));

        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));

        array_push($repeticionesp5, $this->c($Serpregunta_5,1));
        array_push($repeticionesp5, $this->c($Serpregunta_5,2));
        array_push($repeticionesp5, $this->c($Serpregunta_5,3));
        array_push($repeticionesp5, $this->c($Serpregunta_5,4));
        array_push($repeticionesp5, $this->c($Serpregunta_5,5));

        $Encuesta1 = array(
            "1. Se cumple con el horario de atención establecido." => $repeticionesp1,
            "2. Conozco a dónde dirigirme para que me informen sobre el trámite de solicitud de beca." => $repeticionesp2,
            "3. Se dan a conocer oportunamente y apropiadamente las convocatorias para los diferentes tipos de becas." => $repeticionesp3,
            "4. Resuelven mis dudas oportuna y claramente." => $repeticionesp4,
            "5. Si se presenta algún problema con mi trámite me lo informan oportunamente." => $repeticionesp5,
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
       
    }

    public function ParseTalleresLaboratorios($DepartamentoP,$cicloP){
        $Comentarios = [];
        $registros = TalleresLaboratorios::all();
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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
           
        
           
            
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
    
       
        

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];
        $repeticionesp5=[];
       
        

        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));

        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));

        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));

        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));

        array_push($repeticionesp5, $this->c($Serpregunta_5,1));
        array_push($repeticionesp5, $this->c($Serpregunta_5,2));
        array_push($repeticionesp5, $this->c($Serpregunta_5,3));
        array_push($repeticionesp5, $this->c($Serpregunta_5,4));
        array_push($repeticionesp5, $this->c($Serpregunta_5,5));

        $Encuesta1 = array(
            "1. La limpieza en los talleres y los laboratorios es adecuada" => $repeticionesp1,
            "2. Los materiales y/o equipo para realizar las prácticas siempre están disponibles" => $repeticionesp2,
            "
            EVALUACION AL SERVICIO	5	4	3	2	1
            1. La limpieza en los talleres y los laboratorios es adecuada					
            2. Los materiales y/o equipo para realizar las prácticas siempre están disponibles					
            3. Las medidas de seguridad son las apropiadas dentro del Taller y/o Laboratorio" => $repeticionesp3,
            "4. Identifico fácilmente el reglamento del Taller y/o Laboratorio" => $repeticionesp4,
            "5. El coordinador de Talleres y Laboratorios brinda el apoyo necesario para la realización de las prácticas." => $repeticionesp5,
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
       
    }

    public function ParseCafeteria($DepartamentoP,$cicloP){
        $Comentarios = [];
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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
           
        
           
            
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
        

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));
        array_push($Datos, ($suma5 / $numElementos5));
        array_push($Datos, ($suma6 / $numElementos6));
        array_push($Datos, ($suma7 / $numElementos7));


       
       

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];
        $repeticionesp5=[];
        $repeticionesp6=[];
        $repeticionesp7=[];
        
       



        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));

        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));

        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));

        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));

        array_push($repeticionesp5, $this->c($Serpregunta_5,1));
        array_push($repeticionesp5, $this->c($Serpregunta_5,2));
        array_push($repeticionesp5, $this->c($Serpregunta_5,3));
        array_push($repeticionesp5, $this->c($Serpregunta_5,4));
        array_push($repeticionesp5, $this->c($Serpregunta_5,5));

        array_push($repeticionesp6, $this->c($Serpregunta_6,1));
        array_push($repeticionesp6, $this->c($Serpregunta_6,2));
        array_push($repeticionesp6, $this->c($Serpregunta_6,3));
        array_push($repeticionesp6, $this->c($Serpregunta_6,4));
        array_push($repeticionesp6, $this->c($Serpregunta_6,5));

        array_push($repeticionesp7, $this->c($Serpregunta_7,1));
        array_push($repeticionesp7, $this->c($Serpregunta_7,2));
        array_push($repeticionesp7, $this->c($Serpregunta_7,3));
        array_push($repeticionesp7, $this->c($Serpregunta_7,4));
        array_push($repeticionesp7, $this->c($Serpregunta_7,5));

        




        $Encuesta1 = array(
            "1. Me atienden con amabilidad y respeto." => $repeticionesp1,
            "2. El horario de servicio es adecuado.	" => $repeticionesp2,
            "3. Las condiciones de higiene y limpieza del lugar son las adecuadas.	" => $repeticionesp3,
            "4. El personal que me atiende toma las medidas de higiene adecuadas (porta cubre bocas, guantes, malla para el cabello, etc.)	" => $repeticionesp4,
            "5. El tiempo para la entrega de los alimentos es adecuado.	" => $repeticionesp5,
            "6. Identifico fácilmente la lista de precios.	" => $repeticionesp6,
            "7. Considero que los precios son apropiados.	" => $repeticionesp7,

           
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
       
    }

    public function ParseActividadesCulturalesDeportivas($DepartamentoP,$cicloP){
       
        $Comentarios = [];
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
            array_push($Comentarios, [$item->comentario,$item->carrera]);
            
        }
        $suma1 = array_sum($Serpregunta_1);
        $suma2 = array_sum($Serpregunta_2);
        $suma3 = array_sum($Serpregunta_3);
        $suma4 = array_sum($Serpregunta_4);

        $numElementos1 = count($Serpregunta_1);
        $numElementos2 = count($Serpregunta_2);
        $numElementos3 = count($Serpregunta_3);
        $numElementos4 = count($Serpregunta_4);

        array_push($Datos, ($suma1 / $numElementos1));
        array_push($Datos, ($suma2 / $numElementos2));
        array_push($Datos, ($suma3 / $numElementos3));
        array_push($Datos, ($suma4 / $numElementos4));

        $repeticionesp1=[];
        $repeticionesp2=[];
        $repeticionesp3=[];
        $repeticionesp4=[];

        
        array_push($repeticionesp1, $this->c($Serpregunta_1,1));
        array_push($repeticionesp1, $this->c($Serpregunta_1,2));
        array_push($repeticionesp1, $this->c($Serpregunta_1,3));
        array_push($repeticionesp1, $this->c($Serpregunta_1,4));
        array_push($repeticionesp1, $this->c($Serpregunta_1,5));
        array_push($repeticionesp2, $this->c($Serpregunta_2,1));
        array_push($repeticionesp2, $this->c($Serpregunta_2,2));
        array_push($repeticionesp2, $this->c($Serpregunta_2,3));
        array_push($repeticionesp2, $this->c($Serpregunta_2,4));
        array_push($repeticionesp2, $this->c($Serpregunta_2,5));
        array_push($repeticionesp3, $this->c($Serpregunta_3,1));
        array_push($repeticionesp3, $this->c($Serpregunta_3,2));
        array_push($repeticionesp3, $this->c($Serpregunta_3,3));
        array_push($repeticionesp3, $this->c($Serpregunta_3,4));
        array_push($repeticionesp3, $this->c($Serpregunta_3,5));
        array_push($repeticionesp4, $this->c($Serpregunta_4,1));
        array_push($repeticionesp4, $this->c($Serpregunta_4,2));
        array_push($repeticionesp4, $this->c($Serpregunta_4,3));
        array_push($repeticionesp4, $this->c($Serpregunta_4,4));
        array_push($repeticionesp4, $this->c($Serpregunta_4,5));

        $Encuesta1 = array(
            "Serpregunta_1" => $repeticionesp1,
            "Serpregunta_2" => $repeticionesp2,
            "Serpregunta_3" => $repeticionesp3,
            "Serpregunta_4" => $repeticionesp4
        );
    

        return ['datos'=>$Encuesta1,"dep"=>$DepartamentoP,"ciclo"=>$cicloP,'Gdatos'=>$Datos,'preguntas'=>$preguntas, "Comentarios" => $Comentarios];
    }

    public function c($arreglo,$numeroBuscado){

        if (count($arreglo) >= 1) {
            $contador = 0;

            foreach ($arreglo as $numero) {
                if ($numero == $numeroBuscado) {
                    $contador++;
                }
            }
            return $contador;
        }
       

    }
    
    public function rellenar($arry){
            if (count($arry)== 0) {
                if ($arry != null) {
                    return[6,6,6,6,6];
                }
                
            }
    }
}
