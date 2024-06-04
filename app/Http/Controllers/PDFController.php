<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
    // Centro informacion
    private function getQuestionsData($tableName, $questions)
    {
        $data = collect($questions)->map(function ($questionText, $columnName) use ($tableName) {
            $responses = DB::table($tableName)->pluck($columnName)->toArray();
            $counts = array_count_values($responses);

            return (object)[
                'question' => $columnName,
                'question_text' => $questionText,
                'response' => $responses,
                'average_score' => DB::table($tableName)->whereNotNull($columnName)->avg($columnName),
                'count_5' => $counts[5] ?? 0,
                'count_4' => $counts[4] ?? 0,
                'count_3' => $counts[3] ?? 0,
                'count_2' => $counts[2] ?? 0,
                'count_1' => $counts[1] ?? 0,
            ];
        });

         // Obtener el número total de encuestados
        $totalRespondents = DB::table($tableName)->count();
        $generalAverage = $data->pluck('average_score')->filter()->avg();
        $counts = $data->reduce(function ($carry, $item) {
            $carry['count_1'] += $item->count_1;
            $carry['count_2'] += $item->count_2;
            $carry['count_3'] += $item->count_3;
            $carry['count_4'] += $item->count_4;
            $carry['count_5'] += $item->count_5;
            return $carry;
        }, ['count_1' => 0, 'count_2' => 0, 'count_3' => 0, 'count_4' => 0, 'count_5' => 0]);

        return compact('data', 'generalAverage', 'counts', 'totalRespondents');
    }

    public function generateQuestionReport()
{
    $questions = [
        'Serpregunta_1' => 'Tiene un horario adecuado de consultas',
        'Serpregunta_2' => 'El personal es atento y servicial',
        'Serpregunta_3' => 'Las instalaciones son adecuadas',
        'Serpregunta_4' => 'Los recursos disponibles son suficientes',
        'Serpregunta_5' => 'La información proporcionada es clara',
        'Serpregunta_6' => 'El tiempo de espera es razonable',
        'Serpregunta_7' => 'La atención es personalizada',
        'Estrucpregunta_1' => 'La estructura de la información es adecuada',
        'Estrucpregunta_2' => 'La información es accesible',
        'Estrucpregunta_3' => 'La presentación de la información es atractiva',
        'Estrucpregunta_4' => 'El contenido es relevante y actualizado',
        'Estrucpregunta_5' => 'La organización de los recursos es lógica',
        'Estrucpregunta_6' => 'La calidad de los materiales es alta',
    ];

    $tableName = 'dep_centro_informacion';
    $data = $this->getQuestionsData($tableName, $questions);
    return view('encuestas.pdf_centro_informacion', $data);
}

    // Coordinacion carreras
    public function generateCoordinacionCarrerasPDF()
{
    $questions = [
        'Serpregunta_1' => 'Tiene un horario adecuado de atención',
        'Serpregunta_2' => 'Me proporciona información necesaria para el manejo de mi retícula de carrera',
        'Serpregunta_3' => 'Me da orientación adecuada cuando requiero realizar trámites en la institución',
        'Serpregunta_4' => 'Me atiende en forma amable cuando solicito su apoyo',
        'Serpregunta_5' => 'Me orienta sobre el proceso para la reinscripción de alumnos',
        'Serpregunta_6' => 'Me dan la orientación necesaria para la realización de trámites de titulación',
        'Serpregunta_7' => 'Mantienen una relación atenta conmigo durante mi estancia',
    ];

    $tableName = 'dep_coordinacion_carreras';
    $data = $this->getQuestionsData($tableName, $questions);

    return view('encuestas.pdf_coordinacion_carreras', $data);
}

    // Recursos Financieros
    public function generateRecursosFinancierosPDF()
{
    $questions = [
        'Serpregunta_1' => 'Tiene un horario adecuado para realizar mis trámites',
        'Serpregunta_2' => 'Me proporcionan una lista actualizada de los costos de los diferentes trámites',
        'Serpregunta_3' => 'El tiempo de espera para pagar en caja es aceptable',
        'Serpregunta_4' => 'El personal de Recursos Financieros siempre me cobra el concepto y monto Correcto',
        'Serpregunta_5' => 'Me proporcionan asesoría adecuada cuando desconozco qué o cuánto pagar',
        'Serpregunta_6' => 'Mantienen una relación atenta conmigo durante todo el tiempo en que me otorga el servicio',
    ];

    $tableName = 'dep_recursos_financieros';
    $data = $this->getQuestionsData($tableName, $questions);

    return view('reportes.pdf_recursos_financieros', $data);
}

    // RESIDENCIAS PROFESIONALES
    public function generateResidenciasProfesionalesPDF()
    {
        $questions = [
            'Serpregunta_1' => 'La División de Estudios Profesionales me proporciona información del banco de proyectos de Residencias Profesionales',
            'Serpregunta_2' => 'A lo largo de tu carrera te brindaron la información necesaria para desarrollo de anteproyectos',
            'Serpregunta_3' => 'La División de Estudios Profesionales me da información de las  opciones  para realizar los Anteproyectos',
            'Serpregunta_4' => 'La División de Estudios me proporciona información acerca de los periodos para la recepción de anteproyectos de Residencias Profesionales',
            'Serpregunta_5' => 'El Docente Asignado para revisar mi anteproyecto de residencias y el Jefe de Carrera dictaminan en el periodo establecido',
            'Serpregunta_6' => 'Mi Asesor Interno me proporciona asesoría para el desarrollo de mi proyecto Residencias Profesionales',
            'Serpregunta_7' => 'Mi Asesor Interno revisa mis informes parciales de Residencias Profesionales y me orienta para realizar las correcciones y cambios',
            'Serpregunta_8' => 'Mi Asesor Interno me da a conocer la calificación durante el periodo Establecido',
            'Serpregunta_9' => 'El Departamento de Gestión Tecnológica y Vinculación me entrega en tiempo la carta de presentación y agradecimiento para la empresa',
        ];
    
        $tableName = 'dep_residencias_profesionales';
        $data = $this->getQuestionsData($tableName, $questions);
    
        return view('reportes.pdf_residencias_profesionales', $data);
    }

    // CENTRO COMPUTO 
    public function generateCentroComputoPDF()
    {
        $questions = [
        'Serpregunta_1' => 'El Servicio de Cómputo tiene un horario adecuado.',
        'Serpregunta_2' => 'Por lo regular hay máquinas disponibles para realizar mi trabajo.',
        'Serpregunta_3' => 'Siempre tengo disponible una conexión de Internet.',
        'Serpregunta_4' => 'Me proporcionan atención adecuada en el servicio de Internet.',
        'Serpregunta_5' => 'Me proporcionan atención adecuada en caso de presentarse fallas en el equipo que se me asignó.',
        'Serpregunta_6' => 'Me proporcionan asesoría adecuada para resolver mis dudas sobre el uso de software.',
        'Serpregunta_7' => 'Mantienen una relación atenta conmigo durante toda mi estancia en las instalaciones.',
        ];
    
        $tableName = 'dep_centro_computos';
        $data = $this->getQuestionsData($tableName, $questions);
    
        return view('reportes.pdf_centro_computo', $data);
    }

        //Servicio Social
        public function generateServicioSocialPDF()
        {
            $questions = [
                'Serpregunta_1' => 'Tiene un horario adecuado de atención',
                'Serpregunta_2' =>'Me proporciona información necesaria para el manejo de mi retícula de carrera',
                'Serpregunta_3' => 'Me da orientación adecuada cuando requiero realizar trámites en la institución',
                'Serpregunta_4' => 'Me atiende en forma amable cuando solicito su apoyo',
                'Serpregunta_5' =>'Me orienta sobre el proceso para la reinscripción de alumnos',
                'Serpregunta_6' =>'Me dan la orientación necesaria para la realización de trámites de titulación',
                'Serpregunta_7' => 'Mantienen una relación atenta conmigo durante mi estancia',
                'Serpregunta_8' => 'Mantienen una relación atenta conmigo durante toda mi estancia en su oficina',
            ];
        
            $tableName = 'dep_servicio_social';
            $data = $this->getQuestionsData($tableName, $questions);
        
            return view('reportes.pdf_servicio_social', $data);
        }



        //Servicios Escolares
        public function generateServiciosEscolaresPDF()
        {
            $questions = [
                'Serpregunta_1' => 'El Departamento de Servicios Escolares tiene un horario adecuado de atención',
                'Serpregunta_2' => 'El tiempo de respuesta a mis solicitudes es adecuado',
                'Serpregunta_3' => 'Me proporcionan información adecuada en caso de que se la solicite',
                'Serpregunta_4' => 'Mantienen una relación atenta conmigo durante toda mi estancia en el departamento.',
            ];
        
            $tableName = 'dep_servicios_escolares';
            $data = $this->getQuestionsData($tableName, $questions);
        
            return view('reportes.pdf_servicios_escolares', $data);
        }



    // Talleres y Laboratorios
    public function generateTalleresLaboratoriosPDF()
    {
        $questions = [
        'Serpregunta_1' => 'La limpieza en los talleres y los laboratorios es adecuada',
        'Serpregunta_2' => 'Los materiales y/o equipo para realizar las prácticas siempre están disponibles',
        'Serpregunta_3' => 'Las medidas de seguridad son las apropiadas dentro del Taller y/o Laboratorio',
        'Serpregunta_4' => 'Identifico fácilmente el reglamento del Taller y/o Laboratorio',
        'Serpregunta_5' =>'El coordinador de Talleres y Laboratorios brinda el apoyo necesario para la realización de las prácticas',
        ];
    
        $tableName = 'dep_talleres_laboratorios';
        $data = $this->getQuestionsData($tableName, $questions);
    
        return view('reportes.pdf_talleres_laboratorios', $data);
    }


   // Becas
    public function generateBecasPDF()
    {
        $questions = [
        'Serpregunta_1' => 'Se cumple con  el horario de atención establecido',
        'Serpregunta_2' => 'Conozco a dónde dirigirme para que me informen sobre 
el trámite de solicitud de beca',
        'Serpregunta_3' => 'Se dan a conocer oportunamente y apropiadamente las convocatorias para los diferentes tipos de becas. ',
        'Serpregunta_4' => 'Resuelven mis dudas oportuna y claramente',
        'Serpregunta_5' => 'Si se presenta algún problema con mi trámite me lo informan oportunamente.',
        ];
    
        $tableName = 'dep_becas';
        $data = $this->getQuestionsData($tableName, $questions);
    
        return view('reportes.pdf_becas', $data);
    }



    // Cafeteria
    public function generateCafeteriaPDF()
    {
        $questions = [
        'Serpregunta_1' => 'Me atienden con amabilidad y respeto',
        'Serpregunta_2' => 'El horario de servicio es el adecuado',
        'Serpregunta_3' => 'Las condiciones de higiene y limpieza del lugar son las adecuadas',
        'Serpregunta_4' => 'El personal que me atiende toma las medidas de higiene adecuadas (porta cubre bocas, guantes, malla para el cabello, etc.)',
        'Serpregunta_5' => 'El tiempo para  la entrega de los alimentos es adecuado',
        'Serpregunta_6' => 'Identifico fácilmente la lista de precios',
        'Serpregunta_7' => 'Considero que los precios son apropiados',
        ];
    
        $tableName = 'dep_cafeteria';
        $data = $this->getQuestionsData($tableName, $questions);
    
        return view('reportes.pdf_cafeteria', $data);
    }

    // Servicio medico 
    public function generateServicioMedicoPDF()
    {
        $questions = [
            'Serpregunta_1' => 'Se cubre el horario establecido de atención',
            'Serpregunta_2' => 'La atención del médico es oportuna y adecuada',
            'Serpregunta_3' => 'El espacio donde te atiende es limpio y adecuado para el servicio brindado',
            'Serpregunta_4' => 'Se cuenta con botiquín de primeros auxilios',
        ];
    
        $tableName = 'dep_servicio_medico';
        $data = $this->getQuestionsData($tableName, $questions);
    
        return view('reportes.pdf_servicio_medico', $data);
    }

    // Actividades Culturales y Deportivas
    public function generateCulturalesDeportivasPDF()
    {
        $questions = [
        'Serpregunta_1' => 'El horario establecido para las actividades es adecuado',
        'Serpregunta_2' => 'El catálogo de actividades a las que puedes inscribirte es idóneo',
        'Serpregunta_3' => 'El trato que recibes del personal que te atiende en las actividades es adecuado',
        'Serpregunta_4' => 'La publicidad y difusión dada a las actividades es adecuada',
        ];
    
        $tableName = 'dep_actividades_culturales_deportivas';
        $data = $this->getQuestionsData($tableName, $questions);
    
        return view('reportes.pdf_culturales_deportivas', $data);
    }

}
