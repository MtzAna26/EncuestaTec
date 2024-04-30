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
            <img src="{{ asset('img/Logo-TecNM.png') }}" alt="Logo de Tecnm">
        </div>
    </header>
    <br>
    
    <div class="container mx-auto px-4 bg-gray-200">
        <h1 class="text-3xl font-semibold mb-4">¡Participa en nuestra encuesta!</h1>
        <p class="mb-4">Te invitamos a participar en nuestra encuesta y compartir tu opinión. 
            Tu perspectiva es valiosa para nosotros, ya que nos ayuda a comprender mejor tus necesidades y preferencias. 
            Por favor, tómate un momento para responder las siguientes preguntas de acuerdo a tu experiencia y percepción. 
            Siendo 5 la puntuación mayor y 1 la menor. 
            Recuerda que tus respuestas son confidenciales.</p>
    <table>
        <tr>
            <th>EVALUACION AL SERVICIO</th>
            <th class="right-column">5</th>
            <th class="right-column">4</th>
            <th class="right-column">3</th>
            <th class="right-column">2</th>
            <th class="right-column">1</th>
        </tr>
        <tr>
            <td>1. Tiene un horario adecuado de consultas </td>
            <td class="right-column"><input type="radio" id="rating1_5" name="rating1" value="5"><label for="rating1_5"></label></td>
            <td class="right-column"><input type="radio" id="rating1_4" name="rating1" value="4"><label for="rating1_4"></label></td>
            <td class="right-column"><input type="radio" id="rating1_3" name="rating1" value="3"><label for="rating1_3"></label></td>
            <td class="right-column"><input type="radio" id="rating1_2" name="rating1" value="2"><label for="rating1_2"></label></td>
            <td class="right-column"><input type="radio" id="rating1_1" name="rating1" value="1"><label for="rating1_1"></label></td>
        </tr>
        <tr>
            <td>2. La informacion con la que cuenta me apoya en las asignaturas que curso </td>
            <td class="right-column"><input type="radio" id="rating2_5" name="rating2" value="5"><label for="rating2_5"></label></td>
            <td class="right-column"><input type="radio" id="rating2_4" name="rating2" value="4"><label for="rating2_4"></label></td>
            <td class="right-column"><input type="radio" id="rating2_3" name="rating2" value="3"><label for="rating2_3"></label></td>
            <td class="right-column"><input type="radio" id="rating2_2" name="rating2" value="2"><label for="rating2_2"></label></td>
            <td class="right-column"><input type="radio" id="rating2_1" name="rating2" value="1"><label for="rating2_1"></label></td>
        </tr>
        <tr>
            <td>3. La bibliografia de la que se dispone es actualizada </td>
            <td class="right-column"><input type="radio" id="rating3_5" name="rating3" value="5"><label for="rating3_5"></label></td>
            <td class="right-column"><input type="radio" id="rating3_4" name="rating3" value="4"><label for="rating3_4"></label></td>
            <td class="right-column"><input type="radio" id="rating3_3" name="rating3" value="3"><label for="rating3_3"></label></td>
            <td class="right-column"><input type="radio" id="rating3_2" name="rating3" value="2"><label for="rating3_2"></label></td>
            <td class="right-column"><input type="radio" id="rating3_1" name="rating3" value="1"><label for="rating3_1"></label></td>
        </tr>
        <tr>
            <td>4. Siempre encuentro por lo menos un ejemplar disponible de la bibliografia señalada en las asignaturas que curso </td>
            <td class="right-column"><input type="radio" id="rating4_5" name="rating4" value="5"><label for="rating4_5"></label></td>
            <td class="right-column"><input type="radio" id="rating4_4" name="rating4" value="4"><label for="rating4_4"></label></td>
            <td class="right-column"><input type="radio" id="rating4_3" name="rating4" value="3"><label for="rating4_3"></label></td>
            <td class="right-column"><input type="radio" id="rating4_2" name="rating4" value="2"><label for="rating4_2"></label></td>
            <td class="right-column"><input type="radio" id="rating4_1" name="rating4" value="1"><label for="rating4_1"></label></td>
        </tr>
        <tr>
            <td>5. Me orientan adecuadamente para encontrar en caso de carencia, libros equivalentes al requerido </td>
            <td class="right-column"><input type="radio" id="rating5_5" name="rating5" value="5"><label for="rating5_5"></label></td>
            <td class="right-column"><input type="radio" id="rating5_4" name="rating5" value="4"><label for="rating5_4"></label></td>
            <td class="right-column"><input type="radio" id="rating5_3" name="rating5" value="3"><label for="rating5_3"></label></td>
            <td class="right-column"><input type="radio" id="rating5_2" name="rating5" value="2"><label for="rating5_2"></label></td>
            <td class="right-column"><input type="radio" id="rating5_1" name="rating5" value="1"><label for="rating5_1"></label></td>
        </tr>
        <tr>
            <td>6. Me atienden en forma amable cuando solicito su apoyo </td>
            <td class="right-column"><input type="radio" id="rating6_5" name="rating6" value="5"><label for="rating6_5"></label></td>
            <td class="right-column"><input type="radio" id="rating6_4" name="rating6" value="4"><label for="rating6_4"></label></td>
            <td class="right-column"><input type="radio" id="rating6_3" name="rating6" value="3"><label for="rating6_3"></label></td>
            <td class="right-column"><input type="radio" id="rating6_2" name="rating6" value="2"><label for="rating6_2"></label></td>
            <td class="right-column"><input type="radio" id="rating6_1" name="rating6" value="1"><label for="rating6_1"></label></td>
        </tr>
        <tr>
            <td>7. Mantienen una relacion atenta conmigo durante mi estancia </td>  
            <td class="right-column"><input type="radio" id="rating7_5" name="rating7" value="5"><label for="rating7_5"></label></td>
            <td class="right-column"><input type="radio" id="rating7_4" name="rating7" value="4"><label for="rating7_4"></label></td>
            <td class="right-column"><input type="radio" id="rating7_3" name="rating7" value="3"><label for="rating7_3"></label></td>
            <td class="right-column"><input type="radio" id="rating7_2" name="rating7" value="2"><label for="rating7_2"></label></td>
            <td class="right-column"><input type="radio" id="rating7_1" name="rating7" value="1"><label for="rating7_1"></label></td>
        </tr>
    </table>
    <table>
        <tr>
            <th>EVALUACION A LA INFRAESTRUCTURA </th>
            <th class="right-column">5</th>
            <th class="right-column">4</th>
            <th class="right-column">3</th>
            <th class="right-column">2</th>
            <th class="right-column">1</th>
        </tr>
        <tr>
            <td>1. Consideras los espacios disponibles en el Centro de informacion adecuados para realizar consultas bibliograficas </td>
            <td class="right-column"><input type="radio" id="rating8_5" name="rating8" value="5"><label for="rating8_5"></label></td>
            <td class="right-column"><input type="radio" id="rating8_4" name="rating8" value="4"><label for="rating8_4"></label></td>
            <td class="right-column"><input type="radio" id="rating8_3" name="rating8" value="3"><label for="rating8_3"></label></td>
            <td class="right-column"><input type="radio" id="rating8_2" name="rating8" value="2"><label for="rating8_2"></label></td>
            <td class="right-column"><input type="radio" id="rating8_1" name="rating8" value="1"><label for="rating8_1"></label></td>
        </tr>
        <tr>
            <td>2. Como consideras el estado del mobiliario </td>
            <td class="right-column"><input type="radio" id="rating9_5" name="rating9" value="5"><label for="rating8_5"></label></td>
            <td class="right-column"><input type="radio" id="rating9_4" name="rating9" value="4"><label for="rating8_4"></label></td>
            <td class="right-column"><input type="radio" id="rating9_3" name="rating9" value="3"><label for="rating8_3"></label></td>
            <td class="right-column"><input type="radio" id="rating9_2" name="rating9" value="2"><label for="rating8_2"></label></td>
            <td class="right-column"><input type="radio" id="rating9_1" name="rating9" value="1"><label for="rating8_1"></label></td>
        </tr>
        <tr>
            <td>3. Considera adecuado el lugar donde se encuentra ubicado el centro de informacion </td>
            <td class="right-column"><input type="radio" id="rating10_5" name="rating10" value="5"><label for="rating8_5"></label></td>
            <td class="right-column"><input type="radio" id="rating10_4" name="rating10" value="4"><label for="rating8_4"></label></td>
            <td class="right-column"><input type="radio" id="rating10_3" name="rating10" value="3"><label for="rating8_3"></label></td>
            <td class="right-column"><input type="radio" id="rating10_2" name="rating10" value="2"><label for="rating8_2"></label></td>
            <td class="right-column"><input type="radio" id="rating10_1" name="rating10" value="1"><label for="rating8_1"></label></td>
        </tr>
        <tr>
            <td>4. Como consideras el servicio de internet </td>
            <td class="right-column"><input type="radio" id="rating11_5" name="rating11" value="5"><label for="rating8_5"></label></td>
            <td class="right-column"><input type="radio" id="rating11_4" name="rating11" value="4"><label for="rating8_4"></label></td>
            <td class="right-column"><input type="radio" id="rating11_3" name="rating11" value="3"><label for="rating8_3"></label></td>
            <td class="right-column"><input type="radio" id="rating11_2" name="rating11" value="2"><label for="rating8_2"></label></td>
            <td class="right-column"><input type="radio" id="rating11_1" name="rating11" value="1"><label for="rating8_1"></label></td>
        </tr>
        <tr>
            <td>5. Como consideras la cantidad de computadoras para la consulta de Bibliotecas Virtuales </td>
            <td class="right-column"><input type="radio" id="rating12_5" name="rating12" value="5"><label for="rating8_5"></label></td>
            <td class="right-column"><input type="radio" id="rating12_4" name="rating12" value="4"><label for="rating8_4"></label></td>
            <td class="right-column"><input type="radio" id="rating12_3" name="rating12" value="3"><label for="rating8_3"></label></td>
            <td class="right-column"><input type="radio" id="rating12_2" name="rating12" value="2"><label for="rating8_2"></label></td>
            <td class="right-column"><input type="radio" id="rating12_1" name="rating12" value="1"><label for="rating8_1"></label></td>
        </tr>
        <tr>
            <td>6. Consideras que la iluminacion es adecuada </td>
            <td class="right-column"><input type="radio" id="rating13_5" name="rating13" value="5"><label for="rating8_5"></label></td>
            <td class="right-column"><input type="radio" id="rating13_4" name="rating13" value="4"><label for="rating8_4"></label></td>
            <td class="right-column"><input type="radio" id="rating13_3" name="rating13" value="3"><label for="rating8_3"></label></td>
            <td class="right-column"><input type="radio" id="rating13_2" name="rating13" value="2"><label for="rating8_2"></label></td>
            <td class="right-column"><input type="radio" id="rating13_1" name="rating13" value="1"><label for="rating8_1"></label></td>                                  
        </table>
        <div class="mt-8 flex justify-center">
        <button class="bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-500 focus:outline-none focus:ring focus:ring-blue-300" disabled>Enviar respuestas</button>
        </div>        
    </div>
    </form>
</div>
<script>
    // Verificar si se ha completado el buzón de quejas antes de enviar las respuestas
    function verificarBuzondeQuejas() {
        var buzonCompletado = false; // Aquí debes implementar la lógica para verificar si se ha completado correctamente el buzón de quejas

        if (buzonCompletado) {
            document.getElementById("enviarRespuestas").disabled = false; // Habilitar el botón de enviar respuestas
        } else {
            alert("Por favor, complete el buzón de quejas antes de enviar las respuestas.");
        }
    }

    // Asignar la función de verificación al evento click del botón de enviar respuestas
    document.getElementById("enviarRespuestas").addEventListener("click", function(event) {
        event.preventDefault(); // Evitar el envío del formulario si el buzón de quejas no está completado
        verificarBuzondeQuejas();
    });
</script>


</body>
</html>