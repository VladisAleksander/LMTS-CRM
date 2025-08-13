<?php
    require_once '../../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../../view/Main/head.php'; ?>
        <title>TechCareMX :: Detalle del Ticket</title>
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
                                    <li><a href="../Soporte">Soporte</a></li>
                                    <li><a href="../ConsultarTicket">Tickets</a></li>
                                    <li class="active">Detalle del Ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>
                
                <?php
                    if ($_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) {
                        ?>
                            <section class="" id="lblticket"> <!-- Muestra los detalles de creación del ticket -->
                                <div class="box-typical box-typical-padding">
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
                                            <fieldset class="form-group">
                                                <label class="form-label semibold" for="t_tit">Título</label>
                                                <input type="text" class="form-control" id="t_tit" name="t_tit">
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <fieldset class="form-group">
                                                <label class="form-label semibold" for="td_det">Descripción detallada</label>
                                                <div class="summernote-theme-1">
                                                    <textarea id="td_det" class="summernote" name="td_det"></textarea>
                                                </div>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                                        </div>
                                    </div><!--.row-->
                                </div>
                            </section><!-- Ticket form -->
                        <?php
                    } else {
                        ?>
                            <section class="" id="lblticket"> <!-- Muestra los detalles de creación del ticket -->
                                <div class="box-typical box-typical-padding">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <fieldset class="form-group">
                                                <label class="form-label semibold" for="st_id">Estatus</label>
                                                <select id="st_id" disabled name="st_id" class="form-control">
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6">
                                            <fieldset class="form-group">
                                                <label class="form-label semibold" for="n_id">Prioridad</label>
                                                <select id="n_id" disabled name="n_id" class="form-control">
                                                </select>
                                            </fieldset>
                                        </div>
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

                <section class="activity-line" id="lbldetalle"> <!-- Muestra la actividad del ticket, incluyendo comentarios -->

                </section><!--.activity-line-->

                <div class="box-typical box-typical-padding"> <!-- Sección para agregar notas adicionales al ticket -->
                    <div class="row">
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="td_det2">Notas adicionales</label>
                                <div class="summernote-theme-1">
                                    <textarea id="td_det2" class="summernote" name="td_det2"></textarea>
                                </div>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <button type="button" id="btnEnviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
                            <button type="button" id="btnCerrarTicket" class="btn btn-rounded btn-inline btn-danger">Cerrar Ticket</button>
                        </div>
                    </div><!--.row-->
                </div><!-- Notas adicionales -->

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
