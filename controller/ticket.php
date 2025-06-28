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
                    $sub_array[] = $row["t_id"];
                    $sub_array[] = $row["t_num"];
                    $sub_array[] = $row["cat_name"];
                    $sub_array[] = $row["scat_name"];
                    $sub_array[] = $row["t_titulo"];
                    $sub_array[] = '<button type="button" onClick="verTicket('.$row["t_id"].');" id="'.$row["t_id"].'" class="btn btn-outline-primary btn-icon"><div><i class="fa fa-edit"></i></div></button>';
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
