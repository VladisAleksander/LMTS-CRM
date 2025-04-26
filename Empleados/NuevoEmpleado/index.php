<?php
    require_once '../../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../../view/Main/head.php'; ?>
        <title>El Punto :: Nuevo Empleado</title>
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
                                <h3>Nuevo Empleado</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../../Home">Inicio</a></li>
                                    <li><a href="../">Empleados</a></li>
                                    <li class="active">Nuevo Empleado</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">
                    <form method="post" id="employee-form" name="employee-form">
                        <p class="with-border">Realiza el alta de un nuevo empleado</p>

                        <h5 class="m-t-lg with-border semibold">Información personal del empleado</h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_name">Nombre</label>
                                    <input type="text" class="form-control" id="e_name" name="e_name" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_last1">Apellido Paterno</label>
                                    <input type="text" class="form-control" id="e_last1" name="e_last1" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_last2">Apellido Materno</label>
                                    <input type="text" class="form-control" id="e_last2" name="e_last2">
                                </fieldset>
                            </div>

                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_phone">Teléfono de contacto</label>
                                    <input type="phone" class="form-control" name="e_phone" id="e_phone" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_pass">Contraseña</label>
                                    <input type="password" class="form-control" name="e_pass" id="e_pass" required>
                                </fieldset>
                            </div>
                            <div class="col-lg-4">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="e_stat">Estatus</label>
                                    <select id="e_stat" name="e_stat" class="form-control" required>
                                        <option value="" disabled selected>- Seleccione un puesto -</option>
                                        <option value="1" disabled selected>Activo</option>
                                        <option value="0" disabled selected>Inactivo</option>
                                    </select>
                                </fieldset>
                            </div>
                        </div><!--.row-->

                        <h5 class="m-t-lg with-border semibold">Área y puesto en la empresa</h5>
                        <div class="row">
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="area_id">Área</label>
                                    <select id="area_id" name="area_id" class="form-control" required>
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-lg-6">
                                <fieldset class="form-group">
                                    <label class="form-label semibold" for="pue_id">Puesto</label>
                                    <select id="pue_id" name="pue_id" class="form-control" required>
                                        <option value="" disabled selected>- Seleccione un puesto -</option>
                                    </select>
                                </fieldset>
                            </div>

                            <div class="col-lg-12">
                                <button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
                            </div>
                        </div><!--.row-->
                    </form><!-- ticket form -->
                </div>
            </div><!--.container-fluid-->
        </div><!--Contenido de la página-->
        <?php   require_once '../../view/Main/js.php'; ?>
        <script type="text/javascript" src="newemployee.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
