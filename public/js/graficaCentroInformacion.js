async function obtenerDatos() {
    const respuesta = await fetch(`/obtenerRespuestas`);
    const datos = await respuesta.json();

    if (datos.error) {
        console.error(datos.error);
        return;
    }

    console.log(datos);

    const preguntasMap = {
        'Serpregunta_1': '1',
        'Serpregunta_2': '2',
        'Serpregunta_3': '3',
        'Serpregunta_4': '4',
        'Serpregunta_5': '5',
        'Serpregunta_6': '6',
        'Serpregunta_7': '7',
        'Estrucpregunta_1': '8',
        'Estrucpregunta_2': '9',
        'Estrucpregunta_3': '10',
        'Estrucpregunta_4': '11',
        'Estrucpregunta_5': '12',
        'Estrucpregunta_6': '13'
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
