function init() { 
}

$(document).ready(function() {
    var emp_id = $('#e_idx').val();
    $.post('../../controller/ticket.php?op=total_tickets_usuario', {emp_id : emp_id}, function(data) {
        var total_tickets_usuario = data.TOTAL; 
        //console.log(total_tickets);
        $('#total_tickets_usuario').html(total_tickets_usuario); // Mostrar en StartUI
    }, 'json');

    $.post('../../controller/ticket.php?op=total_tickets_abiertos_usuario', {emp_id : emp_id}, function(data) {
        var total_tickets_abiertos_usuario = data.TOTAL; 
        //console.log(total_tickets);
        $('#total_tickets_abiertos_usuario').html(total_tickets_abiertos_usuario); // Mostrar en StartUI
    }, 'json');
});

init();