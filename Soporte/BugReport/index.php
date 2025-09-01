<?php
    require_once '../../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../../view/Main/head.php'; ?>
        <title>Reportar Error :: TechCareMX</title>
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
                                <h3>Reporte de Error en el Sistema</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../../Home">Inicio</a></li>
                                    <li><a href="../../Soporte">Soporte</a></li>
                                    <li class="active">Reportar Error</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>
                
                <section class="box-typical box-typical-padding">
                    <form id="form_reporte_error">
                        <input type="hidden" id="e_idx" value="<?php echo $_SESSION['e_id']; ?>">
                        <div class="row">
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_tit">Título del Error</label>
                                    <input type="text" class="form-control" id="e_tit" name="e_tit" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_desc">Descripción Detallada</label>
                                    <div class="summernote-theme-1">
                                        <textarea id="e_desc" class="summernote" name="e_desc" required></textarea>
                                    </div>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_pasos">Pasos para Reproducir</label>
                                    <textarea class="form-control" id="e_pasos" name="e_pasos" rows="5" required></textarea>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_so">Sistema Operativo</label>
                                    <select id="e_so" name="e_so" class="form-control" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="Windows">Windows</option>
                                        <option value="macOS">macOS</option>
                                        <option value="Linux">Linux</option>
                                        <option value="Android">Android</option>
                                        <option value="iOS">iOS</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_navegador">Navegador y Versión</label>
                                    <input type="text" class="form-control" id="e_navegador" name="e_navegador" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_dispositivo">Dispositivo</label>
                                    <select id="e_dispositivo" name="e_dispositivo" class="form-control" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="Desktop">Desktop</option>
                                        <option value="Laptop">Laptop</option>
                                        <option value="Tablet">Tablet</option>
                                        <option value="Mobile">Mobile</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_prioridad">Prioridad</label>
                                    <select id="e_prioridad" name="e_prioridad" class="form-control" required>
                                        <option value="" disabled selected>Seleccione...</option>
                                        <option value="Critica">Crítica</option>
                                        <option value="Alta">Alta</option>
                                        <option value="Media">Media</option>
                                        <option value="Baja">Baja</option>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_adjuntos">Adjuntos (Capturas, Videos, etc.)</label>
                                    <input type="file" id="e_adjuntos" name="e_adjuntos[]" multiple>
                                </fieldset>
                            </div>
                            <div class="col-lg-12">
                                <button type="button" id="btnEnviarReporte" class="btn btn-rounded btn-inline btn-primary">Enviar Reporte</button>
                            </div>
                        </div><!--.row-->
                    </form>
                </section>

            </div><!--.container-fluid-->
        </div><!--Contenido de la página-->
        <?php   require_once '../../view/Main/js.php'; ?>
        <script type="text/javascript" src="../../public/js/reportes/error.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>