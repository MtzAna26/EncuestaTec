<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            <img src="{{ asset('img/itszologo.jpeg') }}" alt="Logo de Tecnm">
        </div>
    </header>

    <div class="text-center">
        <h1 class="text-4xl font-bold">Gráfica General</h1>   
    </div>
    <br>
    <div class="flex justify-center">
        <a href="{{-- route('') ---}}" class="bg-red-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Imprimir PDF
        </a>
        &nbsp;
        <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded hide-on-print">Regresar al inicio</a>
    </div>

    <div class="container mx-auto py-6">   
        <div class="flex items-center justify-center mb-4">
            <label for="periodo" class="mr-2">Seleccionar Período:</label>
            <select id="periodo" class="border border-gray-300 rounded px-4 py-2 focus:outline-none focus:border-blue-500" onchange="cambiarPeriodo(this)">
                <option value="agosto-diciembre-2024">Agosto - Diciembre 2024</option>
                <option value="enero-junio-2025">Enero - Junio 2025</option>
                <option value="agosto-diciembre-2025">Agosto - Diciembre 2025</option>
            </select>
        </div>
        <canvas id="grafica" width="800" height="400"></canvas>
    </div>
    

    <script>
        function cambiarPeriodo(select) {
            var periodoSeleccionado = select.value;
            var periodoActual = {!! json_encode($periodoActual) !!};

            // Verificar si el período seleccionado está disponible
            if (periodoSeleccionado === periodoActual) {
                // Si el periodo seleccionado es igual al periodo actual, mostrar la gráfica
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
                            yAxes: [{
                                ticks: {
                                    beginAtZero: true
                                }
                            }]
                        }
                    }
                });
            } else {
                // Si el periodo seleccionado no es igual al periodo actual
                var canvas = document.getElementById('grafica');
                var ctx = canvas.getContext('2d');
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                ctx.font = '16px Arial';
                ctx.fillStyle = 'red';
                ctx.textAlign = 'center';
                ctx.fillText('La gráfica para el período seleccionado no está disponible.', canvas.width / 2, canvas.height / 2);
            }
        }
    </script>
</body>

</html>
