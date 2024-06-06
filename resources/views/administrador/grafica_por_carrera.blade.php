<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica por Carrera: {{ $carrera }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <!-- Agrega la biblioteca Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="container">
        <h1>Gráfica por Carrera: {{ $carrera }}</h1>
        <p>Periodo: {{ $periodoActual }}</p> <!-- Agrega el periodo -->
        <p>Total de Alumnos: {{ $totalAlumnos }}</p> 
        <!-- Agrega un lienzo para la gráfica -->
        <canvas id="grafica"></canvas>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Departamento</th>
                    <th>Promedio</th>
                    <th>Promedio General</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $departamento => $valores)
                    <tr>
                        <td>{{ $departamento }}</td>
                        <td>{{ $valores['Promedio'] }}</td>
                        <td class="{{ $valores['Promedio General'] == $promedio_general_global ? 'text-yellow-500 font-bold' : '' }}">{{ $valores['Promedio General'] }}</td>
                    </tr>
                @endforeach
                <tr>
                    <td colspan="2"><strong class="text-yellow-500">Promedio General Global</strong></td>
                    <td class="text-yellow-500 font-bold">{{ $promedio_general_global }}</td>
                </tr>
            </tbody>
        </table>
        
    </div>
    <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Regresar al inicio</a>
    <script>
        // Obtiene los datos para la gráfica
        var departamentos = @json(array_keys($data));
        var promedios = @json(array_column($data, 'Promedio'));

        // Configura y dibuja la gráfica
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
                        beginAtZero: true // Comienza en cero en el eje y
                    }
                }
            }
        });
    </script>
</body>
</html>
