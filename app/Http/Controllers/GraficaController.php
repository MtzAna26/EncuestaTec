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


    public function seleccionarPeriodo()
    {
        $periodos = Periodo::all();
        return view('administrador.periodos', compact('periodos'));
    }

    public function mostrarGrafica(Request $request)
    {

        $periodoActual = Periodo::where('fecha_inicio', '<=', now())
            ->where('fecha_fin', '>=', now())
            ->value('nombre');
        if (!$periodoActual) {
            $periodoActual = 'agosto-diciembre-2024'; // Ajusta esto según tus necesidades
        }
        // Aqui crea un nuevo registro y guardar la gráfica
        //Esto lo quitas si no sirve
        $periodo = Periodo::firstOrCreate(
            ['nombre' => 'agosto-diciembre-2024'],
            ['fecha_inicio' => '2024-08-01', 'fecha_fin' => '2024-12-31']
        );

        // Obtener la gráfica asociada al período
        $grafica = $periodo->grafica;


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


        // Crear un array con los promedios de cada departamento
        $data = [
            'Centro de Información' => [
                'Promedio' => $promedio_ci,
                'Promedio General' => $promedio_ci,
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

        //$promedio_general = ($promedio_ci + $promedio_cc + $promedio_rf + $promedio_rp + $promedio_cco + $promedio_ss + $promedio_se + $promedio_becas + $promedio_tl + $promedio_cafeteria + $promedio_sm + $promedio_acd) / 12;
        return view('administrador.grafica_index', compact('data', 'promedio_general_global', 'periodoActual'));
    }


    // Grafica por semstres (carreras)
    public function mostrarCarreras(Request $request)
    {
        // Carreras faltantes
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

        // Combinar las carreras de la base de datos con las carreras faltantes
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


        $promedio_general_global = array_sum(array_filter($promedios)) / count(array_filter($promedios));

        $data = array_map(function ($promedio) {
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


    // Para guardar la gráfica en el ordenador
    public function guardarGrafica(Request $request)
    {
        try {
            +$validator = Validator::make($request->all(), [
                'image' => 'required',
                'periodo' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }

            $imageData = $request->input('image');
            $periodo = $request->input('periodo');

            // Verificar si ya existe una gráfica para el período dado
            $graficaExistente = Grafica::where('periodo', $periodo)->first();
            if ($graficaExistente) {
                return response()->json(['message' => 'Ya existe una gráfica para este período'], 400);
            }

            // Decodificar la imagen base64
            $imageName = 'grafica_' . $periodo . '.png';
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageData = base64_decode($imageData);

            // Ruta de la carpeta en el escritorio
            $desktopPath = 'C:\Users\Propietario\Documents\Grafica_General';
            if (!file_exists($desktopPath)) {
                mkdir($desktopPath, 0777, true);
            }
            $path = $desktopPath . DIRECTORY_SEPARATOR . $imageName;

            // Guardar la imagen en la carpeta del escritorio
            file_put_contents($path, $imageData);

            // Almacenar la ruta de la imagen en la base de datos
            $grafica = new Grafica();
            $grafica->ruta_imagen = $path;
            $grafica->periodo = $periodo;
            $grafica->save();
            Session::flash('success', '¡La gráfica general se ha guardado exitosamente!');
            return response()->json(['message' => 'Gráfica General guardada exitosamente en la ruta especificada']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }




    // Para guardar la gráfica del Centro de Información en una ruta específica
    public function guardarGraficaCentroInformacion(Request $request)
    {
        try {
            // Validar la solicitud
            $validator = Validator::make($request->all(), [
                'image' => 'required',
                'periodo' => 'required',
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 400);
            }

            $imageData = $request->input('image');
            $periodo = $request->input('periodo');

            $imageName = 'grafica_centro_informacion_' . $periodo . '.png';
            $imageData = str_replace('data:image/png;base64,', '', $imageData);
            $imageData = str_replace(' ', '+', $imageData);
            $imageData = base64_decode($imageData);

            // Ruta de la carpeta en la dirección específica
            $specificPath = 'C:\Users\Propietario\Documents\Grafica_General\Grafica_Encuestas_Agosto_Diciembre2024';
            if (!file_exists($specificPath)) {
                mkdir($specificPath, 0777, true);
            }
            $path = $specificPath . DIRECTORY_SEPARATOR . $imageName;

            // Guardar la imagen en la carpeta especificada
            file_put_contents($path, $imageData);

            // Almacenar la ruta de la imagen en la base de datos
            $grafica = new Grafica();
            $grafica->ruta_imagen = $path;
            $grafica->periodo = $periodo;
            $grafica->save();
            Session::flash('success', '¡La gráfica del Centro de Información se ha guardado exitosamente!');
            return response()->json(['message' => 'Gráfica del Centro de Información guardada exitosamente en la ruta especificada']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
