async function obtenerDatos() {
    const respuesta = await fetch(`/obtenerRespuestas`);
    const datos = await respuesta.json();

    if (datos.error) {
        console.error(datos.error);
        return;
    }

    console.log(datos);

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

    const ponderaciones = {
        'Serpregunta_1': 1,
        'Serpregunta_2': 2,
        'Serpregunta_3': 3,
        'Serpregunta_4': 4,
        'Serpregunta_5': 5,
        'Serpregunta_6': 1,
        'Serpregunta_7': 2,
        'Estrucpregunta_1': 3,
        'Estrucpregunta_2': 4,
        'Estrucpregunta_3': 5,
        'Estrucpregunta_4': 1,
        'Estrucpregunta_5': 2,
        'Estrucpregunta_6': 3
    };

    const acumuladores = {};
    const totalRespuestas = {};

    // Inicializar acumuladores y totalRespuestas
    Object.keys(preguntasMap).forEach(pregunta => {
        acumuladores[pregunta] = 0;
        totalRespuestas[pregunta] = 0;
    });

    datos.forEach(respuesta => {
        Object.keys(preguntasMap).forEach(pregunta => {
            if (respuesta[pregunta] !== undefined) {
                acumuladores[pregunta] += respuesta[pregunta] * ponderaciones[pregunta];
                totalRespuestas[pregunta] += ponderaciones[pregunta];
            }
        });
    });

    const promedios = {};
    Object.keys(acumuladores).forEach(pregunta => {
        promedios[pregunta] = acumuladores[pregunta] / totalRespuestas[pregunta];
    });

    const etiquetas = Object.keys(preguntasMap).map(key => preguntasMap[key]);
    const valores = Object.keys(promedios).map(key => promedios[key]);

    console.log(promedios);

    const ctx = document.getElementById('graficaRespuestas').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: etiquetas,
            datasets: [{
                label: 'Promedio de Respuestas de Alumnos',
                data: valores,
                backgroundColor: 'rgba(128, 0, 0, 1)',  // Color guinda sólido
                borderColor: 'rgba(128, 0, 0, 1)', 
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            responsive: true,
            maintainAspectRatio: true,
            plugins: {
                legend: {
                    display: true,
                    position: 'top'
                }
            }
        }
    });
}

document.addEventListener('DOMContentLoaded', (event) => {
    obtenerDatos();
});
