<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
        <button id="guardarGrafica" class="bg-red-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Guardar Gráfica
        </button>
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

                $.ajax({
                    type: "POST",
                    url: "{{ url('/guardar-grafica') }}",
                    data: {
                        image: chartImage,
                        periodo: document.getElementById('periodo').value,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        console.log('Imagen guardada exitosamente');
                    },
                    error: function(err) {
                        console.error('Error al guardar la imagen', err);
                    }
                });
            });

            cambiarPeriodo(document.getElementById('periodo'));
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
