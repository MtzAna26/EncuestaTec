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

    <div class="container mx-auto py-6">
        <canvas id="grafica" width="800" height="400"></canvas>
    </div>

    <script>
var data = @json($data); // Convertir el array PHP a JSON

var departamentos = Object.keys(data);
departamentos.push('Promedio General'); // Agregar el promedio general como un departamento adicional

var promedios = Object.values(data).map(function(item) {
    return item['Promedio General']; // Obtener el promedio general de cada departamento
});
promedios.push(data['Promedio General'].Promedio); // Agregar el promedio general global al array de promedios

var ctx = document.getElementById('grafica').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: departamentos,
        datasets: [{
            label: 'Promedio General Departamentos ',
            data: promedios,
            backgroundColor: 'rgba(128, 0, 0, 1)',  // Color guinda sólido
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

    </script>
</body>

</html>
