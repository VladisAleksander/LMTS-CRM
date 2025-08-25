function init() {

}

$(document).ready(function(){

    var tick_id = getUrlParameter('id');

    listar_detalle (tick_id);

    $.post("../../controller/ticket.php?op=mostrar", {tick_id: tick_id}, function(data) {
        //console.log(data);
        data = JSON.parse(data);
        $('#lblestado').html(data.st_name);
        $('#iblfechacrea').html(data.t_crea);
        $('#lblnumtick').html("Detalle del Ticket - " + data.t_num);
        $('#lblusuario').val(data.e_name + ' ' + data.e_last1 + ' ' + data.e_last2);
        $('#lblemail').val(data.e_mail);
        $('#t_phone').val(data.t_phone);
        $('#t_tit').val(data.t_tit);
        $('#td_det').summernote('code' , data.t_desc);
    });

    $('#td_det').summernote({
        height: 300, // Establece el tamaño del editor
        lang: 'es-ES' // Establece el idioma del editor
    });
    $('#td_det').summernote('code', ''); // Limpia el contenido del editor
    $('#td_det').summernote('disable'); // Deshabilita el editor

    $('#td_det2').summernote({
        height: 200, // Establece el tamaño del editor
        lang: 'es-ES', // Establece el idioma del editor
        callbacks: {
            onImageUpload: function(files) {
                // Maneja la carga de imágenes
                for (var i = 0; i < files.length; i++) {
                    uploadImage(files[i]);
                }
            },
            onMediaDelete: function(target) {
                // Maneja la eliminación de medios
                deleteMedia(target[0].src);
            },
            onPaste: function(e) {
                // Maneja el pegado de contenido
                var bufferText = ((e.originalEvent || e).clipboardData || window.clipboardData).getData('Text');
                if (bufferText) {
                    document.execCommand('insertText', false, bufferText);
                }
            }
        }
    });
    $('#td_det2').summernote('code', ''); // Limpia el contenido del editor

    $.post('../../controller/area.php?op=combo', function(data, status) {
        // Cargar las areas en el selector
        $('#area_id').html(data);
    });

    $.post('../../controller/prioridad.php?op=combo', function(data, status) {
        // Cargar los niveles de prioridad en el selector
        $('#n_id').html(data);
    });

    $.post('../../controller/categoria.php?op=combo', function(data, status) {
        // Cargar las categorías en el selector
        $('#cat_id').html(data);
    });

    $('#cat_id').change(function() {
        // Obtener el valor seleccionado
        cat_id = $(this).val();

        // Llamar a la función para cargar las subcategorías con base en la categoría seleccionada
        $.post('../../controller/subcategoria.php?op=combo', {cat_id : cat_id}, function(data, status) {
            
            // Cargar los subcategorías en el selector
            $('#scat_id').html(data);
        });
    });

    $.post('../../controller/estatus.php?op=combo', function(data, status) {
        // Cargar los estados en el selector
        $('#st_id').html(data);
    });

    $('#st_id').change(function() {
        // Obtener el valor seleccionado
        est_id = $(this).val();

        // Llamar a la función para cargar los subestatus con base en el estado seleccionado
        $.post('../../controller/subestatus.php?op=combo', {est_id : est_id}, function(data, status) {
            
            // Cargar los subcategorías en el selector
            $('#se_id').html(data);
            console.log(data);
        });
    });

});

// Obtiene el valor de la variable del ticket de la URL
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};

$(document).on('click', '#btnEnviar', function() {
    var tick_id = getUrlParameter('id');
    var emp_id = $('#e_idx').val();
    var td_desc = $('#td_det2').val();

    if ($('#td_det2').summernote('isEmpty')) {
        // Mensaje de error
        swal({
            title: "¡Advertencia!",
            text: "El campo de notas está vacío.",
            type: "warning",
            confirmButtonClass: "btn-success",
            confirmButtonText: "Aceptar",
        });
    }else{
        $.post('../../controller/ticket.php?op=insertar_detalle', {tick_id : tick_id, emp_id : emp_id, td_desc : td_desc}, function(data) {
            listar_detalle (tick_id);
            $('#td_det2').summernote('reset'); // Limpia el contenido del editor
            // Mensaje de éxito
            swal({
                title: "Mensaje Enviado",
                text: "El el mensaje ha sido enviado correctamente.",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Aceptar",
            });
        });
    }
});

$(document).on('click', '#btnCerrarTicket', function() {
    swal({
        title: "Cerrar Ticket",
        text: "Esta acción cerrará el ticket y no se podrá revertir. ¿Estás seguro de que deseas continuar?",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Si, cerrar ticket",
        cancelButtonText: "No, no cerrar",
        closeOnConfirm: false
    },
    function(isConfirm) {
        if (isConfirm) {
            swal({
                title: "Cerrado",
                text: "El ticket ha sido cerrado correctamente.",
                type: "success",
                confirmButtonClass: "btn-success"
            });
        }
    });
});

// Función para listar los detalles del ticket
function listar_detalle (tick_id) {
    $.post("../../controller/ticket.php?op=listar_detalle", {tick_id: tick_id}, function(data) {
        $('#lbldetalle').html(data);
    });
}

init();