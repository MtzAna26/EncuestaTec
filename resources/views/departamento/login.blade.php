<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <!-- Enlace a tus estilos CSS -->
    <link rel="stylesheet" href="{{ asset('css/departamento/Login.css') }}">

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
    <br>
    <br>
    <form method="POST" action="{{ route('departamento.login') }}">
        @csrf
        <div class="login-container">
            <div class="container">
                <div class="sub-header">
                    <h1 class="guinda">AUTENTICACIÓN PARA ACCESO AL SISTEMA</h1>
                    <h2 class="sub-header">Introduce los datos correspondientes:</h2>
                </div>
                <div class="login-form">
                    <label for="email">Usuario:</label>
                    <input type="text" id="email" name="email" required>

                    <label for="password">Contraseña:</label>
                    <input type="password" id="password" name="password" required>
                                        
                    <div class="form-group">
                        <button type="submit" id="btn-iniciar-sesion" class="iniciar-sesion">Iniciar Sesión</button>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
