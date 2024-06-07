<?php

use App\Http\Controllers\CentroInformacionController;
use App\Http\Controllers\CoordinacionCarrerasController;
use App\Http\Controllers\RecursosFinancierosController;
use App\Http\Controllers\ResidenciasProfesionalesController;
use App\Http\Controllers\CentroComputoController;
use App\Http\Controllers\ServicioSocialController;
use App\Http\Controllers\ServiciosEscolaresController;
use App\Http\Controllers\BecasController;
use App\Http\Controllers\CafeteriaController;
use App\Http\Controllers\TalleresLaboratoriosController;
use App\Http\Controllers\ServicioMedicoController;
use App\Http\Controllers\CulturalesDeportivasController;
use App\Http\Controllers\GraficaController;
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

// Rutas para mostrar todos los usuarios creados por el admin
Route::get('/usuarios', [RegisteredUserController::class, 'index'])->name('usuarios.index');


// Ruta para mostrar el formulario de registro de alumno
Route::get('/registro/alumno', [AuthAlumnoRegisterController::class, 'showRegistrationForm'])->name('alumno.register');
// Ruta para procesar el registro de alumno
Route::post('/registro/alumno', [AuthAlumnoRegisterController::class, 'register']);

// Ruta para alumno
Route::get('/alumno/login', [AuthAlumnoLoginController::class, 'showLoginForm'])->name('alumno.login');
Route::post('/alumno/login', [AuthAlumnoLoginController::class, 'login'])->name('alumno.login');

Route::get('/alumnos', [AuthAlumnoRegisterController::class, 'index'])->name('alumnos.index');
Route::delete('/alumnos/reset', [AuthAlumnoRegisterController::class, 'resetAlumnos'])->name('alumnos.reset');


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
Route::get('/departamento/logout2',[login::class, 'logout'])->name('Departamentologout');

// Ruta para encuestas
Route::get('/comenzar-encuestas/centro-de-informacion', [EncuestaController::class, 'comenzarEncuestasCentroDeInformacion'])->name('encuestas.centro_informacion');
Route::post('/encuestas/menu', [EncuestaController::class, 'menu'])->name('encuestas.menu');
Route::get('/encuestas/menu', [EncuestaController::class, 'menu'])->name('encuestas.menu');
// Ruta para terminar encuestas (alumno)
Route::get('/encuestas/gracias', [EncuestaController::class, 'completarEncuesta'])->name('alumno.fin_encuestas'); 
// Admin rutas para desasctivar encuestas
//Route::put('/departamentos/{departamento}/desactivar-encuestas', 'DepartamentoController@desactivarEncuestas');



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
// Guardar la gráfica en el ordenador
Route::post('/guardar-grafica-centro-informacion', [GraficaController::class, 'guardarGraficaCentroInformacion'])->name('guardar-grafica-centro-informacion');
Route::get('/api/grafica-centro-informacion', [CentroInformacionController::class, 'obtenerDatosGrafica']);

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


// Ruta para mostrar el formulario de encuestas de Recursos Financieros
Route::get('/encuestas/recursos_financieros', [RecursosFinancierosController::class, 'mostrarFormulario'])->name('encuestas.recursos_financieros');
// Ruta para guardar las respuestas del formulario de encuestas de Recursos Financieros
Route::post('/encuestas/recursos_financieros', [RecursosFinancierosController::class, 'guardarRespuestas'])->name('encuestas.guardar_recursos_financieros');
// Ruta para mostrar las gráficas de los resultados de Recursos Financieros
Route::get('/graficas/recursos_financieros', [RecursosFinancierosController::class, 'mostrarFormularioGrafica'])->name('graficas.recursos_financieros');
// Ruta para generar el PDF de los resultados de Recursos Financieros
Route::get('/recursos_financieros/pdf', [PDFController::class, 'generateRecursosFinancierosPDF'])->name('generate_reporte_financieros_pdf');


// Ruta para mostrar el formulario de encuestas de Residencias Profesionales
Route::get('/encuestas/residencias_profesionales', [ResidenciasProfesionalesController::class, 'mostrarFormulario'])->name('encuestas.residencias_profesionales');
// Ruta para guardar las respuestas del formulario de Residencias Profesionales
Route::post('/encuestas/residencias_profesionales', [ResidenciasProfesionalesController::class, 'guardarRespuestas'])->name('encuestas.guardar_residencias_profesionales');
// Ruta para mostrar las gráficas de los resultados de Residencias Profesionales
Route::get('/graficas/residencias_profesionales', [ResidenciasProfesionalesController::class, 'mostrarFormularioGrafica'])->name('graficas.grafica_residencias_profesionales');
Route::get('/datos-grafica', [ResidenciasProfesionalesController::class, 'getChartData']);
// Rutas para mostrar, generar y imprimir PDF
Route::get('/residencias_profesionales/pdf', [PDFController::class, 'generateResidenciasProfesionalesPDF'])->name('generate_reporte_residencias_pdf');

// Departamento de centro de computo (encuestas)
Route::get('/centro_computo', [CentroComputoController::class, 'mostrarFormulario'])->name('encuestas.centro_computo');
Route::post('/centro_computo', [CentroComputoController::class, 'guardarRespuestas'])->name('encuestas.guardar_centro_computo');
// Ruta para mostrar las gráficas de los resultados de Centro Computo
Route::get('/graficas/centro_computo', [CentroComputoController::class, 'mostrarFormularioGrafica'])->name('graficas.centro_computo');
// Rutas para mostrar, generar y imprimir PDF
Route::get('/centro_computo/pdf', [PDFController::class, 'generateCentroComputoPDF'])->name('generate_reporte_computo_pdf');

// Departamento de Servicio Social (encuestas)
Route::get('/servicio_social', [ServicioSocialController::class, 'mostrarFormulario'])->name('encuestas.servicio_social');
Route::post('/servicio_social', [ServicioSocialController::class, 'guardarRespuestas'])->name('encuestas.guardar_servicio_social');
// Ruta para mostrar las gráficas de los resultados de Servicio Social
Route::get('/graficas/servicio_social', [ServicioSocialController::class, 'mostrarFormularioGrafica'])->name('graficas.servicio_social');
// Rutas para generar pdf, decargar e imprimir
Route::get('/servicio_social/pdf', [PDFController::class, 'generateServicioSocialPDF'])->name('generate_reporte_social_pdf');

// Departamento de Servicios Escolares (encuestas)
Route::get('/servicios_escolares', [ServiciosEscolaresController::class, 'mostrarFormulario'])->name('encuestas.servicios_escolares');
Route::post('/servicios_escolares', [ServiciosEscolaresController::class, 'guardarRespuestas'])->name('encuestas.guardar_servicios_escolares');
// Ruta para mostrar las gráficas de los resultados de Servicio Social
Route::get('/graficas/servicios_escolares', [ServiciosEscolaresController::class, 'mostrarFormularioGrafica'])->name('graficas.servicios_escolares');
// Rutas para generar pdf, decargar e imprimir
Route::get('/servicios_escolares/pdf', [PDFController::class, 'generateServiciosEscolaresPDF'])->name('generate_reporte_escolares_pdf');


// Departamento de Becas (encuestas)
Route::get('/becas', [BecasController::class, 'mostrarFormulario'])->name('encuestas.becas');
Route::post('/becas', [BecasController::class, 'guardarRespuestas'])->name('encuestas.guardar_becas');
// Ruta para mostrar las gráficas de los resultados de Servicio Social
Route::get('/graficas/becas', [BecasController::class, 'mostrarFormularioGrafica'])->name('graficas.becas');
// Rutas para generar pdf, decargar e imprimir
Route::get('/becas/pdf', [PDFController::class, 'generateBecasPDF'])->name('generate_reporte_becas_pdf');


// Deapartamento de talleres y laboratorios (encuestas)
Route::get('/talleres_laboratorios', [TalleresLaboratoriosController::class, 'mostrarFormulario'])->name('encuestas.talleres_laboratorios');
Route::post('/talleres_laboratorios', [TalleresLaboratoriosController::class, 'guardarRespuestas'])->name('encuestas.guardar_talleres_laboratorios');
// Ruta para mostrar las gráficas de los resultados de Talleres y laboratorios (encuestas)
Route::get('/graficas/talleres_laboratorios', [TalleresLaboratoriosController::class, 'mostrarFormularioGrafica'])->name('graficas.talleres_laboratorios');
Route::get('/talleres_laboratorios/pdf', [PDFController::class, 'generateTalleresLaboratoriosPDF'])->name('generate_reporte_talleres_laboratorio_pdf');
Route::post('/encuestas/omitir', [TalleresLaboratoriosController::class, 'omitirEncuesta'])->name('encuestas.omitir');



// Departamento de cafeteria (encuestas)
Route::get('/cafeteria', [CafeteriaController::class, 'mostrarFormulario'])->name('encuestas.cafeteria');
Route::post('/cafeteria',[CafeteriaController::class, 'guardarRespuestas'])->name('encuestas.guardar_cafeteria');
// Ruta para mostrar las gráficas de los resultados de Servicio Social
Route::get('/graficas/cafeteria', [CafeteriaController::class, 'mostrarFormularioGrafica'])->name('graficas.cafeteria');
// Rutas para generar pdf, decargar e imprimir
Route::get('/cafeteria/pdf', [PDFController::class, 'generateCafeteriaPDF'])->name('generate_reporte_cafeteria_pdf');


// Departamento de Servicios Medico (encuestas)
Route::get('/servicio_medico', [ServicioMedicoController::class, 'mostrarFormulario'])->name('encuestas.servicio_medico');
Route::post('/servicio_medico', [ServicioMedicoController::class, 'guardarRespuestas'])->name('encuestas.servicio_medico');
// Ruta para mostrar las gráficas de los resultados de Servicio Medico
Route::get('/graficas/servicio_medico', [ServicioMedicoController::class, 'mostrarFormularioGrafica'])->name('graficas.servicio_medico');
// Rutas para generar pdf, decargar e imprimir
Route::get('/servicio_medico/pdf', [PDFController::class, 'generateServicioMedicoPDF'])->name('generate_reporte_servicio_medico_pdf');

// Departamento de Actividades Culturales Deportivas
Route::get('/culturales_deportivas', [CulturalesDeportivasController::class, 'mostrarFormulario'])->name('encuestas.actividades_culturales_deportivas');
Route::post('/culturales_deportivas', [CulturalesDeportivasController::class, 'guardarRespuestas'])->name('encuestas.actividades_culturales_deportivas');
// Ruta para mostrar las gráficas de los resultados de Actividades Culturales y Deportivas
Route::get('/graficas/culturales_deportivas', [CulturalesDeportivasController::class, 'mostrarFormularioGrafica'])->name('graficas.culturales_deportivas');
// Rutas para generar pdf, decargar e imprimir
Route::get('/culturales_deportivas/pdf', [PDFController::class, 'generateCulturalesDeportivasPDF'])->name('generate_reporte_culturales_deportivas_pdf');


// Rutas para gráficas
Route::get('/grafica/{periodoId}', [GraficaController::class, 'mostrarGrafica'])->name('grafica.general');
Route::get('/periodos', [GraficaController::class, 'seleccionarPeriodo'])->name('seleccionarPeriodo');
Route::get('/grafica/{periodo}', [GraficaController::class, 'mostrarGrafica'])->name('mostrarGrafica');
Route::get('/periodos', [GraficaController::class, 'seleccionarPeriodo'])->name('seleccionarPeriodo');

// Ruta para las carreras y graficas
Route::get('/mostrar-carreras', [GraficaController::class, 'mostrarCarreras'])->name('mostrar_carreras');
Route::get('/mostrar-carrera/{carrera}', [GraficaController::class, 'mostrarGraficaPorCarrera'])->name('mostrar_carrera');

// Rutas para guardar la gráfica general.
Route::post('/guardar-grafica', [GraficaController::class, 'guardarGrafica']);

// Ruta para pdf grafica general 
Route::get('/generate-pdf', [GraficaController::class, 'generateGraficaGeneralPDF'])->name('generate.pdf');

Route::get('/obtener-alumnos-por-semestre', [AuthAlumnoRegisterController::class, 'obtenerAlumnosPorSemestre']);

/* Para pruebas de los peridoos
Route::get('/test-generar-periodo', [GraficaController::class, 'testGenerarPeriodo']); */
require __DIR__.'/auth.php';