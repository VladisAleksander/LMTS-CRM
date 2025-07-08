<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Prioridad.php";
    $prioridad = new Prioridad();
    $datos = $prioridad->get_prioridad();
    $html = "<option  value='' disabled>- Seleccione una prioridad -</option>";
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "combo":
                $data = Array();
                $default_id = 4; // Define el ID de la opción por defecto
                foreach ($datos as $row) {
                    // Agrega el atributo 'selected' si el ID coincide con el predeterminado
                    $selected = ($row["n_id"] == $default_id) ? " selected" : "";
                    $html .= "<option value='" . $row["n_id"] . "'" . $selected . ">" . $row["n_name"] . "</option>";
                }
                echo $html;
            break;
        }
    } else {
        $html = "<option value=''>No hay opciones</option>";
        echo $html;
    }
?>
