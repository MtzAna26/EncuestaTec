<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Periodo;
use App\Models\Alumno; 

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
        // Obtener la fecha actual
        $fechaActual = now();
    
        // Obtener el año actual
        $añoActual = $fechaActual->year;
    
        // Determinar los periodos futuros
        $periodosFuturos = [];
        for ($i = 1; $i <= 10; $i++) { 
            $año = $añoActual + $i;
            $periodoEneroJunio = $año . '-enero-junio';
            $periodoAgostoDiciembre = $año . '-agosto-diciembre';
            $periodosFuturos[] = $periodoEneroJunio;
            $periodosFuturos[] = $periodoAgostoDiciembre;
        }
    
        // Obtener todos los periodos (tanto pasados como futuros)
        $periodos = Periodo::whereIn('nombre', $periodosFuturos)->get();
    
        $datosGrafica = [];
    
        // Contar los alumnos por cada periodo
        foreach ($periodos as $periodo) {
            $count = Alumno::whereBetween('created_at', [$periodo->fecha_inicio, $periodo->fecha_fin])->count();
            $datosGrafica[$periodo->nombre] = $count;
        }
    
        return view('administrador.comparativas', compact('datosGrafica', 'periodos'));
    }
    
}