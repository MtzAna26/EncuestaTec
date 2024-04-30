<?php

///use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

// Ruta para encuestas
Route::post('/encuestas/menu', [EncuestaController::class, 'menu'])->name('encuestas.menu');
Route::get('/encuestas/menu', [EncuestaController::class, 'menu'])->name('encuestas.menu');

// Rutas de departamento
Route::get('/departamento/login', [DepartamentoController::class, 'showLoginForm'])->name('departamento.login');
Route::post('/departamento/login', [DepartamentoController::class, 'login']);
Route::get('/departamento/dashboard', [DepartamentoController::class, 'dashboard'])->name('departamento.dashboard');

// Ruta para encuestas
Route::get('/comenzar-encuestas/centro-de-informacion', [EncuestaController::class, 'comenzarEncuestasCentroDeInformacion'])->name('encuestas.centro_informacion');


require __DIR__.'/auth.php';
