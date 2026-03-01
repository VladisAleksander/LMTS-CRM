function init() { 
}

$(document).ready(function() {
    var emp_id = $('#e_idx').val();
    // Total de tickets por empleado
    $.post('../../controller/ticket.php?op=total_tickets_usuario', {emp_id : emp_id}, function(data) {
        var total_tickets_usuario = data.TOTAL;
        $('#total_tickets_usuario').html(total_tickets_usuario); // Mostrar en Dashboard
    }, 'json');

    // Total de tickets abiertos por empleado
    $.post('../../controller/ticket.php?op=total_tickets_abiertos_usuario', {emp_id : emp_id}, function(data) {
        var total_tickets_abiertos_usuario = data.TOTAL;
        $('#total_tickets_abiertos_usuario').html(total_tickets_abiertos_usuario); // Mostrar en Dashboard
    }, 'json');

    // 1. Total Global de Tickets
    $.post('../../controller/ticket.php?op=total_tickets_globales', function(data) {
        $('#total_tickets_globales').html(data.TOTAL); // Mostrar en Dashboard
    }, 'json');

    // 2. Total de Tickets Nuevos
    $.post('../../controller/ticket.php?op=total_tickets_nuevos', function(data) {
        $('#total_tickets_nuevos').html(data.TOTAL); // Mostrar en Dashboard
    }, 'json');

    // 3. Total de Tickets Abiertos
    $.post('../../controller/ticket.php?op=total_tickets_abiertos', function(data) {
        $('#total_tickets_abiertos').html(data.TOTAL); // Mostrar en Dashboard
    }, 'json');

    // 4. Total de Tickets Cerrados
    $.post('../../controller/ticket.php?op=total_tickets_cerrados', function(data) {
        $('#total_tickets_cerrados').html(data.TOTAL); // Mostrar en Dashboard
    }, 'json');
});

init();