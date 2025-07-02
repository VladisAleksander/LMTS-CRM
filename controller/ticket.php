<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Ticket.php";
    $ticket = new Ticket();
    
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "insert": // Guardar tickets en la Base de Datos
                $ticket->insert_ticket(
                    $_POST["t_tit"],
                    $_POST["area_id"],
                    $_POST["emp_id"],
                    $_POST["t_phone"],
                    $_POST["cat_id"],
                    $_POST["scat_id"],
                    $_POST["t_desc"]);
            break;

            case "listar_por_usuario": // Listar tickets por usuario
                $datos = $ticket->listarTicketUsuario($_POST["emp_id"]);
                $data = Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["t_num"];
                    $sub_array[] = $row["t_crea"];
                    $sub_array[] = $row["t_tit"];
                    $sub_array[] = $row["a_name"];
                    $sub_array[] = $row["c_name"];
                    $sub_array[] = $row["sc_name"];

                    if ($row["est_id"] == "1") {
                        $sub_array[] = '<span class="label label-pill label-default">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "2") {
                        $sub_array[] = '<span class="label label-pill label-success">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "3") {
                        $sub_array[] = '<span class="label label-pill label-primary">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "4") {
                        $sub_array[] = '<span class="label label-pill label-warning">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "5") {
                        $sub_array[] = '<span class="label label-pill label-info">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "6" || $row["est_id"] == "7") {
                        $sub_array[] = '<span class="label label-pill label-danger">'.$row["st_name"].'</span>';
                    }
                    
                    $sub_array[] = '<button type="button" onClick="verTicket('.$row["t_id"].');" id="'.$row["t_id"].'" class="btn btn-inline btn-secondary-outline btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
                    $data[] = $sub_array;
                }

                $result = array(
                    "sEcho" => 1, //Información para el datatables
                    "iTotalRecords" => count($data), //Enviamos el total de registros al datatables
                    "iTotalDisplayRecords" => count($data), //Enviamos el total de registros a visualizar
                    "aaData" => $data);
                echo json_encode($result);
            break;

            case "listar": // Listar todos los tickets
                $datos = $ticket->listarTicket();
                $data = Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["t_num"];
                    $sub_array[] = $row["t_crea"];
                    $sub_array[] = $row["t_tit"];
                    $sub_array[] = $row["a_name"];
                    $sub_array[] = $row["e_name"]." ".$row["e_last1"];
                    $sub_array[] = $row["c_name"];
                    $sub_array[] = $row["sc_name"];

                    if ($row["niv_id"] == "1") {
                        $sub_array[] = '<span class="label label-danger">'.$row["n_name"].'</span>';
                    } elseif ($row["niv_id"] == "2") {
                        $sub_array[] = '<span class="label label-warning">'.$row["n_name"].'</span>';
                    } elseif ($row["niv_id"] == "3") {
                        $sub_array[] = '<span class="label label-success">'.$row["n_name"].'</span>';
                    } elseif ($row["niv_id"] == "4") {
                        $sub_array[] = '<span class="label label-primary">'.$row["n_name"].'</span>';
                    } elseif ($row["niv_id"] == "5") {
                        $sub_array[] = '<span class="label label-default">'.$row["n_name"].'</span>';
                    }

                    if ($row["est_id"] == "1") {
                        $sub_array[] = '<span class="label label-default">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "2") {
                        $sub_array[] = '<span class="label label-success">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "3") {
                        $sub_array[] = '<span class="label label-primary">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "4") {
                        $sub_array[] = '<span class="label label-warning">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "5") {
                        $sub_array[] = '<span class="label label-info">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "6" || $row["est_id"] == "7") {
                        $sub_array[] = '<span class="label label-danger">'.$row["st_name"].'</span>';
                    }

                    $sub_array[] = '<button type="button" onClick="verTicket('.$row["t_id"].');" id="'.$row["t_id"].'" class="btn btn-inline btn-secondary-outline btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
                    $data[] = $sub_array;
                }

                $result = array(
                    "sEcho" => 1, //Información para el datatables
                    "iTotalRecords" => count($data), //Enviamos el total de registros al datatables
                    "iTotalDisplayRecords" => count($data), //Enviamos el total de registros a visualizar
                    "aaData" => $data);
                echo json_encode($result);
            break;

            case "listar_detalle":
                $datos = $ticket->listarTicketDetalle($_POST["tick_id"]);
            break;
        }
    }
?>
