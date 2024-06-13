<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header, .footer, .no-print {
            display: none;
        }
        .tam {
            height: 250%;
        }
        .table1 {
            width: auto;
            border-collapse: collapse;
        }
        .td1 {
            padding: 8px;
            white-space: nowrap;
        }
        @media print {
            .no-print {
                display: none !important;
            }
            .print-only {
                display: block !important;
            }
            .header {
                display: block;
            }
            .footer {
                display: block;
            }
        }
        .print-only {
            display: none;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/departamento/Login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</head>
<body>
    @php
        $dep = $dep ?? '';
        $ciclo = $ciclo ?? '';
        $Gdatos = $Gdatos ?? [];
        $preguntas = $preguntas ?? [];
        $contadorbuletas = 0;
        $contadorRes = 0;
    @endphp
    <header>
        <div class="header-content">
            <img src="{{ asset('img/logoencuesta.png') }}" alt="Logo de EncuestaTec">
            <div class="titles">
                <h2>SISTEMA DE ENCUESTAS</h2>
                <h3>EncuestaTec</h3>
                <h1>INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS OCCIDENTE</h1>
            </div>
            <img src="{{ asset('img/itszologo.jpeg') }}" alt="Logo de Tecnm">
        </div>
    </header>
    <div class="container">
        <div id="printContent">
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <h1><label id="tit">{{ $dep }} -- {{ $ciclo }}</label></h1>
                </div>
                <div class="col"></div>
            </div>
            <div class="row">
                <div class="col">
                    <table class="table table-hover table-striped-columns">
                        <thead>
                            <tr>
                                <th scope="col">Pregunta</th>
                                <th scope="col">1.- Malo</th>
                                <th scope="col">2.- Regular</th>
                                <th scope="col">3.- Bueno</th>
                                <th scope="col">4.- Muy Bueno</th>
                                <th scope="col">5.- Excelente</th>
                                <th scope="col">Promedio</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datos as $clave => $valor)
                                <tr>
                                    <td>{{ $clave }}</td>
                                    <td>{{ $valor[0] }}</td>
                                    <td>{{ $valor[1] }}</td>
                                    <td>{{ $valor[2] }}</td>
                                    <td>{{ $valor[3] }}</td>
                                    <td>{{ $valor[4] }}</td>
                                    @if ($valor[0] + $valor[1] + $valor[2] + $valor[3] + $valor[4] == 0)
                                        <td colspan="6">No se encuentran respuestas</td>
                                    @else
                                        @php
                                            $totalRespuestas = $valor[0] + $valor[1] + $valor[2] + $valor[3] + $valor[4];
                                            $promedio = ($valor[0] * 1 + $valor[1] * 2 + $valor[2] * 3 + $valor[3] * 4 + $valor[4] * 5) / $totalRespuestas;
                                        @endphp
                                        <td @if ($promedio < 3.6) style="background-color: rgb(255, 255, 0);" @endif>
                                            <p>{{ round($promedio, 2) }}</p>
                                        </td>
                                        @php
                                            $contadorbuletas++;
                                            $contadorRes += $promedio;
                                        @endphp
                                    @endif
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="6"><b>Promedio general</b></td>
                                @php
                                    $promedioGeneral = $contadorbuletas ? $contadorRes / $contadorbuletas : 0;
                                @endphp
                                <td @if ($promedioGeneral < 3.6) style="background-color: rgb(228, 12, 15);" @endif>
                                    <b>{{ round($promedioGeneral, 2) }}</b>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col"></div>
                <div class="col">
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
                <div class="col"></div>
            </div>
        </div>
        <div class="row">
            <div class="col scrollspy-example tam">
                <div>
                    <table class="table table-hover table-striped-columns table1">
                        <thead class="no-print">
                            <tr>
                                <th>Comentarios</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($Comentarios as $clave => $valor)
                                <tr>
                                    <td class="td1">{{ $valor[0] }}</td>
                                    <td class="td1">{{ $valor[1] }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col">
                <button class="btn btn-light no-print" onclick="goBack()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z"/>
                    </svg>
                </button>
                <button class="btn btn-light no-print" onclick="logout()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
                        <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                    </svg>
                </button>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>
    <button id="printButton" class="btn btn-primary no-print">Imprimir Contenido</button>
    <script>
        document.getElementById('printButton').addEventListener('click', function() {
            window.print();
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var dep = {!! json_encode($dep) !!};
        var ciclo = {!! json_encode($ciclo) !!};
        var datos = {!! json_encode($Gdatos) !!};
        var preguntas = {!! json_encode($preguntas) !!};
        document.getElementById('tit').innerHTML = dep + ' -- ' + ciclo;
        const ctx = document.getElementById('myChart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: preguntas,
                datasets: [{
                    label: 'Número de respuestas',
                    data: datos,
                    backgroundColor: 'rgba(128, 0, 0, 1)',
                    borderColor: 'rgb(128, 0, 0, 1)',
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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        function goBack() {
            window.history.back();
        }
        async function logout() {
            const response = await axios.get('/departamento/logout2');
            window.location.href = "/";
        }
    </script>
</body>
</html>
