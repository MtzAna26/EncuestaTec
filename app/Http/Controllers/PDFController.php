<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PDFController extends Controller
{
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

        $generalAverage = $data->pluck('average_score')->filter()->avg();
        $counts = $data->reduce(function ($carry, $item) {
            $carry['count_1'] += $item->count_1;
            $carry['count_2'] += $item->count_2;
            $carry['count_3'] += $item->count_3;
            $carry['count_4'] += $item->count_4;
            $carry['count_5'] += $item->count_5;
            return $carry;
        }, ['count_1' => 0, 'count_2' => 0, 'count_3' => 0, 'count_4' => 0, 'count_5' => 0]);

        return compact('data', 'generalAverage', 'counts');
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

    public function downloadQuestionReport()
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

        // Generar el PDF
        $pdf = PDF::loadView('encuestas.pdf_centro_informacion', $data);
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);
        return $pdf->download('reporte_centro_informacion.pdf');
    }

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

    public function downloadCoordinacionCarreras()
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

        // Generar el PDF
        $pdf = PDF::loadView('encuestas.pdf_coordinacion_carreras', $data);
        $pdf->setOptions([
            'isHtml5ParserEnabled' => true,
            'isRemoteEnabled' => true,
        ]);
        
        // Descargar el PDF
        return $pdf->download('reporte_coordinacion_carreras.pdf');
    }
}
