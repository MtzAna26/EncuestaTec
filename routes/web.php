<?php

use App\Http\Controllers\CentroInformacionController;
use App\Http\Controllers\CoordinacionCarrerasController;
use App\Http\Controllers\RecursosFinancierosController;
use App\Http\Controllers\ResidenciasProfesionalesController;
use App\Http\Controllers\CentroComputoController;
use App\Http\Controllers\ServicioSocialController;
use App\Http\Controllers\ServiciosEscolaresController;
use App\Http\Controllers\BecasController;
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
use App\Models\ResidenciasProfesionales;
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

// Rutas para el buzon de quejas
Route::get('/buzon-de-quejas', [BuzonController::class, 'quejas'])->name('buzon.quejas');


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
Route::post('/coordinacion_carreras', [CoordinacionCarrerasController::class, 'guardarRespuestas'])->name('encuestas.guardar_coordinacion_carreras');
// Departamento de coordinacion de carreras (gráficas)
Route::get('/coordinacion_carreras/grafica', [CoordinacionCarrerasController::class, 'mostrarFormularioGrafica'])->name('encuestas.grafica_coordinacion_carreras');
// Departamento de coordinacion de carreras (PDF)
Route::get('/coordinacion_carreras/pdf', [PDFController::class, 'generateCoordinacionCarrerasPDF'])->name('generate_coordinacion_carreras_pdf');
Route::get('/downloadCoordinacionCarreras', [PDFController::class, 'downloadCoordinacionCarreras'])->name('download-coordinacion-carreras');
Route::post('/downloadCoordinacionCarreras', [PDFController::class, 'downloadCoordinacionCarreras'])->name('download-coordinacion-carreras');


// Ruta para mostrar el formulario de encuestas de Recursos Financieros
Route::get('/encuestas/recursos_financieros', [RecursosFinancierosController::class, 'mostrarFormulario'])->name('encuestas.recursos_financieros');
// Ruta para guardar las respuestas del formulario de encuestas de Recursos Financieros
Route::post('/encuestas/recursos_financieros', [RecursosFinancierosController::class, 'guardarRespuestas'])->name('encuestas.guardar_recursos_financieros');
// Ruta para mostrar las gráficas de los resultados de Recursos Financieros
Route::get('/graficas/recursos_financieros', [RecursosFinancierosController::class, 'mostrarFormularioGrafica'])->name('graficas.recursos_financieros');
// Ruta para generar el PDF de los resultados de Recursos Financieros
Route::get('/recursos_financieros/pdf', [PDFController::class, 'generateRecursosFinancierosPDF'])->name('generate_reporte_financieros_pdf');
Route::get('/downloadRecursosFinancieros', [PDFController::class, 'downloadRecursosFinancieros'])->name('download-recursos-financieros');
Route::post('/downloadRecursosFinancieros', [PDFController::class, 'downloadRecursosFinancieros'])->name('download-recursos-financieros');


// Ruta para mostrar el formulario de encuestas de Residencias Profesionales
Route::get('/encuestas/residencias_profesionales', [ResidenciasProfesionalesController::class, 'mostrarFormulario'])->name('encuestas.residencias_profesionales');
// Ruta para guardar las respuestas del formulario de Residencias Profesionales
Route::post('/encuestas/residencias_profesionales', [ResidenciasProfesionalesController::class, 'guardarRespuestas'])->name('encuestas.guardar_residencias_profesionales');
// Ruta para mostrar las gráficas de los resultados de Residencias Profesionales
Route::get('/graficas/residencias_profesionales', [ResidenciasProfesionalesController::class, 'mostrarFormularioGrafica'])->name('graficas.grafica_residencias_profesionales');
Route::get('/datos-grafica', [ResidenciasProfesionalesController::class, 'getChartData']);
// Rutas para mostrar, generar y imprimir PDF
Route::get('/residencias_profesionales/pdf', [PDFController::class, 'generateResidenciasProfesionalesPDF'])->name('generate_reporte_residencias_pdf');
Route::get('/downloadResidenciasProfesionales', [PDFController::class, 'downloadResidenciasProfesionales'])->name('download-residencias-profesionales');
Route::post('/downloadResidenciasProfesionales', [PDFController::class, 'downloadResidenciasProfesionales'])->name('download-residencias-profesionales');


// Departamento de centro de computo (encuestas)
Route::get('/centro_computo', [CentroComputoController::class, 'mostrarFormulario'])->name('encuestas.centro_computo');
Route::post('/centro_computo', [CentroComputoController::class, 'guardarRespuestas'])->name('encuestas.guardar_centro_computo');
// Ruta para mostrar las gráficas de los resultados de Centro Computo
Route::get('/graficas/centro_computo', [CentroComputoController::class, 'mostrarFormularioGrafica'])->name('graficas.centro_computo');
// Rutas para mostrar, generar y imprimir PDF
Route::get('/centro_computo/pdf', [PDFController::class, 'generateCentroComputoPDF'])->name('generate_reporte_computo_pdf');
Route::get('/downloadCentroComputo', [PDFController::class, 'downloadCentroComputo'])->name('download-centro-computo');
Route::post('/downloadCentroComputo', [PDFController::class, 'downloadCentroComputo'])->name('download-centro-computo');


// Departamento de Servicio Social (encuestas)
Route::get('/servicio_social', [ServicioSocialController::class, 'mostrarFormulario'])->name('encuestas.servicio_social');
Route::post('/servicio_social', [ServicioSocialController::class, 'guardarRespuestas'])->name('encuestas.guardar_servicio_social');
// Ruta para mostrar las gráficas de los resultados de Servicio Social
Route::get('/graficas/servicio_social', [ServicioSocialController::class, 'mostrarFormularioGrafica'])->name('graficas.servicio_social');
// Rutas para generar pdf, decargar e imprimir
Route::get('/servicio_social/pdf', [PDFController::class, 'generateServicioSocialPDF'])->name('generate_reporte_social_pdf');
Route::get('/downloadServicioSocial', [PDFController::class, 'downloadServicioSocial'])->name('download-servicio-social');
Route::post('/downloadServicioSocial', [PDFController::class, 'downloadServicioSocial'])->name('download-servicio-social');



// Departamento de Servicios Escolars (encuestas)
Route::get('/servicios_escolares', [ServiciosEscolaresController::class, 'mostrarFormulario'])->name('encuestas.servicios_escolares');
Route::post('/servicios_escolares', [ServiciosEscolaresController::class, 'guardarRespuestas'])->name('encuestas.guardar_servicios_escolares');


// Departamento de Becas (encuestas)
Route::get('/becas', [BecasController::class, 'mostrarFormulario'])->name('encuestas.becas');


// Rutas para gráficas

Route::get('/graficas-semestre/{carrera}/{semestre}', [AuthAlumnoRegisterController::class, 'GraficasSemestre'])->name('graficas.semestre');
Route::get('/obtener-alumnos-por-semestre', [AuthAlumnoRegisterController::class, 'obtenerAlumnosPorSemestre']);

require __DIR__.'/auth.php';