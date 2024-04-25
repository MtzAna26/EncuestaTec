<?php

///use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AuthAlumnoRegisterController;
use App\Http\Controllers\AuthAlumnoLoginController;
use App\Http\Controllers\Auth\DepartamentoLoginController;
use App\Http\Controllers\EncuestaController;
use App\Http\Controllers\DepartamentoController;

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

// Ruta para mostrar el formulario de registro de alumno
Route::get('/registro/alumno', [AuthAlumnoRegisterController::class, 'showRegistrationForm'])->name('alumno.register');
// Ruta para procesar el registro de alumno
Route::post('/registro/alumno', [AuthAlumnoRegisterController::class, 'register']);

// Ruta para alumno
Route::get('/alumno/login', [AuthAlumnoLoginController::class, 'showLoginForm'])->name('alumno.login');
Route::post('/alumno/login', [AuthAlumnoLoginController::class, 'login'])->name('alumno.login');

// Ruta para encuestas
Route::post('/encuestas/menu', [EncuestaController::class, 'menu'])->name('encuestas.menu');
Route::get('/encuestas/menu', [EncuestaController::class, 'menu'])->name('encuestas.menu');

// Ruta para seleccionar departamento, esta ruta se encarga de redirigir a la vista correspondiente al departamento
//Route::get('/departamentos/{departamento}', 'DepartamentoController@show')->name('departamento.show');


// Rutas para el inicio de sesión del departamento
Route::get('/departamento/login', [DepartamentoLoginController::class, 'showLoginForm'])->name('departamento.login');
Route::post('/departamento/login', [DepartamentoLoginController::class, 'login']);

// Ruta para el cierre de sesión del departamento
Route::post('/departamento/logout', [DepartamentoLoginController::class, 'logout'])->name('departamento.logout');

// Ruta para encuestas


require __DIR__.'/auth.php';
