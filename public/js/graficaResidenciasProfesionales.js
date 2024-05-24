document.addEventListener('DOMContentLoaded', function () {
    fetch('/datos-grafica')
        .then(response => response.json())
        .then(data => {
            console.log('Datos recibidos:', data);

            const labels = [
                'La División de Estudios Profesionales me proporciona información del banco de proyectos de Residencias Profesionales', 
                'A lo largo de tu carrera te brindaron la información necesaria para desarrollo de anteproyectos', 
                'La División de Estudios Profesionales me da información de las opciones para realizar los Anteproyectos', 
                'La División de Estudios me proporciona información acerca de los periodos para la recepción de anteproyectos de Residencias Profesionales', 
                'El Docente Asignado para revisar mi anteproyecto de residencias y el Jefe de Carrera dictaminan en el periodo establecido', 
                'Mi Asesor Interno me proporciona asesoría para el desarrollo de mi proyecto de Residencias Profesionales', 
                'Mi Asesor Interno revisa mis informes parciales de Residencias Profesionales y me orienta para realizar las correcciones y cambios', 
                'Mi Asesor Interno me da a conocer la calificación durante el periodo establecido', 
                'El Departamento de Gestión Tecnológica y Vinculación me entrega en tiempo la carta de presentación y agradecimiento para la empresa'
            ];
            
            const dataset = labels.map((label, index) => {
                const value = data.reduce((sum, item) => sum + item[`Serpregunta_${index + 1}`], 0) / data.length;
                return isNaN(value) ? 0 : value;
            });

            console.log('Dataset para Chart.js:', dataset);

            const ctx = document.getElementById('graficaRespuestas').getContext('2d');
            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Promedio de Respuestas de Alumnos',
                        data: dataset,
                        backgroundColor: 'rgba(128, 0, 0, 1)',  // Color guinda sólido
                        borderColor: 'rgba(128, 0, 0, 1)', 
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true,
                            barThickness: 20
                        }
                    },
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        center: {
                            centerX: true,
                            centerY: false
                        }
                    }
                }
            });
        })
        .catch(error => console.error('Error al cargar los datos:', error));
});
