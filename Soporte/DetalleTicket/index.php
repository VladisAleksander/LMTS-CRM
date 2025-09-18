<?php
    require_once '../../config/conexion.php';
    require_once '../../modelos/Ticket.php';
    $ticket_obj = new Ticket(); // Crea una instancia del objeto Ticket
    if (isset($_GET['id'])) { // Verifica si se ha proporcionado un ID de ticket
        $ticket_data = $ticket_obj->listarTicketID($_GET['id']); // Obtiene los datos del ticket por ID
        if (is_array($ticket_data) && count($ticket_data) > 0) { // Verifica si se encontraron datos
            $ticket = $ticket_data[0]; // Asigna el primer elemento del array a la variable $ticket
            // Verificación de acceso al ticket
            if ($_SESSION['area_id'] != 11 && $_SESSION['area_id'] != 12 && $_SESSION['area_id'] != 14) { // No es Sistemas, Soporte, ni Desarrollador
                if ($ticket['emp_id'] != $_SESSION['e_id']) { // No es el creador del ticket
                    // Redirigir a página de tickets o mostrar error
                    header('Location: ../ConsultarTicket?error=ACCESO_DENEGADO');
                    exit;
                }
            }
        } else {
            // Manejar error si no se encuentra el ticket
            header('Location: ../ConsultarTicket');
            exit;
        }
    } else {
        // Manejar error si no hay ID
        header('Location: ../ConsultarTicket');
        exit;
    }
    if (isset($_SESSION['e_id'])) { // Verifica si el usuario ha iniciado sesión
?>

<?php   require_once '../../view/Main/head.php'; ?> <!-- Incluye el archivo de encabezado HTML -->
        <title>Detalle del Ticket :: TechCareMX</title>
    </head>
    <body class="with-side-menu">

        <?php   require_once '../../view/Main/header.php'; ?>

        <div class="mobile-menu-left-overlay"></div>
        
        <?php   require_once '../../view/Main/nav.php'; ?>

        <!-- Contenido de la página -->
        <div class="page-content">
            <div class="container-fluid">
                <header class="section-header"> <!-- Encabezado de la sección con la información más relevante del ticket -->
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3 id="lblnumtick">Detalle del Ticket - </h3> <!-- Muestra el número del ticket -->
                                <span id="lblestado"></span> <!-- Muestra el estado del ticket (Abierto, Cerrado, etc.) -->
                                <span class="label label-pill label-default" id="iblfechacrea"></span> <!-- Muestra la fecha de creación del ticket -->
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../../Home">Inicio</a></li>
                                    <li><a href="../../Soporte">Soporte</a></li>
                                    <li><a href="../ConsultarTicket">Tickets</a></li>
                                    <li class="active">Detalle del Ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>
                
                <?php
                    if ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) { // Si el usuario pertenece a Sistemas, Soporte o Desarrollador, muestra el formulario editable del ticket
                        ?>
                            <section class="" id="lblticket"> <!-- Muestra los detalles de creación del ticket -->
                                <div class="box-typical box-typical-padding">
                                    <form id="form_ticket">
                                        <input type="hidden" id="is_editable" value="<?php echo ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) ? 'true' : 'false'; ?>">
                                        <input type="hidden" id="e_idx" value="<?php echo $_SESSION['e_id']; ?>">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="text">Nombre del usuario</label>
                                                    <input type="text" disabled class="form-control" id="lblusuario"><!-- Muestra el nombre compledo del empleado -->
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="Email">Correo Electrónico</label>
                                                    <input type="email" disabled class="form-control" id="lblemail" >
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="t_phone">Teléfono de contacto</label>
                                                    <input type="phone" class="form-control" name="t_phone" id="t_phone">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-6">
                                                <fieldset class="form-group">
                                                    <label class="form-label semibold" for="area_id">Área</label>
                                                    <select id="area_id" name="area_id" class="form-control">
                                                    </select>
                                                </fieldset>
                                            </div>
                                        </div><!--.row-->
                                    </form>
                                </div>
                            </section><!-- Ticket form -->
                        <?php
                    } else { // Si el usuario no pertenece a esas áreas, muestra el formulario no editable del ticket
                        ?>
                            <section class="" id="lblticket"> <!-- Muestra los detalles de creación del ticket -->
                                <div class="box-typical box-typical-padding">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <fieldset class="form-group">
                                                <label class="form-label semibold" for="t_tit">Título</label>
                                                <input type="text" disabled class="form-control" id="t_tit" name="t_tit">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset class="form-group">
                                                <label class="form-label semibold" for="td_det">Descripción detallada</label>
                                                <textarea id="td_det" disabled class="summernote" name="td_det"></textarea>
                                            </fieldset>
                                        </div>
                                    </div><!--.row-->
                                </div>
                            </section><!-- Ticket form -->
                        <?php
                    }
                ?>

                <?php
                    if ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) { // Si el usuario pertenece a Sistemas, Soporte o Desarrollador, muestra las pestañas con información adicional del ticket
                        ?>
                            <section class="tabs-section">
                                <div class="tabs-section-nav tabs-section-nav-left"> <!-- Navegación de pestañas -->
                                    <ul class="nav" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#tabs-2-tab-1" role="tab" data-toggle="tab">
                                                <span class="nav-link-in">Detalles</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tabs-2-tab-2" role="tab" data-toggle="tab">
                                                <span class="nav-link-in">Resolución</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tabs-2-tab-3" role="tab" data-toggle="tab">
                                                <span class="nav-link-in">Notas</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tabs-2-tab-4" role="tab" data-toggle="tab">
                                                <span class="nav-link-in">Mensajes</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tabs-2-tab-5" role="tab" data-toggle="tab">
                                                <span class="nav-link-in">Partes</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tabs-2-tab-6" role="tab" data-toggle="tab">
                                                <span class="nav-link-in">Equipo</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#tabs-2-tab-7" role="tab" data-toggle="tab">
                                                <span class="nav-link-in">Historial</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div><!--.tabs-section-nav-->

                                <div class="tab-content no-styled profile-tabs"> <!-- Contenido de las pestañas -->
                                    <div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1"> <!-- Contenido de la pestaña Detalles -->
                                        <section class="" id="lblticket"> <!-- Muestra los detalles de creación del ticket -->
                                            <div class="box-typical box-typical-padding">
                                                <form id="form_ticket">
                                                    <input type="hidden" id="is_editable" value="<?php echo ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) ? 'true' : 'false'; ?>">
                                                    <input type="hidden" id="e_idx" value="<?php echo $_SESSION['e_id']; ?>">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="t_tit">Título</label>
                                                                <input type="text" class="form-control" id="t_tit" name="t_tit">
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="td_det">Descripción detallada</label>
                                                                <div class="summernote-theme-1">
                                                                    <textarea id="td_det" class="summernote" name="td_det" <?php if ($ticket["est_id"] == 6) echo 'disabled'; ?>></textarea>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="cat_id">Categoría</label>
                                                                <select id="cat_id" name="cat_id" class="form-control" required>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="scat_id">Subcategoría</label>
                                                                <select id="scat_id" name="scat_id" class="form-control" required>
                                                                    <option value="" disabled selected>- Seleccione una subcategoría -</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="st_id">Estatus</label>
                                                                <select id="st_id" name="st_id" class="form-control" required>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="se_id">Subestatus</label>
                                                                <select id="se_id" name="se_id" class="form-control" required>
                                                                    <option value="" disabled selected>- Seleccione un subestatus -</option>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="n_id">Prioridad</label>
                                                                <select id="n_id" name="n_id" class="form-control" required>
                                                                </select>
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <button type="button" id="btnGuardar" name="action" value="update" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                                                        </div>
                                                    </div><!--.row-->
                                                </form>
                                            </div>
                                        </section><!-- Ticket form -->
                                    </div><!--.tab-pane-->

                                    <div role="tabpanel" class="tab-pane" id="tabs-2-tab-2"> <!-- Contenido de la pestaña Resolución -->
                                        <section class="" id="lblticket"> <!-- Muestra los detalles de creación del ticket -->
                                            <div class="box-typical box-typical-padding">
                                                <form id="form_ticket">
                                                    <input type="hidden" id="is_editable" value="<?php echo ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) ? 'true' : 'false'; ?>">
                                                    <input type="hidden" id="e_idx" value="<?php echo $_SESSION['e_id']; ?>">
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="date">Fecha de cierre</label>
                                                                <input type="date" disabled class="form-control" id="t_close"><!-- Muestra la fecha en que se cerró el ticket -->
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="text">Cerrado por</label>
                                                                <input type="text" disabled class="form-control" id="t_close_user"><!-- Muestra el nombre compledo del empleado que cerró el ticket -->
                                                            </fieldset>
                                                        </div>
                                                        <div class="col-lg-12">
                                                            <fieldset class="form-group">
                                                                <label class="form-label semibold" for="td_res_notes">Descripción detallada</label>
                                                                <div class="summernote-theme-1">
                                                                    <textarea id="td_res_notes" class="summernote" name="td_res_notes" <?php if ($ticket["est_id"] == 6) echo 'disabled'; ?>></textarea>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div><!--.row-->
                                                </form>
                                            </div>
                                        </section><!-- Ticket form -->
                                    </div><!--.tab-pane-->

                                    <div role="tabpanel" class="tab-pane" id="tabs-2-tab-3"> <!-- Contenido de la pestaña Notas -->
                                        <?php if ($ticket["est_id"] != 6) { ?> <!-- Si el estado del ticket no es 6 (Cerrado), muestra la sección para agregar notas adicionales -->
                                            <div id="notes_section" class="box-typical box-typical-padding"> <!-- Sección para agregar notas adicionales al ticket -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <fieldset class="form-group">
                                                            <label class="form-label semibold" for="td_notes">Notas adicionales</label>
                                                            <div class="summernote-theme-1">
                                                                <textarea id="td_notes" class="summernote" name="td_notes"></textarea>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="button" id="btnSaveNotes" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                                                    </div>
                                                </div><!--.row-->
                                            </div><!-- Notas adicionales -->
                                        <?php } ?>

                                        <section class="box-typical-padding activity-line" id="support_notes">
                                            <!-- Contenido dinámico cargado por JavaScript -->
                                        </section>
                                    </div><!--.tab-pane-->

                                    <div role="tabpanel" class="tab-pane" id="tabs-2-tab-4"> <!-- Contenido de la pestaña Mensajes -->
                                        <?php if ($ticket["est_id"] != 6) { ?> <!-- Si el estado del ticket no es 6 (Cerrado), muestra la sección para agregar notas adicionales -->
                                            <div id="notes_section" class="box-typical box-typical-padding"> <!-- Sección para agregar notas adicionales al ticket -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <fieldset class="form-group">
                                                            <label class="form-label semibold" for="td_message">Notas y mensajes para el usuario</label>
                                                            <div class="summernote-theme-1">
                                                                <textarea id="td_message" class="summernote" name="td_message"></textarea>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <button type="button" id="btnEnviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
                                                    </div>
                                                </div><!--.row-->
                                            </div><!-- Notas adicionales -->
                                        <?php } ?>

                                        <section class="box-typical-padding activity-line" id="lbldetalle">
                                            <!-- Contenido dinámico cargado por JavaScript -->
                                        </section>
                                    </div><!--.tab-pane-->

                                    <div role="tabpanel" class="tab-pane" id="tabs-2-tab-5"> <!-- Contenido de la pestaña Partes -->
                                        <section class="box-typical box-typical-padding">
                                            Partes requeridas para la resolución del ticket
                                        </section>
                                    </div><!--.tab-pane-->

                                    <div role="tabpanel" class="tab-pane" id="tabs-2-tab-6"> <!-- Contenido de la pestaña Equipo -->
                                        <section class="box-typical box-typical-padding">
                                            Detalles del equipo asociado al ticket
                                        </section>
                                    </div><!--.tab-pane-->

                                    <div role="tabpanel" class="tab-pane" id="tabs-2-tab-7"> <!-- Contenido de la pestaña Historial -->
                                        <section class="box-typical box-typical-padding">
                                            Historial de cambios del ticket
                                        </section>
                                    </div><!--.tab-pane-->
                                </div><!--.tab-content-->
                            </section><!--.tabs-section-->
                        <?php
                    } else { // Si el usuario no pertenece a esas áreas, muestra solamente los mensajes de actividad del ticket
                        ?>
                            <?php if ($ticket["est_id"] != 6) { ?> <!-- Si el estado del ticket no es 6 (Cerrado), muestra la sección para agregar notas adicionales -->
                                <div id="notes_section" class="box-typical box-typical-padding"> <!-- Sección para agregar notas adicionales al ticket -->
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <fieldset class="form-group">
                                                <label class="form-label semibold" for="td_det2">Mensajes adicionales</label>
                                                <div class="summernote-theme-1">
                                                    <textarea id="td_det2" class="summernote" name="td_det2"></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="button" id="btnEnviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
                                        </div>
                                    </div><!--.row-->
                                </div><!-- Notas adicionales -->
                            <?php } ?>

                            <section class="box-typical-padding activity-line" id="lbldetalle">
                                <!-- Contenido dinámico cargado por JavaScript -->
                            </section>
                        <?php
                    }
                ?>

            </div><!--.container-fluid-->
        </div><!--Contenido de la página-->
        <?php   require_once '../../view/Main/js.php'; ?>
        <script type="text/javascript" src="../../public/js/tickets/detalle.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
