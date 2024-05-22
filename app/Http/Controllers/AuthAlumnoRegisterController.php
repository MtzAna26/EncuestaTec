<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alumno; 

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
            // Si no se encuentra ningún semestre coincidente, devuelve un array vacío
            $alumnos = [];
        }
        
        if ($request->ajax()) {
            // Si la solicitud es una solicitud AJAX, devuelve los datos en formato JSON
            return response()->json($alumnos);
        } else {
            // Si es una solicitud web normal, redirige o renderiza una vista según lo necesites
            // Por ejemplo, puedes redirigir a una vista que muestre los datos en formato tabular
            // o renderizar una vista con las gráficas directamente
            return view('administrador.comparativas', compact('alumnos'));
        }
    }
    
    
}
