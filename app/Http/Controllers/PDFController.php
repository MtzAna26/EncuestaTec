<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;


class PDFController extends Controller
{
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

        $data = collect($questions)->map(function ($questionText, $columnName) {
            $responses = DB::table('dep_centro_informacion')->pluck($columnName)->toArray();
            $count_5 = count(array_filter($responses, function ($value) { return $value == 5; }));
            $count_4 = count(array_filter($responses, function ($value) { return $value == 4; }));
            $count_3 = count(array_filter($responses, function ($value) { return $value == 3; }));
            $count_2 = count(array_filter($responses, function ($value) { return $value == 2; }));
            $count_1 = count(array_filter($responses, function ($value) { return $value == 1; }));

            return (object)[
                'question' => $columnName,
                'question_text' => $questionText,
                'response' => $responses,
                'average_score' => DB::table('dep_centro_informacion')->whereNotNull($columnName)->avg($columnName),
                'count_5' => $count_5,
                'count_4' => $count_4,
                'count_3' => $count_3,
                'count_2' => $count_2,
                'count_1' => $count_1,
            ];
        });

        // Calcular el promedio general
        $generalAverage = $data->pluck('average_score')->filter()->avg();

        // Calcular el número total de respuestas por cada calificación
        $count_1 = $data->sum('count_1');
        $count_2 = $data->sum('count_2');
        $count_3 = $data->sum('count_3');
        $count_4 = $data->sum('count_4');
        $count_5 = $data->sum('count_5');
    
        $averageScores = $data->pluck('average_score')->toArray();
        $questionTexts = $data->pluck('question_text')->toArray();
    
        return view('encuestas.pdf_centro_informacion', compact('data', 'generalAverage', 'count_1', 'count_2', 'count_3', 'count_4', 'count_5', 'averageScores', 'questionTexts'));
    }
    
    
    public function downloadQuestionReport()
    {
        // Obtener los datos necesarios
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

        $data = collect($questions)->map(function ($questionText, $columnName) {
            $responses = DB::table('dep_centro_informacion')->pluck($columnName)->toArray();
            $count_5 = count(array_filter($responses, function ($value) { return $value == 5; }));
            $count_4 = count(array_filter($responses, function ($value) { return $value == 4; }));
            $count_3 = count(array_filter($responses, function ($value) { return $value == 3; }));
            $count_2 = count(array_filter($responses, function ($value) { return $value == 2; }));
            $count_1 = count(array_filter($responses, function ($value) { return $value == 1; }));

            return (object)[
                'question' => $columnName,
                'question_text' => $questionText,
                'response' => $responses,
                'average_score' => DB::table('dep_centro_informacion')->whereNotNull($columnName)->avg($columnName),
                'count_5' => $count_5,
                'count_4' => $count_4,
                'count_3' => $count_3,
                'count_2' => $count_2,
                'count_1' => $count_1,
            ];
        });

        $generalAverage = $data->pluck('average_score')->filter()->avg();

        // Generar el PDF
        $pdf = Pdf::loadView('encuestas.pdf_centro_informacion', compact('data', 'generalAverage'));

        // Descargar el PDF
        return $pdf->download('reporte_centro_informacion.pdf');
    }
}
