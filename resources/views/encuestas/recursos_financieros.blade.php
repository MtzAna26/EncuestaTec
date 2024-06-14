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
    <br>
    @if (Session::has('success'))
    <div>
        <strong>{{ Session::get('success') }}</strong>
    </div>
@endif
    <div class="container mx-auto px-4 bg-gray-200">
        <h2 class="text-3xl font-semibold mb-4">DEPARTAMENTO DE RECURSOS FINANCIEROS </h2>
        <h1 class="text-3xl font-semibold mb-4">¡Participa en nuestra encuesta!</h1>
        <p class="mb-4">Te invitamos a participar en nuestra encuesta y compartir tu opinión. 
            Tu perspectiva es valiosa para nosotros, ya que nos ayuda a comprender mejor tus necesidades y preferencias. 
            Por favor, tómate un momento para responder las siguientes preguntas de acuerdo a tu experiencia y percepción. 
            Siendo 5 la puntuación mayor y 1 la menor. 
            Recuerda que tus respuestas son confidenciales.</p>
            
            <form action="{{ route('encuestas.guardar_recursos_financieros') }}" method="POST">
                <input type="hidden" name="alumno_id" value="{{ Auth::id() }}">
                <input type="hidden" name="no_control" value="{{ isset(Auth::user()->no_control) ? Auth::user()->no_control : '' }}">
                <input type="hidden" name="carrera" value="{{ isset(Auth::user()->carrera) ? Auth::user()->carrera : '' }}">
                <input type="hidden" name="semestre" value="{{ isset(Auth::user()->semestre) ? Auth::user()->semestre : '' }}">
                @csrf

    <table class="w-full">
        <tr>
            <th>EVALUACION AL SERVICIO</th>
            <th class="right-column">5</th>
            <th class="right-column">4</th>
            <th class="right-column">3</th>
            <th class="right-column">2</th>
            <th class="right-column">1</th>
        </tr>

        <tr>
            <td>1. Tiene un horario adecuado para realizar mis trámites. </td>
            <td class="right-column"><input type="radio" id="Serpregunta_1_5" name="Serpregunta_1" value="5"><label for="serpregunta_1_5"></label></td>
            <td class="right-column"><input type="radio" id="Serpregunta_1_4" name="Serpregunta_1" value="4"><label for="serpregunta_1_4"></label></td>
            <td class="right-column"><input type="radio" id="Serpregunta_1_3" name="Serpregunta_1" value="3"><label for="serpregunta_1_3"></label></td>
            <td class="right-column"><input type="radio" id="Serpregunta_1_2" name="Serpregunta_1" value="2"><label for="serpregunta_1_2"></label></td>
            <td class="right-column"><input type="radio" id="Serpregunta_1_1" name="Serpregunta_1" value="1"><label for="serpregunta_1_1"></label></td>
        </tr>
        
        <tr>
            <td>2. Me proporcionan una lista actualizada de los costos de los diferentes trámites. </td>
            <td class="right-column"><input type="radio" id="serpregunta_1_5" name="Serpregunta_2" value="5"><label for="serpregunta_1_5"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_4" name="Serpregunta_2" value="4"><label for="serpregunta_1_4"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_3" name="Serpregunta_2" value="3"><label for="serpregunta_1_3"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_2" name="Serpregunta_2" value="2"><label for="serpregunta_1_2"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_1" name="Serpregunta_2" value="1"><label for="serpregunta_1_1"></label></td>
        </tr>

        <tr>
            <td>3. El tiempo de espera para pagar en caja es aceptable. </td>
            <td class="right-column"><input type="radio" id="serpregunta_1_5" name="Serpregunta_3" value="5"><label for="serpregunta_1_5"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_4" name="Serpregunta_3" value="4"><label for="serpregunta_1_4"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_3" name="Serpregunta_3" value="3"><label for="serpregunta_1_3"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_2" name="Serpregunta_3" value="2"><label for="serpregunta_1_2"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_1" name="Serpregunta_3" value="1"><label for="serpregunta_1_1"></label></td>
        </tr>

        <tr>
            <td>4. El personal de Recursos Financieros siempre me cobra el concepto y monto Correcto.  </td>
            <td class="right-column"><input type="radio" id="serpregunta_1_5" name="Serpregunta_4" value="5"><label for="serpregunta_1_5"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_4" name="Serpregunta_4" value="4"><label for="serpregunta_1_4"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_3" name="Serpregunta_4" value="3"><label for="serpregunta_1_3"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_2" name="Serpregunta_4" value="2"><label for="serpregunta_1_2"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_1" name="Serpregunta_4" value="1"><label for="serpregunta_1_1"></label></td>
        </tr>

        <tr>
            <td>5. Me proporcionan asesoría adecuada cuando desconozco qué o cuánto pagar.  </td>
            <td class="right-column"><input type="radio" id="serpregunta_1_5" name="Serpregunta_5" value="5"><label for="serpregunta_1_5"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_4" name="Serpregunta_5" value="4"><label for="serpregunta_1_4"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_3" name="Serpregunta_5" value="3"><label for="serpregunta_1_3"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_2" name="Serpregunta_5" value="2"><label for="serpregunta_1_2"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_1" name="Serpregunta_5" value="1"><label for="serpregunta_1_1"></label></td>
        </tr>

        <tr>
            <td>6. Mantienen una relación atenta conmigo durante todo el tiempo en que me otorga el servicio. </td>
            <td class="right-column"><input type="radio" id="serpregunta_1_5" name="Serpregunta_6" value="5"><label for="serpregunta_1_5"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_4" name="Serpregunta_6" value="4"><label for="serpregunta_1_4"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_3" name="Serpregunta_6" value="3"><label for="serpregunta_1_3"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_2" name="Serpregunta_6" value="2"><label for="serpregunta_1_2"></label></td>
            <td class="right-column"><input type="radio" id="serpregunta_1_1" name="Serpregunta_6" value="1"><label for="serpregunta_1_1"></label></td>
        </tr>

        <tr>
            <td colspan="6" class="py-4">
                <label for="comentario" class="block mb-2"><b>Comentario:</b></label>

                <p>Si desea expresar algún comentario, sugerencia o recomendación utiliza el espacio destinado para ello. </p>
                <textarea id="comentario" name="comentario" class="w-full px-3 py-2 border rounded-md focus:outline-none focus:border-blue-500"></textarea>
            </td>
        </tr>

    </table>
    @if (Session::has('success'))
    <div class="text-center mb-4">
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">¡Encuesta enviada correctamente!</strong>
            <span class="block sm:inline">{{ Session::get('success') }}</span>
        </div>
    </div>
    @endif
    <div class="text-center">
        <!-- Mensaje de advertencia -->
        <div id="mensajeAdvertencia" class="hidden bg-yellow-100 border border-yellow-400 text-yellow-700 px-4 py-3 rounded relative"
            role="alert">
            <strong class="font-bold">¡Atención!</strong>
            <span class="block">Por favor, deja un comentario antes de enviar la encuesta.</span>
        </div>
    </div>
    <div class="text-center">
        <button id="enviarRespuestas" type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Enviar Encuesta</button>
    </div>
    <script>
        document.getElementById("enviarRespuestas").addEventListener("click", function(event) {
            var comentario = document.getElementById("comentario").value;
            if (comentario.trim() === "") {
                // Si no hay comentario, mostrar advertencia y prevenir el envío de la encuesta
                event.preventDefault();
                document.getElementById("mensajeAdvertencia").classList.remove("hidden");
                window.scrollTo(0, 0); // Scroll hacia arriba para mostrar el mensaje
            }
        });
    </script>
    </body>
</html>