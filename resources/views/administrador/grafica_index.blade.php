<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gráfica General</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div class="text-center">
        <h1 class="text-4xl font-bold">Gráfica General</h1> 
        <h2 class="text-2xl font-bold mt-2">Período: <span id="periodoTexto">{{ $periodoActual }}</span></h2>  
    </div>
    <br>
    <div class="flex justify-center">
        <button id="guardarGrafica" class="bg-red-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded hide-on-print">
            Guardar Gráfica
        </button>
        
        &nbsp;
        <button onclick="window.print()" class="bg-red-800 hover:bg-red-600 text-white font-bold py-2 px-4 rounded hide-on-print">
            Imprimir PDF
        </button>
        &nbsp;
        <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded hide-on-print">Regresar al inicio</a>
    </div>

    <div class="container mx-auto py-6">   
        @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif

        <div id="chartContainer" class="flex justify-center">
            <canvas id="grafica" width="800" height="400"></canvas>
            <p id="chartMessage" style="display: none;">La gráfica para el período seleccionado no está disponible.</p>
        </div>
    </div>
    <div class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Promedio General de cada Departamento</h2>
        <table class="table-auto border-collapse w-full">
            <thead>
                <tr>
                    <th class="border px-4 py-2">Departamento</th>
                    <th class="border px-4 py-2">Promedio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $departamento => $info)
                <tr>
                    <td class="border px-4 py-2">{{ $departamento }}</td>
                    <td class="border px-4 py-2">{{ $info['Promedio'] }}</td>
                </tr>
                @endforeach
                <tr>
                    <td class="border px-4 py-2 font-bold">Promedio General Global</td>
                    <td class="border px-4 py-2 font-bold bg-yellow-400">{{ $promedio_general_global }}</td>
                </tr>
                
                
            </tbody>
        </table>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            var ctx = document.getElementById('grafica').getContext('2d');
            var data = {!! json_encode($data) !!};
            var labels = Object.keys(data);
            var promedios = Object.values(data).map(depto => depto['Promedio']);

            var myChart = new Chart(ctx, {
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

            document.getElementById('guardarGrafica').addEventListener('click', function() {
                var canvas = document.getElementById('grafica');
                var chartImage = canvas.toDataURL('image/png');
                var downloadLink = document.createElement('a');
                downloadLink.href = chartImage;
                downloadLink.download = 'grafica_general.png';
                document.body.appendChild(downloadLink);
                downloadLink.click();
                document.body.removeChild(downloadLink);
            });
        });

        function cambiarPeriodo(select) {
            var periodoSeleccionado = select.value;
            var periodoActual = {!! json_encode($periodoActual) !!};

            if (periodoSeleccionado === periodoActual) {
                document.getElementById('grafica').style.display = 'block';
                document.getElementById('chartMessage').style.display = 'none';
            } else {
                document.getElementById('grafica').style.display = 'none';
                document.getElementById('chartMessage').style.display = 'block';
            }
        }
    </script>
</body>
</html>
