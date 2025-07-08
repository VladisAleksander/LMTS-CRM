<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Subestatus.php";
    $subestatus = new Subestatus();
    $datos = $subestatus->get_subestatus($_POST["est_id"]);
    $html = "<option  value='' disabled selected>- Seleccione un subestatus -</option>";
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "combo":
                $data = Array();
                foreach ($datos as $row) {
                    $html .= "<option value='" . $row["se_id"] . "'>" . $row["se_name"] . "</option>";
                }
                echo $html;
            break;
        }
    } else {
        $html = "<option value=''>- No hay subestatus -</option>";
    }
?>
