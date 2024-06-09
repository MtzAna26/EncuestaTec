document.addEventListener('DOMContentLoaded', function () {
    fetch('/datos-grafica')
        .then(response => response.json())
        .then(data => {
            console.log('Datos recibidos:', data);

            const labels = [
                '1', 
                '2', 
                '3', 
                '4', 
                '5', 
                '6', 
                '7', 
                '8', 
                '9'
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
