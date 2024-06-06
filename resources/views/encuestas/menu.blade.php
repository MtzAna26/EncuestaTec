<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/encuestas/css/encuestas.css') }}">
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
            <img src="{{ asset('img/itszologo.jpeg') }}" alt="Logo de Tecnm">
        </div>
    </header>
    <style>
        .container {
            text-align: center;
            margin-top: 50px;
        }
        .tooltip {
            position: relative;
            display: inline-block;
        }

        .tooltip .tooltiptext {
            visibility: hidden;
            width: 220px;
            background-color: #f9f9f9;
            color: #000;
            text-align: center;
            border-radius: 6px;
            padding: 5px 0;
            position: absolute;
            z-index: 1;
            bottom: 125%;
            left: 50%;
            margin-left: -110px; 
            opacity: 0;
            transition: opacity 0.3s;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .tooltip:hover .tooltiptext {
            visibility: visible;
            opacity: 1;
        }
    </style>
    </head>

    <body>
        <div class="container">

            </head>

            <body>
                <a href="/buzon-de-quejas">
                    <button
                        class="bg-red-900 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Buzón de Quejas
                    </button>
                </a>
                &nbsp;
                <a href="{{ route('encuestas.residencias_profesionales') }}" class="tooltip">
                    <button class="bg-red-900 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Residencias
                    </button>
                    <div class="tooltiptext">¡Atención! Si estás cursando residencias, no olvides llenar la encuesta.</div>
                </a>
                &nbsp;
                <a href="{{ route('encuestas.centro_informacion') }}">
                    <button
                        class="bg-red-900 hover:bg-red-600 text-white font-bold py-2 px-6 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">Comenzar
                        Encuestas</button>
                </a>
        </div>
    </body>

</html>
