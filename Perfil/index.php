<?php
    require_once '../config/conexion.php';
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
                                                        <p class="title">23</p>
                                                        <p>seguidores</p>
                                                    </div>
                                                </div>
                                                <div class="tbl-cell tbl-cell-stat">
                                                    <div class="inline-block">
                                                        <p class="title">938</p>
                                                        <p>Fotos</p>
                                                    </div>
                                                </div>
                                                <div class="tbl-cell tbl-cell-stat">
                                                    <div class="inline-block">
                                                        <p class="title">18</p>
                                                        <p>Videos</p>
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
                                            <span class="number">9854</span>
                                            seguidores
                                        </div>
                                        <div class="tbl-cell">
                                            <span class="number">112</span>
                                            Siguiendo
                                        </div>
                                    </div>
                                </div>
                            </section>

                            <section class="box-typical"> <!-- Sección de acerca de -->
                                <header class="box-typical-header-sm bordered">Acerca de</header>
                                <div class="box-typical-inner">
                                    <p>Maecenas sed diam eget risus varius blandit sit amet non magna. Vestibulum id ligula porta felis euismod semper.</p>
                                </div>
                            </section>

                            <section class="box-typical"> <!-- Sección de recomendaciones -->
                                <header class="box-typical-header-sm bordered">Recomendaciones</header>
                                <div class="box-typical-inner">
                                    <p>Alguna otra opción</p>
                                    <p>Aplicaciones conectadas</p>
                                    <p>Fotos</p>
                                    <p>Más reciente</p>
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
                                        <i class="font-icon font-icon-github"></i>
                                        <a href="#">Usuario</a>
                                    </p>
                                    <p class="line-with-icon">
                                        <i class="font-icon font-icon-earth"></i>
                                        <a href="#">sitioweb.com</a>
                                    </p>
                                    <p class="line-with-icon">
                                        <i class="font-icon font-icon-calend"></i>
                                        Inició hace 10 años
                                    </p>
                                </div>
                            </section>

                            <section class="box-typical"> <!-- Sección de habilidades -->
                                <header class="box-typical-header-sm bordered">Habilidades</header>
                                <div class="box-typical-inner">
                                    <div class="progress-compact-style">
                                        <div class="progress-header">
                                            <div class="progress-lbl">AngularJS</div>
                                            <div class="progress-val">75%</div>
                                        </div>
                                        <progress class="progress progress-aquamarine" value="75" max="100">750%</progress>
                                    </div>
                                    <div class="progress-compact-style">
                                        <div class="progress-header">
                                            <div class="progress-lbl">Javascript</div>
                                            <div class="progress-val">100%</div>
                                        </div>
                                        <progress class="progress progress-danger" value="100" max="100">100%</progress>
                                    </div>
                                    <div class="progress-compact-style">
                                        <div class="progress-header">
                                            <div class="progress-lbl">Wordpress</div>
                                            <div class="progress-val">50%</div>
                                        </div>
                                        <progress class="progress progress-info" value="50" max="100">50%</progress>
                                    </div>
                                    <div class="progress-compact-style">
                                        <div class="progress-header">
                                            <div class="progress-lbl">HTML &amp; CSS</div>
                                            <div class="progress-val">10%</div>
                                        </div>
                                        <progress class="progress" value="10" max="100">10%</progress>
                                    </div>
                                </div>
                            </section>
                        </aside><!--.profile-side-->
                    </div>

                    <div class="col-xl-9 col-lg-8"> <!-- Contenido principal del perfil -->
                        <section class="tabs-section">
                            <div class="tabs-section-nav tabs-section-nav-left"> <!-- Navegación de pestañas -->
                                <ul class="nav" role="tablist">
                                    <!-- <li class="nav-item">
                                        <a class="nav-link active" href="#tabs-2-tab-1" role="tab" data-toggle="tab">
                                            <span class="nav-link-in">Publicaciones</span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link active" href="#tabs-2-tab-2" role="tab" data-toggle="tab">
                                            <span class="nav-link-in">Actividad</span>
                                        </a>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link" href="#tabs-2-tab-3" role="tab" data-toggle="tab">
                                            <span class="nav-link-in">Proyectos</span>
                                        </a>
                                    </li> -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#tabs-2-tab-4" role="tab" data-toggle="tab">
                                            <span class="nav-link-in">Ajustes</span>
                                        </a>
                                    </li>
                                </ul>
                            </div><!--.tabs-section-nav-->

                            <div class="tab-content no-styled profile-tabs">
                                <div role="tabpanel" class="tab-pane" id="tabs-2-tab-1"> <!-- Contenido de la pestaña Publicaciones -->
                                    <form class="box-typical"> <!-- Formulario para escribir una nueva publicación -->
                                        <input type="text" class="write-something" placeholder="¿Qué pasa por tu mente?"/>
                                        <div class="box-typical-footer">
                                            <div class="tbl">
                                                <div class="tbl-row">
                                                    <div class="tbl-cell">
                                                        <button type="button" class="btn-icon">
                                                            <i class="font-icon font-icon-earth"></i>
                                                        </button>
                                                        <button type="button" class="btn-icon">
                                                            <i class="font-icon font-icon-picture"></i>
                                                        </button>
                                                        <button type="button" class="btn-icon">
                                                            <i class="font-icon font-icon-calend"></i>
                                                        </button>
                                                        <button type="button" class="btn-icon">
                                                            <i class="font-icon font-icon-video-fill"></i>
                                                        </button>
                                                    </div>
                                                    <div class="tbl-cell tbl-cell-action">
                                                        <button type="submit" class="btn btn-rounded">Enviar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form><!--.box-typical-->

                                    <article class="box-typical profile-post"> <!-- Publicación con comentarios -->
                                        <div class="profile-post-header">
                                            <div class="user-card-row">
                                                <div class="tbl-row">
                                                    <div class="tbl-cell tbl-cell-photo">
                                                        <a href="#">
                                                            <img src="../public/img/photo-64-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tbl-cell">
                                                        <div class="user-card-row-name"><a href="#">Tim Collins</a></div>
                                                        <div class="color-blue-grey-lighter">3 days ago - 23 min read</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="shared">
                                                <i class="font-icon font-icon-share"></i>
                                            </a>
                                        </div>
                                        <div class="profile-post-content">
                                            <p class="profile-post-content-note">Subminted a new post</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                        </div>
                                        <div class="box-typical-footer profile-post-meta">
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-heart"></i>
                                                45 Like
                                            </a>
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-comment"></i>
                                                18 Comment
                                            </a>
                                        </div>
                                        <div class="comment-rows-container hover-action scrollable-block">
                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/photo-64-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Eric Fox</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/avatar-2-64.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Vasilisa</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Yes!</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/avatar-2-64.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Vasilisa</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy...</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                    <div class="comment-row-item quote">
                                                        <div class="avatar-preview avatar-preview-32">
                                                            <a href="#">
                                                                <img src="../public/img/photo-64-2.jpg" alt="">
                                                            </a>
                                                        </div>
                                                        <div class="tbl comment-row-item-header">
                                                            <div class="tbl-row">
                                                                <div class="tbl-cell tbl-cell-name">Adam Oliver</div>
                                                                <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                            </div>
                                                        </div>
                                                        <div class="comment-row-item-content">
                                                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet...</p>
                                                        </div>
                                                    </div><!--.comment-row-item-->
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/photo-64-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Henry Olson</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit.</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/photo-64-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Henry Olson</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/avatar-2-64.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Vasilisa</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>No!</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/avatar-2-64.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Vasilisa</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed...</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/photo-64-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Roger Dunn</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Lorem ipsum dolor sit amet</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/photo-64-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Lorem ipsum dolor sit amet</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/avatar-2-64.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Vasilisa</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Yes!</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/avatar-2-64.png" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Vasilisa</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->

                                            <div class="comment-row-item">
                                                <div class="avatar-preview avatar-preview-32">
                                                    <a href="#">
                                                        <img src="../public/img/photo-64-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="tbl comment-row-item-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-name">Eric Fox</div>
                                                        <div class="tbl-cell tbl-cell-date">04.07.15, 20:02 PM</div>
                                                    </div>
                                                </div>
                                                <div class="comment-row-item-content">
                                                    <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt</p>
                                                    <button type="button" class="comment-row-item-action edit">
                                                        <i class="font-icon font-icon-pencil"></i>
                                                    </button>
                                                    <button type="button" class="comment-row-item-action del">
                                                        <i class="font-icon font-icon-trash"></i>
                                                    </button>
                                                </div>
                                            </div><!--.comment-row-item-->
                                        </div><!--.comment-rows-container-->
                                        <input type="text" class="write-something" placeholder="Leave a comment"/>
                                        <div class="box-typical-footer">
                                            <div class="tbl">
                                                <div class="tbl-row">
                                                    <div class="tbl-cell">
                                                        <button type="button" class="btn-icon">
                                                            <i class="font-icon font-icon-earth"></i>
                                                        </button>
                                                        <button type="button" class="btn-icon">
                                                            <i class="font-icon font-icon-picture"></i>
                                                        </button>
                                                        <button type="button" class="btn-icon">
                                                            <i class="font-icon font-icon-calend"></i>
                                                        </button>
                                                        <button type="button" class="btn-icon">
                                                            <i class="font-icon font-icon-video-fill"></i>
                                                        </button>
                                                    </div>
                                                    <div class="tbl-cell tbl-cell-action">
                                                        <button type="submit" class="btn btn-rounded">Send</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </article>

                                    <article class="box-typical profile-post"> <!-- Publicación individual -->
                                        <div class="profile-post-header">
                                            <div class="user-card-row">
                                                <div class="tbl-row">
                                                    <div class="tbl-cell tbl-cell-photo">
                                                        <a href="#">
                                                            <img src="../public/img/photo-64-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tbl-cell">
                                                        <div class="user-card-row-name"><a href="#">Tim Collins</a></div>
                                                        <div class="color-blue-grey-lighter">3 days ago - 23 min read</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="shared">
                                                <i class="font-icon font-icon-share"></i>
                                            </a>
                                        </div>
                                        <div class="profile-post-content">
                                            <p class="profile-post-content-note">Añadió 4 fotos nuevas</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                            <div class="profile-post-gall-fluid profile-post-gall-grid" data-columns>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-1" href="img/gall-img-1.jpg">
                                                        <img src="../public/img/gall-img-1.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-1" href="img/gall-img-2.jpg">
                                                        <img src="../public/img/gall-img-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-1" href="img/gall-img-3.jpg">
                                                        <img src="../public/img/gall-img-3.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-1" href="img/gall-img-4.jpg">
                                                        <img src="../public/img/gall-img-4.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-1" href="img/gall-img-5.jpg">
                                                        <img src="../public/img/gall-img-5.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-1" href="img/gall-img-6.jpg">
                                                        <img src="../public/img/gall-img-6.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-typical-footer profile-post-meta">
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-heart"></i>
                                                45 Like
                                            </a>
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-comment"></i>
                                                18 Comment
                                            </a>
                                        </div>
                                    </article>

                                    <article class="box-typical profile-post"> <!-- Publicación con video -->
                                        <div class="profile-post-header">
                                            <div class="user-card-row">
                                                <div class="tbl-row">
                                                    <div class="tbl-cell tbl-cell-photo">
                                                        <a href="#">
                                                            <img src="../public/img/photo-64-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tbl-cell">
                                                        <div class="user-card-row-name"><a href="#">Tim Collins</a></div>
                                                        <div class="color-blue-grey-lighter">3 days ago - 23 min read</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="shared">
                                                <i class="font-icon font-icon-share"></i>
                                            </a>
                                        </div>
                                        <div class="profile-post-content">
                                            <p class="profile-post-content-note">Added a new video</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                            <div class="cstm-video-player" style="background-image: url('img/player-photo-b.jpg');">
                                                <div class="cstm-video-player-hover">
                                                    <i class="font-icon font-icon-play"></i>
                                                </div>
                                                <div class="cstm-video-player-controls">
                                                    <div class="cstm-video-player-progress">
                                                        <div class="downloaded" style="width:75%"></div>
                                                        <div class="played" style="width:35%"></div>
                                                    </div>
                                                    <div class="cstm-video-player-controls-left">
                                                        <button type="button" class="cstm-video-player-btn">
                                                            <i class="font-icon font-icon-play"></i>
                                                        </button>
                                                        <button type="button" class="cstm-video-player-btn">
                                                            <i class="font-icon font-icon-player-next"></i>
                                                        </button>
                                                        <button type="button" class="cstm-video-player-btn">
                                                            <i class="font-icon font-icon-player-sound"></i>
                                                        </button>
                                                    </div>
                                                    <div class="cstm-video-player-controls-right">
                                                        <button type="button" class="cstm-video-player-btn">
                                                            <i class="font-icon font-icon-player-subtitres"></i>
                                                        </button>
                                                        <button type="button" class="cstm-video-player-btn">
                                                            <i class="font-icon font-icon-player-settings"></i>
                                                        </button>
                                                        <button type="button" class="cstm-video-player-btn">
                                                            <i class="font-icon font-icon-player-wide-screen"></i>
                                                        </button>
                                                        <button type="button" class="cstm-video-player-btn">
                                                            <i class="font-icon font-icon-player-full-screen"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-typical-footer profile-post-meta">
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-heart"></i>
                                                45 Like
                                            </a>
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-comment"></i>
                                                18 Comment
                                            </a>
                                        </div>
                                    </article>

                                    <article class="box-typical profile-post"> <!-- Publicación con audio -->
                                        <div class="profile-post-header">
                                            <div class="user-card-row">
                                                <div class="tbl-row">
                                                    <div class="tbl-cell tbl-cell-photo">
                                                        <a href="#">
                                                            <img src="../public/img/photo-64-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tbl-cell">
                                                        <div class="user-card-row-name"><a href="#">Tim Collins</a></div>
                                                        <div class="color-blue-grey-lighter">3 days ago - 23 min read</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="shared">
                                                <i class="font-icon font-icon-share"></i>
                                            </a>
                                        </div>
                                        <div class="profile-post-content">
                                            <p class="profile-post-content-note">Is listening to the Evernote</p>
                                            <div class="minimalistic-player">
                                                <div class="tbl minimalistic-player-header">
                                                    <div class="tbl-row">
                                                        <div class="tbl-cell tbl-cell-action">
                                                            <button type="button">
                                                                <i class="font-icon font-icon-play-square"></i>
                                                            </button>
                                                        </div>
                                                        <div class="tbl-cell tbl-cell-action">
                                                            <button type="button">
                                                                <i class="font-icon font-icon-play-prev-square"></i>
                                                            </button>
                                                        </div>
                                                        <div class="tbl-cell tbl-cell-action">
                                                            <button type="button">
                                                                <i class="font-icon font-icon-play-next-square"></i>
                                                            </button>
                                                        </div>
                                                        <div class="tbl-cell tbl-cell-caption">Kylie Minogue  – Slow 2015</div>
                                                        <div class="tbl-cell tbl-cell-time">-04:01</div>
                                                    </div>
                                                </div>
                                                <div class="progress">
                                                    <div style="width: 25%"></div>
                                                </div>
                                                <div class="progress sound">
                                                    <div style="width: 50%"><div class="handle"></div></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-typical-footer profile-post-meta">
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-heart"></i>
                                                45 Like
                                            </a>
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-comment"></i>
                                                18 Comment
                                            </a>
                                        </div>
                                    </article>

                                    <article class="box-typical profile-post"> <!-- Publicación con galería de imágenes -->
                                        <div class="profile-post-header">
                                            <div class="user-card-row">
                                                <div class="tbl-row">
                                                    <div class="tbl-cell tbl-cell-photo">
                                                        <a href="#">
                                                            <img src="../public/img/photo-64-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tbl-cell">
                                                        <div class="user-card-row-name"><a href="#">Tim Collins</a></div>
                                                        <div class="color-blue-grey-lighter">3 days ago - 23 min read</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="shared">
                                                <i class="font-icon font-icon-share"></i>
                                            </a>
                                        </div>
                                        <div class="profile-post-content">
                                            <p class="profile-post-content-note">Created an album collection</p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </p>
                                            <div class="profile-post-gall-fluid profile-post-gall-grid" data-columns>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-2" href="../public/img/gall-img-1.jpg">
                                                        <img src="../public/img/gall-img-1.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-2" href="../public/img/gall-img-2.jpg">
                                                        <img src="../public/img/gall-img-2.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-2" href="../public/img/gall-img-3.jpg">
                                                        <img src="../public/img/gall-img-3.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-2" href="../public/img/gall-img-4.jpg">
                                                        <img src="../public/img/gall-img-4.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-2" href="../public/img/gall-img-5.jpg">
                                                        <img src="../public/img/gall-img-5.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-2" href="../public/img/gall-img-6.jpg">
                                                        <img src="../public/img/gall-img-6.jpg" alt="">
                                                    </a>
                                                </div>
                                                <div class="col">
                                                    <a class="fancybox" rel="gall-2" href="../public/img/gall-img-7.jpg">
                                                        <img src="../public/img/gall-img-7.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-typical-footer profile-post-meta">
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-heart"></i>
                                                45 Like
                                            </a>
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-comment"></i>
                                                18 Comment
                                            </a>
                                        </div>
                                    </article>

                                    <article class="box-typical profile-post"> <!-- Publicación con tarjeta de reunión -->
                                        <div class="profile-post-header">
                                            <div class="user-card-row">
                                                <div class="tbl-row">
                                                    <div class="tbl-cell tbl-cell-photo">
                                                        <a href="#">
                                                            <img src="../public/img/photo-64-2.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tbl-cell">
                                                        <div class="user-card-row-name"><a href="#">Tim Collins</a></div>
                                                        <div class="color-blue-grey-lighter">3 days ago - 23 min read</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="#" class="shared">
                                                <i class="font-icon font-icon-share"></i>
                                            </a>
                                        </div>
                                        <div class="profile-post-content">
                                            <p class="profile-post-content-note">Scheduled a meeting whith <a href="#">Elen Adarna</a></p>
                                            <div class="tbl profile-post-card">
                                                <div class="tbl-row">
                                                    <div class="tbl-cell tbl-cell-photo">
                                                        <a href="#">
                                                            <img src="../public/img/100x100.jpg" alt="">
                                                        </a>
                                                    </div>
                                                    <div class="tbl-cell">
                                                        <p class="title"><a href="#">Telling Your Kife Story: Memoir Workshop Series</a></p>
                                                        <p>Monday, July 06, 2015 – Thuesday, July 07, 2015</p>
                                                        <p>SF Bay Theater</p>
                                                        <p>San Francisco, California, USA</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="box-typical-footer profile-post-meta">
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-heart"></i>
                                                45 Like
                                            </a>
                                            <a href="#" class="meta-item">
                                                <i class="font-icon font-icon-comment"></i>
                                                18 Comment
                                            </a>
                                        </div>
                                    </article>
                                </div><!--.tab-pane-->
                                <div role="tabpanel" class="tab-pane active" id="tabs-2-tab-2"> <!-- Contenido de la pestaña Actividad -->
                                    <section class="box-typical box-typical-padding">
                                        Actividad
                                    </section>
                                </div><!--.tab-pane-->
                                <div role="tabpanel" class="tab-pane" id="tabs-2-tab-3"> <!-- Contenido de la pestaña Proyectos -->
                                    <section class="box-typical box-typical-padding">
                                        Proyectos
                                    </section>
                                </div><!--.tab-pane-->
                                <div role="tabpanel" class="tab-pane" id="tabs-2-tab-4"> <!-- Contenido de la pestaña Ajustes -->
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
                                                    <label class="form-label">Acerca de</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <textarea rows="2" class="form-control">Maecenas sed diam eget risus varius blandit sit amet non magna. Vestibulum id ligula porta felis euismod semper.</textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">Recomendaciones</label>
                                                </div>
                                                <div class="col-xl-8">
                                                    <input class="form-control" type="text" value="All stream, Connected Apps, Photos, Most recent"/>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="box-typical-section"> <!-- Información adicional -->
                                            <header class="box-typical-header-sm">Info</header>
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
                                                    <input class="form-control" type="text" value="Área de Trabajo"/>
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
                                                        <i class="font-icon font-icon-github"></i>
                                                        Github
                                                    </label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <input class="form-control" type="text" value="Usuario"/>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">
                                                        <i class="font-icon font-icon-earth"></i>
                                                        Web
                                                    </label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <input class="form-control" type="text" value="sitioweb.com"/>
                                                </div>
                                            </div>
                                        </section>
                                        <section class="box-typical-section"> <!-- Habilidades -->
                                            <header class="box-typical-header-sm">Habilidades</header>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">AngularJS</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="range-settings range-slider-simple range-slider-aquamarine">
                                                        <input type="text" id="range-slider-1" name="example_name" value="" />
                                                        <div class="range-settings-percent">30%</div>
                                                        <div class="range-setting-actions">
                                                            <button type="button">
                                                                <i class="font-icon font-icon-pencil"></i>
                                                            </button>
                                                            <button type="button" class="del">
                                                                <i class="font-icon font-icon-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">Javascript</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="range-settings range-slider-simple range-slider-red">
                                                        <input type="text" id="range-slider-2" name="example_name" value="" />
                                                        <div class="range-settings-percent">30%</div>
                                                        <div class="range-setting-actions">
                                                            <button type="button">
                                                                <i class="font-icon font-icon-pencil"></i>
                                                            </button>
                                                            <button type="button" class="del">
                                                                <i class="font-icon font-icon-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">Wordpress</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="range-settings range-slider-simple range-slider-purple">
                                                        <input type="text" id="range-slider-3" name="example_name" value="" />
                                                        <div class="range-settings-percent">30%</div>
                                                        <div class="range-setting-actions">
                                                            <button type="button">
                                                                <i class="font-icon font-icon-pencil"></i>
                                                            </button>
                                                            <button type="button" class="del">
                                                                <i class="font-icon font-icon-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">HTML &amp; CSS</label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="range-settings range-slider-simple">
                                                        <input type="text" id="range-slider-4" name="example_name" value="" />
                                                        <div class="range-settings-percent">30%</div>
                                                        <div class="range-setting-actions">
                                                            <button type="button">
                                                                <i class="font-icon font-icon-pencil"></i>
                                                            </button>
                                                            <button type="button" class="del">
                                                                <i class="font-icon font-icon-trash"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-xl-2">
                                                    <label class="form-label">
                                                        <a href="#">Añadir nueva habilidad</a>
                                                    </label>
                                                </div>
                                                <div class="col-xl-4">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" value="Diseño de logotipos">
                                                        <span class="input-group-btn">
                                                            <button class="btn btn-grey" type="button">Añadir</button>
                                                        </span>
                                                    </div>
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
