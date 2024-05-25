async function obtenerDatos() {
    const respuesta = await fetch(`/obtenerRespuestas`);
    const datos = await respuesta.json();

    if (datos.error) {
        console.error(datos.error);
        return;
    }

    // Mapa de nombres de columnas a preguntas descriptivas
    const preguntasMap = {
        'Serpregunta_1': 'Se cumple con el horario de atención establecido',
        'Serpregunta_2': 'Conozco a dónde dirigirme para que me informen sobre el trámite de solicitud de beca',
        'Serpregunta_3': 'Se dan a conocer oportunamente y apropiadamente las convocatorias para los diferentes tipos de becas',
        'Serpregunta_4': 'Resuelven mis dudas oportuna y claramente',
        'Serpregunta_5': 'Si se presenta algún problema con mi trámite me lo informan oportunamente',
    };

    // Inicializa acumuladores y contador de alumnos
    const acumuladores = {
        'Serpregunta_1': 0,
        'Serpregunta_2': 0,
        'Serpregunta_3': 0,
        'Serpregunta_4': 0,
        'Serpregunta_5': 0,
    };

    const totalAlumnos = datos.length;

    // Acumula los valores de todas las respuestas
    datos.forEach(respuesta => {
        acumuladores.Serpregunta_1 += respuesta.Serpregunta_1;
        acumuladores.Serpregunta_2 += respuesta.Serpregunta_2;
        acumuladores.Serpregunta_3 += respuesta.Serpregunta_3;
        acumuladores.Serpregunta_4 += respuesta.Serpregunta_4;
        acumuladores.Serpregunta_5 += respuesta.Serpregunta_5;
    });

    // Calcula los promedios
    const promedios = {
        'Serpregunta_1': acumuladores.Serpregunta_1 / totalAlumnos,
        'Serpregunta_2': acumuladores.Serpregunta_2 / totalAlumnos,
        'Serpregunta_3': acumuladores.Serpregunta_3 / totalAlumnos,
        'Serpregunta_4': acumuladores.Serpregunta_4 / totalAlumnos,
        'Serpregunta_5': acumuladores.Serpregunta_5 / totalAlumnos,
    };

    const etiquetas = Object.keys(preguntasMap).map(key => preguntasMap[key]);
    const valores = Object.keys(promedios).map(key => promedios[key]);

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