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

<!-- Header -->
    <header class="bg-white shadow-md">
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


<div class="container mx-auto">
    <h1 class="text-3xl font-bold my-4">Lista de Alumnos Actualizada</h1>

<!---<form action="{{-- route('alumnos.reset') ---}}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar todos los alumnos y reiniciar encuestas?');">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Eliminar Todos los Alumnos y Reiniciar ID</button>
</form>--->


    <table class="table-auto w-full border-collapse border border-gray-200 mt-3">
        <thead>
            <tr>
                <th class="px-4 py-2 bg-gray-200 text-left">ID</th>
                <th class="px-4 py-2 bg-gray-200 text-left">No. Control</th>
                <th class="px-4 py-2 bg-gray-200 text-left">Carrera</th>
                <th class="px-4 py-2 bg-gray-200 text-left">Semestre</th>
            </tr>
        </thead>
        <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td class="border px-4 py-2">{{ $alumno->id }}</td>
                    <td class="border px-4 py-2">{{ $alumno->no_control }}</td>
                    <td class="border px-4 py-2">{{ $alumno->carrera }}</td>
                    <td class="border px-4 py-2">{{ $alumno->semestre }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
<br>
    <a href="{{ route('dashboard') }}" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mb-3 inline-block">Regresar al inicio</a>
</div>
</body>
</html>

