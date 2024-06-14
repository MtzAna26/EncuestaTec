<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

    <title>Semestres</title>
</head>

<body>
    <div class="flex justify-center">
        <!--- <button id="guardarGrafica" class="bg-red-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded hide-on-print">
            Guardar Gráfica
        </button>-->

        <button onclick="window.print()" class="bg-red-800 hover:bg-red-600 text-white font-bold py-2 px-4 rounded hide-on-print">
            Imprimir PDF
        </button>
        &nbsp;
        <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded hide-on-print">Regresar al inicio</a>
    </div>
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-2xl font-bold mb-4">Gráfica para el Semestre: {{ $semestre }}</h1>
        <h2 class="text-xl mb-4">Carrera: {{ $carrera }}</h2>
        <h3 class="text-lg mb-4">Total de Alumnos: {{ $totalAlumnos }}</h3>

        <div class="bg-white rounded-lg shadow overflow-hidden mb-4 p-4">
            <canvas id="myChart" class="w-full"></canvas>
        </div>

        <div class="bg-white rounded-lg shadow overflow-hidden p-4">
            <h3 class="text-lg font-bold mb-2">Promedios por Departamento</h3>
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="w-1/2 px-4 py-2">Departamento</th>
                        <th class="w-1/2 px-4 py-2">Promedio</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($promedios as $departamento => $promedio)
                        <tr>
                            <td class="border px-4 py-2">{{ $departamento }}</td>
                            <td class="border px-4 py-2 @if ($promedio < 3.5) bg-red-200 @endif">
                                {{ number_format($promedio, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td class="border px-4 py-2 font-bold">Promedio General</td>
                        <td class="border px-4 py-2 font-bold bg-yellow-200">{{ number_format($promedioGeneral, 2) }}
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var datosGrafica = @json($promedios);
            var labels = Object.keys(datosGrafica);
            var data = Object.values(datosGrafica);

            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Promedio',
                        data: data,
                        backgroundColor: labels.map(label => datosGrafica[label] < 3.5 ?
                            'rgba(128, 0, 0, 1)' : 'rgba(128, 0, 0, 1)'),
                        borderColor: labels.map(label => datosGrafica[label] < 3.5 ?
                            'rgbargba(128, 0, 0, 1)' : 'rgba(128, 0, 0, 1)'),
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Promedios por Departamento - Carrera: {{ $carrera }}, Semestre: {{ $semestre }}'
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>
