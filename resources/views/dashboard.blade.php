<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/base/css/menu.css') }}">
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
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Éxito!</strong>
                    <span class="block sm:inline">{{ Session::get('success') }}</span>
                </div>
            @endif

            <h2 class="text-xl font-semibold mb-4">Agregar Usuario</h2>   
                    
            <form method="POST" action="{{ route('users.store') }}" class="space-y-4">
                @csrf
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700">Nombre Completo</label>
                    <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                    <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                    <input type="password" name="password" id="password" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
                <div>
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirmar Contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                </div>
            
                <div>
                    <label for="role" class="block text-sm font-medium text-gray-700">Rol</label>
                    <select name="role" id="role" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                        <option value="admin">Administrador</option>
                        <option value="departamento">Departamento</option>
                    </select>
                </div>
                <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-red-700 hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                    Registrarse
                </button>
            </form>
        </div>

        <!-- Lista de Departamentos -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Agregar Encuesta</h2>
            <a href="#">
                <a href="{{ route('admin.quejas') }}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                    Buzón de Quejas
                </a>
                
                &nbsp;
                <a href="{{ route('graficas.semestre', ['carrera' => 'carrera', 'semestre' => 'semestre']) }}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Comparativas Semestres</a>
                &nbsp;
                <a href="{{ route('carreras.semestres.alumnos.lista', ['carrera' => 'Ingeniería Industrial (Escolarizado)', 'semestre' => 1]) }}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mr-2">
                    Buscar Alumno
                </a>              
            </a>
            
            <div class="overflow-y-auto max-h-96">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Departamento</th>
                        </tr>
                        
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">CENTRO DE INFORMACIÓN</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('encuestas.centro_informacion') }}" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </a>
                                &nbsp;
                                <!-- Botón Grafica -->                                 
                                <a href="{{ route('centros-informacion.grafica') }}">
                                    <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                        Gráfica
                                    </button>
                                </a>
                                &nbsp;
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">COORDINACIÓN DE CARRERAS</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('encuestas.coordinacion_carreras') }}" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                Ver
                            </a>
                            &nbsp;
                                <!-- Botón Gráfica -->
                                <a href="{{ route('encuestas.grafica_coordinacion_carreras') }}">
                                    <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                        Gráfica
                                    </button>
                                </a>
                                
                                
                                &nbsp;
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">RECURSOS FINANCIEROS</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('encuestas.recursos_financieros') }}" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </a>
                                &nbsp;
                                <a href="{{ route('graficas.recursos_financieros') }}">
                                    <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                        Gráfica
                                    </button>
                                </a>
                                &nbsp;
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                &nbsp;
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">RESIDENCIAS PROFESIONALES</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{route('encuestas.residencias_profesionales') }}" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </a>
                                &nbsp;
                                <!-- Botón Gráfica-->
                                <a href="{{ route('graficas.grafica_residencias_profesionales') }}">
                                    <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                        Gráfica
                                    </button>
                                </a>
                                &nbsp;
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">CENTRO DE CÓMPUTO</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('encuestas.centro_computo') }}" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </a>
                                &nbsp;
                                <!-- Botón Gráfica -->
                                <a href="{{ route('graficas.centro_computo') }}">
                                    <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                        Gráfica
                                    </button>
                                </a>
                                &nbsp;
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                &nbsp;
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">SERVICIO SOCIAL</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{route('encuestas.servicio_social') }}" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </a>
                                &nbsp;
                                <!-- Botón Gráfica -->
                                <a href="{{ route('graficas.servicio_social') }}">
                                <button class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                                    Gráfica
                                </button>
                                </a>
                                &nbsp;
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                &nbsp;
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">SERVICIOS ESCOLARES</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{route('encuestas.servicios_escolares') }}" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </a>
                                &nbsp;
                                <!-- Botón Gráfica -->
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Gráfica
                                </button>
                                &nbsp;
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                &nbsp;
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">BECAS</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </button>
                                <!-- Botón Gráfica -->
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Gráfica
                                </button>
                                
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">TALLERES Y LABORATORIOS</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </button>
                                <!-- Botón Gráfica -->
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Gráfica
                                </button>
                            
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">CAFETERIA</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </button>
                                <!-- Botón Gráfica -->
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Gráfica
                                </button>
                            
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">SERVICIO MÉDICO</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </button>
                                <!-- Botón Gráfica -->
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Gráfica
                                </button>
                            
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>

                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">ACTIVIDADES CULTURALES Y DEPORTIVAS</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                    Ver
                                </button>
                                <!-- Botón Gráfica -->
                                <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Gráfica
                                </button>
                            
                                <!-- Botón Activar -->
                                <button class="bg-green-800 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                                    Activar
                                </button>
                                <!-- Botón Desactivar -->
                                <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                                    Desactivar
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    
    <!--Carrera-->
    <!---
    <br>
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-xl font-semibold mb-4">Selecciona Carrera</h2>
    <div class="overflow-y-auto max-h-96">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Carrera</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Ingeniería Industrial (Escolarizado)</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Ver
                        </button>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            PDF
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Ingeniería en Minería (Escolarizado)</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Ver
                        </button>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            PDF
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Ingenieria en Agronomia (Escolarizado)</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Ver
                        </button>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            PDF
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Licenciatura en Administracion (Escolarizado)</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Ver
                        </button>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            PDF
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Ingenieria en Gestion Empresarial (Escolarizado)</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Ver
                        </button>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            PDF
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Ingenieria en Sistemas Computacionales (Escolarizado)</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Ver
                        </button>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            PDF
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Ingenieria Informática (Semiescolarizado)</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Ver
                        </button>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            PDF
                        </button>
                    </td>
                </tr>

                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">Ingenieria en Gestion Empresarial (Semiescolarizado)</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">
                            Ver
                        </button>
                        <button class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                            PDF
                        </button>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
--->

    
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
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 1 1 0-16 8 8 0 0 1 0 16zm0-2a6 6 0 1 0 0-12 6 6 0 0 0 0 12zm4.707-9.293a1 1 0 0 1 1.414 1.414L12.414 10l3.707 3.707a1 1 0 0 1-1.414 1.414L11 11.414l-3.707 3.707a1 1 0 0 1-1.414-1.414L9.586 10 5.879 6.293a1 1 0 1 1 1.414-1.414L11 8.586l3.707-3.707z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
    </footer>
</body>
</html>
