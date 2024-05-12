<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/base/css/menu.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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

    <div class="container mx-auto my-8 px-4">
        <h1 class="text-3xl font-bold mb-4">ALUMNOS ITSZO</h1>
        <input type="text" id="searchInput" placeholder="Buscar alumnos ITSZO" class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">

        <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Carrera</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semestre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Control</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Acciones</th>
                </tr>
            </thead>
            <tbody id="alumnosTableBody" class="divide-y divide-gray-200">
                @foreach ($alumnos as $alumno)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $alumno->carrera }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $alumno->semestre }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $alumno->no_control }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <!--<form action="{{--route('alumnos.destroy', $alumno->id) --}}" method="POST">-->
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <script>
        const searchInput = document.getElementById('searchInput');
        const alumnosTableBody = document.getElementById('alumnosTableBody');

        searchInput.addEventListener('input', function() {
            const searchText = searchInput.value.trim().toLowerCase();
            const rows = alumnosTableBody.getElementsByTagName('tr');

            for (const row of rows) {
                const carreraCell = row.getElementsByTagName('td')[0];
                if (carreraCell.textContent.trim().toLowerCase().includes(searchText)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    </script>
</body>
</html>