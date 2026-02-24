<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Ticket.php";
    $ticket = new Ticket();

    // Función helper para verificar acceso a un ticket
    function verificarAccesoTicket($ticket_id, $user_id, $user_area_id) {
        $ticket_obj = new Ticket();
        $ticket_data = $ticket_obj->listarTicketID($ticket_id);
        if (empty($ticket_data)) {
            return false; // Ticket no existe
        }
        $ticket = $ticket_data[0];
        if ($user_area_id == 11 || $user_area_id == 12 || $user_area_id == 14) {
            return true; // Soporte/Desarrollador: Acceso total
        }
        return ($ticket['emp_id'] == $user_id); // Solo el creador del ticket
    }
    
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
                    isset($_POST["t_equip"]) ? $_POST["t_equip"] : null;
            break;

            case "update": // Actualizar la información de un ticket
                // Validar que venga el ID del ticket
                if (isset($_POST["t_id"]) && !empty($_POST["t_id"])) {

                    // Verificar acceso al ticket
                    $t_id = $_POST["t_id"];
                    if (!verificarAccesoTicket($t_id, $_SESSION['e_id'], $_SESSION['area_id'])) {
                        echo json_encode(["error" => "Acceso Denegado: No tienes permiso para modificar este ticket."]);
                        break;
                    }
            
                    // Si el estado es 6 (cerrado), permitir actualizar el campo t_close_user
                    if ($_POST["est_id"] == 6) {
                        $result = $ticket->update_ticket(
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
                        $result = $ticket->update_ticket(
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

                    if ($result > 0) {
                        echo json_encode(["success" => "Ticket actualizado correctamente."]);
                    } else {
                        echo json_encode(["error" => "No se pudo actualizar el ticket."]);
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
                        $sub_array[] = '<span class="label label-pill label-primary">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "3") {
                        $sub_array[] = '<span class="label label-pill label-warning">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "4") {
                        $sub_array[] = '<span class="label label-pill label-info">'.$row["st_name"].'</span>';
                    } elseif ($row["est_id"] == "5") {
                        $sub_array[] = '<span class="label label-pill label-success">'.$row["st_name"].'</span>';
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

            case "listar_detalle": // Listar detalles de un ticket

                // Verificar acceso al ticket
                $t_id = $_POST["tick_id"];
                if (!verificarAccesoTicket($t_id, $_SESSION['e_id'], $_SESSION['area_id'])) {
                    echo json_encode(["error" => "Acceso Denegado: No tienes permiso para ver este ticket."]);
                    break;
                }

                // Si tiene acceso, proceder a listar los detalles
                $datos = $ticket->listarTicketMensajes($_POST["tick_id"]); // Recibir el ID del ticket por POST
                ?>
                    <?php
                        foreach($datos as $row){
                            ?>
                                <article class="activity-line-item box-typical">
                                    <div class="activity-line-date"> <!-- Fecha de publicación -->
                                        <?php
                                            $fecha = new DateTime($row["td_crea"]);
                                            echo $fecha->format('d M Y');
                                        ?>
                                    </div>
                                    <header class="activity-line-item-header">
                                        <div class="activity-line-item-user">
                                            <div class="activity-line-item-user-photo">
                                                <a href="#"> <!-- Enlace al perfil del usuario -->
                                                    <img src="../../public/img/photo-64-2.jpg" alt=""> <!-- Foto o imágen del usuario -->
                                                </a>
                                            </div>
                                            <div class="activity-line-item-user-name">
                                                <?php echo $row["e_name"]." ".$row["e_last1"]." ".$row["e_last2"]; ?> <!-- Nombre del usuario -->
                                            </div>
                                            <div class="activity-line-item-user-status">
                                                <?php echo $row["p_tit"]." - ".$row["a_name"]; ?> <!-- Cargo y área del usuario -->
                                            </div>
                                        </div>
                                    </header>
                                    <div class="activity-line-action-list"> <!-- Contenedor de las acciones o comentarios del usuario -->
                                        <section class="activity-line-action">
                                            <div class="time"> <!-- Hora de publicación -->
                                                <?php
                                                    $hora = new DateTime($row["td_crea"]);
                                                    echo $hora->format('h:i A');
                                                ?>
                                            </div>
                                            <div class="cont"> <!-- Contenedor del comentario o acción realizada -->
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

                // Verificar acceso al ticket
                $t_id = $_POST["tick_id"];
                if (!verificarAccesoTicket($t_id, $_SESSION['e_id'], $_SESSION['area_id'])) {
                    echo json_encode(["error" => "Acceso Denegado: No tienes permiso para ver este ticket."]);
                    break;
                }

                // Si tiene acceso, proceder a mostrar los datos
                $datos = $ticket->listarTicketID($_POST["tick_id"]);
                if (is_array($datos) == true and count($datos) > 0) {
                    foreach($datos as $row){
                        $output ["t_id"] = $row["t_id"];
                        $output ["t_num"] = $row["t_num"];
                        $output ["t_crea"] = date ("d/m/Y H:i:s", strtotime ($row["t_crea"]));
                        
                        if ($row["st_name"]=="Nuevo"){
                            $output ["st_name"] = '<span class="label label-pill label-default">'.$row["st_name"].'</span>';
                        } elseif ($row["st_name"]=="En Proceso"){
                            $output ["st_name"] = '<span class="label label-pill label-primary">'.$row["st_name"].'</span>';
                        } elseif ($row["st_name"]=="En Espera"){
                            $output ["st_name"] = '<span class="label label-pill label-warning">'.$row["st_name"].'</span>';
                        } elseif ($row["st_name"]=="Escalado"){
                            $output ["st_name"] = '<span class="label label-pill label-info">'.$row["st_name"].'</span>';
                        } elseif ($row["st_name"]=="Resuelto"){
                            $output ["st_name"] = '<span class="label label-pill label-success">'.$row["st_name"].'</span>';
                        } elseif ($row["st_name"]=="Cerrado"){
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
                        $output ["area_id"] = $row["area_id"];
                        $output ["cat_id"] = $row["cat_id"];
                        $output ["scat_id"] = $row["scat_id"];
                        $output ["niv_id"] = $row["niv_id"];
                        $output ["est_id"] = $row["est_id"];
                        $output ["sest_id"] = $row["sest_id"];
                        $output ["t_close"] = $row["t_close"];
                        $output ["t_close_user"] = $row["t_close_user"];

                    }
                    echo json_encode($output);
                }
            break;

            case "insertar_detalle": // Guardar tickets en la Base de Datos

                // Verificar acceso al ticket
                $t_id = $_POST["tick_id"];
                if (!verificarAccesoTicket($t_id, $_SESSION['e_id'], $_SESSION['area_id'])) {
                    echo json_encode(["error" => "Acceso Denegado: No tienes permiso para ver este ticket."]);
                    break;
                }

                // Si tiene acceso, proceder a insertar el detalle
                $ticket->insert_ticket_detalle(
                    $_POST["tick_id"],
                    $_POST["emp_id"],
                    $_POST["td_desc"]);
            break;
        }
    }
?>
