<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/base/css/menu.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

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
        <h1 class="text-4xl font-bold">Gráfica Departamento Centro Información</h1>   
    </div>

    <br>
    <div class="flex justify-center">
        <a href="{{ route('generate-question-report') }}" class="bg-red-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Generar PDF
        </a>
    </div>
    

    <canvas id="graficaRespuestas" width="400" height="200"></canvas>
    <script src="{{ asset('js/graficaCentroInformacion.js') }}"></script>
</body>
</html>