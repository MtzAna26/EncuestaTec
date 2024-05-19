<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/graficaCentroInformacion.js') }}"></script>
    <title>Reporte</title>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8 px-4">
        <h1 class="text-center text-3xl font-bold mb-8">Reporte</h1>
        <button onclick="window.print()" class="bg-red-900 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Imprimir PDF
        </button>
        <div class="overflow-x-auto">
            <table class="table-auto border-collapse w-full">
                <thead>
                    <tr>
                        <th class="px-4 py-2" rowspan="2">NO</th>
                        <th class="px-4 py-2" rowspan="2">Pregunta</th>
                        <th class="px-4 py-2" colspan="5">CALIFICACION</th>
                        <th class="px-4 py-2" rowspan="2">Promedio</th>
                    </tr>
                    <tr>
                        <th class="px-4 py-2">1</th>
                        <th class="px-4 py-2">2</th>
                        <th class="px-4 py-2">3</th>
                        <th class="px-4 py-2">4</th>
                        <th class="px-4 py-2">5</th>
                    </tr>
                </thead>
                <tbody>
                    @php $rowNumber = 1; @endphp
                    @foreach($data as $row)
                        <tr>
                            <td class="border px-4 py-2">{{ $rowNumber }}</td>
                            <td class="border px-4 py-2">{{ $row->question_text }}</td>
                            <td class="border px-4 py-2">{{ $row->count_1 }}</td>
                            <td class="border px-4 py-2">{{ $row->count_2 }}</td>
                            <td class="border px-4 py-2">{{ $row->count_3 }}</td>
                            <td class="border px-4 py-2">{{ $row->count_4 }}</td>
                            <td class="border px-4 py-2">{{ $row->count_5 }}</td>
                            <td class="border px-4 py-2">{{ $row->average_score ? number_format($row->average_score, 2) : '-' }}</td>
                        </tr>
                        @php $rowNumber++; @endphp
                    @endforeach
                    <tr>
                        <td colspan="7" class="border px-4 py-2 text-center">Promedio general del servicio</td>
                        <td class="border px-4 py-2 bg-yellow-300 font-bold">{{ number_format($generalAverage, 2) }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="flex justify-center mt-8">
            <canvas id="graficaRespuestas" width="400" height="200"></canvas>
        </div>
        
    </div>
</body>
</html>
