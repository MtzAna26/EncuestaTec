<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/base/css/menu.css') }}">
    <!-- Enlace al archivo de estilos de Tailwind CSS -->
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
    

    <div class="container mx-auto mt-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
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
                    <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-900">
                        Registrarse
                    </button>
                </form>
            </div>




            
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-xl font-semibold mb-4">Agregar Encuesta</h2>
                <!-- Formulario para agregar encuestas -->
                <!-- Agrega aquí tu formulario para agregar encuestas -->
            </div>
        </div>
    </div>

    <!---
    <div class="container mx-auto mt-8">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4">Dashboard</h2>
        Aquí puedes agregar contenido adicional del dashboard 
        </div>
    </div>--->

    <footer class="bg-white shadow-md mt-8">
        <div class="container mx-auto py-4 px-6 flex justify-end items-center">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="text-gray-500 hover:text-gray-700">Salir</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </footer>
</body>
</html>
