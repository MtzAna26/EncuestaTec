<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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




    // Graficas 
    public function GraficasSemestre($carrera, $semestre)
    {
    $alumnos = Alumno::where('carrera', $carrera)
                        ->where('semestre', $semestre)
                        ->get();

    return view('administrador.comparativas', compact('alumnos', 'carrera', 'semestre'));
    }

    // Para obtener el periodo

    public function obtenerAlumnosPorSemestre(Request $request) {
        $semestre = $request->input('semestre');
        
        // Define los semestres correspondientes para cada rango
        $semestresEneroJunio = ['Segundo_Semestre', 'Cuarto_Semestre', 'Sexto_Semestre', 'Octavo_Semestre'];
        $semestresAgostoDiciembre = ['Primer_Semestre', 'Tercer_Semestre', 'Quinto_Semestre', 'Septimo_Semestre'];
        
        // Filtrar los alumnos según el semestre seleccionado
        if ($semestre === 'enero-junio') {
            $alumnos = Alumno::whereIn('semestre', $semestresEneroJunio)->get(['nombre']);
        } else if ($semestre === 'agosto-diciembre') {
            $alumnos = Alumno::whereIn('semestre', $semestresAgostoDiciembre)->get(['nombre']);
        } else {
            $alumnos = [];
        }
        
        if ($request->ajax()) {
            return response()->json($alumnos);
        } else {
            return view('administrador.comparativas', compact('alumnos'));
        }
    }
    
    
}
