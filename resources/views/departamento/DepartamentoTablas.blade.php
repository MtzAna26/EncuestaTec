
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/departamento/Login.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
@php
   
    $dep;
    $ciclo;
   
    $Gdatos;
    $preguntas;
  
    
   
    
@endphp
    <header>
        <div class="header-content">
            <img src="{{ asset('img/logoencuesta.png') }}" alt="Logo de EncuestaTec">
            <div class="titles">
                <h2>SISTEMA DE ENCUESTAS</h2>
                <h3>EncuestaTec</h3>
                <h1>INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS OCCIDENTE</h1>
            </div>
            <img src="{{ asset('img/Logo-TecNM.png') }}" alt="Logo de Tecnm">
        </div>       
    </header>
    
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col"><h1><label id="tit"></label></h1></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <table class="table table-hover table-striped-columns">
                    <thead>
                        <tr>
                        <th scope="col">pregunta</th>
                        <th scope="col">1.-Malo</th>
                        <th scope="col">2.-regular</th>
                        <th scope="col">3.-bueno</th>
                        <th scope="col">Promedio</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($datos as $clave => $valor)
                    <tr>
                            <td>{{ $clave }}</td>
                            <td>{{ $valor[0] }}</td>
                            <td>{{ $valor[1] }}</td>
                            <td>{{ $valor[2] }}</td>
                            <td>{{  (($valor[0]*1)+($valor[1]*2)+($valor[2]*3))/100 }}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <div class="col"></div>
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

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
   <script>
        var dep = {!! json_encode($dep) !!} 
        var ciclo = {!! json_encode($ciclo) !!} 
         var datos = {!! json_encode($Gdatos) !!} 
        var preguntas = {!! json_encode($preguntas) !!} 

        const tit = document.getElementById('tit').innerHTML= dep+'--'+ciclo;

        const ctx = document.getElementById('myChart');
        new Chart(ctx, {
        type: 'bar',
        data: {
        labels: preguntas,
        backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      
    ],
        datasets: [{
            label: 'numero de respuetas',
            data: datos,
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
</body>
</html>

