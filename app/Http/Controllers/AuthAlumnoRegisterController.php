<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Alumno;
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

class AuthAlumnoRegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('alumno.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nip' => 'required|unique:alumnos,nip',
            'no_control' => 'required|unique:alumnos,no_control',
            'carrera' => 'required',
            'semestre' => 'required',
        ]);

        $alumno = new Alumno();
        $alumno->nip = $request->nip;
        $alumno->no_control = $request->no_control;
        $alumno->carrera = $request->carrera;
        $alumno->semestre = $request->semestre;

        // Obtener la información del período
        $periodoInfo = $alumno->generarPeriodo();

        // Crear el período
        $periodo = Periodo::create([
            'nombre' => $periodoInfo['nombre'],
            'fecha_inicio' => $periodoInfo['inicio'],
            'fecha_fin' => $periodoInfo['fin'],
            'año' => $periodoInfo['año'],
            'periodo' => $periodoInfo['periodo'],
        ]);

        if ($alumno->save()) {
            return redirect()->route('alumno.login')->with('success', '¡Registro exitoso! Por favor, inicia sesión.');
        } else {
            return back()->withInput()->withErrors(['error' => 'Hubo un problema al guardar el registro. Por favor, intenta de nuevo.']);
        }
    }


    // Para el administrador
    public function mostrarAlumnosPorCarreraYSemestre($carrera, $semestre)
    {
        $alumnos = Alumno::where('carrera', $carrera)
            ->where('semestre', $semestre)
            ->get();
        $alumnos = Alumno::all();
        return view('alumno.lista', compact('alumnos', 'carrera', 'semestre'));
    }

    public function eliminarAlumnosSeleccionados(Request $request, $carrera, $semestre)
    {
        $alumnosSeleccionados = $request->input('alumnosSeleccionados', []);
        $alumnos = Alumno::whereIn('id', $alumnosSeleccionados)->get();
        foreach ($alumnos as $alumno) {
            $alumno->delete();
        }
        return redirect()->route('carreras.semestres.alumnos.lista', ['carrera' => $carrera, 'semestre' => $semestre])
            ->with('success', 'Alumnos eliminados correctamente.');
    }

    // Eliminar alumnos para comenzar encuestas desde cero
    public function index()
    {
        $alumnos = Alumno::all();
        return view('alumno.index', compact('alumnos'));
    }

    public function resetAlumnos()
    {
        // Deshabilitar temporalmente la verificación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Eliminar todos los registros relacionados en la tabla de encuestas (o cualquier otra tabla relacionada)
        DB::table('encuestas')->delete(); // Asegúrate de reemplazar 'encuestas' con el nombre correcto de la tabla relacionada

        // Eliminar todos los registros de la tabla alumnos
        Alumno::query()->delete();

        // Reiniciar el autoincremento
        DB::statement('ALTER TABLE alumnos AUTO_INCREMENT = 1;');

        // Habilitar nuevamente la verificación de claves foráneas
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        return redirect()->route('alumnos.index')->with('success', 'Todos los alumnos eliminados y el ID reiniciado.');
    }

    // Graficas por semestre y carreras
    public function GraficasSemestre($carrera, $semestre)
    {
        $alumnos = Alumno::where('carrera', $carrera)
            ->where('semestre', $semestre)
            ->get();

        return view('administrador.comparativas', compact('alumnos', 'carrera', 'semestre'));
    }

    public function mostrarGrafica(Request $request)
    {

        $fechaActual = now();

        $añoActual = $fechaActual->year;

        $periodosFuturos = [];
        for ($i = 1; $i <= 10; $i++) {
            $año = $añoActual + $i;
            $periodoEneroJunio = $año . '-enero-junio';
            $periodoAgostoDiciembre = $año . '-agosto-diciembre';
            $periodosFuturos[] = $periodoEneroJunio;
            $periodosFuturos[] = $periodoAgostoDiciembre;
        }


        $periodos = Periodo::whereIn('nombre', $periodosFuturos)->get();

        $datosGrafica = [];
        foreach ($periodos as $periodo) {
            $count = Alumno::whereBetween('created_at', [$periodo->fecha_inicio, $periodo->fecha_fin])->count();
            $datosGrafica[$periodo->nombre] = $count;
        }

        return view('administrador.comparativas', compact('datosGrafica', 'periodos'));
    }



    // Semestres 
    public function mostrarSemestres()
    {
        $semestres = Alumno::select('semestre')->distinct()->get();
        return view('administrador.mostrar_semestres', compact('semestres'));
    }

    public function graficaPorSemestre(Request $request)
    {
        $carrera = $request->input('carrera');
        $semestre = $request->input('semestre');
    
        // Obtener alumnos por semestre y carrera
        $alumnos = Alumno::where('carrera', $carrera)
                         ->where('semestre', $semestre)
                         ->get();
        
        // Contar el total de alumnos
        $totalAlumnos = $alumnos->count();
    
        // Obtener datos relacionados de otras tablas
        $centroinformacionData = CentroInformacion::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $coordinacioncarrerasData = CoordinacionCarreras::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $recursosfinancierosData = RecursosFinancieros::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $centrocomputoData = CentroComputo::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $residenciasprofesionalesData = ResidenciasProfesionales::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $serviciosocialData = ServicioSocial::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $serviciosescolaresData = ServiciosEscolares::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $tallereslaboratoriosData = TalleresLaboratorios::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $becasData  = Becas::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $cafeteriaData = Cafeteria::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $servicioMedicoData = ServicioMedico::whereIn('alumno_id', $alumnos->pluck('id'))->get();
        $culturalesdeportivasData = ActividadesCulturalesDeportivas::whereIn('alumno_id', $alumnos->pluck('id'))->get();
    
        $departamentos = [
            'CentroInformacion' => $centroinformacionData,
            'CoordinacionCarreras' => $coordinacioncarrerasData,
            'RecursosFinancieros' => $recursosfinancierosData,
            'CentroComputo' => $centrocomputoData,
            'ResidenciasProfesionales' => $residenciasprofesionalesData,
            'ServicioSocial' => $serviciosocialData,
            'ServiciosEscolares' => $serviciosescolaresData,
            'TalleresLaboratorios' => $tallereslaboratoriosData,
            'Becas' => $becasData,
            'Cafeteria' => $cafeteriaData,
            'ServicioMedico' => $servicioMedicoData,
            'ActividadesCulturalesDeportivas' => $culturalesdeportivasData
        ];
    
        $promedios = [];
        $totalSum = 0;
        $totalCount = 0;
    
        foreach ($departamentos as $nombre => $data) {
            $count = $data->count();
            $promedio = $count / max($totalAlumnos, 1); // Evitar división por cero
            $promedios[$nombre] = $promedio;
            $totalSum += $promedio;
            $totalCount++;
        }
    
        $promedioGeneral = $totalCount ? ($totalSum / $totalCount) : 0;
    
        return view('administrador.grafica_por_semestre', compact('promedios', 'promedioGeneral', 'carrera', 'semestre', 'totalAlumnos'));
    }
    
}
