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
</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <!--- <header class="bg-custom-color shadow-md"> COLOR GUINDA--->
        <div class="container mx-auto py-4 px-6 flex justify-between items-center">
            <img src="{{ asset('img/logoencuesta.png') }}" alt="Logo de EncuestaTec">
            <div class="titles text-black">
                <h2 class="text-lg font-semibold">SISTEMA DE ENCUESTAS</h2>
                <h3 class="text-sm">EncuestaTec</h3>
                <h1 class="text-xl font-bold">INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS OCCIDENTE</h1>
            </div>
            <img src="{{ asset('img/Logo-TecNM.png') }}" alt="Logo de Tecnm">
        </div>
    </header>


    <div class="container mx-auto mt-8 grid grid-cols-1 md:grid-cols-2 gap-8">
        <!-- Formulario de Registro -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            @if (Session::has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="alert">
                    <strong class="font-bold">Éxito!</strong>
                    <span class="block sm:inline">{{ Session::get('success') }}</span>
                </div>
            @endif

<h2 class="text-lg font-semibold mb-4">Agregar Usuario</h2>
<span class="mx-2"> <!-- Espacio entre botones --> </span>
<a href="{{ route('usuarios.index') }}" class="bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded mr-2">
    Ver Usuarios
</a>

<form method="POST" action="{{ route('users.store') }}" class="space-y-4">
    @csrf
    <div>
        <label for="name" class="block text-base font-medium text-gray-800">Nombre Completo</label>
        <input type="text" name="name" id="name"
            class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
    </div>
    <div>
        <label for="email" class="block text-base font-medium text-gray-800">Correo Electrónico</label>
        <input type="email" name="email" id="email"
            class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
    </div>
    <div>
        <label for="password" class="block text-base font-medium text-gray-800">Contraseña</label>
        <input type="password" name="password" id="password"
            class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
    </div>
    <div>
        <label for="password_confirmation" class="block text-base font-medium text-gray-800">Confirmar Contraseña</label>
        <input type="password" name="password_confirmation" id="password_confirmation"
            class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
    </div>
    <div>
        <label for="role" class="block text-base font-medium text-gray-800">Rol</label>
        <select name="role" id="role"
            class="mt-2 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm text-base border-gray-300 rounded-md py-2 px-3">
            <option value="admin">Administrador</option>
            <option value="departamento">Departamento</option>
        </select>
    </div>
    <button type="submit"
        class="w-full flex justify-center py-3 px-4 border border-transparent rounded-md shadow-sm text-base text-white bg-red-700 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
        Registrarse
    </button>
</form>

        </div>

        <!-- Lista de Departamentos y encuestas-->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Encuestas</h2>
            <div class="flex items-center mb-4">
                <a href="{{ route('admin.quejas') }}"
                    class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                    Buzón de Quejas
                </a>
                <span class="mx-2"> <!-- Espacio entre botones --> </span>
                <a href="{{ route('graficas.semestre', ['carrera' => 'carrera', 'semestre' => 'semestre']) }}"
                    class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Comparativas
                    Semestres</a>
                <span class="mx-2"> <!-- Espacio entre botones --> </span>
                <a href="{{ route('carreras.semestres.alumnos.lista', ['carrera' => 'Ingeniería Industrial (Escolarizado)', 'semestre' => 1]) }}"
                    class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mr-2">
                    Buscar Alumno
                </a>
                <div class="relative inline-block">
                    <button id="agregar-btn" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 inline-block mr-1" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Alumnos
                    </button>
                    <div id="opciones-agregar" class="hidden absolute right-0 mt-2 bg-white border border-gray-300 rounded-md shadow-lg">
    <a href="{{ route('alumnos.index') }}" class="block px-4 py-2 text-gray-800 hover:bg-gray-200">Lista Alumnos</a>
</div>
                </div>
                <script>
                    const agregarBtn = document.getElementById('agregar-btn');
                    const opcionesAgregar = document.getElementById('opciones-agregar');

                    agregarBtn.addEventListener('click', () => {
                        opcionesAgregar.classList.toggle('hidden');
                    });
                </script>
            </div>
            <br>
            <div class="overflow-y-auto max-h-96">
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
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
                <td class="px-6 py-4 whitespace-nowrap">CENTRO INFORMACION</td>
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
                <td class="px-6 py-4 whitespace-nowrap">COORDINACIÓN DE CARRERAS</td>
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
                <td class="px-6 py-4 whitespace-nowrap">RECURSOS FINANCIEROS</td>
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
                <td class="px-6 py-4 whitespace-nowrap">RESIDENCIAS PROFESIONALES</td>
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
                <td class="px-6 py-4 whitespace-nowrap">CENTRO DE CÓMPUTO</td>
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
                <td class="px-6 py-4 whitespace-nowrap">SERVICIO SOCIAL</td>
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
                <td class="px-6 py-4 whitespace-nowrap">SERVICIOS ESCOLARES</td>
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
                <td class="px-6 py-4 whitespace-nowrap">BECAS</td>
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
                <td class="px-6 py-4 whitespace-nowrap">TALLERES Y LABORATORIOS</td>
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
                <td class="px-6 py-4 whitespace-nowrap">CAFETERIA</td>
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
                <td class="px-6 py-4 whitespace-nowrap">SERVICIO MÉDICO</td>
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
                <td class="px-6 py-4 whitespace-nowrap">ACTIVIDADES CULTURALES Y DEPORTIVAS</td>
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
        <style>
            .button-off {
                background-color: red;
                color: white;
                padding: 5px 10px;
                border: none;
                cursor: pointer;
            }

            .button-on {
                background-color: green;
                color: white;
                padding: 5px 10px;
                border: none;
                cursor: pointer;
            }

            .flex {
                display: flex;
                align-items: center;
            }

            .ml-2 {
                margin-left: 8px;
            }
        </style>
    </div>

    </div>
    <!---
    <div class="container mx-auto mt-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
        Aquí puedes agregar contenido adicional del dashboard
        </div>
    </div>--->

    <footer>
        <div class="container mx-auto py-4 px-6 flex justify-end items-center">
            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="text-gray-500 hover:text-gray-700 focus:outline-none">
                    <span>Salir</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20"
                        fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm0-2a6 6 0 1 0 0-12 6 6 0 0 0 0 12zm4.707-9.293a1 1 0 0 1 1.414 1.414L12.414 10l3.707 3.707a1 1 0 0 1-1.414 1.414L11 11.414l-3.707 3.707a1 1 0 0 1-1.414-1.414L9.586 10 5.879 6.293a1 1 0 1 1 1.414-1.414L11 8.586l3.707-3.707z"
                            clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
    </footer>
</body>
<script src="{{ asset('js/encuestas.js') }}"></script>
</html>
