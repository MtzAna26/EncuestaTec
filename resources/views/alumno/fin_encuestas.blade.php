<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/buzon_quejas/buzon_quejas.css') }}">
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
    <main class="flex items-center justify-center w-full">
        <div class="bg-[#800000] text-center mx-4 md:mx-auto p-8 rounded-lg shadow-lg w-full md:w-2/3 lg:w-1/2">
            <h1 class="text-4xl font-bold mb-4 text-black">Gracias por responder las encuestas.</h1>
            <p class="text-lg mb-4 text-black">Tu opinión es fundamental para nosotros y nos ayudará a la mejora continua.</p>
            <a href="/" class="inline-block bg-red-700 hover:bg-red-600 text-white font-semibold px-6 py-3 rounded-lg text-lg transition duration-300 ease-in-out">Volver al inicio</a>
        </div>
    </main>
    
</body>

</html>
