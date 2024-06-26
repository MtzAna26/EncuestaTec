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
    
    <div class="text-center mb-4">
        <h1 class="text-2xl font-bold text-red-600 mb-2">Buzón de Quejas</h1>
        
    </div>
    
    <table class="border-collapse w-full">
        <thead>
            <tr>
                <th class="p-3 font-bold bg-gray-200 text-gray-700 border">Carrera</th>
                <th class="p-3 font-bold bg-gray-200 text-gray-700 border">Tipo de Comentario</th>
                <th class="p-3 font-bold bg-gray-200 text-gray-700 border">Departamento</th>
                <th class="p-3 font-bold bg-gray-200 text-gray-700 border">Contacto</th>
                <th class="p-3 font-bold bg-gray-200 text-gray-700 border">Mensaje</th>
            </tr>
        </thead>
        <tbody>
            @foreach($quejas as $queja)
                <tr>
                    <td class="p-3 border">{{ $queja->carrera }}</td>
                    <td class="p-3 border">{{ $queja->tipo_comentario }}</td>
                    <td class="p-3 border">{{ $queja->departamento }}</td>
                    <td class="p-3 border">{{ $queja->contacto }}</td>
                    <td class="p-3 border">{{ $queja->mensaje }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <a href="{{ route('dashboard') }}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Regresar al inicio</a>
</body>
</html>
