function init() {

}

$(document).ready(function(){

    var tick_id = getUrlParameter('id');

    $.post("../../controller/ticket.php?op=listar_detalle", {tick_id: tick_id}, function(data) {
        $('#lbldetalle').html(data);
    });

    $('#td_det').summernote({
        height: 200, // Establece el tamaño del editor
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
    $('#td_det').summernote('code', ''); // Limpia el contenido del editor

    $('#td_det2').summernote({
        height: 200, // Establece el tamaño del editor
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
        st_id = $(this).val();

        // Llamar a la función para cargar los subestatus con base en el estado seleccionado
        $.post('../../controller/subestatus.php?op=combo', {st_id : st_id}, function(data, status) {
            
            // Cargar los subcategorías en el selector
            $('#se_id').html(data);
        });
    });

});

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

init();