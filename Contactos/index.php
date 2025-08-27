<?php
    require_once '../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../view/Main/head.php'; ?>
        <title>Contactos :: TechCareMX</title>
        <link rel="icon" href="../public/img/favicon.png" type="image/png">
    </head>
    <body class="with-side-menu">

        <?php   require_once '../view/Main/header.php'; ?>

        <div class="mobile-menu-left-overlay"></div>
        
        <?php   require_once '../view/Main/nav.php'; ?>

        <!-- Contenido de la página -->
        <div class="page-content">
            <header class="page-content-header">
                <div class="container-fluid">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Contactos <small class="text-muted">- 8 Disponibles</small></h3>
                            </div>
                            <div class="tbl-cell tbl-cell-action">
                                <a href="#" class="btn btn-rounded">Añadir contacto</a>
                            </div>
                        </div>
                    </div>
                </div>
            </header><!--.page-content-header-->

            <div class="container-fluid">
                <div class="row card-user-grid">
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <article class="card-user box-typical">
                            <a href="#" class="card-user-action float-left">
                                <i class="font-icon font-icon-revers"></i>
                            </a>
                            <div class="card-user-action float-right">
                                <div class="dropdown dropdown-user-menu">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-option-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Perfil</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>Contacto</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Mensaje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-user-photo">
                                <img src="../public/img/photo-184-1.jpg" alt="">
                            </div>
                            <div class="card-user-name">Douglas Diaz</div>
                            <div class="card-user-status">Activo</div>
                            <a href="#" class="btn btn-rounded">Seguir</a>
                            <div class="card-user-social">
                                <a href="#">
                                    <i class="font-icon font-icon-fb-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-vk-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-in-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-tw-fill"></i>
                                </a>
                            </div>
                            <!--<div class="card-user-info-row">
                                <i class="font-icon font-icon-import"></i>
                                Imported from Github
                            </div>
                            <div class="card-user-info-row">
                                <i class="font-icon font-icon-user"></i>
                                By Wayne Gray
                            </div>-->
                        </article><!--.card-user-->
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <article class="card-user box-typical">
                            <a href="#" class="card-user-action float-left">
                                <i class="font-icon font-icon-revers"></i>
                            </a>
                            <div class="card-user-action float-right">
                                <div class="dropdown dropdown-user-menu">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-option-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Perfil</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>Contacto</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Mensaje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-user-photo">
                                <img src="../public/img/photo-184-1.jpg" alt="">
                            </div>
                            <div class="card-user-name">Douglas Diaz</div>
                            <div class="card-user-status">Activo</div>
                            <a href="#" class="btn btn-rounded btn-default">Dejar de seguir</a>
                            <div class="card-user-social">
                                <a href="#">
                                    <i class="font-icon font-icon-fb-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-vk-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-in-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-tw-fill"></i>
                                </a>
                            </div>
                            <!--<div class="card-user-info-row">
                                <i class="font-icon font-icon-import"></i>
                                Imported from Github
                            </div>
                            <div class="card-user-info-row">
                                <i class="font-icon font-icon-user"></i>
                                By Wayne Gray
                            </div>-->
                        </article><!--.card-user-->
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <article class="card-user box-typical">
                            <a href="#" class="card-user-action float-left">
                                <i class="font-icon font-icon-revers"></i>
                            </a>
                            <div class="card-user-action float-right">
                                <div class="dropdown dropdown-user-menu">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-option-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Perfil</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>Contacto</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Mensaje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-user-photo">
                                <img src="../public/img/photo-184-1.jpg" alt="">
                            </div>
                            <div class="card-user-name">Douglas Diaz</div>
                            <div class="card-user-status">Activo</div>
                            <a href="#" class="btn btn-rounded">Seguir</a>
                            <div class="card-user-social">
                                <a href="#">
                                    <i class="font-icon font-icon-fb-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-vk-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-in-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-tw-fill"></i>
                                </a>
                            </div>
                            <!--<div class="card-user-info-row">
                                <i class="font-icon font-icon-import"></i>
                                Imported from Github
                            </div>
                            <div class="card-user-info-row">
                                <i class="font-icon font-icon-user"></i>
                                By Wayne Gray
                            </div>-->
                        </article><!--.card-user-->
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <article class="card-user box-typical">
                            <a href="#" class="card-user-action float-left">
                                <i class="font-icon font-icon-revers"></i>
                            </a>
                            <div class="card-user-action float-right">
                                <div class="dropdown dropdown-user-menu">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-option-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Perfil</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>Contacto</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Mensaje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-user-photo">
                                <img src="../public/img/photo-184-1.jpg" alt="">
                            </div>
                            <div class="card-user-name">Douglas Diaz</div>
                            <div class="card-user-status">Activo</div>
                            <a href="#" class="btn btn-rounded">Seguir</a>
                            <div class="card-user-social">
                                <a href="#">
                                    <i class="font-icon font-icon-fb-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-vk-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-in-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-tw-fill"></i>
                                </a>
                            </div>
                            <!--<div class="card-user-info-row">
                                <i class="font-icon font-icon-import"></i>
                                Imported from Github
                            </div>
                            <div class="card-user-info-row">
                                <i class="font-icon font-icon-user"></i>
                                By Wayne Gray
                            </div>-->
                        </article><!--.card-user-->
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <article class="card-user box-typical">
                            <a href="#" class="card-user-action float-left">
                                <i class="font-icon font-icon-revers"></i>
                            </a>
                            <div class="card-user-action float-right">
                                <div class="dropdown dropdown-user-menu">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-option-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Perfil</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>Contacto</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Mensaje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-user-photo">
                                <img src="../public/img/photo-184-1.jpg" alt="">
                            </div>
                            <div class="card-user-name">Douglas Diaz</div>
                            <div class="card-user-status">Activo</div>
                            <a href="#" class="btn btn-rounded">Seguir</a>
                            <div class="card-user-social">
                                <a href="#">
                                    <i class="font-icon font-icon-fb-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-vk-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-in-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-tw-fill"></i>
                                </a>
                            </div>
                            <!--<div class="card-user-info-row">
                                <i class="font-icon font-icon-import"></i>
                                Imported from Github
                            </div>
                            <div class="card-user-info-row">
                                <i class="font-icon font-icon-user"></i>
                                By Wayne Gray
                            </div>-->
                        </article><!--.card-user-->
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <article class="card-user box-typical">
                            <a href="#" class="card-user-action float-left">
                                <i class="font-icon font-icon-revers"></i>
                            </a>
                            <div class="card-user-action float-right">
                                <div class="dropdown dropdown-user-menu">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-option-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Perfil</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>Contacto</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Mensaje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-user-photo">
                                <img src="../public/img/photo-184-1.jpg" alt="">
                            </div>
                            <div class="card-user-name">Douglas Diaz</div>
                            <div class="card-user-status">Activo</div>
                            <a href="#" class="btn btn-rounded">Seguir</a>
                            <div class="card-user-social">
                                <a href="#">
                                    <i class="font-icon font-icon-fb-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-vk-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-in-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-tw-fill"></i>
                                </a>
                            </div>
                            <!--<div class="card-user-info-row">
                                <i class="font-icon font-icon-import"></i>
                                Imported from Github
                            </div>
                            <div class="card-user-info-row">
                                <i class="font-icon font-icon-user"></i>
                                By Wayne Gray
                            </div>-->
                        </article><!--.card-user-->
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <article class="card-user box-typical">
                            <a href="#" class="card-user-action float-left">
                                <i class="font-icon font-icon-revers"></i>
                            </a>
                            <div class="card-user-action float-right">
                                <div class="dropdown dropdown-user-menu">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-option-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Perfil</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>Contacto</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Mensaje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-user-photo">
                                <img src="../public/img/photo-184-1.jpg" alt="">
                            </div>
                            <div class="card-user-name">Douglas Diaz</div>
                            <div class="card-user-status">Activo</div>
                            <a href="#" class="btn btn-rounded">Seguir</a>
                            <div class="card-user-social">
                                <a href="#">
                                    <i class="font-icon font-icon-fb-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-vk-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-in-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-tw-fill"></i>
                                </a>
                            </div>
                            <!--<div class="card-user-info-row">
                                <i class="font-icon font-icon-import"></i>
                                Imported from Github
                            </div>
                            <div class="card-user-info-row">
                                <i class="font-icon font-icon-user"></i>
                                By Wayne Gray
                            </div>-->
                        </article><!--.card-user-->
                    </div>
                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <article class="card-user box-typical">
                            <a href="#" class="card-user-action float-left">
                                <i class="font-icon font-icon-revers"></i>
                            </a>
                            <div class="card-user-action float-right">
                                <div class="dropdown dropdown-user-menu">
                                    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <span class="glyphicon glyphicon-option-vertical"></span>
                                    </button>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Perfil</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>Contacto</a>
                                        <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Mensaje</a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-user-photo">
                                <img src="../public/img/photo-184-1.jpg" alt="">
                            </div>
                            <div class="card-user-name">Douglas Diaz</div>
                            <div class="card-user-status">Activo</div>
                            <a href="#" class="btn btn-rounded">Seguir</a>
                            <div class="card-user-social">
                                <a href="#">
                                    <i class="font-icon font-icon-fb-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-vk-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-in-fill"></i>
                                </a>
                                <a href="#">
                                    <i class="font-icon font-icon-tw-fill"></i>
                                </a>
                            </div>
                            <!--<div class="card-user-info-row">
                                <i class="font-icon font-icon-import"></i>
                                Imported from Github
                            </div>
                            <div class="card-user-info-row">
                                <i class="font-icon font-icon-user"></i>
                                By Wayne Gray
                            </div>-->
                        </article><!--.card-user-->
                    </div>
                </div><!--.card-user-grid-->
            </div><!--.container-fluid-->
        </div><!--Contenido de la página-->
        
        <?php   require_once '../view/Main/js.php'; ?>
        <script type="text/javascript" src="../public/js/contacts.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
