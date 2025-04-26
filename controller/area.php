<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Area.php";
    $locations = new Location();
    $datos = $locations->get_location();
    $html = "<option  value='' disabled selected>- Seleccione un área -</option>";
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "combo":
                $data = Array();
                foreach ($datos as $row) {
                    $html .= "<option value='" . $row["a_id"] . "'>" . $row["a_name"] . "</option>";
                }
                echo $html;
            break;
        }
    } else {
        $html = "<option value=''>No hay opciones</option>";
    }
?>
