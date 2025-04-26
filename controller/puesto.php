<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Puesto.php";
    $puestos = new Puesto();
    $datos = $puestos->get_puesto($_POST["area_id"]);
    $html = "<option  value='' disabled selected>- Seleccione un puesto -</option>";
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "combo":
                $data = Array();
                foreach ($datos as $row) {
                    $html .= "<option value='" . $row["p_id"] . "'>" . $row["p_tit"] . "</option>";
                }
                echo $html;
            break;
        }
    } else {
        $html = "<option value=''>No hay puestos</option>";
    }
?>
