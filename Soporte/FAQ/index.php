<?php
    require_once '../../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../../view/Main/head.php'; ?>
        <title>TechCareMX :: FAQ</title>
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
                                    <li><a href="../../Soporte">Soporte</a></li>
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

                    <section class="faq-page-questions">
                        <h2>Temas Principales</h2>
                        <div class="row">
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Problemas Físicos</a>
                                    </header>
                                    <p>Equipos que no encienden o presentan daño físico, ruidos extraños, periféricos como ratón o teclado que no funcionan, problemas relacionados a impresoras. </p>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Problemas de Software</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Redes e Internet</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Problemas del Sistema</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Cuentas de Usuario</a>
                                    </header>
                                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Seguridad y Prevención</a>
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
        <script type="text/javascript" src="../../public/js/tickets/faq.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
