<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/base/css/menu.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/graficas/css/grafica.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

    <br>
    <div class="text-center">
        <h1 class="text-4xl font-bold">Gráfica Actividades Culturales y Deportivas</h1>
        @if ($periodoActual)
            <h2 class="text-2xl font-semibold">Periodo Actual: {{ $periodoActual->nombre }}</h2>
        @else
            <h2 class="text-2xl font-semibold">No hay un periodo actual disponible</h2>
        @endif
    </div>
    
    <br>
    <div class="flex justify-center">
        <a href="{{route('generate_reporte_culturales_deportivas_pdf')}}" class="bg-red-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Generar PDF
        </a>
        &nbsp;
        <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded hide-on-print">Regresar al inicio</a>
        &nbsp;
        <button id="guardarGraficaCulturalesDeportivas" class="bg-blue-900 hover:bg-blue-500 text-white font-bold py-2 px-4 rounded">
            Guardar Gráfica Actividades Culturales y Deportivas
        </button>
    </div>
    
<div class="chart-container">
        <canvas id="graficaRespuestas"></canvas>
    </div>
    <script src="{{ asset('js/graficaCulturalesDeportivas.js') }}"></script>

    <script>
        document.getElementById('guardarGraficaCulturalesDeportivas').addEventListener('click', function() {
            var canvas = document.getElementById('graficaRespuestas');
            var chartImage = canvas.toDataURL('image/png');

            // Crear un enlace invisible para la descarga
            var downloadLink = document.createElement('a');
            downloadLink.href = chartImage;
            downloadLink.download = 'grafica_actividades_culturales_deportivas.png';

            // Desencadenar la descarga manualmente
            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        });
    </script>
</body>
</html>