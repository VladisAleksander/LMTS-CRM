function init() {
    // Inicializa el formulario
    $('#ticket-form').on('submit', function(e) {
        guardaryeditar(e); // Llama a la función para guardar o editar el ticket
    });
}

$(document).ready(function() { 
    // Limpieza de callbacks fantasma en la inicialización
    $('#t_desc').summernote({
        height: 200, 
        lang: 'es-ES' 
    });

    $('#t_desc').summernote('code', ''); 

    $.post('../../controller/area.php?op=combo', function(data, status) {
        $('#area_id').html(data);
    });

    $.post('../../controller/categoria.php?op=combo', function(data, status) {
        $('#cat_id').html(data);
    });

    // Unificamos el evento change para que cargue subcategorías y muestre el equipo
    $('#cat_id').change(function() {
        var cat_id = $(this).val();

        $.post('../../controller/subcategoria.php?op=combo', {cat_id : cat_id}, function(data, status) {            
            $('#scat_id').html(data);
        });

        if (cat_id === '1' || cat_id === '2' || cat_id === '5') {
            $('#device_name_container').show();
            $('#device_name').prop('required', true);
        } else {
            $('#device_name_container').hide();
            $('#device_name').prop('required', false).val('');
        }
    });
});

function guardaryeditar(e) {
    e.preventDefault(); 

    var formData = new FormData($("#ticket-form")[0]);

    if ($('#t_desc').summernote('isEmpty') || $('#t_tit').val() == '') {
        swal({
            title: "¡Advertencia!",
            text: "Uno o más campos están vacíos",
            type: "warning",
            confirmButtonClass: "btn-success",
            confirmButtonText: "Aceptar",
        });
    } else {
        $.ajax({
            url: "../../controller/ticket.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                $("#ticket-form")[0].reset(); 
                
                // ELIMINAMOS EL .summernote('reset') QUE CAUSABA EL ERROR
                $('#t_desc').summernote('code', ''); 
                
                swal({
                    title: "Ticket Enviado",
                    text: "El ticket ha sido enviado correctamente.",
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Aceptar",
                }).then(function() {
                    // Puedes descomentar la siguiente línea para que lo mande a la lista de tickets tras crearlo
                    // window.location.href = "../ConsultarTicket/";
                });
            },
            error: function(e) {
                swal({
                    title: "Error",
                    text: "Hubo un problema al crear el ticket en el servidor.",
                    type: "error",
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "Aceptar",
                });
            }
        });            
    }
}

init();