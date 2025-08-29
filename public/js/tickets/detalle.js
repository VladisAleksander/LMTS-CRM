function init() {

}

$(document).ready(function(){

    var tick_id = getUrlParameter('id');

    listar_detalle (tick_id);

    $('#td_det').summernote({
        height: 300, // Establece el tamaño del editor
        lang: 'es-ES' // Establece el idioma del editor
    });

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

    // Cargar combos y esperar a que terminen antes de cargar datos del ticket
    var comboArea = $.post('../../controller/area.php?op=combo', function(data, status) {
        $('#area_id').html(data);
    });

    var comboPrioridad = $.post('../../controller/prioridad.php?op=combo', function(data, status) {
        $('#n_id').html(data);
    });

    var comboCategoria = $.post('../../controller/categoria.php?op=combo', function(data, status) {
        $('#cat_id').html(data);
    });

    var comboEstatus = $.post('../../controller/estatus.php?op=combo', function(data, status) {
        $('#st_id').html(data);
    });

    $.when(comboArea, comboPrioridad, comboCategoria, comboEstatus).done(function() {
        $.post("../../controller/ticket.php?op=mostrar", {tick_id: tick_id}, function(data) {
            data = JSON.parse(data);
            $('#lblestado').html(data.st_name);
            $('#iblfechacrea').html(data.t_crea);
            $('#lblnumtick').html("Detalle del Ticket - " + data.t_num);
            $('#lblusuario').val(data.e_name + ' ' + data.e_last1 + ' ' + data.e_last2);
            $('#lblemail').val(data.e_mail);
            $('#t_phone').val(data.t_phone);
            $('#t_tit').val(data.t_tit);

            $('#area_id').val(data.area_id);
            $('#n_id').val(data.niv_id);

            $('#cat_id').val(data.cat_id);
            loadSubcats(data.cat_id, function() {
                $('#scat_id').val(data.scat_id);
            });

            $('#st_id').val(data.est_id);
            loadSubestatus(data.est_id, function() {
                $('#se_id').val(data.sest_id);
            });

            $('#td_det').summernote('code' , data.t_desc);
            if (!isEditable) {
                $('#td_det').summernote('disable');
            }
        });
    });

    $('#cat_id').change(function() {
        // Obtener el valor seleccionado
        cat_id = $(this).val();
        loadSubcats(cat_id);
    });

    $('#st_id').change(function() {
        // Obtener el valor seleccionado
        est_id = $(this).val();
        loadSubestatus(est_id);
    });

});

// Función para cargar subcategorías
function loadSubcats(cat_id, callback) {
    $.post('../../controller/subcategoria.php?op=combo', {cat_id : cat_id}, function(data, status) {
        // Cargar los subcategorías en el selector
        $('#scat_id').html(data);
        if (callback) callback();
    });
}

// Función para cargar subestatus
function loadSubestatus(est_id, callback) {
    $.post('../../controller/subestatus.php?op=combo', {est_id : est_id}, function(data, status) {
        // Cargar los subestatus en el selector
        $('#se_id').html(data);
        if (callback) callback();
    });
}

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

$(document).on('click', '#btnGuardar', function() {
    var tick_id = getUrlParameter('id');
    var t_tit = $('#t_tit').val();
    var area_id = $('#area_id').val();
    var t_phone = $('#t_phone').val();
    var cat_id = $('#cat_id').val();
    var scat_id = $('#scat_id').val();
    var niv_id = $('#n_id').val();
    var est_id = $('#st_id').val();
    var sest_id = $('#se_id').val();
    var t_desc = $('#td_det').summernote('code');
    var t_close_user = (est_id == '6') ? $('#e_idx').val() : '';

    $.post('../../controller/ticket.php?op=update', {
        t_id: tick_id,
        t_tit: t_tit,
        area_id: area_id,
        t_phone: t_phone,
        cat_id: cat_id,
        scat_id: scat_id,
        niv_id: niv_id,
        est_id: est_id,
        sest_id: sest_id,
        t_desc: t_desc,
        t_close_user: t_close_user
    }, function(response) {
        response = JSON.parse(response);
        if (response.success) {
            swal({
                title: "Éxito",
                text: response.success,
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Aceptar",
            });
            // Actualizar el estado en tiempo real sin recargar la página
            var st_name = $('#st_id option:selected').text();
            var class_name;
            switch (est_id) {
                case '1': class_name = 'default'; break;
                case '2': class_name = 'success'; break;
                case '3': class_name = 'primary'; break;
                case '4': class_name = 'warning'; break;
                case '5': class_name = 'info'; break;
                case '6':
                case '7': class_name = 'danger'; break;
                default: class_name = 'default';
            }
            var status_html = '<span class="label label-pill label-' + class_name + '">' + st_name + '</span>';
            $('#lblestado').html(status_html);

            // Opcional: Ocultar sección de notas si el ticket se cierra
            if (est_id === '6') {
                $('#notes_section').hide();
            }
        } else {
            swal({
                title: "Error",
                text: response.error,
                type: "error",
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Aceptar",
            });
        }
    });
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