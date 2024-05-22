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
            <img src="{{ asset('img/Logo-TecNM.png') }}" alt="Logo de Tecnm">
        </div>
    </header>

<div class="container mx-auto py-4 px-6">
    <div class="mb-4">
        <p class="text-gray-700 font-bold mb-2">Buscar Semestre:</p>
        <select id="semestre" class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 rounded shadow leading-tight focus:outline-none focus:shadow-outline transition duration-300 ease-in-out">
            <option value="enero-junio">Enero - Junio</option>
            <option value="agosto-diciembre">Agosto - Diciembre</option>
        </select>
    </div>

    <button id="buscar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        Buscar
    </button>

    <div id="resultados" class="mt-4">
        <!-- Aquí se cargarán los resultados de la búsqueda -->
    </div>
</div>

<script>
$(document).ready(function() {
    $('#buscar').click(function() {
        var semestreSeleccionado = $('#semestre').val();
        $.ajax({
            url: '/obtener-alumnos-por-semestre',
            method: 'GET',
            data: { semestre: semestreSeleccionado },
            success: function(response) {
                // Limpiar resultados anteriores
                $('#resultados').empty();

                // Verifica si response es un array y si contiene datos
                if (Array.isArray(response) && response.length) {
                    // Agregar nuevos resultados
                    $.each(response, function(index, alumno) {
                        $('#resultados').append('<p>' + alumno.nombre + '</p>');
                    });
                } else {
                    $('#resultados').append('<p>No se encontraron alumnos para el  seleccionado.</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar resultados:', error);
                $('#resultados').append('<p>Ocurrió un error al cargar los resultados.</p>');
            }
        });
    });
});
</script>

</body>
</html>
