<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\CentroInformacion;
use App\Models\CoordinacionCarreras;
use App\Models\RecursosFinancieros;
use App\Models\ResidenciasProfesionales;
use App\Models\CentroComputo;
use App\Models\ServicioSocial;
use App\Models\ServiciosEscolares;
use App\Models\Becas;
use App\Models\TalleresLaboratorios;
use App\Models\Cafeteria;
use App\Models\ServicioMedico;
use App\Models\ActividadesCulturalesDeportivas;
use Illuminate\Support\Facades\DB;

class GraficaController extends Controller
{

    public function mostrarGrafica(Request $request)
    {
        // Calcular los promedios de cada departamento
        $promedio_ci = CentroInformacion::avg('promedio_final');
        $promedio_cc = CoordinacionCarreras::avg('promedio_final');
        $promedio_rf = RecursosFinancieros::avg('promedio_final');
        $promedio_rp = ResidenciasProfesionales::avg('promedio_final');
        $promedio_cco = CentroComputo::avg('promedio_final');
        $promedio_ss = ServicioSocial::avg('promedio_final');
        $promedio_se = ServiciosEscolares::avg('promedio_final');
        $promedio_becas = Becas::avg('promedio_final');
        $promedio_tl = TalleresLaboratorios::avg('promedio_final');
        $promedio_cafeteria = Cafeteria::avg('promedio_final');
        $promedio_sm = ServicioMedico::avg('promedio_final');
        $promedio_acd = ActividadesCulturalesDeportivas::avg('promedio_final');
        // Calcula los promedios para los otros departamentos de manera similar

        // Crear un array con los promedios de cada departamento
        $data = [
            'Centro de Información' => [
                'Promedio' => $promedio_ci,
                'Promedio General' => $promedio_ci, // El promedio general de un solo departamento es el mismo que su promedio individual
            ],
            'Coordinación de Carreras' => [
                'Promedio' => $promedio_cc,
                'Promedio General' => $promedio_cc,
            ],
            'Recursos Financieros' => [
                'Promedio' => $promedio_rf,
                'Promedio General' => $promedio_rf,
            ],
            'Residencias Profesionales' => [
                'Promedio' => $promedio_rp,
                'Promedio General' => $promedio_rp,
            ],
            'Centro de Computo' => [
                'Promedio' => $promedio_cco,
                'Promedio General' => $promedio_cco,
            ],
            'Servicio Social' => [
                'Promedio' => $promedio_ss,
                'Promedio General' => $promedio_ss,
            ],
            'Servicios Escolares' => [
                'Promedio' => $promedio_se,
                'Promedio General' => $promedio_se,
            ],
            'Becas' => [
                'Promedio' => $promedio_becas,
                'Promedio General' => $promedio_becas,
            ],
            'Talleres y Laboratorios' => [
                'Promedio' => $promedio_tl,
                'Promedio General' => $promedio_tl,
            ],
            'Cafeteria' => [
                'Promedio' => $promedio_cafeteria,
                'Promedio General' => $promedio_cafeteria,
            ],
            'Servicio Medico' => [
                'Promedio' => $promedio_sm,
                'Promedio General' => $promedio_sm,
            ],
            'Actividades Culturales Deportivas' => [
                'Promedio' => $promedio_acd,
                'Promedio General' => $promedio_acd,
            ],
        ];
        $promedio_general_global = array_sum(array_column($data, 'Promedio')) / count($data);
        $data['Promedio General'] = [
            'Promedio' => $promedio_general_global,
            'Promedio General' => $promedio_general_global,
        ];
        // Calcular el promedio general global

        //$promedio_general = ($promedio_ci + $promedio_cc + $promedio_rf + $promedio_rp + $promedio_cco + $promedio_ss + $promedio_se + $promedio_becas + $promedio_tl + $promedio_cafeteria + $promedio_sm + $promedio_acd) / 12;
        // Pasar los datos a la vista para su uso con Chart.js
        return view('administrador.grafica_index', compact('data', 'promedio_general_global'));
    }
}
