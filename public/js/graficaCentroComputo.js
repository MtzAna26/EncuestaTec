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
        'Serpregunta_1': 'El Servicio de Cómputo tiene un horario adecuado.',
        'Serpregunta_2': 'Por lo regular hay máquinas disponibles para realizar mi trabajo.',
        'Serpregunta_3': 'Siempre tengo disponible una conexión de Internet.',
        'Serpregunta_4': 'Me proporcionan atención adecuada en el servicio de Internet.',
        'Serpregunta_5': 'Me proporcionan atención adecuada en caso de presentarse fallas en el equipo que se me asignó.',
        'Serpregunta_6': 'Me proporcionan asesoría adecuada para resolver mis dudas sobre el uso de software.',
        'Serpregunta_7': 'Mantienen una relación atenta conmigo durante toda mi estancia en las instalaciones.',
        
    };

    // Inicializa acumuladores y contador de alumnos
    const acumuladores = {
        'Serpregunta_1': 0,
        'Serpregunta_2': 0,
        'Serpregunta_3': 0,
        'Serpregunta_4': 0,
        'Serpregunta_5': 0,
        'Serpregunta_6': 0,
        'Serpregunta_7': 0
        
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