<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Empleado.php";
    $empleado = new Empleado();
    
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "insert":
                $empleado->insert_empleado(
                    $_POST["e_name"],
                    $_POST["e_last1"],
                    $_POST["e_last2"],
                    $_POST["e_phone"],
                    $_POST["e_pass"],
                    $_POST["pue_id"],
                    $_POST["area_id"]
                );
            break;
        }
    }
?>
