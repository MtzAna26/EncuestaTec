<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica por Carrera: {{ $carrera }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/graficas/css/grafica.css') }}">
    <style>
        @media print {
            .hide-on-print {
                display: none !important;
            }
        }

        .promedio-bajo {
            background-color: rgb(224, 28, 28); 
        }
        .promedio-general {
            background-color: rgb(250, 250, 22); 
        }
    </style>
</head>
<body>
    <div class="flex justify-center space-x-4 py-4">
        <button id="guardarGrafica" class="bg-red-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded hide-on-print">
            Guardar Gráfica
        </button>
        <button onclick="window.print()" class="bg-red-800 hover:bg-red-600 text-white font-bold py-2 px-4 rounded hide-on-print">Imprimir PDF</button>
        <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded hide-on-print">Regresar al inicio</a>
    </div>
    
    <div class="container p-6 bg-gray-100 shadow-lg rounded-lg">
        <h1 class="text-3xl font-bold mb-4">Gráfica por Carrera: {{ $carrera }}</h1>
        <p class="text-xl mb-2">Periodo: {{ $periodoActual }}</p>
        <p class="text-xl mb-4">Total de Alumnos: {{ $totalAlumnos }}</p> 
    
        <table class="min-w-full bg-white border border-gray-200 rounded-lg shadow-md mb-8">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Departamento</th>
                    <th class="px-6 py-3 text-left text-sm leading-4 text-gray-600 uppercase tracking-wider">Promedio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $departamento => $valores)
                    <tr class="{{ $loop->even ? 'bg-gray-50' : 'bg-white' }}">
                        <td class="px-6 py-4">{{ $departamento }}</td>
                        <td class="px-6 py-4 {{ $loop->last ? 'promedio-general' : ($valores['Promedio'] < 3.5 ? 'promedio-bajo' : '') }}">{{ $valores['Promedio'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    
        <canvas id="grafica"></canvas>
    </div>
    
    <script>
        var departamentos = @json(array_keys($data));
        var promedios = @json(array_column($data, 'Promedio'));

        var ctx = document.getElementById('grafica').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: departamentos,
                datasets: [{
                    label: 'Promedio por Carrera',
                    data: promedios,
                    backgroundColor: 'rgba(128, 0, 0, 1)',  
                    borderColor: 'rgba(128, 0, 0, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true 
                    }
                }
            }
        });
        document.getElementById('guardarGrafica').addEventListener('click', function() {
            var canvas = document.getElementById('grafica');
            var chartImage = canvas.toDataURL('image/png');

            var downloadLink = document.createElement('a');
            downloadLink.href = chartImage;
            downloadLink.download = 'grafica_por_carrera.png';

            document.body.appendChild(downloadLink);
            downloadLink.click();
            document.body.removeChild(downloadLink);
        });
    </script>
</body>
</html>
