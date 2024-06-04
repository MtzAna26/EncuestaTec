<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="{{ asset('css/graficas/css/grafica.css') }}">
    <title>Reporte Gráfica General</title>
    <style>
        .highlight-yellow {
            background-color: yellow;
        }
    </style>
</head>
<body>
    <div class="container mx-auto p-4">


        <div class="text-center mb-4">
            <h1 class="text-2xl font-bold">Gráfica General</h1>
        </div>

        <div class="mb-4">
            <table class="min-w-full bg-white border border-gray-300">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Departamento</th>
                        <th class="py-2 px-4 border-b">Promedio Final</th>
                        <th class="py-2 px-4 border-b">Promedio General</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $departamento => $valores)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $departamento }}</td>
                            <td class="py-2 px-4 border-b">{{ $valores['Promedio'] }}</td>
                            <td class="py-2 px-4 border-b">{{ $valores['Promedio General'] }}</td>
                        </tr>
                    @endforeach
                    <tr class="highlight-yellow">
                        <td class="py-2 px-4 border-b font-bold">Promedio General</td>
                        <td class="py-2 px-4 border-b font-bold">{{ $promedio_general_global }}</td>
                        <td class="py-2 px-4 border-b font-bold">{{ $promedio_general_global }}</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="chart-container mt-4">
            <canvas id="grafica"></canvas>
            <script>
                document.addEventListener("DOMContentLoaded", function () {
                    var ctx = document.getElementById('grafica').getContext('2d');
                    var data = @json($data);
                    var labels = Object.keys(data);
                    var promedios = Object.values(data).map(depto => depto['Promedio']);

                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Promedio General Departamentos',
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
                });
            </script>
        </div>

        <div class="footer text-center mt-4">
            <p>Reporte generado el {{ \Carbon\Carbon::now()->format('d/m/Y') }}</p>
        </div>
    </div>
</body>
</html>
