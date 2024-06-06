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

    <br>
    <div class="max-w-xl mx-auto bg-white shadow-md rounded-md p-6">
        <h2 class="text-lg font-semibold mb-4">Buzón de Quejas</h2>

        <form method="POST" action="{{ route('quejas.create') }}">
            @csrf
            <div class="mb-4">
                <label for="carrera" class="block font-medium mb-1">Carrera:</label>
                <select id="carrera" name="carrera" required
                    class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    <option value="">Seleccionar Carrera</option>
                    <option value="Ingenieria Industrial">Ingenieria Industrial (Escolarizado)</option>
                    <option value="Ingenieria en Mineria">Ingenieria en Mineria (Escolarizado)</option>
                    <option value="Ingenieria en Agronomia">Ingenieria en Agronomia (Escolarizado)</option>
                    <option value="Licenciatura en Administracion">Licenciatura en Administracion (Escolarizado)
                    </option>
                    <option value="Ingenieria en Gestion Empresarial">Ingenieria en Gestion Empresarial (Escolarizado)
                    </option>
                    <option value="Ingenieria en Sistemas Computacionales">Ingenieria en Sistemas Computacionales
                        (Escolarizado)</option>
                    <option value="Ingenieria Informática">Ingenieria Informática (Semiescolarizado)</option>
                    <option value="Ingenieria en Gestion Empresarial(Semiescolarizado)">Ingenieria en Gestion
                        Empresarial (Semiescolarizado)</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Tipo de Comentario:</label>
                <div>
                    <input type="radio" id="queja" name="tipo_comentario" value="Queja" class="mr-2">
                    <label for="queja" class="mr-4">Queja</label>

                    <input type="radio" id="sugerencia" name="tipo_comentario" value="Sugerencia" class="mr-2">
                    <label for="sugerencia" class="mr-4">Sugerencia</label>

                    <input type="radio" id="agradecimiento" name="tipo_comentario" value="Agradecimiento"
                        class="mr-2">
                    <label for="agradecimiento">Agradecimiento</label>
                </div>
            </div>

            <div class="mb-4">
                <label class="block font-medium mb-1">Departamento:</label>
                <select id="departamento" name="departamento"
                    class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500">
                    <option value="Centro de Información">CENTRO DE INFORMACIÓN</option>
                    <option value="Coordinación de Carreras">COORDINACIÓN DE CARRERAS</option>
                    <option value="Recursos Financieros">RECURSOS FINANCIEROS</option>
                    <option value="Residencias Profesionales">RESIDENCIAS PROFESIONALES</option>
                    <option value="Centro de Cómputo">CENTRO DE CÓMPUTO</option>
                    <option value="Servicio Social">SERVICIO SOCIAL</option>
                    <option value="Servicios Escolares">SERVICIOS ESCOLARES</option>
                    <option value="Becas">BECAS</option>
                    <option value="Talleres y Laboratorios">TALLERES Y LABORATORIOS</option>
                    <option value="Cafetería">CAFETERIA</option>
                    <option value="Servicio Médico">SERVICIO MÉDICO</option>
                    <option value="Actividades Culturales y Deportivas">ACTIVIDADES CULTURALES Y DEPORTIVAS</option>
                </select>
            </div>
            <div class="mb-4">
                <label for="contacto" class="block font-medium mb-1">Información de contacto:</label>
                <input type="text" id="contacto" name="contacto"
                    class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"
                    placeholder="Correo electrónico o número de teléfono">
            </div>

            <div class="mb-4">
                <label for="mensaje" class="block font-medium mb-1">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="4"
                    class="w-full py-2 px-3 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500"></textarea>
            </div>

            <button type="submit"
                class="w-full bg-red-900 text-white py-2 px-4 rounded-md hover:bg-red-700 focus:outline-none focus:bg-red-600">Enviar</button>
        </form>

        <!-- Botón de regreso al menú -->
        <div class="mt-4">
            <a href="{{ route('encuestas.menu') }}"
                class="w-full bg-blue-900 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:bg-blue-600 text-center inline-block">
                Regresar al Menú
            </a>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif
</body>

</html>
