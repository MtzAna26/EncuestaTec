<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Carreras</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="max-w-4xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold mb-4 text-center">Selecciona Semestre</h1>

    <form action="{{ route('admin.grafica_por_semestre') }}" method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 mx-auto max-w-lg">
        @csrf

        <div class="mb-4">
            <label for="carrera" class="block text-sm font-medium text-gray-700">Carrera:</label>
            <select id="carrera" name="carrera" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccionar Carrera</option>
                <option value="Ingenieria Industrial">Ingenieria Industrial (Escolarizado)</option>
                <option value="Ingenieria en Mineria">Ingenieria en Mineria (Escolarizado)</option>
                <option value="Ingenieria en Agronomia">Ingenieria en Agronomia (Escolarizado)</option>
                <option value="Licenciatura en Administracion">Licenciatura en Administracion (Escolarizado)</option>
                <option value="Ingenieria en Gestion Empresarial(Escolarizado)">Ingenieria en Gestion Empresarial (Escolarizado)</option>
                <option value="Ingenieria en Sistemas Computacionales">Ingenieria en Sistemas Computacionales (Escolarizado)</option>
                <option value="Ingenieria Informática">Ingenieria Informática (Semiescolarizado)</option>
                <option value="Ingenieria en Gestion Empresarial(Semiescolarizado)">Ingenieria en Gestion Empresarial (Semiescolarizado)</option>
            </select>
        </div>

        <div class="mb-4">
            <label for="semestre" class="block text-sm font-medium text-gray-700">Semestre:</label>
            <select id="semestre" name="semestre" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <option value="">Seleccionar Semestre</option>
                <option value="Primer_Semestre">Primer Semestre</option>
                <option value="Segundo_Semestre">Segundo Semestre</option>
                <option value="Tercer_Semestre">Tercer Semestre</option>
                <option value="Cuarto_Semestre">Cuarto Semestre</option>
                <option value="Quinto_Semestre">Quinto Semestre</option>
                <option value="Sexto_Semestre">Sexto Semestre</option>
                <option value="Septimo_Semestre">Septimo Semestre</option>
                <option value="Octavo_Semestre">Octavo Semestre</option>
                <option value="Noveno_Semestre">Noveno Semestre</option>
            </select>
        </div>

        <div class="flex items-center justify-center mb-4">
            <button type="submit" class="bg-blue-900 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Generar gráfica</button>
        </div>
        <div class="flex items-center justify-center">
            <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Regresar al inicio</a>
        </div>
    </form>
</div>

</body>
</html>
