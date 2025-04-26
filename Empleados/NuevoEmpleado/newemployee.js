function init() {
    // Inicializa el formulario
    $('#employee-form').on('submit', function(e) {
        guardaryeditar(e); // Llama a la función para guardar o editar el empleado
    });

}

$(document).ready(function() { // Llama a la función cuando el DOM está listo

    $.post('../../controller/area.php?op=combo', function(data, status) {
        // Cargar las areas en el selector
        $('#area_id').html(data);
        // console.log(data);
    });

    $('#area_id').change(function() {
        // Obtener el valor seleccionado
        area_id = $(this).val();

        // Llamar a la función para cargar los puestos con base en el área seleccionada
        $.post('../../controller/puesto.php?op=combo', {area_id : area_id}, function(data, status) {
            // console.log(data);
            
            // Cargar los puestps en el selector
            $('#pue_id').html(data);
        });
    });

});

$(function() {
    // Validación de las contraseñas
    $('#form-signup_v1').validate({
        submit: {
            settings: {
                inputContainer: '.form-group',
                errorListClass: 'form-tooltip-error'
            }
        }
    });
});

function guardaryeditar(e) {
    e.preventDefault(); // Evita el envío del formulario por defecto

    var formData = new FormData($("#employee-form")[0]);

    $.ajax({
        url: "../../controller/empleado.php?op=insert",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(response) {
            // console.log(response); // Verifica la respuesta del servidor
            $("#employee-form")[0].reset(); // Reinicia el formulario
            // Mensaje de éxito
            swal({
                title: "Registro Exitoso",
                text: "El empleado ha sido registrado correctamente.",
                type: "success",
                confirmButtonClass: "btn-success",
                confirmButtonText: "Aceptar",
            });
        }
    });
}

init();