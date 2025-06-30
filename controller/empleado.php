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

            case "listar_usuarios":
                $datos = $empleado->listarEmpleados($_POST["e_stat"]);
                $data = Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["e_uid"];
                    $sub_array[] = $row["e_name"];
                    $sub_array[] = $row["e_last1"];
                    $sub_array[] = $row["e_last2"];
                    $sub_array[] = $row["a_name"];
                    $sub_array[] = $row["p_tit"];
                    $sub_array[] = $row["e_stat"] == 1 ? 'Activo' : 'Inactivo';
                    $sub_array[] = '<button type="button" onClick="verEmpleado('.$row["e_id"].');" id="'.$row["e_id"].'" class="tabledit-edit-button btn btn-sm btn-default"><div><i class="fa fa-eye"></i></div></button>';
                    $data[] = $sub_array;
                }

                $result = array(
                    "sEcho" => 1, //Información para el datatables
                    "iTotalRecords" => count($data), //Enviamos el total de registros al datatables
                    "iTotalDisplayRecords" => count($data), //Enviamos el total de registros a visualizar
                    "aaData" => $data);
                echo json_encode($result);
            break;
        }
    }
?>
