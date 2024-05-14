<?php

use App\Http\Controllers\CentroInformacionController;
use App\Http\Controllers\CoordinacionCarrerasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\AuthAlumnoRegisterController;
use App\Http\Controllers\AuthAlumnoLoginController;
use App\Http\Controllers\Auth\DepartamentoLoginController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\BuzonController;
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

// Ruta para que el admin pueda ver las comparativas del semestre
//Route::get('/comparativas/semestres', [EncuestaController::class, 'comparativasSemestres'])->name('comparativas.semestres');
//Route::get('/comparativas/semestres', [EncuestaController::class, 'comparativasSemestres'])->name('comparativas.semestres');


// Ruta para que el admin pueda ver encuesta del dep.centro de informacion 
Route::get('/centros-informacion', [CentroInformacionController::class, 'index'])->name('centros-informacion.index');
Route::get('/centros-informacion/{centroInformacion}/editar', [CentroInformacionController::class, 'update'])->name('centros-informacion.editar');


// Ruta para que el admin pueda editar encuesta del dep.centro de informacion 
Route::get('/centros-informacion', [CentroInformacionController::class, 'index'])->name('centros-informacion.index');
Route::get('/centros-informacion/{centroInformacion}/editar', [CentroInformacionController::class, 'editar'])->name('centros-informacion.editar');
Route::get('/centros-informacion/{centroInformacion}/editar', [CentroInformacionController::class, 'mostrarFormulario'])->name('centros-informacion.editar');





// Rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::get('/mostrar-formulario-auth', [CentroInformacionController::class, 'mostrarFormulario'])->name('auth.mostrar_formulario');
    Route::post('/guardar-respuestas-auth', [CentroInformacionController::class, 'guardarRespuestas'])->name('auth.guardar_respuestas');
});

// Departamento de coordinacion de carreras (encuesta)
Route::get('/coordinacion_carreras', [CoordinacionCarrerasController::class, 'mostrarFormulario'])->name('encuestas.coordinacion_carreras');

// Rutas para el buzon de quejas
Route::get('/buzon-de-quejas', [BuzonController::class, 'quejas'])->name('buzon.quejas');

// Depatamento
Route::get('/departamento/inicio/{Departamento}',[DepartamentoInicio::class, 'inicio'])->name('DepartamentoInio');
Route::get('/departamento/tablas/{Departamento}/{ciclo}',[DepartamentoTablas::class, 'inicio'])->name('DepartamentoTablas');
Route::post('/departamento/login2',[login::class, 'login'])->name('Departamentologin');

require __DIR__.'/auth.php';
