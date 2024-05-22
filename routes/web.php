<?php

use App\Http\Controllers\CentroInformacionController;
use App\Http\Controllers\CoordinacionCarrerasController;
use App\Http\Controllers\RecursosFinancierosController;
use App\Http\Controllers\ResidenciasProfesionalesController;
use App\Http\Controllers\CentroComputoController;
use App\Http\Controllers\ServicioSocialController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthAlumnoRegisterController;
use App\Http\Controllers\AuthAlumnoLoginController;
use App\Http\Controllers\Auth\DepartamentoLoginController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\BuzonController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\DepartamentoInicio;
use App\Http\Controllers\DepartamentoTablas;
use App\Http\Controllers\login;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/register', [RegisteredUserController::class, 'create'])
        ->middleware('guest')
        ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
        ->middleware('guest');
        
Route::post('/users', [RegisteredUserController::class, 'store'])->name('users.store');


// Ruta para mostrar el formulario de registro de alumno
Route::get('/registro/alumno', [AuthAlumnoRegisterController::class, 'showRegistrationForm'])->name('alumno.register');
// Ruta para procesar el registro de alumno
Route::post('/registro/alumno', [AuthAlumnoRegisterController::class, 'register']);

// Ruta para alumno
Route::get('/alumno/login', [AuthAlumnoLoginController::class, 'showLoginForm'])->name('alumno.login');
Route::post('/alumno/login', [AuthAlumnoLoginController::class, 'login'])->name('alumno.login');

// Rutas de departamento
Route::get('/departamento/login', [DepartamentoController::class, 'showLoginForm'])->name('departamento.login');
Route::post('/departamento/login', [DepartamentoController::class, 'login']);
Route::get('/departamento/dashboard', [DepartamentoController::class, 'dashboard'])->name('departamento.dashboard');

// Depatamento
Route::get('/departamento/inicio/{Departamento}',[DepartamentoInicio::class, 'inicio'])->name('DepartamentoInio');
Route::get('/departamento/tablas/{Departamento}/{ciclo}',[DepartamentoTablas::class, 'inicio'])->name('DepartamentoTablas');
Route::post('/departamento/login2',[login::class, 'login'])->name('Departamentologin');

// Ruta para encuestas
Route::get('/comenzar-encuestas/centro-de-informacion', [EncuestaController::class, 'comenzarEncuestasCentroDeInformacion'])->name('encuestas.centro_informacion');
Route::post('/encuestas/menu', [EncuestaController::class, 'menu'])->name('encuestas.menu');
Route::get('/encuestas/menu', [EncuestaController::class, 'menu'])->name('encuestas.menu');

// Departamento centro de informacion (encuesta)
Route::get('/formulario', [CentroInformacionController::class, 'mostrarFormulario'])->name('formulario');
Route::post('/guardar-respuestas', [CentroInformacionController::class, 'guardarRespuestas'])->name('guardar_evaluacion');

// Buzon de quejas 
Route::get('quejas', [BuzonController::class, 'quejas'])->name('quejas.form');
Route::post('quejas', [BuzonController::class, 'create'])->name('quejas.create');
Route::get('admin/ver-quejas', [BuzonController::class, 'verQuejas'])->name('admin.quejas');


// Ruta para que el admin  pueda ver, y buscar  carrera de los alumnos 
Route::get('/carreras/{carrera}/semestres/{semestre}', [AuthAlumnoRegisterController::class, 'mostrarAlumnosPorCarreraYSemestre'])->name('carreras.semestres.alumnos.lista');
Route::get('/alumnos/{carrera}/{semestre}', [AuthAlumnoRegisterController::class, 'mostrarAlumnosPorCarreraYSemestre']);
Route::get('/carreras/{carrera}/semestres/{semestre}/alumnos', [AuthAlumnoRegisterController::class, 'mostrarAlumnosPorCarreraYSemestre'])->name('carreras.semestres.alumnos.lista');
// Ruta para eliminar alumnos seleccionados
Route::post('/carreras/{carrera}/semestres/{semestre}/alumnos/eliminar', [AuthAlumnoRegisterController::class, 'eliminarAlumnosSeleccionados'])->name('alumnos.eliminar');


// Ruta para que el admin pueda ver y editar encuesta del dep.centro de informacion 
// Ruta para graficas de centro de informacion
Route::get('/centros-informacion/grafica', [CentroInformacionController::class, 'mostrarFormularioGrafica'])
    ->name('centros-informacion.grafica');
// Ruta para obtener todas las respuestas
Route::get('/obtenerRespuestas', [CentroInformacionController::class, 'obtenerRespuestas']);
// Ruta para PDF Dep_Centro_Informacion 
Route::get('/generate-question-report', [PDFController::class, 'generateQuestionReport']);
Route::get('/generate-question-report', [PDFController::class, 'generateQuestionReport'])->name('generate-question-report');
Route::get('/download-question-report', [PDFController::class, 'downloadQuestionReport']);

Route::get('/generate-question-report', [PDFController::class, 'generateQuestionReport'])->name('generate-question-report');
Route::post('/download-question-report', [PDFController::class, 'downloadQuestionReport'])->name('download-question-report');

// Ruta para la vista que muestra la gráfica
Route::get('/grafica-respuestas', function () {
    return view('graficaRespuestas');
});


    // Rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::get('/mostrar-formulario-auth', [CentroInformacionController::class, 'mostrarFormulario'])->name('auth.mostrar_formulario');
    Route::post('/guardar-respuestas-auth', [CentroInformacionController::class, 'guardarRespuestas'])->name('auth.guardar_respuestas');
});

// Departamento de coordinacion de carreras (encuesta)
Route::get('/coordinacion_carreras', [CoordinacionCarrerasController::class, 'mostrarFormulario'])->name('encuestas.coordinacion_carreras');
Route::get('/coordinacion_carreras', [CoordinacionCarrerasController::class, 'mostrarFormulario'])->name('encuestas.coordinacion_carreras');
Route::post('/coordinacion_carreras', [CoordinacionCarrerasController::class, 'guardarRespuestas'])->name('encuestas.guardar_coordinacion_carreras');
// Departamento de coordinacion de carreras (gráficas)
Route::get('/coordinacion_carreras/grafica', [CoordinacionCarrerasController::class, 'mostrarFormularioGrafica'])->name('encuestas.grafica_coordinacion_carreras');
// Departamento de coordinacion de carreras (PDF)
Route::get('/coordinacion_carreras/pdf', [PDFController::class, 'generateCoordinacionCarrerasPDF'])->name('generate_coordinacion_carreras_pdf');
Route::get('/downloadCoordinacionCarreras', [PDFController::class, 'downloadCoordinacionCarreras'])->name('download-coordinacion-carreras');
Route::post('/downloadCoordinacionCarreras', [PDFController::class, 'downloadCoordinacionCarreras'])->name('download-coordinacion-carreras');

// Departamento de recursos finacieros (encuesta)
Route::get('/recursos_financieros', [RecursosFinancierosController::class, 'mostrarFormulario'])->name('encuestas.recursos_financieros');
Route::get('/recursos_financieros', [RecursosFinancierosController::class, 'mostrarFormulario'])->name('encuestas.recursos_financieros');
Route::post('/recursos_financieros', [RecursosFinancierosController::class, 'guardarRespuestas'])->name('encuestas.guardar_recursos_financieros');

// Departamento de residencias profesionales (encuestas)
Route::get('/residencias_profesionales', [ResidenciasProfesionalesController::class, 'mostrarFormulario'])->name('encuestas.residencias_profesionales');
Route::post('/residencias_profesionales', [ResidenciasProfesionalesController::class, 'guardarRespuestas'])->name('encuestas.guardar_residencias_profesionales');

// Departamento de centro de computo (encuestas)
Route::get('/centro_computo', [CentroComputoController::class, 'mostrarFormulario'])->name('encuestas.centro_computo');
Route::post('/centro_computo', [CentroComputoController::class, 'guardarRespuestas'])->name('encuestas.guardar_centro_computo');


// Departamento de Servicio Social (encuetas)
Route::get('/servicio_social', [ServicioSocialController::class, 'mostrarFormulario'])->name('encuestas.servicio_social');
//Route::get('/servicio_social', [ServicioSocialController::class, 'mostrarFormulario'])->name('encuestas.servicio_social');
//Route::post('/servicio_social', [ServicioSocialController::class, 'guardarRespuestas'])->name('encuestas.guardar_servicio_social');


// Rutas para el buzon de quejas
Route::get('/buzon-de-quejas', [BuzonController::class, 'quejas'])->name('buzon.quejas');

// Rutas para gráficas

Route::get('/graficas-semestre/{carrera}/{semestre}', [AuthAlumnoRegisterController::class, 'GraficasSemestre'])->name('graficas.semestre');
Route::get('/obtener-alumnos-por-semestre', [AuthAlumnoRegisterController::class, 'obtenerAlumnosPorSemestre']);

require __DIR__.'/auth.php';
