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
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Detalle del Ticket</h3>
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
                
                <div class="box-typical box-typical-padding">
                    <div class="row">
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="text">Nombre del usuario</label>
                                <input type="hidden" id="emp_id" name="emp_id" value="<?php echo $_SESSION["e_id"] ?>"> <!-- ID del empleado -->
                                <input type="text" disabled class="form-control" id="usuario-select" value="<?php echo $_SESSION["e_name"].' '.$_SESSION["e_last1"].' '.$_SESSION["e_last2"]?>"><!-- Muestra el nombre compledo del empleado -->
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="area_id">Canal de Contacto</label>
                                <select id="area_id" name="area_id" class="form-control" required>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="t_phone">Teléfono de contacto</label>
                                <input type="phone" class="form-control" name="t_phone" id="t_phone" value="">
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
                                <label class="form-label semibold" for="Email">Correo Electrónico</label>
                                <input id="Email" type="email" disabled class="form-control" value="<?php echo $_SESSION["e_mail"] ?>">
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
                                <label class="form-label semibold" for="area_id">Área</label>
                                <select id="area_id" name="area_id" class="form-control" required>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="area_id">Estatus</label>
                                <select id="area_id" name="area_id" class="form-control" required>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="text">Contacto Alternativo</label>
                                <input type="text" class="form-control" id="usuario-select" value=""><!-- Muestra el nombre compledo del empleado -->
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="area_id">Subestatus</label>
                                <select id="area_id" name="area_id" class="form-control" required>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="t_phone">Teléfono alternativo de contacto</label>
                                <input type="phone" class="form-control" name="t_phone" id="t_phone" value="">
                            </fieldset>
                        </div>
                        <div class="col-lg-6">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="area_id">Prioridad</label>
                                <select id="area_id" name="area_id" class="form-control" required>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="t_tit">Descripción corta</label>
                                <input type="text" class="form-control" id="t_tit" name="t_tit" required>
                            </fieldset>
                        </div>
                        <div class="col-lg-12">
                            <fieldset class="form-group">
                                <label class="form-label semibold" for="t_desc">Descripción detallada</label>
                                <div class="summernote-theme-1">
                                    <textarea id="t_desc" class="summernote" name="t_desc" required></textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div><!--.row-->
                </div>

                <section class="activity-line" id="lbldetalle">
                    
                </section><!--.activity-line-->

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
