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
    <div>
       
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
                                        
                    <div>
                        <button class="iniciar-sesion" onclick="sumit()">Iniciar Sesión</button>
                    </div>
                    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
                    <script>

                        const sumit = async ()=>{
                            let usuario =  document.getElementById("email");
                            let password =  document.getElementById("password");
                            const response = await axios.post('/departamento/login2',{usuario,password});
                            //console.log(response.data);
                                
                                var queryString = window.location.search;                               
                                var urlParams = new URLSearchParams(queryString);
                                var departamento = urlParams.get('departamento');

                                 // Imprime el valor del parámetro 'departamento'

                            let url = '/departamento/inicio/'+departamento
                            
                            window.location.href = url ;


                        }
                        
                    </script>
                </div>
            </div>
        </div>
</body>
</html>
