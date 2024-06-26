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
        'Serpregunta_1': '1',
        'Serpregunta_2': '2',
        'Serpregunta_3': '3',
        'Serpregunta_4': '4',
        'Serpregunta_5': '5',
        'Serpregunta_6': '6',
        
    };

    // Inicializa acumuladores y contador de alumnos
    const acumuladores = {
        'Serpregunta_1': 0,
        'Serpregunta_2': 0,
        'Serpregunta_3': 0,
        'Serpregunta_4': 0,
        'Serpregunta_5': 0,
        'Serpregunta_6': 0
        
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

    });

    // Calcula los promedios
    const promedios = {
        'Serpregunta_1': acumuladores.Serpregunta_1 / totalAlumnos,
        'Serpregunta_2': acumuladores.Serpregunta_2 / totalAlumnos,
        'Serpregunta_3': acumuladores.Serpregunta_3 / totalAlumnos,
        'Serpregunta_4': acumuladores.Serpregunta_4 / totalAlumnos,
        'Serpregunta_5': acumuladores.Serpregunta_5 / totalAlumnos,
        'Serpregunta_6': acumuladores.Serpregunta_6 / totalAlumnos,
    };

    const etiquetas = Object.keys(preguntasMap).map(key => preguntasMap[key]);
    const valores = Object.keys(promedios).map(key => promedios[key]);

    console.log(promedios); // Depuración

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
                borderWidth: 1,
                barThickness: 100
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

obtenerDatos();