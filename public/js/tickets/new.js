function init() {
    // Inicializa el formulario
    $('#ticket-form').on('submit', function(e) {
        guardaryeditar(e); // Llama a la función para guardar o editar el ticket
    });

}

$(document).ready(function() { // Llama a la función cuando el DOM está listo
    $('#t_desc').summernote({
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

    $('#t_desc').summernote('code', ''); // Limpia el contenido del editor

    $.post('../../controller/area.php?op=combo', function(data, status) {
        // Cargar las areas en el selector
        $('#area_id').html(data);
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
            // Cargar las subcategorías en el selector
            $('#scat_id').html(data);
        });
    });

});

function guardaryeditar(e) {
    e.preventDefault(); // Evita el envío del formulario por defecto

    var formData = new FormData($("#ticket-form")[0]);

    if ($('#t_desc').summernote('isEmpty') || $('#t_tit').val() == '') {
        // Mensaje de error
        swal({
            title: "¡Advertencia!",
            text: "Uno o más campos están vacíos",
            type: "warning",
            confirmButtonClass: "btn-success",
            confirmButtonText: "Aceptar",
        });
    }else{
        $.ajax({
            url: "../../controller/ticket.php?op=insert",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response); // Verifica la respuesta del servidor
                $("#ticket-form")[0].reset(); // Reinicia el formulario
                $('#t_desc').summernote('reset'); // Limpia el contenido del editor
                $('#t_desc').summernote('code', ''); // Limpia el contenido del editor
                // Mensaje de éxito
                swal({
                    title: "Ticket Enviado",
                    text: "El ticket ha sido enviado correctamente.",
                    type: "success",
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Aceptar",
                });
            }
        });            
    }
}

init();