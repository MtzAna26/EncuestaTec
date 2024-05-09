<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <!-- Enlace a tus estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/alumno/css/Registro.css') }}">
    
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
        
        <form id="registration-form" method="POST" action="{{ route('alumno.register') }}">
            @csrf 

            <label for="no_control">No.Control:</label>
            <input type="text" id="no_control" name="no_control" required>
            
            <label for="nip">NIP:</label>
            <input type="password" id="nip" name="nip" required>

            <label for="carrera">Carrera:</label>
            <select id="carrera" name="carrera" required>
                <option value="">Seleccionar Carrera</option>
                <option value="Ingenieria Industrial">Ingenieria Industrial (Escolarizado)</option>
                <option value="Ingenieria en Mineria">Ingenieria en Mineria (Escolarizado)</option>
                <option value="Ingenieria en Agronomia">Ingenieria en Agronomia (Escolarizado)</option>
                <option value="Licenciatura en Administracion">Licenciatura en Administracion (Escolarizado)</option>
                <option value="Ingenieria en Gestion Empresarial">Ingenieria en Gestion Empresarial (Escolarizado)</option>
                <option value="Ingenieria en Sistemas Computacionales">Ingenieria en Sistemas Computacionales (Escolarizado)</option>
                <option value="Ingenieria Informática">Ingenieria Informática (Semiescolarizado)</option>
                <option value="Ingenieria en Gestion Empresarial(Semiescolarizado)">Ingenieria en Gestion Empresarial (Semiescolarizado)</option>
            </select>

            <label for="semestre">Semestre:</label>
            <select id="semestre" name="semestre" required>
                <option value="">Seleccionar Semestre</option>
                <option value="Primer_Semestre">Primer Semestre</option>
                <option value="Segundo_Semestre">Segundo Semestre</option>
                <option value="Tercer_Semestre">Tercer Semestre</option>
                <option value="Cuarto_Semestre">Cuarto Semestre</option>
                <option value="Quinto_Semestre">Quinto Semestre</option>
                <option value="Sexto_Semestre">Sexto Semestre</option>
                <option value="Septimo_Semestre">Septimo Semestre</option>
                <option value="Octavo_Semestre">Octavo Semestre</option>
                <option value="Noveno_Semestre">Noveno Semestre</option>
            </select>
            <input type="submit" value="Registrarse">
        </form>
    </div>
</body>
</html>
