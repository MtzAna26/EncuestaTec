<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <!-- Enlace a tus estilos CSS -->
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
            <img src="{{ asset('img/Logo-TecNM.png') }}" alt="Logo de Tecnm">
        </div>
    </header>
    <br>
    <div class="container mx-auto px-4">
        <h1 class="text-3xl font-semibold mb-4">DEPARTAMENTOS</h1>
        <div class="grid grid-cols-3 gap-4">
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">CENTRO DE INFORMACIÓN</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">COORDINACIÓN DE CARRERAS</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">RECURSOS FINANCIEROS</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">RESIDENCIAS PROFESIONALES</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">CENTRO DE CÓMPUTO</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">SERVICIO SOCIAL</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">SERVICIOS ESCOLARES</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6  rounded-lg text-center">
                <button class="text-lg font-semibold">BECAS</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">TALLERES Y LABORATORIOS</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">CAFETERÍA</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">SERVICIO MÉDICO</button>
            </div>
            <div class="bg-red-900 text-white py-4 px-6 rounded-lg text-center">
                <button class="text-lg font-semibold">ACTIVIDADES CULTURALES Y DEPORTIVAS</button>
            </div>
        </div>
        
    </div>
</body>
</html>
