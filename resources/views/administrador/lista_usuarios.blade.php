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

    <div class="container mx-auto my-8 px-4">
 <div class="container mx-auto">
    <h1 class="text-3xl font-bold my-4">Lista de Usuarios</h1>


    <table class="table-auto w-full border-collapse border border-gray-200 mt-3">
        <thead>
            <tr>
                <th class="px-4 py-2 bg-gray-300 text-left">ID</th>
                <th class="px-4 py-2 bg-gray-300 text-left">Nombre</th>
                <th class="px-4 py-2 bg-gray-300 text-left">Correo</th>
		<th class="px-4 py-2 bg-gray-300 text-left">Acción</th>
            </tr>
        </thead>
        @foreach($users as $user)
    <tr>
        <td class="border px-4 py-2">{{ $user->id }}</td>
        <td class="border px-4 py-2">{{ $user->name }}</td>
        <td class="border px-4 py-2">{{ $user->email }}</td>
        <td class="border px-4 py-2">
            <form action="{{ route('users.destroy', $user->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Eliminar</button>
            </form>
        </td>
    </tr>
@endforeach
</table>
<br>
    <a href="{{ route('dashboard') }}" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mb-3 inline-block">Regresar al inicio</a>
</body>


    </div>

</body>
</html>
