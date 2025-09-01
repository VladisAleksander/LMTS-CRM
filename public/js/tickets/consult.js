var tabla;
var emp_id = $('#e_idx').val(); // ID del empleado
var area_id = $('#area_idx').val(); // ID del área
// Variables globales para almacenar el ID del empleado y el área

function init() {

}

$(document).ready(function(){

    if (area_id == 11 || area_id == 12 || area_id == 14) {
        // Inicializamos el DataTable con los datos del servidor
        tabla = $('#ticket_data').dataTable({
            "aProcessing": true, // Activamos el procesamiento del datatables
            "aServerSide": true, // Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip', // Definimos los elementos del control de la tabla
            "searching": true, // Activamos el buscador
            lengthChange: false, // Activamos el cambio de número de registros por página
            colReorder: true, // Activamos la reordenación de columnas
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],

            
            "ajax": {
                url : "../../controller/ticket.php?op=listar",
                type : "post",
                dataType : "json",
                error: function(e) {
                    console.log(e.responseText);
                }
            },

            "bDestroy": false, // Elimina los datos anteriores para evitar duplicados
            "responsive": true, // Habilita la responsividad
            "bInfo": true, // Muestra información sobre el número de registros
            "iDisplayLength": 10, // Número de registros a mostrar por página
            "autoWidth": false, // Desactiva el ancho automático de las columnas
            "sPaginationType": "full_numbers", // Tipo de paginación        
            "bLengthChange": true, // Permite cambiar el número de registros por página
            "bPaginate": true, // Habilita la paginación
            "bFilter": true, // Habilita el filtro


            "language": {
                "url": "../assets/js/Spanish.json",
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de forma ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de forma descendente"
                }
            }
        }).DataTable();
    }else{
        // Inicializamos el DataTable con los datos del servidor
        tabla = $('#ticket_data').dataTable({
            "aProcessing": true, // Activamos el procesamiento del datatables
            "aServerSide": true, // Paginación y filtrado realizados por el servidor
            dom: 'Bfrtip', // Definimos los elementos del control de la tabla
            "searching": true, // Activamos el buscador
            lengthChange: false, // Activamos el cambio de número de registros por página
            colReorder: true, // Activamos la reordenación de columnas
            buttons: [
                'copyHtml5',
                'excelHtml5',
                'csvHtml5',
                'pdfHtml5'
            ],

            
            "ajax": {
                url : "../../controller/ticket.php?op=listar_por_usuario",
                type : "post",
                dataType : "json",
                data: {emp_id : emp_id }, // Enviamos el ID del empleado al servidor
                error: function(e) {
                    console.log(e.responseText);
                }
            },

            "bDestroy": false, // Elimina los datos anteriores para evitar duplicados
            "responsive": true, // Habilita la responsividad
            "bInfo": true, // Muestra información sobre el número de registros
            "iDisplayLength": 10, // Número de registros a mostrar por página
            "autoWidth": false, // Desactiva el ancho automático de las columnas
            "sPaginationType": "full_numbers", // Tipo de paginación        
            "bLengthChange": true, // Permite cambiar el número de registros por página
            "bPaginate": true, // Habilita la paginación
            "bFilter": true, // Habilita el filtro


            "language": {
                "url": "../assets/js/Spanish.json",
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast": "Último",
                    "sNext": "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de forma ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de forma descendente"
                }
            }
        }).DataTable();
    }

});

function verTicket(tick_id) {
    // Redirigimos a la página de detalles del ticket con el ID del ticket
    window.location.href = "../../Soporte/DetalleTicket/?id=" + tick_id; // Redirigimos a la página de detalles del ticket
    //window.open("http://localhost/LMTS-CRM/Soporte/DetalleTicket/?id=" + tick_id, "_blank"); // Abrimos la página de detalles del ticket en una nueva pestaña
}

init();