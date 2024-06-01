<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <!-- Enlace a tus estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/alumno/css/Login.css') }}">
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
            <img src="{{ asset('img/itszologo.jpeg') }}" alt="Logo de Tecnm">
        </div>
    </header>
    <br>
    <br>
    <div class="login-container">
        <div class="container">
            <div class="sub-header">
                <h1 class="guinda">AUTENTICACIÓN PARA ACCESO AL SISTEMA</h1>
                <h2 class="sub-header">Introduce los datos correspondientes:</h2>
            </div>
            <div class="login-form">
                <form id="login-form" method="POST" action="{{ route('encuestas.menu') }}">
                    @csrf
                    <label for="no_control">No.Control:</label>
            <input type="text" id="no_control" name="no_control" required>
            
            <label for="nip">NIP:</label>
            <input type="password" id="nip" name="nip" required>
                    <div class="form-group">
                        <button type="submit" id="btn-iniciar-sesion" class="iniciar-sesion">Iniciar Sesión</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
