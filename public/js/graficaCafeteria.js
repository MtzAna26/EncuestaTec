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
        'Serpregunta_7': '7',
    };

    // Inicializa acumuladores y contador de alumnos
    const acumuladores = {
        'Serpregunta_1': {suma: 0, ponderacion: 0},
        'Serpregunta_2': {suma: 0, ponderacion: 0},
        'Serpregunta_3': {suma: 0, ponderacion: 0},
        'Serpregunta_4': {suma: 0, ponderacion: 0},
        'Serpregunta_5': {suma: 0, ponderacion: 0},
        'Serpregunta_6': {suma: 0, ponderacion: 0},
        'Serpregunta_7': {suma: 0, ponderacion: 0},
    };

    const totalAlumnos = datos.length;

    // Acumula los valores de todas las respuestas con ponderaciones
    datos.forEach(respuesta => {
        acumuladores.Serpregunta_1.suma += respuesta.Serpregunta_1 * 1;
        acumuladores.Serpregunta_1.ponderacion += 1;
        acumuladores.Serpregunta_2.suma += respuesta.Serpregunta_2 * 2;
        acumuladores.Serpregunta_2.ponderacion += 2;
        acumuladores.Serpregunta_3.suma += respuesta.Serpregunta_3 * 3;
        acumuladores.Serpregunta_3.ponderacion += 3;
        acumuladores.Serpregunta_4.suma += respuesta.Serpregunta_4 * 4;
        acumuladores.Serpregunta_4.ponderacion += 4;
        acumuladores.Serpregunta_5.suma += respuesta.Serpregunta_5 * 5;
        acumuladores.Serpregunta_5.ponderacion += 5;
        acumuladores.Serpregunta_6.suma += respuesta.Serpregunta_6 * 6;
        acumuladores.Serpregunta_6.ponderacion += 6;
        acumuladores.Serpregunta_7.suma += respuesta.Serpregunta_7 * 7;
        acumuladores.Serpregunta_7.ponderacion += 7;
    });

    // Calcula los promedios ponderados
    const promedios = {
        'Serpregunta_1': acumuladores.Serpregunta_1.suma / acumuladores.Serpregunta_1.ponderacion,
        'Serpregunta_2': acumuladores.Serpregunta_2.suma / acumuladores.Serpregunta_2.ponderacion,
        'Serpregunta_3': acumuladores.Serpregunta_3.suma / acumuladores.Serpregunta_3.ponderacion,
        'Serpregunta_4': acumuladores.Serpregunta_4.suma / acumuladores.Serpregunta_4.ponderacion,
        'Serpregunta_5': acumuladores.Serpregunta_5.suma / acumuladores.Serpregunta_5.ponderacion,
        'Serpregunta_6': acumuladores.Serpregunta_6.suma / acumuladores.Serpregunta_6.ponderacion,
        'Serpregunta_7': acumuladores.Serpregunta_5.suma / acumuladores.Serpregunta_7.ponderacion,
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
                backgroundColor: 'rgba(128, 0, 0, 1)', // Color guinda sólido
                borderColor: 'rgba(128, 0, 0, 1)',
                borderWidth: 1,
                barThickness: 100 // Ajusta este valor según tu preferencia
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
