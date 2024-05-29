$(document).ready(function() {
    $('.desactivar-btn').click(function() {
        var departamentoId = $(this).data('departamento-id');
        $.ajax({
            url: '/api/departamentos/' + departamentoId + '/desactivar-encuestas',
            type: 'PUT',
            success: function(response) {
                alert('Encuestas desactivadas para el departamento');
                // Aquí puedes actualizar la interfaz de usuario si es necesario
            },
            error: function(xhr, status, error) {
                alert('Error: ' + xhr.responseText);
            }
        });
    });
});