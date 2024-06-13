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
// Buzon de quejas 
Route::get('quejas', [BuzonController::class, 'quejas'])->name('quejas.form');
Route::post('quejas', [BuzonController::class, 'create'])->name('quejas.create');
Route::get('admin/ver-quejas', [BuzonController::class, 'verQuejas'])->name('admin.quejas');



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

// Departamento centro de informacion (encuesta)
Route::get('/formulario', [CentroInformacionController::class, 'mostrarFormulario'])->name('formulario');
Route::post('/guardar-respuestas', [CentroInformacionController::class, 'guardarRespuestas'])->name('guardar_evaluacion');
// Ruta para graficas de centro de informacion
Route::get('/centros-informacion/grafica', [CentroInformacionController::class, 'mostrarFormularioGrafica'])
    ->name('centros-informacion.grafica');
// Ruta para obtener todas las respuestas
Route::get('/obtenerRespuestas', [CentroInformacionController::class, 'obtenerRespuestas']);

Route::get('centros-informacion/{periodoId}/grafica', 'CentroInformacionController@mostrarInformacionPeriodo')->name('centros_informacion.grafica');

// Ruta para PDF Dep_Centro_Informacion 
Route::get('/generate-question-report', [PDFController::class, 'generateQuestionReport']);
Route::get('/generate-question-report', [PDFController::class, 'generateQuestionReport'])->name('generate-question-report');
Route::get('/download-question-report', [PDFController::class, 'downloadQuestionReport']);
Route::get('/generate-question-report', [PDFController::class, 'generateQuestionReport'])->name('generate-question-report');
Route::post('/download-question-report', [PDFController::class, 'downloadQuestionReport'])->name('download-question-report');
// Guardar la gráfica en el ordenador
Route::post('/guardar-grafica-centro-informacion', [GraficaController::class, 'guardarGraficaCentroInformacion'])->name('guardar-grafica-centro-informacion');
Route::get('/api/grafica-centro-informacion', [CentroInformacionController::class, 'obtenerDatosGrafica']);
// Rutas de los periodos de dep.centro informacion
Route::get('/encuestas/periodos', [CentroInformacionController::class, 'verPeriodos'])->name('encuestas.periodos.index');
// Ruta para obtener los datos de la gráfica de un período específico
Route::get('/api/centros-informacion/{periodoId}/datos-grafica', [CentroInformacionController::class, 'obtenerDatosGraficaPeriodo'])->name('api.centros_informacion.datos_grafica');
Route::get('/grafica-centro-informacion/{periodoId}', [CentroInformacionController::class, 'mostrarFormularioGrafica'])->name('ver.grafica.centro.informacion');
Route::get('/grafica-centro-informacion/{periodoId}', [CentroInformacionController::class, 'mostrarFormularioGrafica'])->name('grafica-centro-informacion');




// Ruta para que el admin  pueda ver, y buscar  carrera de los alumnos 
Route::get('/carreras/{carrera}/semestres/{semestre}', [AuthAlumnoRegisterController::class, 'mostrarAlumnosPorCarreraYSemestre'])->name('carreras.semestres.alumnos.lista');
Route::get('/alumnos/{carrera}/{semestre}', [AuthAlumnoRegisterController::class, 'mostrarAlumnosPorCarreraYSemestre']);
Route::get('/carreras/{carrera}/semestres/{semestre}/alumnos', [AuthAlumnoRegisterController::class, 'mostrarAlumnosPorCarreraYSemestre'])->name('carreras.semestres.alumnos.lista');
// Ruta para eliminar alumnos seleccionados
Route::post('/carreras/{carrera}/semestres/{semestre}/alumnos/eliminar', [AuthAlumnoRegisterController::class, 'eliminarAlumnosSeleccionados'])->name('alumnos.eliminar');



// Ruta para la vista que muestra la gráfica
Route::get('/grafica-respuestas', function () {
    return view('graficaRespuestas');
});


    // Rutas que requieren autenticación
Route::middleware('auth')->group(function () {
    Route::get('/mostrar-formulario-auth', [CentroInformacionController::class, 'mostrarFormulario'])->name('auth.mostrar_formulario');
    Route::post('/guardar-respuestas-auth', [CentroInformacionController::class, 'guardarRespuestas'])->name('auth.guardar_respuestas');
});


// Departamento de coordinación de carreras (encuesta)
Route::get('/coordinacion_carreras', [CoordinacionCarrerasController::class, 'mostrarFormulario'])->name('encuestas.coordinacion_carreras');
Route::post('/coordinacion_carreras', [CoordinacionCarrerasController::class, 'guardarRespuestas'])->name('encuestas.guardar_coordinacion_carreras');

// Departamento de coordinación de carreras (gráficas)
Route::get('/coordinacion_carreras/grafica', [CoordinacionCarrerasController::class, 'mostrarFormularioGrafica'])->name('encuestas.grafica_coordinacion_carreras');

// Departamento de coordinación de carreras (PDF)
Route::get('/coordinacion_carreras/pdf', [PDFController::class, 'generateCoordinacionCarrerasPDF'])->name('generate_coordinacion_carreras_pdf');

// Para los periodos de coordinación de carreras
Route::get('/coordinacion_carreras_periodos', [CoordinacionCarrerasController::class, 'mostrarPeriodos'])->name('encuestas.mostrarPeriodos');
Route::get('/coordinacion_carreras/grafica/{periodo_id}', [CoordinacionCarrerasController::class, 'mostrarFormularioGrafica'])->name('encuestas.grafica_coordinacion_carreras');


// Ruta para mostrar el formulario de encuestas de Recursos Financieros
Route::get('/encuestas/recursos_financieros', [RecursosFinancierosController::class, 'mostrarFormulario'])->name('encuestas.recursos_financieros');
// Ruta para guardar las respuestas del formulario de encuestas de Recursos Financieros
Route::post('/encuestas/recursos_financieros', [RecursosFinancierosController::class, 'guardarRespuestas'])->name('encuestas.guardar_recursos_financieros');
// Ruta para mostrar las gráficas de los resultados de Recursos Financieros
Route::get('/graficas/recursos_financieros', [RecursosFinancierosController::class, 'mostrarFormularioGrafica'])->name('graficas.recursos_financieros');
// Ruta para generar el PDF de los resultados de Recursos Financieros
Route::get('/recursos_financieros/pdf', [PDFController::class, 'generateRecursosFinancierosPDF'])->name('generate_reporte_financieros_pdf');
// Para lo periodos recursos financieros
Route::get('/periodos/recursos_financieros', [RecursosFinancierosController::class, 'mostrarPeriodos'])->name('periodos.listado_periodos');
Route::get('/graficas/recursos_financieros/{periodoId}', [RecursosFinancierosController::class, 'verGraficaPeriodo'])->name('graficas.recursos_financieros_periodo');



// Ruta para mostrar el formulario de encuestas de Residencias Profesionales
Route::get('/encuestas/residencias_profesionales', [ResidenciasProfesionalesController::class, 'mostrarFormulario'])->name('encuestas.residencias_profesionales');
// Ruta para guardar las respuestas del formulario de Residencias Profesionales
Route::post('/encuestas/residencias_profesionales', [ResidenciasProfesionalesController::class, 'guardarRespuestas'])->name('encuestas.guardar_residencias_profesionales');
// Ruta para mostrar las gráficas de los resultados de Residencias Profesionales
Route::get('/graficas/residencias_profesionales/{periodoId}', [ResidenciasProfesionalesController::class, 'mostrarFormularioGrafica'])->name('graficas.grafica_residencias_profesionales');
// Ruta para obtener los datos de la gráfica
Route::get('/datos-grafica', [ResidenciasProfesionalesController::class, 'getChartData']);
// Ruta para generar y descargar el PDF
Route::get('/residencias_profesionales/pdf', [PDFController::class, 'generateResidenciasProfesionalesPDF'])->name('generate_reporte_residencias_pdf');
Route::get('/residencias_profesionales/pdf/{periodoId}', [PDFController::class, 'generateResidenciasProfesionalesPDF'])->name('generate_reporte_residencias_pdf');
// Ruta para mostrar los periodos de Residencias Profesionales
Route::get('/periodos/residencias_profesionales', [ResidenciasProfesionalesController::class, 'mostrarPeriodosResidencias'])->name('periodos.residencias_profesionales');

// Departamento de centro de computo (encuestas)
Route::get('/centro_computo', [CentroComputoController::class, 'mostrarFormulario'])->name('encuestas.centro_computo');
Route::post('/centro_computo', [CentroComputoController::class, 'guardarRespuestas'])->name('encuestas.guardar_centro_computo');
// Ruta para mostrar las gráficas de los resultados de Centro Computo
Route::get('/graficas/centro_computo', [CentroComputoController::class, 'mostrarFormularioGrafica'])->name('graficas.centro_computo');
// Ruta para mostrar las gráficas de los resultados de Centro Computo
Route::get('/graficas/centro_computo/{periodo_id}', [CentroComputoController::class, 'mostrarFormularioGrafica'])->name('graficas.centro_computo');
// Rutas para mostrar, generar y imprimir PDF
Route::get('/centro_computo/pdf', [PDFController::class, 'generateCentroComputoPDF'])->name('generate_reporte_computo_pdf');
// Ruta para mostrar lso periodos de Centro Computo
Route::get('/centro_computo_periodos', [CentroComputoController::class, 'mostrarPeriodos'])->name('encuestas.centro_computo_periodos');


// Departamento de Servicio Social (encuestas)
Route::get('/servicio_social', [ServicioSocialController::class, 'mostrarFormulario'])->name('encuestas.servicio_social');
Route::post('/servicio_social', [ServicioSocialController::class, 'guardarRespuestas'])->name('encuestas.guardar_servicio_social');
// Ruta para mostrar las gráficas de los resultados de Servicio Social
Route::get('/graficas/servicio_social', [ServicioSocialController::class, 'mostrarFormularioGrafica'])->name('graficas.servicio_social');
Route::get('/graficas/servicio_social/{periodo_id}', [ServicioSocialController::class, 'mostrarGraficaPorPeriodo'])->name('graficas.servicio_social_por_periodo');
Route::get('/servicio_social/pdf/{periodo_id}', [PDFController::class, 'generateServicioSocialPDF'])->name('generate_servicio_social_pdf');
// Rutas para generar pdf, decargar e imprimir
Route::get('/servicio_social/pdf', [PDFController::class, 'generateServicioSocialPDF'])->name('generate_reporte_social_pdf');
// Periodos para Servicio Social
Route::get('/servicio_social/periodos', [ServicioSocialController::class, 'mostrarPeriodos'])->name('servicio_social.mostrarPeriodos');


// Departamento de Servicios Escolares (encuestas)
Route::get('/servicios_escolares', [ServiciosEscolaresController::class, 'mostrarFormulario'])->name('encuestas.servicios_escolares');
Route::post('/servicios_escolares', [ServiciosEscolaresController::class, 'guardarRespuestas'])->name('encuestas.guardar_servicios_escolares');
// Ruta para mostrar las gráficas de los resultados de Servicio Social
Route::get('/graficas/servicios_escolares', [ServiciosEscolaresController::class, 'mostrarFormularioGrafica'])->name('graficas.servicios_escolares');
Route::get('/graficas/servicios_escolares/{periodo_id}', [ServiciosEscolaresController::class, 'mostrarGraficaPorPeriodo'])->name('graficas.servicios_escolares_por_periodo');
// Rutas para generar pdf, decargar e imprimir
Route::get('/servicios_escolares/pdf', [PDFController::class, 'generateServiciosEscolaresPDF'])->name('generate_reporte_escolares_pdf');
Route::get('/servicios_escolares/pdf', [PDFController::class, 'generateServiciosEscolaresPDF'])->name('generate_servicios_escolares_pdf');
Route::get('/servicios_escolares/pdf/{periodo_id}', [PDFController::class, 'generateServiciosEscolaresPDF'])->name('generate_servicios_escolares_pdf');
// Periodos para Servicios Escolares
Route::get('/servicios_escolares/periodos', [ServiciosEscolaresController::class, 'mostrarPeriodos'])->name('servicios_escolares.mostrarPeriodos');



// Departamento de Becas (encuestas)
Route::get('/becas', [BecasController::class, 'mostrarFormulario'])->name('encuestas.becas');
Route::post('/becas', [BecasController::class, 'guardarRespuestas'])->name('encuestas.guardar_becas');
// Ruta para mostrar las gráficas de los resultados de Servicio Social
Route::get('/graficas/becas', [BecasController::class, 'mostrarFormularioGrafica'])->name('graficas.becas');
// Rutas para generar pdf, decargar e imprimir
Route::get('/becas/pdf', [PDFController::class, 'generateBecasPDF'])->name('generate_reporte_becas_pdf');
// Periodos para Becas
Route::get('/periodos-becas', [BecasController::class, 'mostrarPeriodos'])->name('periodos.becas');
// Ruta para mostrar las gráficas de los resultados de Becas
Route::get('/graficas/becas/{periodo_id}', [BecasController::class, 'mostrarFormularioGrafica'])->name('graficas.becas');


// Deapartamento de talleres y laboratorios (encuestas)
Route::get('/talleres_laboratorios', [TalleresLaboratoriosController::class, 'mostrarFormulario'])->name('encuestas.talleres_laboratorios');
Route::post('/talleres_laboratorios', [TalleresLaboratoriosController::class, 'guardarRespuestas'])->name('encuestas.guardar_talleres_laboratorios');
// Ruta para mostrar las gráficas de los resultados de Talleres y laboratorios (encuestas)
Route::get('/graficas/talleres_laboratorios', [TalleresLaboratoriosController::class, 'mostrarFormularioGrafica'])->name('graficas.talleres_laboratorios');
Route::get('/talleres_laboratorios/pdf', [PDFController::class, 'generateTalleresLaboratoriosPDF'])->name('generate_reporte_talleres_laboratorio_pdf');
Route::post('/encuestas/omitir', [TalleresLaboratoriosController::class, 'omitirEncuesta'])->name('encuestas.omitir');
Route::get('/periodos/talleres_laboratorios', [TalleresLaboratoriosController::class, 'mostrarPeriodos'])->name('periodos.talleres_laboratorio');
Route::get('/graficas/talleres_laboratorios/{periodo_id}', [TalleresLaboratoriosController::class, 'mostrarGrafica'])->name('graficas.grafica_talleres_laboratorios');
Route::get('/talleres_laboratorios/pdf/{periodo_id}', [PDFController::class, 'generateTalleresLaboratoriosPDF'])->name('generate_reporte_talleres_laboratorio_pdf');


// Departamento de cafeteria (encuestas)
Route::get('/cafeteria', [CafeteriaController::class, 'mostrarFormulario'])->name('encuestas.cafeteria');
Route::post('/cafeteria',[CafeteriaController::class, 'guardarRespuestas'])->name('encuestas.guardar_cafeteria');
// Ruta para mostrar las gráficas de los resultados de Servicio Social
Route::get('/graficas/cafeteria', [CafeteriaController::class, 'mostrarFormularioGrafica'])->name('graficas.cafeteria');
Route::get('/graficas/cafeteria/{periodo_id}', [CafeteriaController::class, 'mostrarGraficaPorPeriodo'])->name('graficas.grafica_por_periodo');
// Rutas para generar pdf, decargar e imprimir
Route::get('/cafeteria/pdf', [PDFController::class, 'generateCafeteriaPDF'])->name('generate_reporte_cafeteria_pdf');
Route::get('/cafeteria/pdf/{periodo_id}', [PDFController::class, 'generateCafeteriaPDF'])->name('generate_cafeteria_pdf');
Route::get('/cafeteria/pdf', [PDFController::class, 'generateCafeteriaPDF'])->name('generate_cafeteria_pdf');
// Periodos para Cafeteria
Route::get('/cafeteria/periodos', [CafeteriaController::class, 'mostrarPeriodos'])->name('cafeteria.mostrarPeriodos');


// Departamento de Servicios Médico (encuestas)
Route::get('/servicio_medico', [ServicioMedicoController::class, 'mostrarFormulario'])->name('encuestas.servicio_medico');
Route::post('/servicio_medico', [ServicioMedicoController::class, 'guardarRespuestas'])->name('encuestas.servicio_medico');
// Ruta para mostrar las gráficas de los resultados de Servicio Médico
Route::get('/graficas/servicio_medico', [ServicioMedicoController::class, 'mostrarFormularioGrafica'])->name('graficas.servicio_medico');
// Rutas para generar PDF, descargar e imprimir
Route::get('/servicio_medico/pdf', [ServicioMedicoController::class, 'generateServicioMedicoPDF'])->name('generate_servicio_medico_pdf');
// Periodos para Servicio Médico
Route::get('/servicio_medico/periodos', [ServicioMedicoController::class, 'mostrarPeriodos'])->name('servicio_medico.mostrarPeriodos');
// Servicio Médico (PDF)
Route::get('/servicio_medico/pdf', [PDFController::class, 'generateServicioMedicoPDF'])->name('generate_reporte_servicio_medico_pdf');
Route::get('/servicio_medico/pdf', [PDFController::class, 'generateServicioMedicoPDF'])->name('generate_servicio_medico_pdf');
Route::get('/servicio_medico/pdf/{periodo_id}', [PDFController::class, 'generateServicioMedicoPDF'])->name('generate_servicio_medico_pdf');


// Departamento de Actividades Culturales Deportivas
Route::get('/culturales_deportivas', [CulturalesDeportivasController::class, 'mostrarFormulario'])->name('encuestas.actividades_culturales_deportivas');
Route::post('/culturales_deportivas', [CulturalesDeportivasController::class, 'guardarRespuestas'])->name('encuestas.actividades_culturales_deportivas');
// Ruta para mostrar las gráficas de los resultados de Actividades Culturales y Deportivas
Route::get('/graficas/culturales_deportivas', [CulturalesDeportivasController::class, 'mostrarFormularioGrafica'])->name('graficas.culturales_deportivas');
// Rutas para generar pdf, decargar e imprimir
Route::get('/culturales_deportivas/pdf', [PDFController::class, 'generateCulturalesDeportivasPDF'])->name('generate_reporte_culturales_deportivas_pdf');
// Rutas pora mostrar los periodos 
Route::get('/periodos/culturales_deportivas', [CulturalesDeportivasController::class, 'mostrarPeriodos'])->name('periodos.culturales_deportivas');
Route::get('/culturales_deportivas/periodos', [CulturalesDeportivasController::class, 'mostrarPeriodos'])->name('periodos.culturales_deportivas');


// Rutas para gráficas
Route::get('/grafica/{periodoId}', [GraficaController::class, 'mostrarGrafica'])->name('grafica.general');
Route::get('/periodos', [GraficaController::class, 'seleccionarPeriodo'])->name('seleccionarPeriodo');
Route::get('/grafica/{periodo}', [GraficaController::class, 'mostrarGrafica'])->name('mostrarGrafica');
Route::get('/periodos', [GraficaController::class, 'seleccionarPeriodo'])->name('seleccionarPeriodo');

// Ruta para mostrar las carreras
Route::get('/mostrar-carreras', [GraficaController::class, 'mostrarCarreras'])->name('mostrar_carreras');

// Ruta para mostrar la gráfica por carrera
Route::get('/mostrar-carrera/{carrera}', [GraficaController::class, 'mostrarGraficaPorCarrera'])->name('mostrar_carrera');

// Rutas para guardar la gráfica general
Route::post('/guardar-grafica', [GraficaController::class, 'guardarGrafica']);

// Ruta para generar PDF de la gráfica general
Route::get('/generate-pdf', [GraficaController::class, 'generateGraficaGeneralPDF'])->name('generate.pdf');

// Ruta para obtener alumnos por semestre
Route::get('/obtener-alumnos-por-semestre', [AuthAlumnoRegisterController::class, 'obtenerAlumnosPorSemestre']);
Route::get('/mostrar-carrera', [GraficaController::class, 'mostrarGraficaPorCarrera'])->name('mostrar_carrera');

// Semestrees
Route::get('admin/mostrar-semestres', [AuthAlumnoRegisterController::class, 'mostrarSemestres'])
    ->name('admin.mostrar_semestres');

Route::post('admin/grafica-por-semestre', [AuthAlumnoRegisterController::class, 'graficaPorSemestre'])
    ->name('admin.grafica_por_semestre');



Route::get('/Estado/get', function () {
    $jsonString = file_get_contents('..\configEncuesta.json');
    $data = json_decode($jsonString, true);
    return  $data ;
});
//Route::get('/Estado/get', [PostController::class, 'verficar']);
Route::get('/Estado/cambiar/{estado}', function ($estado) {
    $jsonString = file_get_contents('..\configEncuesta.json');
    $data = json_decode($jsonString, true);
    $data['Activa']=$estado;
    $newJsonString = json_encode($data, JSON_PRETTY_PRINT);

    if (file_put_contents('C:\xampp\htdocs\EncuestaTec\configEncuesta.json', $newJsonString) === false) {
        die('Error al guardar el archivo JSON');
    }
    return  $data ;
});

require __DIR__.'/auth.php';