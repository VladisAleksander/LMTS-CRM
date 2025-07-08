<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Estatus.php";
    $estatus = new Estatus();
    $datos = $estatus->get_estatus();
    $html = "<option  value='' disabled selected>- Seleccione un estado -</option>";
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "combo":
                $data = Array();
                foreach ($datos as $row) {
                    $html .= "<option value='" . $row["st_id"] . "'>" . $row["st_name"] . "</option>";
                }
                echo $html;
            break;
        }
    } else {
        $html = "<option value=''>- No hay estados -</option>";
    }
?>
