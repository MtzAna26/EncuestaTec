async function obtenerDatos() {
    const respuesta = await fetch(`/obtenerRespuestas`);
    const datos = await respuesta.json();

    if (datos.error) {
        console.error(datos.error);
        return;
    }

    console.log(datos); 

    // Mapa de nombres de columnas a preguntas descriptivas
    const preguntasMap = {
        'Serpregunta_1': 'Tiene un horario adecuado de consultas',
        'Serpregunta_2': 'El personal es atento y servicial',
        'Serpregunta_3': 'Las instalaciones son adecuadas',
        'Serpregunta_4': 'Los recursos disponibles son suficientes',
        'Serpregunta_5': 'La información proporcionada es clara',
        'Serpregunta_6': 'El tiempo de espera es razonable',
        'Serpregunta_7': 'La atención es personalizada',
        'Estrucpregunta_1': 'La estructura de la información es adecuada',
        'Estrucpregunta_2': 'La información es accesible',
        'Estrucpregunta_3': 'La presentación de la información es atractiva',
        'Estrucpregunta_4': 'El contenido es relevante y actualizado',
        'Estrucpregunta_5': 'La organización de los recursos es lógica',
        'Estrucpregunta_6': 'La calidad de los materiales es alta'
    };

    // Inicializa acumuladores y contador de alumnos
    const acumuladores = {
        'Serpregunta_1': 0,
        'Serpregunta_2': 0,
        'Serpregunta_3': 0,
        'Serpregunta_4': 0,
        'Serpregunta_5': 0,
        'Serpregunta_6': 0,
        'Serpregunta_7': 0,
        'Estrucpregunta_1': 0,
        'Estrucpregunta_2': 0,
        'Estrucpregunta_3': 0,
        'Estrucpregunta_4': 0,
        'Estrucpregunta_5': 0,
        'Estrucpregunta_6': 0
    };

    const totalAlumnos = datos.length;

    // Acumula los valores de todas las respuestas
    datos.forEach(respuesta => {
        acumuladores.Serpregunta_1 += respuesta.Serpregunta_1;
        acumuladores.Serpregunta_2 += respuesta.Serpregunta_2;
        acumuladores.Serpregunta_3 += respuesta.Serpregunta_3;
        acumuladores.Serpregunta_4 += respuesta.Serpregunta_4;
        acumuladores.Serpregunta_5 += respuesta.Serpregunta_5;
        acumuladores.Serpregunta_6 += respuesta.Serpregunta_6;
        acumuladores.Serpregunta_7 += respuesta.Serpregunta_7;
        acumuladores.Estrucpregunta_1 += respuesta.Estrucpregunta_1;
        acumuladores.Estrucpregunta_2 += respuesta.Estrucpregunta_2;
        acumuladores.Estrucpregunta_3 += respuesta.Estrucpregunta_3;
        acumuladores.Estrucpregunta_4 += respuesta.Estrucpregunta_4;
        acumuladores.Estrucpregunta_5 += respuesta.Estrucpregunta_5;
        acumuladores.Estrucpregunta_6 += respuesta.Estrucpregunta_6;
    });

    // Calcula los promedios
    const promedios = {
        'Serpregunta_1': acumuladores.Serpregunta_1 / totalAlumnos,
        'Serpregunta_2': acumuladores.Serpregunta_2 / totalAlumnos,
        'Serpregunta_3': acumuladores.Serpregunta_3 / totalAlumnos,
        'Serpregunta_4': acumuladores.Serpregunta_4 / totalAlumnos,
        'Serpregunta_5': acumuladores.Serpregunta_5 / totalAlumnos,
        'Serpregunta_6': acumuladores.Serpregunta_6 / totalAlumnos,
        'Serpregunta_7': acumuladores.Serpregunta_7 / totalAlumnos,
        'Estrucpregunta_1': acumuladores.Estrucpregunta_1 / totalAlumnos,
        'Estrucpregunta_2': acumuladores.Estrucpregunta_2 / totalAlumnos,
        'Estrucpregunta_3': acumuladores.Estrucpregunta_3 / totalAlumnos,
        'Estrucpregunta_4': acumuladores.Estrucpregunta_4 / totalAlumnos,
        'Estrucpregunta_5': acumuladores.Estrucpregunta_5 / totalAlumnos,
        'Estrucpregunta_6': acumuladores.Estrucpregunta_6 / totalAlumnos
    };

    const etiquetas = Object.keys(preguntasMap).map(key => preguntasMap[key]);
    const valores = Object.keys(promedios).map(key => promedios[key]);

    console.log(promedios); // Depuración

    const ctx = document.getElementById('graficaRespuestas').getContext('2d');
    new Chart(ctx, {
        type: 'bar', // Podríamos cambiar a  'line', 'pie', etc.
        data: {
            labels: etiquetas,
            datasets: [{
                label: 'Promedio de Respuestas de Alumnos',
                data: valores,
                backgroundColor: 'rgba(128, 0, 0, 0.2)',
                borderColor: 'rgba(128, 0, 0, 0.8)',
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
}

obtenerDatos();