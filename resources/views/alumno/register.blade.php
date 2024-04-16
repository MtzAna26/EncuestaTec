<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <!-- Enlace a tus estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/alumno/registro.css') }}">
</head>
<body>
    <header>
        <div class="header-content">
            <img src="{{ asset('img/logoencuesta.png') }}" alt="Logo de EncuestaTec">
            <div class="titles">
                <h2>SISTEMA DE ENCUESTAS</h2>
                <h3>EncuestaTec</h3>
                <h1>INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS OCCIDENTE</h1>
            </div>
            <img src="{{ asset('img/Logo-TecNM.png') }}" alt="Logo de Tecnm">
        </div>
    </header>
    
    <br>
    <div class="container">
        <form id="registration-form" method="POST" action="{{ route('register') }}">
            @csrf {{-- Directiva Blade para protección CSRF --}}

            <label for="username">No.Control:</label>
            <input type="text" id="username" name="username" required>
            
            <label for="password">NIP:</label>
            <input type="password" id="password" name="password" required>

            <label for="career">Carrera:</label>
            <select id="career" name="career" required>
                <option value="">Seleccionar Carrera</option>
                <option value="Ingenieria Industrial">Ingenieria Industrial (Escolarizado)</option>
                <option value="Ingenieria en Mineria">Ingenieria en Mineria (Escolarizado)</option>
                <option value="Ingenieria en Agronomia">Ingenieria en Agronomia (Escolarizado)</option>
                <option value="Licenciatura en Administracion">Licenciatura en Administracion (Escolarizado)</option>
                <option value="Ingenieria en Gestion Empresarial">Ingenieria en Gestion Empresarial (Escolarizado)</option>
                <option value="Ingenieria en Sistemas Computacionales">Ingenieria en Sistemas Computacionales (Escolarizado)</option>
                <option value="Ingenieria Informática">Ingenieria Informática (Semiescolarizado)</option>
                <option value="Ingenieria en Gestion Empresarial">Ingenieria en Gestion Empresarial (Semiescolarizado)</option>
            </select>

            <label for="semester">Semestre:</label>
        <select id="semester" name="semester" required>
            <option value="">Seleccionar Semestre</option>
            <option value="1">Primer Semestre</option>
            <option value="2">Segundo Semestre</option>
            <option value="3">Tercer Semestre</option>
            <option value="4">Cuarto Semestre</option>
            <option value="5">Quinto Semestre</option>
            <option value="6">Sexto Semestre</option>
            <option value="7">Septimo Semestre</option>
            <option value="8">Octavo Semestre</option>
            <option value="9">Noveno Semestre</option>
        </select>
            <input type="submit" value="Registrarse">
        </form>
    </div>
    </div>