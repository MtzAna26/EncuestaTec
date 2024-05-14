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
    <!-- Header -->
    <header class="bg-white shadow-md"> 
        <!--- <header class="bg-custom-color shadow-md"> COLOR GUINDA---> 
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
            
            @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif
            
            <h1 class="text-3xl font-bold mb-4">ALUMNOS ITSZO</h1>
            <input type="text" id="searchInput" placeholder="Buscar alumnos ITSZO" class="w-full mb-4 px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
            
            <form id="eliminarAlumnosForm" method="POST" action="{{ route('alumnos.eliminar', ['carrera' => $carrera, 'semestre' => $semestre]) }}" onsubmit="return confirm('¿Estás seguro de eliminar los alumnos seleccionados?')">
                @csrf
                <table class="w-full bg-white shadow-md rounded-lg overflow-hidden">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                <input type="checkbox" id="selectAll"> Seleccionar Todo
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Carrera</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Semestre</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No. Control</th>
                        </tr>
                    </thead>
                    <tbody id="alumnosTableBody" class="divide-y divide-gray-200">
                        @foreach ($alumnos as $alumno)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <input type="checkbox" name="alumnosSeleccionados[]" value="{{ $alumno->id }}">
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $alumno->carrera }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $alumno->semestre }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $alumno->no_control }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded mt-4">Eliminar Seleccionados</button>
            
            </form>
        </div>
    
        <script>
            const searchInput = document.getElementById('searchInput');
            const alumnosTableBody = document.getElementById('alumnosTableBody');
            const selectAll = document.getElementById('selectAll');
    
            searchInput.addEventListener('input', function() {
                const searchText = searchInput.value.trim().toLowerCase();
                const rows = alumnosTableBody.getElementsByTagName('tr');
    
                for (const row of rows) {
                    const carreraCell = row.getElementsByTagName('td')[1];
                    if (carreraCell.textContent.trim().toLowerCase().includes(searchText)) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                }
            });
    
            selectAll.addEventListener('change', function() {
                const checkboxes = alumnosTableBody.getElementsByTagName('input');
                for (const checkbox of checkboxes) {
                    checkbox.checked = selectAll.checked;
                }
            });
        </script>
</body>
</html>