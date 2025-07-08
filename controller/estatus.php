<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Estatus.php";
    $estatus = new Estatus();
    $datos = $estatus->get_estatus();
    $html = "<option  value='' disabled>- Seleccione un estado -</option>";
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "combo":
                $data = Array();
                $default_id = 1; // Define el ID de la opción por defecto
                foreach ($datos as $row) {
                    // Agrega el atributo 'selected' si el ID coincide con el predeterminado
                    $selected = ($row["n_id"] == $default_id) ? " selected" : "";
                    $html .= "<option value='" . $row["st_id"] . "'" . $selected . ">" . $row["st_name"] . "</option>";
                }
                echo $html;
            break;
        }
    } else {
        $html = "<option value=''>- No hay estados -</option>";
    }
?>
