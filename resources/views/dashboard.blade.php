<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/base/css/menu.css') }}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .menu-vertical {
            transition: transform 0.3s ease-in-out;
            background-color: #cfcfcf; 
        }

        .menu-hidden {
            transform: translateX(-100%);
        }

        .menu-toggle-btn {
            top: 1rem;
            left: 1rem;
            transition: left 0.3s ease-in-out;
        }

        .menu-open .menu-toggle-btn {
            left: 1rem;
        }
    </style>

</head>

<body class="bg-gray-100" onload="init()">


    <header class="bg-white shadow-md">
        <div class="container mx-auto py-4 px-6 flex justify-between items-center">
            <img src="{{ asset('img/logoencuesta.png') }}" alt="Logo de EncuestaTec">
            <div class="titles text-black text-center">
                <h2 class="text-lg font-semibold">SISTEMA DE ENCUESTAS</h2>
                <h3 class="text-sm">EncuestaTec</h3>
                <h1 class="text-xl font-bold">INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS OCCIDENTE</h1>
            </div>
            <img src="{{ asset('img/Logo-TecNM.png') }}" alt="Logo de Tecnm">
        </div>
    </header>

    <div class="flex">
        <!-- Botón de Toggle para el menú vertical -->
        <button id="menu-toggle" class="menu-toggle-btn bg-gray-800 text-white p-2 fixed z-20 rounded-r-md focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Menú Vertical -->
        <nav id="menu" class="menu-vertical w-64 bg-gray-800 p-6 text-white z-10 menu-hidden">
            <a href="{{ route('usuarios.index') }}" class="block bg-red-900 hover:bg-red-600 rounded py-2 px-4 mb-2 transition-colors duration-200">Ver Usuarios</a>
            <a href="{{ route('admin.quejas') }}" class="block bg-red-700 hover:bg-red-500 rounded py-2 px-4 mb-2 transition-colors duration-200">Buzón de Quejas</a>
            <a href="{{ route('grafica.general', ['periodoId' => 1]) }}" class="block bg-red-900 hover:bg-red-600 rounded py-2 px-4 mb-2 transition-colors duration-200">
                Gráfica General
            </a>
            <a href="{{ route('carreras.semestres.alumnos.lista', ['carrera' => 'Ingeniería Industrial (Escolarizado)', 'semestre' => 1]) }}" class="block bg-red-700 hover:bg-red-500 rounded py-2 px-4 mb-2 transition-colors duration-200">Buscar Alumno</a>
            <div class="relative">
                <button id="agregar-btn" class="w-full bg-red-900 hover:bg-red-600 text-white font-bold py-2 px-4 rounded flex items-center justify-between transition-colors duration-200">
                    <span>Alumnos</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>
                <div id="opciones-agregar" class="hidden absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg z-10">
                    <a href="{{ route('alumnos.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Lista Alumnos</a>
                    <a href="{{ route('mostrar_carreras') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Carreras</a>

                </div>
            </div>
<br>
<div class="mt-auto">
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="text-red-600 hover:text-red-700 focus:outline-none flex items-center w-full justify-start bg-red-100 hover:bg-red-200 px-4 py-2 rounded-md">
            <span>Salir</span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M6 3a1 1 0 011-1h6a1 1 0 110 2H7a1 1 0 01-1-1zM4 9a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zm1 5a1 1 0 100 2h6a1 1 0 100-2H5z" clip-rule="evenodd"></path>
            </svg>
        </button>
    </form>
</div>
        </nav>

        <!-- Contenido Principal -->
        <div class="content flex-1 p-6">
            <div class="container mx-auto grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Formulario de Registro -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                    @if (Session::has('success'))
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">¡Éxito!</strong>
                        <span class="block sm:inline">{{ Session::get('success') }}</span>
                    </div>
                    @endif

                    <h2 class="text-lg font-semibold mb-4">Agregar Usuario</h2>
                    <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                        @csrf
                        <div>
                            <label for="name" class="block text-base font-medium text-gray-800">Nombre Completo</label>
                            <input type="text" name="name" id="name" class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
                        </div>
                        <div>
                            <label for="email" class="block text-base font-medium text-gray-800">Correo Electrónico</label>
                            <input type="email" name="email" id="email" class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
                        </div>
                        <div>
                            <label for="password" class="block text-base font-medium text-gray-800">Contraseña</label>
                            <input type="password" name="password" id="password" class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-base font-medium text-gray-800">Confirmar Contraseña</label>
                            <input type="password" name="password_confirmation" id="password_confirmation" class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
                        </div>
                        <div>
                            <label for="role" class="block text-base font-medium text-gray-800">Rol</label>
                            <select name="role" id="role" class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
                                <option value="admin">Administrador</option>
                                <option value="departamento">Departamento</option>
                            </select>
                        </div>
                        <button type="submit" class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base text-white bg-red-700 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                            Registrarse
                        </button>
                    </form>
                </div>

                <!-- Lista de Departamentos y encuestas -->
                <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Encuestas</h2>
                <div id="btn" ></div>
    <div class="overflow-y-auto max-h-96">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Departamento
                    </th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                        Acciones
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">CENTRO INFORMACION</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.centro_informacion') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('centros-informacion.grafica') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">COORDINACIÓN DE CARRERAS</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.coordinacion_carreras') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('encuestas.grafica_coordinacion_carreras') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">RECURSOS FINANCIEROS</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.recursos_financieros') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.recursos_financieros') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">RESIDENCIAS PROFESIONALES</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.residencias_profesionales') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.grafica_residencias_profesionales') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">CENTRO DE CÓMPUTO</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.centro_computo') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.centro_computo') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">SERVICIO SOCIAL</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.servicio_social') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.servicio_social') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">SERVICIOS ESCOLARES</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.servicios_escolares') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.servicios_escolares') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">BECAS</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.becas') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.becas') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">TALLRES Y LABORATORIOS</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.talleres_laboratorios') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.talleres_laboratorios') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">CAFETERIA</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.cafeteria') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.cafeteria') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">SERVICIO MÉDICO</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.servicio_medico') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.servicio_medico') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
            <tr>
                <td class="px-6 py-4 whitespace-nowrap"><strong><span style="font-weight: 700">ACTIVIDADES CULTURALES Y DEPORTIVAS</span></strong></td>
                <td class="px-6 py-4 whitespace-nowrap">
                    <a href="{{ route('encuestas.actividades_culturales_deportivas') }}" class="bg-pink-900 hover:bg-pink-800 text-white font-bold py-2 px-4 rounded">
                        Ver
                    </a>
                    &nbsp;
                    <a href="{{ route('graficas.culturales_deportivas') }}">
                        <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                            Gráfica
                        </button>
                    </a>
                </td>
            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mostrar u ocultar el menú desplegable de alumnos
        const agregarBtn = document.getElementById('agregar-btn');
        const opcionesAgregar = document.getElementById('opciones-agregar');

        agregarBtn.addEventListener('click', () => {
            opcionesAgregar.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!agregarBtn.contains(event.target) && !opcionesAgregar.contains(event.target)) {
                opcionesAgregar.classList.add('hidden');
            }
        });

        // Mostrar u ocultar el menú lateral
        const menuToggleBtn = document.getElementById('menu-toggle');
        const menu = document.getElementById('menu');

        menuToggleBtn.addEventListener('click', () => {
            menu.classList.toggle('menu-hidden');
        });
    </script>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    
    async function init() {
        const response = await axios.get('/Estado/get');

       let activo =  response.data.Activa
      
       
        const div = document.getElementById('btn');
            if (activo == "v") {
                div.innerHTML = '<button id="myButton" class="bg-pink-700 hover:bg-pink-500 text-white font-bold py-2 px-4 rounded">Encuestas activas</button>'

                document.getElementById('myButton').onclick = function() {
                    
                    fun("f")
                    activo = "f"
                }
            }else{
                div.innerHTML = '<button id="myButton" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Encuestas desactivadas </button> '
                document.getElementById('myButton').onclick =function() {
                    
                    fun("v")
                    activo = "v"
                }
            }
    }
   
    
    
    async function name() {
        const response = await axios.get('/Estado/get');
        console.log(activo);
        return response.data.Activa

    }
    async function fun(es) {
       
        const response = await axios.get('/Estado/cambiar/'+es);
        location.reload();
        
    }
</script>

</body>
</html>


