<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Ticket.php";
    $ticket = new Ticket();
    
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "insert":
                $ticket->insert_ticket(
                    $_POST["t_tit"],
                    $_POST["area_id"],
                    $_POST["emp_id"],
                    $_POST["t_phone"],
                    $_POST["cat_id"],
                    $_POST["scat_id"],
                    $_POST["t_desc"]);
            break;

            case "listar_por_usuario":
                $datos = $ticket->listarTicketUsuario($_POST["emp_id"]);
                $data = Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["t_num"];
                    $sub_array[] = $row["a_name"];
                    $sub_array[] = $row["c_name"];
                    $sub_array[] = $row["sc_name"];
                    $sub_array[] = $row["t_crea"];
                    $sub_array[] = $row["t_tit"];
                    $sub_array[] = $row["e_name"]." ".$row["e_last1"];
                    $sub_array[] = $row["st_name"];
                    $sub_array[] = $row["n_name"];
                    $sub_array[] = '<button type="button" onClick="verTicket('.$row["t_id"].');" id="'.$row["t_id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-edit"></i></div></button>';
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
