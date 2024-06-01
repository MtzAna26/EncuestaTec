<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>

    <link rel="stylesheet" href="{{ asset('css/base/css/menu.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <div class="header-content">
            <img src="{{ asset('img/logoencuesta.png') }}" alt="Logo de EncuestaTec">
            <div class="titles">
                <h2 class="text-4xl font-bold text-white">SISTEMA DE ENCUESTAS</h2>
                <h3 class="text-2xl text-white">EncuestaTec</h3>
                <h1 class="text-5xl font-bold text-white">INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS OCCIDENTE</h1>
            </div>
            
            <img src="{{ asset('img/itszologo.jpeg') }}" alt="Logo de Tecnm">
        </div>
    </header>
    <br>

    <div class="additional-text">
        
        <!-- Enlace para seleccionar departamento -->
        <a id="seleccionarDepartamento" href="#" class="button">DEPARTAMENTO</a>
        
        <!-- Aquí se mostrará la lista de departamentos al hacer clic -->
        <div id="departamentosContainer" style="display: none;"></div>

        <!-- Otros enlaces -->
        <a href="{{ route('login') }}" class="button">ADMINISTRADOR</a>
        <a href="{{ route('alumno.register') }}" class="button">ESTUDIANTES TecNM</a>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Obtener el contenedor donde se mostrará la lista de departamentos
            const departamentosContainer = document.getElementById('departamentosContainer');

            // Crear el elemento select para mostrar los departamentos
            const selectDepartamento = document.createElement('select');

            // Agregar opciones de departamentos
            const departamentos = [
                'SELECCIONA DEPARTAMENTO',
                'CENTRO DE INFORMACIÓN',
                'COORDINACIÓN DE CARRERAS',               
                'RECURSOS FINANCIEROS',
                'RESIDENCIAS PROFESIONALES',
                'CENTRO DE CÓMPUTO',
                'SERVICIO SOCIAL',
                'SERVICIOS ESCOLARES',
                'BECAS',
                'TALLERES Y LABORATORIOS',
                'CAFETERIA',
                'SERVICIO MÉDICO',
                'ACTIVIDADES CULTURALES Y DEPORTIVAS',
            ];

            departamentos.forEach(function(departamento) {
                const opcion = document.createElement('option');
                opcion.textContent = departamento;
                selectDepartamento.appendChild(opcion);
            });

            // Agregar el select de departamentos al contenedor
            departamentosContainer.appendChild(selectDepartamento);

            // Manejar el evento de cambio en el select
            selectDepartamento.addEventListener('change', function() {
                // Obtener el departamento seleccionado
                const departamentoSeleccionado = selectDepartamento.value;

                // Redirigir al departamento seleccionado
                window.location.href = "{{ route('departamento.login') }}" + "?departamento=" + departamentoSeleccionado;
            });

            // Manejar el evento de clic en el enlace "DEPARTAMENTO"
            const enlaceDepartamento = document.getElementById('seleccionarDepartamento');
            enlaceDepartamento.addEventListener('click', function(event) {
                event.preventDefault(); // Prevenir el comportamiento predeterminado del enlace
                
                // Mostrar el contenedor de departamentos y ocultar el enlace "DEPARTAMENTO"
                departamentosContainer.style.display = 'block';
                enlaceDepartamento.style.display = 'none';
            });
        });
    </script>
    
</body>
</html>
