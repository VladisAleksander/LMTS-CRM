<?php
    require_once '../config/conexion.php';
    require_once '../modelos/Area.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../view/Main/head.php'; ?>
        <title>Perfil :: TechCareMX</title>
        <link rel="icon" href="../public/img/favicon.png" type="image/png">
    </head>
    <body class="with-side-menu">

        <?php   require_once '../view/Main/header.php'; ?>

        <div class="mobile-menu-left-overlay"></div>
        
        <?php   require_once '../view/Main/nav.php'; ?>

        <!-- Contenido de la página -->
        <div class="page-content">
            <div class="profile-header-photo gradient" style="background-image: url(../public/img/profile-bg.jpg)">
                <div class="profile-header-photo-in"> <!-- Encabezado del perfil con foto de portada -->
                    <div class="tbl-cell">
                        <div class="info-block">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-xl-9 col-xl-offset-3 col-lg-8 col-lg-offset-4 col-md-offset-0">
                                        <div class="tbl info-tbl">
                                            <div class="tbl-row">
                                                <div class="tbl-cell">
                                                    <p class="title"><?php echo $_SESSION["e_name"] ?> <?php echo $_SESSION["e_last1"] ?> <?php echo $_SESSION["e_last2"] ?></p>
                                                    <p>Puesto de Trabajo</p>
                                                </div>
                                                <div class="tbl-cell tbl-cell-stat">
                                                    <div class="inline-block">
                                                        <p class="title">2</p>
                                                        <p>Eventos futuros</p>
                                                    </div>
                                                </div>
                                                <div class="tbl-cell tbl-cell-stat">
                                                    <div class="inline-block">
                                                        <p class="title">10</p>
                                                        <p>Mensajes sin leer</p>
                                                    </div>
                                                </div>
                                                <div class="tbl-cell tbl-cell-stat">
                                                    <div class="inline-block">
                                                        <p class="title">3</p>
                                                        <p>Tickets abiertos</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button type="button" class="change-cover"> <!-- Botón para cambiar la foto de portada -->
                    <i class="font-icon font-icon-picture-double"></i>
                    Cambiar portada
                    <input type="file"/>
                </button>
            </div><!--.profile-header-photo-->

            <div class="container-fluid"> <!-- Contenedor principal -->
                <div class="row">
                    <div class="col-xl-3 col-lg-4"> <!-- Barra lateral del perfil -->
                        <aside class="profile-side">
                            <section class="box-typical profile-side-user"> <!-- Sección de información del usuario -->
                                <button type="button" class="avatar-preview avatar-preview-128">
                                    <img src="../public/img/avatar-2-256.png" alt=""/>
                                    <span class="update">
                                        <i class="font-icon font-icon-picture-double"></i>
                                        Actualizar foto
                                    </span>
                                    <input type="file"/>
                                </button>
                                <br>
                                <h5 class="profile-side-user-name"><?php echo $_SESSION["e_name"] ?> <?php echo $_SESSION["e_last1"] ?> <?php echo $_SESSION["e_last2"] ?></h5>
                                <div class="profile-side-user-prof">Puesto de Trabajo</div>
                                <!-- <br>
                                <button type="button" class="btn btn-rounded">Mensaje</button>
                                <div class="btn-group">
                                    <button type="button"
                                            class="btn btn-rounded btn-primary-outline dropdown-toggle"
                                            data-toggle="dropdown"
                                            aria-haspopup="true"
                                            aria-expanded="false">
                                        Seguir
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
                                    </div>
                                </div> -->
                            </section>

                            <section class="box-typical profile-side-stat"> <!-- Sección de estadísticas -->
                                <div class="tbl">
                                    <div class="tbl-row">
                                        <div class="tbl-cell">
                                            <span class="number">10</span>
                                            Mensajes sin leer
                                        </div>
                                        <div class="tbl-cell">
                                            <span class="number">3</span>
                                            Tickets abiertos
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="box-typical"> <!-- Sección de notas -->
                                <header class="box-typical-header-sm bordered">Notas</header>
                                <div class="box-typical-inner">
                                    <p>Alguna nota personal o recordatorio.</p>
                                </div>
                            </section>

                            <section class="box-typical"> <!-- Sección de acerca de -->
                                <header class="box-typical-header-sm bordered">Acerca de</header>
                                <div class="box-typical-inner">
                                    <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vestibulum id ligula porta felis euismod semper.</p>
                                </div>
                            </section>

                            <section class="box-typical"> <!-- Sección de información adicional -->
                                <header class="box-typical-header-sm bordered">Información</header>
                                <div class="box-typical-inner">
                                    <p class="line-with-icon">
                                        <i class="font-icon font-icon-pin-2"></i>
                                        Morelia, Michoacán
                                    </p>
                                    <p class="line-with-icon">
                                        <i class="font-icon font-icon-users-two"></i>
                                        Área de Trabajo
                                    </p>
                                    <p class="line-with-icon">
                                        <i class="font-icon font-icon-case-3"></i>
                                        Competencias Profesionales
                                    </p>
                                    <p class="line-with-icon">
                                        <i class="font-icon font-icon-learn"></i>
                                        Titulo Profesional
                                    </p>
                                    <p class="line-with-icon">
                                        <i class="font-icon font-icon-linkedin"></i>
                                        <a href="#">Usuario</a>
                                    </p>
                                    <p class="line-with-icon">
                                        <i class="font-icon font-icon-calend"></i>
                                        Inició hace 10 años
                                    </p>
                                </div>
                            </section>
                        </aside><!--.profile-side-->
                    </div>

                    <div class="col-xl-9 col-lg-8"> <!-- Contenido principal del perfil -->
                        <section class="tabs-section">
                            <div class="tabs-section-nav tabs-section-nav-left"> <!-- Navegación de pestañas -->
                                <ul class="nav" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tabs-2-tab-1" role="tab" data-toggle="tab">
                                            <span class="nav-link-in">Actividad</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tabs-2-tab-2" role="tab" data-toggle="tab">
                                            <span class="nav-link-in">Ajustes</span>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--.tabs-section-nav-->

                            <div class="tab-content no-styled profile-tabs">
                                <div role="tabpanel" class="tab-pane active" id="tabs-2-tab-1"> <!-- Contenido de la pestaña Actividad -->
                                    <section class="box-typical box-typical-padding">
                                        Notificaciones y actividad reciente.
                                    </section>
                                </div><!--.tab-pane-->
                                <div role="tabpanel" class="tab-pane" id="tabs-2-tab-2"> <!-- Contenido de la pestaña Ajustes -->
                                    <section class="box-typical profile-settings">
                                        <section class="box-typical-section"> <!-- Información básica -->
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">Nivel Académico</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <select id="pue_id" name="pue_id" class="form-control" required>
                                                        <option value="" disabled selected>- Seleccione una opción -</option>
                                                        <option value="">Bachillerato</option>
                                                        <option value="">Técnico Superior Universitario</option>
                                                        <option value="">Licenciatura</option>
                                                        <option value="">Maestría</option>
                                                        <option value="">Doctorado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">Nombre</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input class="form-control" type="text" disabled value="<?php echo $_SESSION["e_name"] ?> <?php echo $_SESSION["e_last1"] ?> <?php echo $_SESSION["e_last2"] ?>"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">Puesto</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input class="form-control" type="text" disabled value="Puesto en la empresa"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">Notas personales</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <textarea class="form-control">Alguna nota personal o recordatorio.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">Acerca de</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <textarea rows="2" class="form-control">Maecenas sed diam eget risus varius blandit sit amet non magna. Vestibulum id ligula porta felis euismod semper.</textarea>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="box-typical-section"> <!-- Información adicional -->
                                            <header class="box-typical-header-sm">Información adicional</header>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">
                                                        <i class="font-icon font-icon-pin-2"></i>
                                                        Ciudad
                                                    </label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <input class="form-control" type="text" value="Morelia, Michoacán"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">
                                                        <i class="font-icon font-icon-users-two"></i>
                                                        Área
                                                    </label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <input class="form-control" type="text" value="Área en la empresa"/> <!-- Obtener el área desde la sesión o base de datos -->
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">
                                                        <i class="font-icon font-icon-case-3"></i>
                                                        Habilidades
                                                    </label>
                                                </div>
                                                <div class="col-xl-6">
                                                    <input class="form-control" type="text" value="Competencias Profesionales"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">
                                                        <i class="font-icon font-icon-learn"></i>
                                                        Educación
                                                    </label>
                                                </div>
                                                <div class="col-xl-6">
                                                    <input class="form-control" type="text" value="Titulo Profesional"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">
                                                        <i class="font-icon font-icon-linkedin"></i>
                                                        LinkedIn
                                                    </label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <input class="form-control" type="text" value="Usuario"/>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="box-typical-section profile-settings-btns"> <!-- Botones Guardar/Cancelar -->
                                            <button type="submit" class="btn btn-rounded">Guardar</button>
                                            <button type="button" class="btn btn-rounded btn-grey">Cancelar</button>
                                        </section>
                                    </section>
                                </div><!--.tab-pane-->
                            </div><!--.tab-content-->
                        </section><!--.tabs-section-->
                    </div>
                </div><!--.row-->
            </div><!--.container-fluid-->
        </div><!--Contenido de la página-->
        
        <?php   require_once '../view/Main/js.php'; ?>
        <script type="text/javascript" src="../public/js/profile/profile.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
