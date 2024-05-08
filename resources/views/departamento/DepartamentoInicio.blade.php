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

    @php
    $datos;
    $preguntas;
    $dep;
    
    @endphp

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col"><h1> <label id="tit"></label> </h1></div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <canvas id="myChart"></canvas>
                    <h4>ciclo escolar 1</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611" onclick="OnClicbtnPreguntas(2024)">Preguntas</button>
                </div>
            </div>
            <div class="col">
                <div>
                    <canvas id="myChart2"></canvas>
                    <h4>ciclo escolar 2</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611" onclick="OnClicbtnPreguntas(2022)">Preguntas</button>
                </div>
            </div>
            <div class="col">
                <canvas id="myChart3"></canvas>
                <h4>ciclo escolar 3</h4> <br>
                <button class="btn btn-primary" style="background:#7A0611" onclick="OnClicbtnPreguntas(2021)">Preguntas</button>
            </div>
        </div>
    </div>

    
    
   

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var datos = {!! json_encode($datos) !!} 
        var preguntas = {!! json_encode($preguntas) !!} 
        var titulo = {!! json_encode($dep) !!}
       
        


    const ctx = document.getElementById('myChart');
    const ctx2 = document.getElementById('myChart2');
    const ctx3 = document.getElementById('myChart3');
    const tit = document.getElementById('tit').innerHTML= titulo;

   

    new Chart(ctx, {
        type: 'bar',
        data: {
        labels: preguntas,
        datasets: [{
            label: 'porsentaje de respuestas',
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

    new Chart(ctx2, {
        type: 'bar',
        data: {
        labels: preguntas,
        datasets: [{
            label: 'porsentaje de respuestas',
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
    new Chart(ctx3, {
        type: 'bar',
        data: {
        labels: preguntas,
        datasets: [{
            label: 'porsentaje de respuestas',
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

    let OnClicbtnPreguntas = (ciclo)=>{
       
        window.location.href='/departamento/tablas/'+titulo+'/'+ciclo
    }
    </script>

    
</body>
</html>