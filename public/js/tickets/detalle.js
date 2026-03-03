function init() {

}

$(document).ready(function(){

    var tick_id = getUrlParameter('id');

    listar_mensaje (tick_id);
    listar_notas(tick_id);
    listar_historial(tick_id);

    // Editor de texto SummerNote para la pestaña Detalles
    $('#td_det').summernote({
        height: 200, // Establece el tamaño del editor
        lang: 'es-ES' // Establece el idioma del editor
    });

    // Editor de texto SummerNote para la pestaña Mensajes
    $('#td_message').summernote({
        height: 100, // Establece el tamaño del editor
        lang: 'es-ES' // Establece el idioma del editor
    });
    $('#td_message').summernote('code', ''); // Limpia el contenido del editor

    // Editor de texto SummerNote para la pestaña Resolución
    $('#td_res_notes').summernote({
        height: 100, // Establece el tamaño del editor
        lang: 'es-ES' // Establece el idioma del editor
    });

    // Editor de texto SummerNote para la pestaña Notas
    $('#td_notes').summernote({
        height: 100, // Establece el tamaño del editor
        lang: 'es-ES' // Establece el idioma del editor
    });
    $('#td_notes').summernote('code', ''); // Limpia el contenido del editor

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

    $.when(comboArea, comboPrioridad, comboCategoria, comboEstatus).done(function() { // Cuando los combos estén cargados activa la carga de datos
        $.post("../../controller/ticket.php?op=mostrar_detalles_ticket", {tick_id: tick_id}, function(data) {
            try {
                data = JSON.parse(data);
                if (data.error) {
                    swal({
                        title: "Error",
                        text: data.error,
                        type: "error",
                        confirmButtonText: "Aceptar"
                    }).then(() => { window.location.href = '../ConsultarTicket'; });
                    return;
                }
                //data = JSON.parse(data);
                $('#lblestado').html(data.st_name);
                $('#iblfechacrea').html(data.t_crea);
                $('#lblnumtick').html("Detalle del Ticket - " + data.t_num);
                $('#lblusuario').val(data.e_name + ' ' + data.e_last1 + ' ' + data.e_last2);
                $('#lblemail').val(data.e_mail);
                $('#t_phone').val(data.t_phone);
                $('#t_tit').val(data.t_tit);
                $('#t_close').val(data.t_close);
                $('#t_close_user').val(data.t_close_user);

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

                // Cargar la resolución guardada
                $('#t_resolucion_desc').val(data.t_resolucion);

                var isEditable = $('#is_editable').val() === 'true';
                if (!isEditable || data.est_id == '6') {
                    $('#td_det').summernote('disable');
                    $('#t_resolucion_desc').prop('disabled', true); // Bloquea la resolución si está cerrado o no es editable
                }
            } catch (e) {
                console.error(e);
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

// Control para el envío de mensajes dentro del ticket
$(document).on('click', '#btnEnviar', function() {
    var tick_id = getUrlParameter('id');
    var emp_id = $('#e_idx').val();
    var td_desc = $('#td_message').summernote('code');

    if ($('#td_message').summernote('isEmpty')) {
        // Mensaje de error en caso de campo vacío
        swal({
            title: "¡Advertencia!",
            text: "El campo de mensaje está vacío.",
            type: "warning",
            confirmButtonClass: "btn-success",
            confirmButtonText: "Aceptar",
        });
    }else{
        $.post('../../controller/ticket.php?op=insertar_mensaje', {tick_id : tick_id, emp_id : emp_id, td_desc : td_desc}, function(data) {
            listar_mensaje (tick_id);
            $('#td_message').summernote('reset'); // Limpia el contenido del editor
            // Mensaje de éxito
            swal({
                title: "Mensaje Enviado",
                text: "El mensaje ha sido enviado correctamente.",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Aceptar",
            });
        });
    }
});

// Control de la pestaña Detalles para guardar los cambios realizados
$(document).on('click', '#btnGuardar', function() {
    var tick_id = getUrlParameter('id');
    var t_tit = $('#t_tit').val().trim();
    var area_id = $('#area_id').val();
    var t_phone = $('#t_phone').val().trim();
    var cat_id = $('#cat_id').val();
    var scat_id = $('#scat_id').val();
    var niv_id = $('#n_id').val();
    var est_id = $('#st_id').val();
    var sest_id = $('#se_id').val();
    var t_desc = $('#td_det').summernote('code').trim();
    var t_close_user = (est_id == '6') ? $('#e_idx').val() : '';

    // Capturamos el valor del nuevo textarea de resolución
    var t_resolucion = $('#t_resolucion_desc').val().trim();

    // Validar campos requeridos
    var errores = [];
    if (t_phone === '') errores.push('Teléfono de contacto');
    if (!area_id) errores.push('Área');
    if (!cat_id) errores.push('Categoría');
    if (!scat_id) errores.push('Subcategoría');
    if (!niv_id) errores.push('Prioridad');
    if (!est_id) errores.push('Estatus');
    if (!sest_id) errores.push('Subestatus');
    if (t_tit === '') errores.push('Título');
    if ($('#td_det').summernote('isEmpty')) errores.push('Descripción detallada');

    // VALIDACIÓN: Si es Resuelto(5) o Cerrado(6), la resolución es obligatoria
    if ((est_id == '5' || est_id == '6') && t_resolucion === '') {
        errores.push('Motivo de Resolución/Cierre (Pestaña Resolución)');
    }

    if (errores.length > 0) {
        swal({
            title: "¡Advertencia!",
            text: "Los siguientes campos están vacíos o no seleccionados: " + errores.join(', '),
            type: "warning",
            confirmButtonClass: "btn-success",
            confirmButtonText: "Aceptar",
        });
        return;
    }

    // Función para actualizar los detalles del ticket
    $.post('../../controller/ticket.php?op=actualizar_detalles_ticket', {
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
        t_resolucion: t_resolucion,
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
            listar_historial(tick_id); // Actualiza la pestaña historial sin recargar la página

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

            // Actualizar el estado de edición del campo de descripción
            var isEditable = $('#is_editable').val() === 'true';
            if (est_id !== '6' && isEditable) {
                $('#td_det').summernote('enable');
            } else {
                $('#td_det').summernote('disable');
            }

            // Opcional: Ocultar sección de notas si el ticket se cierra
            if (est_id === '6') {
                $('#notes_section').hide();
            }
        } else { // Mensaje de error en caso de no poderse actualizar la información
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

// Función para listar los detalles del ticket
function listar_mensaje (tick_id) {
    $.post("../../controller/ticket.php?op=listar_mensajes", {tick_id: tick_id}, function(data) {
        $('#ticket_mensajes').html(data);
    });
}

// Función para listar las Notas Internas (Solo Soporte)
function listar_notas(tick_id) {
    $.post("../../controller/ticket.php?op=listar_notas", {tick_id: tick_id}, function(data) {
        $('#support_notes').html(data);
    });
}

// Función para listar el Historial de Cambios
function listar_historial(tick_id) {
    $.post("../../controller/ticket.php?op=listar_historial", {tick_id: tick_id}, function(data) {
        $('#ticket_historial').html(data);
    });
}

// Evento para el botón de "Guardar" Notas Internas
$(document).on('click', '#btnSaveNotes', function() {
    var tick_id = getUrlParameter('id');
    var emp_id = $('#e_idx').val();
    var tn_desc = $('#td_notes').summernote('code');

    if ($('#td_notes').summernote('isEmpty')) {
        swal({
            title: "¡Advertencia!",
            text: "El campo de notas está vacío.",
            type: "warning",
            confirmButtonClass: "btn-warning",
            confirmButtonText: "Aceptar",
        });
    } else {
        $.post('../../controller/ticket.php?op=insertar_nota', {tick_id : tick_id, emp_id : emp_id, tn_desc : tn_desc}, function(data) {
            listar_notas(tick_id); // Recarga la lista de notas
            listar_historial(tick_id); // Recarga el historial silenciosamente
            $('#td_notes').summernote('code', ''); // Limpia el editor
            swal({
                title: "Nota Guardada",
                text: "La nota interna se ha guardado correctamente.",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Aceptar",
            });
        });
    }
});

init();