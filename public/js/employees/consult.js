var tabla;

function init() {

}

$(document).ready(function(){
    tabla = $('#usuario_data').dataTable({
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
            url : "../../controller/empleado.php?op=listar_usuarios",
            type : "post",
            dataType : "json",
            data: {"e_stat" : 1 }, // Enviamos el ID del estatus al servidor
            error: function(e) {
                console.log(e.responseText);
            }
        },

        "bDestroy": true, // Elimina los datos anteriores para evitar duplicados
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
});

init();