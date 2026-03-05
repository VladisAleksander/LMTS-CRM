<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Ticket.php";
    $ticket = new Ticket();

    // =======================================================================
    // FUNCIONES PARA VERIFICAR ACCESO
    // =======================================================================

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

            // =======================================================================
            // FUNCIONES PARA NUEVO TICKET
            // =======================================================================

            case "insert": // Guardar tickets en la Base de Datos
                $t_equip = isset($_POST["t_equip"]) ? $_POST["t_equip"] : null;
                
                // 1. Insertamos el ticket y capturamos su nuevo ID
                $t_id = $ticket->insert_ticket(
                    $_POST["t_tit"],
                    $_POST["area_id"],
                    $_POST["emp_id"],
                    $_POST["t_phone"],
                    $_POST["cat_id"],
                    $_POST["scat_id"],
                    $_POST["t_desc"],
                    $t_equip
                );

                // 2. Obtenemos toda la información textual (nombres de categorías, áreas, etc.)
                $ticket_nuevo = $ticket->listarTicketID($t_id);
                $t = $ticket_nuevo[0];

                // 3. Construimos el mensaje inicial del historial
                $detalles = "<b>Ticket creado con la siguiente información:</b><br>";
                $detalles .= "Título: " . $t['t_tit'] . "<br>";
                $detalles .= "Área: " . $t['a_name'] . "<br>";
                $detalles .= "Categoría: " . $t['c_name'] . "<br>";
                $detalles .= "Subcategoría: " . $t['sc_name'] . "<br>";
                $detalles .= "Prioridad: " . $t['n_name'] . "<br>";
                $detalles .= "Estatus: " . $t['st_name'];
                if (!empty($t['t_equip'])) {
                    $detalles .= "<br>Equipo: " . $t['t_equip'];
                }

                // 4. Lo registramos en la tabla
                $ticket->insert_ticket_historial($t_id, $_POST["emp_id"], "Creación de Ticket", $detalles);

                echo json_encode(["success" => "Ticket creado correctamente."]);
            break;


            // =======================================================================
            // FUNCIONES PARA CONSULTAR LISTADO
            // =======================================================================

            case "listar_por_usuario": // Listar tickets por usuario
                // Capturamos el filtro si es que viene por POST
                $filtro = isset($_POST["filtro_estado"]) ? $_POST["filtro_estado"] : '';
                
                $datos = $ticket->listarTicketUsuario($_POST["emp_id"], $filtro);
                $data = Array();
                foreach($datos as $row){
                    $sub_array = array();
                    // Convertimos el número de ticket en un enlace que llama a la función JS
                    $sub_array[] = '<a href="javascript:void(0);" onClick="verTicket('.$row["t_id"].');" class="text-primary" style="text-decoration: none !important; border-bottom: none !important;">'.$row["t_num"].'</a>';
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
                    
                    $data[] = $sub_array;
                }

                $result = array(
                    "sEcho" => 1, //Información para el datatables
                    "iTotalRecords" => count($data), //Enviamos el total de registros al datatables
                    "iTotalDisplayRecords" => count($data), //Enviamos el total de registros a visualizar
                    "aaData" => $data);
                echo json_encode($result);
            break;

            case "listar_tickets": // Listar todos los tickets
                // Capturamos el filtro si es que viene por POST
                $filtro = isset($_POST["filtro_estado"]) ? $_POST["filtro_estado"] : '';
                
                $datos = $ticket->listarTicket($filtro);
                $data = Array();
                foreach($datos as $row){
                    $sub_array = array();
                    // Convertimos el número de ticket en un enlace
                    $sub_array[] = '<a href="javascript:void(0);" onClick="verTicket('.$row["t_id"].');" class="text-primary" style="text-decoration: none !important; border-bottom: none !important;">'.$row["t_num"].'</a>';
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

                    $data[] = $sub_array;
                }

                $result = array(
                    "sEcho" => 1, //Información para el datatables
                    "iTotalRecords" => count($data), //Enviamos el total de registros al datatables
                    "iTotalDisplayRecords" => count($data), //Enviamos el total de registros a visualizar
                    "aaData" => $data);
                echo json_encode($result);
            break;


            // =======================================================================
            // FUNCIONES PARA DETALLES
            // =======================================================================

            case "mostrar_detalles_ticket"; // Lista los tickets por ID

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
                        $output ["t_resolucion"] = $row["t_resolucion"];
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

            case "actualizar_detalles_ticket": // Actualizar los detalles de un ticket
                if (isset($_POST["t_id"]) && !empty($_POST["t_id"])) {

                    $t_id = $_POST["t_id"];
                    if (!verificarAccesoTicket($t_id, $_SESSION['e_id'], $_SESSION['area_id'])) {
                        echo json_encode(["error" => "Acceso Denegado."]);
                        break;
                    }

                    // 1. Obtenemos los datos ANTES de modificar
                    $ticket_antiguo = $ticket->listarTicketID($_POST["t_id"]);
                    $t_ant = $ticket_antiguo[0];
            
                    // 2. Ejecutar la actualización en SQL
                    if ($_POST["est_id"] == 6) {
                        $result = $ticket->update_ticket($_POST["t_id"], $_POST["t_tit"], $_POST["area_id"], $_POST["t_phone"], $_POST["cat_id"], $_POST["scat_id"], $_POST["niv_id"], $_POST["est_id"], $_POST["sest_id"], $_POST["t_desc"], null, $_POST["t_resolucion"], $_POST["t_close_user"]);
                    } else {
                        $result = $ticket->update_ticket($_POST["t_id"], $_POST["t_tit"], $_POST["area_id"], $_POST["t_phone"], $_POST["cat_id"], $_POST["scat_id"], $_POST["niv_id"], $_POST["est_id"], $_POST["sest_id"], $_POST["t_desc"], null, $_POST["t_resolucion"]);
                    }

                    if ($result > 0) {
                        
                        // 3. Obtenemos los datos NUEVOS para comparar
                        $ticket_nuevo = $ticket->listarTicketID($_POST["t_id"]);
                        $t_nue = $ticket_nuevo[0];

                        // 4. LÓGICA DE AUDITORÍA (Comparación de campos)
                        $cambios_ant = "";
                        $cambios_nue = "";

                        if ($t_ant['t_tit'] != $t_nue['t_tit']) {
                            $cambios_ant .= "Título: " . $t_ant['t_tit'] . "<br>";
                            $cambios_nue .= "Título: " . $t_nue['t_tit'] . "<br>";
                        }
                        if ($t_ant['a_name'] != $t_nue['a_name']) {
                            $cambios_ant .= "Área: " . $t_ant['a_name'] . "<br>";
                            $cambios_nue .= "Área: " . $t_nue['a_name'] . "<br>";
                        }
                        if ($t_ant['c_name'] != $t_nue['c_name']) {
                            $cambios_ant .= "Categoría: " . $t_ant['c_name'] . "<br>";
                            $cambios_nue .= "Categoría: " . $t_nue['c_name'] . "<br>";
                        }
                        if ($t_ant['sc_name'] != $t_nue['sc_name']) {
                            $cambios_ant .= "Subcategoría: " . $t_ant['sc_name'] . "<br>";
                            $cambios_nue .= "Subcategoría: " . $t_nue['sc_name'] . "<br>";
                        }
                        if ($t_ant['n_name'] != $t_nue['n_name']) {
                            $cambios_ant .= "Prioridad: " . $t_ant['n_name'] . "<br>";
                            $cambios_nue .= "Prioridad: " . $t_nue['n_name'] . "<br>";
                        }
                        if ($t_ant['st_name'] != $t_nue['st_name']) {
                            $cambios_ant .= "Estatus: " . $t_ant['st_name'] . "<br>";
                            $cambios_nue .= "Estatus: " . $t_nue['st_name'] . "<br>";
                        }
                        if ($t_ant['se_name'] != $t_nue['se_name']) {
                            $cambios_ant .= "Subestatus: " . $t_ant['se_name'] . "<br>";
                            $cambios_nue .= "Subestatus: " . $t_nue['se_name'] . "<br>";
                        }

                        // Si hubo al menos un cambio, construimos el texto y guardamos en historial
                        if ($cambios_nue != "") {
                            $detalles = "Se ha modificado la información del ticket.<br><br>";
                            $detalles .= "<b>Información actual:</b><br>" . $cambios_nue . "<br>";
                            $detalles .= "<b>Información anterior:</b><br>" . $cambios_ant;

                            $accion = "Actualización de Ticket";
                            if ($t_ant['est_id'] != 5 && $t_nue['est_id'] == 5) {
                                $accion = "Ticket marcado como Resuelto";
                            } else if ($t_ant['est_id'] != 6 && $t_nue['est_id'] == 6) {
                                $accion = "Cierre de Ticket";
                            } else if ($t_ant['est_id'] != 4 && $t_nue['est_id'] == 4) {
                                $accion = "Ticket Escalado";
                            }

                            $ticket->insert_ticket_historial($_POST["t_id"], $_SESSION["e_id"], $accion, $detalles);
                        }

                        // LÓGICA DE MENSAJE AUTOMÁTICO DE RESOLUCIÓN
                        if (($_POST["est_id"] == 5 || $_POST["est_id"] == 6) && ($t_ant['est_id'] != 5 && $t_ant['est_id'] != 6)) {
                            $mensaje_usuario = "<p>El ticket ha sido marcado como resuelto bajo el siguiente motivo:</p><br><p><em>\"" . $_POST["t_resolucion"] . "\"</em></p>";
                            $ticket->insert_ticket_mensaje($_POST["t_id"], $_SESSION["e_id"], $mensaje_usuario);
                        }

                        echo json_encode(["success" => "Ticket actualizado correctamente."]);
                    } else {
                        echo json_encode(["error" => "No se pudo actualizar el ticket."]);
                    }
                } else {
                    echo json_encode(["error" => "Falta el ID del ticket para actualizar."]);
                }
            break;


            // =======================================================================
            // FUNCIONES PARA NOTAS INTERNAS (SOLO SOPORTE)
            // =======================================================================

            case "insertar_nota": // Guarda las notas de Soporte
                // Verificamos que sea estrictamente personal de Soporte/Sistemas
                if ($_SESSION['area_id'] == 11 || $_SESSION['area_id'] == 12 || $_SESSION['area_id'] == 14) {
                    $ticket->insert_ticket_nota($_POST["tick_id"], $_POST["emp_id"], $_POST["tn_desc"]);
                    
                    // registramos en el historial que un técnico dejó una nota oculta
                    $ticket->insert_ticket_historial($_POST["tick_id"], $_POST["emp_id"], "Nota Interna Agregada", "Se agregó una nota privada de soporte.");
                    echo json_encode(["success" => "Nota guardada."]);
                } else {
                    echo json_encode(["error" => "Acceso Denegado."]);
                }
            break;

            case "listar_notas": // Lista las notas del ticket
                if ($_SESSION['area_id'] == 11 || $_SESSION['area_id'] == 12 || $_SESSION['area_id'] == 14) {
                    $datos = $ticket->listarTicketNotas($_POST["tick_id"]);
                    foreach($datos as $row) {
                        ?>
                            <article class="activity-line-item box-typical">
                                <div class="activity-line-date">
                                    <?php echo (new DateTime($row["tn_crea"]))->format('d M Y'); ?>
                                </div>
                                <header class="activity-line-item-header">
                                    <div class="activity-line-item-user-name">
                                        <i class="fa fa-lock text-muted" title="Nota Privada"></i> 
                                        <?php echo $row["e_name"]." ".$row["e_last1"]." ".$row["e_last2"]; ?>
                                    </div>
                                    <div class="activity-line-item-user-status">
                                        <?php echo $row["p_tit"]; ?>
                                    </div>
                                </header>
                                <div class="activity-line-action-list">
                                    <section class="activity-line-action">
                                        <div class="time"><?php echo (new DateTime($row["tn_crea"]))->format('h:i A'); ?></div>
                                        <div class="cont">
                                            <div class="cont-in" style="background-color: #fcf8e3; padding: 10px; border-left: 3px solid #f0ad4e;">
                                                <p><?php echo $row["tn_desc"]; ?></p>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </article>
                        <?php
                    }
                }
            break;


            // =======================================================================
            // FUNCIONES PARA MENSAJES
            // =======================================================================

            case "listar_mensajes": // Lista los mensajes del ticket

                // Verificar acceso al ticket
                $t_id = $_POST["tick_id"];
                if (!verificarAccesoTicket($t_id, $_SESSION['e_id'], $_SESSION['area_id'])) {
                    echo json_encode(["error" => "Acceso Denegado: No tienes permiso para ver este ticket."]);
                    break;
                }

                // Si tiene acceso, proceder a listar los mensajes
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

            case "insertar_mensaje": // Guardar mensajes del ticket en la Base de Datos

                // Verificar acceso al ticket
                $t_id = $_POST["tick_id"];
                if (!verificarAccesoTicket($t_id, $_SESSION['e_id'], $_SESSION['area_id'])) {
                    echo json_encode(["error" => "Acceso Denegado: No tienes permiso para ver este ticket."]);
                    break;
                }

                // Si tiene acceso, proceder a insertar el detalle
                $ticket->insert_ticket_mensaje(
                    $_POST["tick_id"],
                    $_POST["emp_id"],
                    $_POST["td_desc"]);
            break;


            // =======================================================================
            // FUNCIONES PARA EL HISTORIAL DE CAMBIOS
            // =======================================================================

            case "listar_historial":
                $datos = $ticket->listarTicketHistorial($_POST["tick_id"]);
                foreach($datos as $row) {
                    ?>
                        <article class="activity-line-item box-typical">
                            <div class="activity-line-date">
                                <?php echo (new DateTime($row["th_crea"]))->format('d M Y'); ?>
                            </div>
                            <header class="activity-line-item-header">
                                <div class="activity-line-item-user-name">
                                    <?php echo $row["e_name"]." ".$row["e_last1"]; ?> - 
                                    <span class="label label-default"><?php echo $row["th_accion"]; ?></span>
                                </div>
                            </header>
                            <div class="activity-line-action-list">
                                <section class="activity-line-action">
                                    <div class="time"><?php echo (new DateTime($row["th_crea"]))->format('h:i A'); ?></div>
                                    <div class="cont">
                                        <div class="cont-in text-muted">
                                            <p><?php echo $row["th_detalles"]; ?></p>
                                        </div>
                                    </div>
                                </section>
                            </div>
                        </article>
                    <?php
                }
            break;


            // =======================================================================
            // FUNCIONES PARA ESTADISTICAS EN DASHBOARD
            // =======================================================================

            case "total_tickets_globales": // Total de tickets creados
                $datos = $ticket->ticketsTotal();
                echo json_encode($datos);
            break;
            
            case "total_tickets_nuevos": // Total de tickets nuevos
                $datos = $ticket->ticketsNuevos();
                echo json_encode($datos);
            break;
            
            case "total_tickets_abiertos": // Total de tickets abiertos
                $datos = $ticket->ticketsAbiertos();
                echo json_encode($datos);
            break;
            
            case "total_tickets_cerrados": // Total de tickets cerrados
                $datos = $ticket->ticketsCerrados();
                echo json_encode($datos);
            break;

            case "total_tickets_usuario": // Total de tickets creados por usuario
                $datos = $ticket->ticketsUsuarioTotal($_POST["emp_id"]);
                echo json_encode($datos);
            break;

            case "total_tickets_abiertos_usuario": // Total de tickets abiertos por usuario
                $datos = $ticket->ticketsUsuarioAbiertos($_POST["emp_id"]);
                echo json_encode($datos);
            break;

            case "grafico_estadisticas";
                $datos = $ticket->get_ticket_grafico();
                echo json_encode($datos);
            break;
        }
    }
?>
