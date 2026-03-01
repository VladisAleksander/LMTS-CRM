var tabla;
var emp_id = $('#e_idx').val(); 
var area_id = $('#area_idx').val(); 

function init() {}

$(document).ready(function(){
    // 1. Leemos los parámetros de la URL usando JavaScript moderno
    const valoresUrl = new URLSearchParams(window.location.search);
    
    // 2. Extraemos el valor de 'filtro'. Si no viene nada, asignamos una cadena vacía ('')
    const filtroRecibido = valoresUrl.get('filtro') || '';
    
    // 3. Cargamos la tabla aplicándole el filtro que vino desde el Home
    cargarTabla(filtroRecibido); 
});

// Función que crea/actualiza la tabla
function cargarTabla(filtro) {
    var urlAjax = "";
    var dataAjax = {};

    // Evaluamos si es soporte o un usuario normal
    if (area_id == 11 || area_id == 12 || area_id == 14) {
        urlAjax = "../../controller/ticket.php?op=listar";
        dataAjax = { filtro_estado : filtro }; // Solo mandamos el filtro
    } else {
        urlAjax = "../../controller/ticket.php?op=listar_por_usuario";
        dataAjax = { emp_id : emp_id, filtro_estado : filtro }; // Mandamos ID y filtro
    }

    tabla = $('#ticket_data').DataTable({
        "aProcessing": true,
        "aServerSide": true,
        "destroy": true, // IMPORTANTE: Permite recargar la tabla con nuevos datos
        dom: 'Bfrtip',
        "searching": true,
        lengthChange: false,
        colReorder: true,
        buttons: ['copyHtml5', 'excelHtml5', 'csvHtml5', 'pdfHtml5'],
        "ajax": {
            url : urlAjax,
            type : "post",
            dataType : "json",
            data : dataAjax, // Aquí viajan nuestros parámetros
            error: function(e) {
                console.log(e.responseText);
            }
        },
        "bInfo": true,
        "iDisplayLength": 10,
        "autoWidth": false,
        "sPaginationType": "full_numbers",
        "language": {
            "url": "../assets/js/Spanish.json",
            // ... Mismos textos en español que ya tenías ...
        }
    });
}

// Función que será llamada desde el HTML al hacer clic en las cajas
function filtrarTickets(estado) {
    // Al presionar una caja, llamamos a la función y recargamos la tabla
    cargarTabla(estado);
}

function verTicket(tick_id) {
    window.location.href = "../../Soporte/DetalleTicket/?id=" + tick_id; 
}

init();