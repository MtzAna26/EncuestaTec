<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/base/css/menu.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('/resources/js/periodo.js') }}"></script>
</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md">
        <div class="container mx-auto py-4 px-6 flex justify-between items-center">
            <img src="{{ asset('img/logoencuesta.png') }}" alt="Logo de EncuestaTec">
            <div class="titles text-black">
                <h2 class="text-lg font-semibold">SISTEMA DE ENCUESTAS</h2>
                <h3 class="text-sm">EncuestaTec</h3>
                <h1 class="text-xl font-bold">INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS OCCIDENTE</h1>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script src="{{ asset('js/general.js') }}"></script>
            <img src="{{ asset('img/itszologo.jpeg') }}" alt="Logo de Tecnm">
        </div>
    </header>

    <body class="bg-gray-100">
        <div class="container mx-auto p-4">
            <h1 class="text-2xl font-bold text-center mb-4">Gráficas Generales</h1>
            
            <div class="bg-white rounded-lg shadow p-6">
                <form id="searchForm" method="GET" action="{{ route('grafica.general') }}" class="mb-6">
                    <div class="flex items-center justify-center">
                        <label for="periodo" class="mr-2 text-lg">Seleccionar Periodo:</label>
                        <select name="periodo" id="periodo" class="border border-gray-300 rounded-lg p-2">
                            @foreach($periodos as $periodo)
                                <option value="{{ $periodo->id }}">{{ $periodo->nombre }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="ml-4 bg-blue-500 text-white rounded-lg py-2 px-4 hover:bg-blue-700 transition duration-200">
                            Buscar
                        </button>
                    </div>
                </form>
                <div class="relative">
                    <canvas id="semestresChart" data-labels="{{ json_encode(array_keys($datosGrafica)) }}" data-values="{{ json_encode(array_values($datosGrafica)) }}"></canvas>
                </div>
            </div>
            <br>
            <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded hide-on-print">Regresar al inicio</a>
        </div>
    </body>

</html>
