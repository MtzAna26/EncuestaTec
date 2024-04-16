<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/registro/css/registro.css') }}">
    <title>@yield('title', 'Iniciar Sesión')</title>
</head>
<body>
    <div class="container-form">
        <div class="information">
            <div class="info-childs">
                <h1>EncuestaTec</h1>
                <p>Bienvenido de vuelta, inicia sesión para continuar</p>
                <input type="button" value="Agregar Nuevo Usuario" id="sign-in" onclick="window.location.href='{{ route('register') }}'">
            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Iniciar Sesión</h2>
                <form method="POST" action="{{ route('login') }}" class="form">
                    @csrf
                    <label>
                        <i class='bx bx-envelope'></i>
                        <input type="email" name="email" placeholder="Correo Electrónico" required autofocus>
                    </label>
                    <label>
                        <i class='bx bx-lock-alt'></i>
                        <input type="password" name="password" placeholder="Contraseña" required>
                    </label>
                    <input type="submit" value="Iniciar Sesión">
                </form>
            </div>
        </div>
    </div>
</body>
</html>
