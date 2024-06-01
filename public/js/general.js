document.addEventListener('DOMContentLoaded', function() {
    var ctx = document.getElementById('semestresChart').getContext('2d');
    var semestresChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: JSON.parse(document.getElementById('chart-labels').textContent),
            datasets: [{
                label: 'Promedio de Alumnos por Semestre',
                data: JSON.parse(document.getElementById('chart-data').textContent),
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
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
});
