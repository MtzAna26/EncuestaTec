<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EncuestaTec</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">
    <header class="bg-white shadow-md py-4 px-6">
        <div class="container mx-auto flex justify-between items-center">
            <img src="{{ asset('img/logoencuesta.png') }}" alt="Logo de EncuestaTec">
            <div class="titles text-black">
                <h2 class="text-lg font-semibold">SISTEMA DE ENCUESTAS</h2>
                <h3 class="text-sm">EncuestaTec</h3>
                <h1 class="text-xl font-bold">INSTITUTO TECNOLÓGICO SUPERIOR ZACATECAS OCCIDENTE</h1>
            </div>
            <img src="{{ asset('img/itszologo.jpeg') }}" alt="Logo de Tecnm">
        </div>
    </header>

    <div class="container mx-auto mt-8">
        <h1 class="text-3xl font-semibold mb-4 text-center">Carreras Disponibles</h1>
        <div class="flex justify-center mb-4">
            <a href="{{ route('dashboard')}}" class="bg-red-700 hover:bg-red-500 text-white font-bold py-2 px-4 rounded">Regresar al inicio</a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($carreras as $carrera)
                <div class="bg-white shadow-md rounded-lg p-6 hover:shadow-lg transition duration-300 ease-in-out">
                    <a href="{{ route('mostrar_carrera', ['carrera' => $carrera]) }}" class="text-xl font-semibold text-center block mb-4 hover:text-red-600">{{ $carrera }}</a>
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
