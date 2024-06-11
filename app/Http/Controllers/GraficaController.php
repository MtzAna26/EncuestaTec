<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno;
use App\Models\Periodo;
use App\Models\Grafica;
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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class GraficaController extends Controller
{
    /*
    public function testGenerarPeriodo()
    {
        $alumno = new Alumno();
        
        // Probar con diferentes fechas
        $fechasDePrueba = [
            '2024-01-15',
            '2024-08-15',
            '2025-01-15',
            '2025-08-15',
            '2026-01-15',
            '2026-08-15',
        ];
        
        foreach ($fechasDePrueba as $fecha) {
            $periodoInfo = $alumno->generarPeriodo(null, $fecha);
            echo "Fecha de prueba: $fecha\n";
            print_r($periodoInfo);
            echo "\n";
        }
    }
    */
    public function seleccionarPeriodo()
    {
        // Obtener todos los periodos
        $periodos = Periodo::all();
        $uniquePeriodos = $periodos->map(function ($periodo) {
            $nombreNormalizado = strtolower(str_replace(' ', '', $periodo->nombre));
            return [
                'original' => $periodo->nombre,
                'normalizado' => $nombreNormalizado
            ];
        })->unique('normalizado')->values();
        $periodos = $uniquePeriodos->pluck('original');
        return view('administrador.periodos', compact('periodos'));
    }

    public function generarPeriodo($year = null)
    {
        // Si no se proporciona un año, usar el año actual
        $anio = $year ?? date('Y');

        // Calcular el período específico
        $mes = date('n');
        if ($mes <= 7) {
            // Enero-Julio (semestre par)
            $nombrePeriodo = "Enero-Julio $anio";
            $periodo = 'Par';
            $fechaInicio = "$anio-01-01";
            $fechaFin = "$anio-07-31";
        } else {
            // Agosto-Diciembre (semestre impar)
            $nombrePeriodo = "Agosto-Diciembre $anio";
            $periodo = 'Impar';
            $fechaInicio = "$anio-08-01";
            $fechaFin = "$anio-12-31";
        }

        return [
            'nombre' => $nombrePeriodo,
            'inicio' => $fechaInicio,
            'fin' => $fechaFin,
            'año' => $anio,
            'periodo' => $periodo,
        ];
    }

    public function generarYGuardarPeriodo($year = null)
    {
        // Generar el período usando la función ajustada
        $datosPeriodo = $this->generarPeriodo($year);

        // Crear una nueva instancia del modelo Periodo y asignar los valores
        $periodo = new Periodo();
        $periodo->nombre = $datosPeriodo['nombre'];
        $periodo->fecha_inicio = $datosPeriodo['inicio'];
        $periodo->fecha_fin = $datosPeriodo['fin'];
        $periodo->año = $datosPeriodo['año'];
        $periodo->periodo = $datosPeriodo['periodo'];

        // Guardar en la base de datos
        $periodo->save();

        return $periodo;
    }

    public function mostrarGrafica($periodo)
    {
        // Normaliza el nombre del periodo
        $nombreNormalizado = strtolower(str_replace(' ', '', $periodo));
    
        // Buscar el periodo basado en el nombre normalizado
        $periodo = Periodo::whereRaw("LOWER(REPLACE(nombre, ' ', '')) = ?", [$nombreNormalizado])->first();
    
        if (!$periodo) {
            return redirect()->back()->withErrors(['error' => 'El período no existe.']);
        }
    
        // Calcular los promedios de cada departamento para el período específico
        $promedio_ci = CentroInformacion::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_cc = CoordinacionCarreras::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_rf = RecursosFinancieros::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_rp = ResidenciasProfesionales::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_cco = CentroComputo::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_ss = ServicioSocial::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_se = ServiciosEscolares::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_becas = Becas::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_tl = TalleresLaboratorios::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_cafeteria = Cafeteria::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_sm = ServicioMedico::where('periodo_id', $periodo->id)->avg('promedio_final');
        $promedio_acd = ActividadesCulturalesDeportivas::where('periodo_id', $periodo->id)->avg('promedio_final');
    
        // Crear un array con los promedios de cada departamento
        $data = [
            'Centro de Información' => ['Promedio' => $promedio_ci],
            'Coordinación de Carreras' => ['Promedio' => $promedio_cc],
            'Recursos Financieros' => ['Promedio' => $promedio_rf],
            'Residencias Profesionales' => ['Promedio' => $promedio_rp],
            'Centro de Computo' => ['Promedio' => $promedio_cco],
            'Servicio Social' => ['Promedio' => $promedio_ss],
            'Servicios Escolares' => ['Promedio' => $promedio_se],
            'Becas' => ['Promedio' => $promedio_becas],
            'Talleres y Laboratorios' => ['Promedio' => $promedio_tl],
            'Cafeteria' => ['Promedio' => $promedio_cafeteria],
            'Servicio Medico' => ['Promedio' => $promedio_sm],
            'Actividades Culturales Deportivas' => ['Promedio' => $promedio_acd],
        ];
    
        $promedio_general_global = array_sum(array_column($data, 'Promedio')) / count($data);
    
        return view('administrador.grafica_index', compact('data', 'promedio_general_global', 'periodo'));
    }
    public function mostrarCarreras(Request $request)
    {
        $carreras = [
            'Ingenieria Industrial',
            'Ingenieria en Mineria',
            'Ingenieria en Agronomia',
            'Licenciatura en Administracion',
            'Ingenieria en Gestion Empresarial(Escolarizado)',
            'Ingenieria en Sistemas Computacionales',
            'Ingenieria Informática',
            'Ingenieria en Gestion Empresarial(Semiescolarizado)',
        ];

        $carrerasDB = Alumno::select('carrera')->distinct()->pluck('carrera');
        $carreras = $carrerasDB->merge($carreras)->unique()->values()->all();

        return view('administrador.mostrar_carreras', compact('carreras'));
    }

    public function mostrarGraficaPorCarrera(Request $request, $carrera)
    {
        $alumnos = Alumno::where('carrera', $carrera)->pluck('id');
        $totalAlumnos = $alumnos->count();
        $promedios = [
            'Centro de Información' => CentroInformacion::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Coordinación de Carreras' => CoordinacionCarreras::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Recursos Financieros' => RecursosFinancieros::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Residencias Profesionales' => ResidenciasProfesionales::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Centro de Computo' => CentroComputo::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Servicio Social' => ServicioSocial::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Servicios Escolares' => ServiciosEscolares::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Becas' => Becas::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Talleres y Laboratorios' => TalleresLaboratorios::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Cafeteria' => Cafeteria::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Servicio Medico' => ServicioMedico::whereIn('alumno_id', $alumnos)->avg('promedio_final'),
            'Actividades Culturales Deportivas' => ActividadesCulturalesDeportivas::whereIn('alumno_id', $alumnos)->avg('promedio_final')
        ];

        $promediosValidos = array_filter($promedios, function ($promedio) {
            return $promedio !== null;
        });

        $promedio_general_global = count($promediosValidos) > 0 ? array_sum($promediosValidos) / count($promediosValidos) : 0;

        $data = array_map(function ($promedio) use ($promedio_general_global) {
            return [
                'Promedio' => $promedio,
                'Promedio General' => $promedio,
            ];
        }, $promedios);

        $data['Promedio General'] = [
            'Promedio' => $promedio_general_global,
            'Promedio General' => $promedio_general_global,
        ];

        $periodoActual = 'agosto-diciembre-2024';

        return view('administrador.grafica_por_carrera', compact('data', 'promedio_general_global', 'carrera', 'periodoActual', 'totalAlumnos'));
    }
}
