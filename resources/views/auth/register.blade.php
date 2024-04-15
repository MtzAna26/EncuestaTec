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
    <title>@yield('title', 'Crear Cuenta')</title>
</head>
<body>
    <div class="container-form register">
        <div class="information">
            <div class="info-childs">
                <h2>EncuestaTec</h2>
                <p>Accede a tu cuenta para comenzar</p>
                <input type="button" value="Iniciar Sesión" id="sign-in" onclick="window.location.href='{{ route('login') }}'">

            </div>
        </div>
        <div class="form-information">
            <div class="form-information-childs">
                <h2>Introduce los datos correspondientes</h2>
                <!-- <div class="icons">
                    <i class='bx bxl-google'></i>
                    <i class='bx bxl-github'></i>
                    <i class='bx bxl-linkedin' ></i>
                </div> -->
                <p>o usa tu email para registrarte</p>
                <form method="POST" action="{{ route('register') }}" class="form">
                    @csrf
                    <label>
                        <i class='bx bx-user' ></i>
                        <input type="text" name="name" placeholder="Nombre Completo">
                    </label>
                    <label >
                        <i class='bx bx-envelope' ></i>
                        <input type="email" name="email" placeholder="Correo Electrónico">
                    </label>
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" name="password" placeholder="Contraseña">
                    </label>
                    <label>
                        <i class='bx bx-lock-alt' ></i>
                        <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña">
                    </label>
                    <input type="submit" value="Registrarse">
                </form>
            </div>
        </div>
    </div>

    
    
</body>
</html>
