<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Carreras</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6 bg-white shadow-lg rounded-lg mt-10">
        <h1 class="text-3xl font-bold mb-4">Buscar Gráfica por Carrera y Periodo</h1>
        <form action="{{ route('mostrar_carrera') }}" method="GET" class="space-y-6">
            <div>
                <label for="carrera" class="block text-xl font-semibold text-gray-700">Seleccionar Carrera</label>
                <select id="carrera" name="carrera" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($carreras as $carrera)
                        <option value="{{ $carrera }}">{{ $carrera }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="periodo" class="block text-xl font-semibold text-gray-700">Seleccionar Periodo</label>
                <select id="periodo" name="periodo" class="block w-full mt-1 p-2 border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @foreach($periodosDisponibles as $periodo)
                        <option value="{{ $periodo }}">{{ $periodo }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <button type="submit" class="bg-red-600 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">
                    Buscar
                </button>
            </div>
        </form>
    </div>
</body>
</html>
