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

            case "update": // Actualizar la información de un ticket
                // Validar que venga el ID del ticket
                if (isset($_POST["t_id"]) && !empty($_POST["t_id"])) {
            
                    // Si el estado es 6 (cerrado), permitir actualizar el campo t_close_user
                    if ($_POST["est_id"] == 6) {
                        $ticket->update_ticket(
                            $_POST["t_id"],
                            $_POST["t_tit"],
                            $_POST["area_id"],
                            $_POST["t_phone"],
                            $_POST["cat_id"],
                            $_POST["scat_id"],
                            $_POST["niv_id"],
                            $_POST["est_id"],
                            $_POST["sest_id"],
                            $_POST["t_desc"],
                            $_POST["t_close_user"]
                        );
                    } else {
                        // Si no está cerrado, se pasa NULL para t_close_user
                        $ticket->update_ticket(
                            $_POST["t_id"],
                            $_POST["t_tit"],
                            $_POST["area_id"],
                            $_POST["t_phone"],
                            $_POST["cat_id"],
                            $_POST["scat_id"],
                            $_POST["niv_id"],
                            $_POST["est_id"],
                            $_POST["sest_id"],
                            $_POST["t_desc"],
                            null
                        );
                    }
            
                } else {
                    echo json_encode(["error" => "Falta el ID del ticket para actualizar."]);
                }
            break;

            case "listar_por_usuario": // Listar tickets por usuario
                $datos = $ticket->listarTicketUsuario($_POST["emp_id"]);
                $data = Array();
                foreach($datos as $row){
                    $sub_array = array();
                    $sub_array[] = $row["t_num"];
                    $sub_array[] = $row["t_tit"];
                    $sub_array[] = date('Y-m-d H:i', strtotime($row["t_crea"]));

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
                    $sub_array[] = date('Y-m-d H:i', strtotime($row["t_crea"]));
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
                        $sub_array[] = '<span class="label label-primary">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "3") {
                        $sub_array[] = '<span class="label label-warning">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "4") {
                        $sub_array[] = '<span class="label label-info">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "5") {
                        $sub_array[] = '<span class="label label-success">'.$row["st_name"].'</span>';
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
                ?>
                    <?php
                        foreach($datos as $row){
                            ?>
                                <article class="activity-line-item box-typical">
                                    <div class="activity-line-date">
                                        <?php
                                            $fecha = new DateTime($row["td_crea"]);
                                            echo $fecha->format('d M Y');
                                        ?>
                                    </div>
                                    <header class="activity-line-item-header">
                                        <div class="activity-line-item-user">
                                            <div class="activity-line-item-user-photo">
                                                <a href="#">
                                                    <img src="../../public/img/photo-64-2.jpg" alt="">
                                                </a>
                                            </div>
                                            <div class="activity-line-item-user-name">
                                                <?php echo $row["e_name"]." ".$row["e_last1"]." ".$row["e_last2"]; ?>
                                            </div>
                                            <div class="activity-line-item-user-status">
                                                <?php echo $row["p_tit"]." - ".$row["a_name"]; ?>
                                            </div>
                                        </div>
                                    </header>
                                    <div class="activity-line-action-list">
                                        <section class="activity-line-action">
                                            <div class="time">
                                                <?php
                                                    $hora = new DateTime($row["td_crea"]);
                                                    echo $hora->format('h:i A');
                                                ?>
                                            </div>
                                            <div class="cont">
                                                <div class="cont-in">
                                                    <p><?php echo $row["td_desc"]; ?></p>
                                                </div>
                                            </div>
                                        </section><!--.activity-line-action-->

                                    </div><!--.activity-line-action-list-->
                                </article><!--.activity-line-item-->
                            <?php
                        }
                    ?>
                <?php
            break;

            case "mostrar";
                $datos = $ticket->listarTicketID($_POST["tick_id"]);
                if (is_array($datos)==true and count($datos) > 0) {
                    foreach($datos as $row){
                        $output ["t_id"] = $row["t_id"];
                        $output ["t_num"] = $row["t_num"];
                        $output ["t_crea"] = date ("d/m/Y H:i:s", strtotime ($row["t_crea"]));
                        
                        if ($row["st_name"]=="Nuevo"){
                            $output ["st_name"] = '<span class="label label-pill label-default">'.$row["st_name"].'</span>';
                        }else if ($row["st_name"]=="En Proceso"){
                            $output ["st_name"] = '<span class="label label-pill label-success">'.$row["st_name"].'</span>';
                        }else if ($row["st_name"]=="En Espera"){
                            $output ["st_name"] = '<span class="label label-pill label-primary">'.$row["st_name"].'</span>';
                        } else if ($row["st_name"]=="Escalado"){
                            $output ["st_name"] = '<span class="label label-pill label-warning">'.$row["st_name"].'</span>';
                        } else if ($row["st_name"]=="Resuelto"){
                            $output ["st_name"] = '<span class="label label-pill label-info">'.$row["st_name"].'</span>';
                        }else if ($row["st_name"]=="Cerrado"){
                            $output ["st_name"] = '<span class="label label-pill label-danger">'.$row["st_name"].'</span>';
                        }else if ($row["st_name"]=="Cancelado"){
                            $output ["st_name"] = '<span class="label label-pill label-danger">'.$row["st_name"].'</span>';
                        }

                        $output ["e_name"] = $row["e_name"];
                        $output ["e_last1"] = $row["e_last1"];
                        $output ["e_last2"] = $row["e_last2"];
                        $output ["e_mail"] = $row["e_mail"];
                        $output ["t_phone"] = $row["t_phone"];
                        $output ["a_name"] = $row["a_name"];
                        $output ["t_tit"] = $row["t_tit"];
                        $output ["t_desc"] = $row["t_desc"];
                    }
                    echo json_encode($output);
                }
            break;

            case "insertar_detalle": // Guardar tickets en la Base de Datos
                $ticket->insert_ticket_detalle(
                    $_POST["tick_id"],
                    $_POST["emp_id"],
                    $_POST["td_desc"]);
            break;
        }
    }
?>
