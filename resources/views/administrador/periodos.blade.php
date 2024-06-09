<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleccionar Período</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .card:hover {
            transform: translateY(-4px);
            transition: all 0.3s ease;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-center text-3xl font-bold mb-8">Seleccionar Período</h1>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($periodos as $periodo)
                <div class="bg-white rounded-lg shadow-lg text-center card hover:shadow-xl transition duration-300">
                    <a href="{{ route('mostrarGrafica', ['periodo' => $periodo]) }}" class="block py-6 px-4 text-blue-500 hover:underline">
                        {{ $periodo }}
                    </a>
                </div>
            @endforeach
        </div>
        <a href="{{ route('dashboard')}}" class="block text-center bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded mt-8 transition duration-300">Regresar al inicio</a>
    </div>
</body>
</html>
