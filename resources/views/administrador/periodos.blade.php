<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Período</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-center text-3xl font-bold mb-8">Seleccionar Período</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($periodos as $periodo)
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <a href="{{ route('mostrarGrafica', ['periodo' => $periodo->nombre]) }}" class="block text-blue-500 hover:underline">
                        {{ $periodo->nombre }}
                    </a>
                </div>
            @endforeach
        </div>
        <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mt-8 block text-center">Regresar al inicio</a>
    </div>
</body>
</html>
