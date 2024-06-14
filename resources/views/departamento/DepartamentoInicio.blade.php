<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link rel="stylesheet" href="{{ asset('css/departamento/Login.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

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

    <div class="container">
        <div class="row">
            <div class="col">
                <button class="btn btn-light" onclick="goBack()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-arrow-left-square" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm11.5 5.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5z" />
                    </svg>
                </button>
                <button class="btn btn-light" onclick="logout()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-door-open-fill" viewBox="0 0 16 16">
                        <path
                            d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1" />
                    </svg>
                </button>
            </div>
            <div class="col"></div>
            <div class="col"></div>
        </div>
    </div>

    @php
        $datos;
        $preguntas;
        $dep;

    @endphp

    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <h1> <label id="tit"></label> </h1>
            </div>
            <div class="col"></div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <canvas id="myChart1"></canvas>
                    <h4>2024-02-01 2024-06-01</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611"
                        onclick="OnClicbtnPreguntas('2024-02-01','2024-06-20')">Preguntas</button>
                </div>
            </div>
            <div class="col">
            <div>
                    <canvas id="myChart2"></canvas>
                    <h4>2024-07-01 2024-12-01</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611"
                        onclick="OnClicbtnPreguntas('2024-07-01','2024-12-01')">Preguntas</button>
                </div>
            </div>
            <div class="col">
            <div>
                    <canvas id="myChart3"></canvas>
                    <h4>2025-02-01 2025-07-01</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611"
                        onclick="OnClicbtnPreguntas('2025-02-01','2025-07-01')">Preguntas</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <canvas id="myChart4"></canvas>
                    <h4>2025-07-01 2024-12-01</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611"
                        onclick="OnClicbtnPreguntas('2025-07-01','2025-12-01')">Preguntas</button>
                </div>
            </div>
            <div class="col">
            <div>
                    <canvas id="myChart5"></canvas>
                    <h4>2026-02-01 2026-06-01</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611"
                        onclick="OnClicbtnPreguntas('2026-02-01','2026-06-01')">Preguntas</button>
                </div>
            </div>
            <div class="col">
            <div>
                    <canvas id="myChart6"></canvas>
                    <h4>2026-07-01 2025-12-01</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611"
                        onclick="OnClicbtnPreguntas('2026-07-01','2026-12-01')">Preguntas</button>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div>
                    <canvas id="myChart7"></canvas>
                    <h4>2027-02-01 2027-06-01</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611"
                        onclick="OnClicbtnPreguntas('2027-02-01','2027-06-01')">Preguntas</button>
                </div>
            </div>
            <div class="col">
            <div>
                    <canvas id="myChart8"></canvas>
                    <h4>2027-07-01 2027-12-01</h4> <br>
                    <button class="btn btn-primary" style="background:#7A0611"
                        onclick="OnClicbtnPreguntas('2027-07-01','2027-12-01')">Preguntas</button>
                </div>
            </div>
            <div class="col">
            
            </div>
        </div>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        var datos = {!! json_encode($datos) !!}
        var preguntas = {!! json_encode($preguntas) !!}
        var titulo = {!! json_encode($dep) !!}




        const ctx1 = document.getElementById('myChart1').getContext('2d');
        const ctx2 = document.getElementById('myChart2').getContext('2d'); 
        const ctx3 = document.getElementById('myChart3').getContext('2d');
        const ctx4 = document.getElementById('myChart4').getContext('2d');
        const ctx5 = document.getElementById('myChart5').getContext('2d'); 
        const ctx6 = document.getElementById('myChart6').getContext('2d');
        const ctx7 = document.getElementById('myChart7').getContext('2d');
        const ctx8 = document.getElementById('myChart8').getContext('2d'); 
       


        const tit = document.getElementById('tit').innerHTML = titulo;

        console.log(datos);

   
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: preguntas,


                datasets: [{
                    label: 'porsentaje de respuestas',
                    data: datos,
                    backgroundColor: 'rgba(128, 0, 0,1)',
                    borderColor: 'rgb(128, 0, 0,1)',

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
                    backgroundColor: 'rgba(128, 0, 0,1)',
                    borderColor: 'rgb(128, 0, 0,1)',

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
                    backgroundColor: 'rgba(128, 0, 0,1)',
                    borderColor: 'rgb(128, 0, 0,1)',

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
        new Chart(ctx4, {
            type: 'bar',
            data: {
                labels: preguntas,


                datasets: [{
                    label: 'porsentaje de respuestas',
                    data: datos,
                    backgroundColor: 'rgba(128, 0, 0,1)',
                    borderColor: 'rgb(128, 0, 0,1)',

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
        new Chart(ctx5, {
            type: 'bar',
            data: {
                labels: preguntas,


                datasets: [{
                    label: 'porsentaje de respuestas',
                    data: datos,
                    backgroundColor: 'rgba(128, 0, 0,1)',
                    borderColor: 'rgb(128, 0, 0,1)',

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
        new Chart(ctx6, {
            type: 'bar',
            data: {
                labels: preguntas,


                datasets: [{
                    label: 'porsentaje de respuestas',
                    data: datos,
                    backgroundColor: 'rgba(128, 0, 0,1)',
                    borderColor: 'rgb(128, 0, 0,1)',

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
        new Chart(ctx7, {
            type: 'bar',
            data: {
                labels: preguntas,


                datasets: [{
                    label: 'porsentaje de respuestas',
                    data: datos,
                    backgroundColor: 'rgba(128, 0, 0,1)',
                    borderColor: 'rgb(128, 0, 0,1)',

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
        new Chart(ctx8, {
            type: 'bar',
            data: {
                labels: preguntas,


                datasets: [{
                    label: 'porsentaje de respuestas',
                    data: datos,
                    backgroundColor: 'rgba(128, 0, 0,1)',
                    borderColor: 'rgb(128, 0, 0,1)',

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
        



        let OnClicbtnPreguntas = (ciclo1,ciclo2) => {

            window.location.href = '/departamento/tablas/' + titulo + '/' + ciclo1 + '/'+ciclo2
        }
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
