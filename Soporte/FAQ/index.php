<?php
    require_once '../../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../../view/Main/head.php'; ?>
        <title>El Punto :: FAQ</title>
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
                                <h3>FAQ</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../../Home">Inicio</a></li>
                                    <li><a href="../">Soporte</a></li>
                                    <li class="active">FAQ</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <section class="box-typical faq-page">
                    <form class="faq-page-header-search">
                        <div class="search">
                            <input type="text" class="form-control form-control-rounded" placeholder="Encuentra respuestas (diseño, ayuda, contraseñas, facturación)"/>
                            <button type="submit" class="find">
                                <i class="font-icon font-icon-search"></i>
                            </button>
                        </div>
                    </form><!--.faq-page-header-search-->

                    <section class="faq-page-cats">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="faq-page-cat">
                                    <div class="faq-page-cat-icon"><img src="/-Empresa-El-Punto/Soporte/public/img/faq-1.png" alt=""></div>
                                    <div class="faq-page-cat-title">
                                        <a href="#">Comenzando</a>
                                    </div>
                                    <div class="faq-page-cat-txt">¿Nuevo en el sitio? Aprende lo básico para sacarle el mejor provecho</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="faq-page-cat">
                                    <div class="faq-page-cat-icon"><img src="/-Empresa-El-Punto/Soporte/public/img/faq-2.png" alt=""></div>
                                    <div class="faq-page-cat-title">
                                        <a href="#">Tengo un problema</a>
                                    </div>
                                    <div class="faq-page-cat-txt">¿Hay algo que no funciona? Revisa si alguna de estas sugerencias te ayuda a solucionarlo</div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="faq-page-cat">
                                    <div class="faq-page-cat-icon"><img src="/-Empresa-El-Punto/Soporte/public/img/faq-3.png" alt=""></div>
                                    <div class="faq-page-cat-title">
                                        <a href="#">Sugerir una característica</a>
                                    </div>
                                    <div class="faq-page-cat-txt">¿Tienes una sugerencia? ¡Permitenos conocer tus sugerencias!</div>
                                </div>
                            </div>
                        </div><!--.row-->
                    </section><!--.faq-page-cats-->

                    <section class="faq-page-questions">
                        <h2>Preguntas Frecuentes</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Lorem ipsum dolor sit amet, consectetur laboris</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Lorem ipsum dolor sit amet, consectetur</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Duis aute irure  dolor in reprehenderit velit</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Duis aute irure  dolor in reprehenderit velit</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Lorem ipsum dolor sit amet, consectetur laboris</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Lorem ipsum dolor sit amet, consectetur</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                        </div>
                    </section><!--.faq-page-questions-->
			    </section><!--.faq-page-->
            </div><!--.container-fluid-->
        </div><!--Contenido de la página-->
        <?php   require_once '../../view/Main/js.php'; ?>
        <script type="text/javascript" src="faq.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
