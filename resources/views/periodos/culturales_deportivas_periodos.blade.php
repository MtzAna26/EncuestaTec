<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Periodos de Culturales y Deportivas</title>
    <link rel="stylesheet" href="{{ asset('css/base/css/menu.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
</head>
<body>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-semibold mb-4">Períodos Disponibles Actividades Culturales Deportivas</h1>

        @if($periodos->isEmpty())
            <p>No se encontraron periodos.</p>
        @else
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($periodos as $periodo)
                    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
                        <h2 class="text-xl font-bold mb-2">{{ $periodo->nombre }}</h2>
                        <p><strong>Fecha de Inicio:</strong> {{ $periodo->fecha_inicio }}</p>
                        <p><strong>Fecha de Fin:</strong> {{ $periodo->fecha_fin }}</p>
                        <a href="{{ route('graficas.culturales_deportivas', ['periodoId' => $periodo->id]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-4">Ver Gráfica</a>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <div class="chart-container mt-8">
        <canvas id="graficaRespuestas"></canvas>
    </div>
    <script>
        function verGrafica(periodoId) {
            window.location.href = '/graficas/culturales_deportivas/' + periodoId;
        }
    </script>
    
    
    
</body>
</html>
