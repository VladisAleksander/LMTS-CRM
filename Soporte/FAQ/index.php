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
                                        <a href="#">Computadoras e Impresoras</a>
                                    </header>
                                    <p>Problemas relacionados con hardware físico, como fallos en encendido, lentitud en equipos o errores en impresión (ej. atascos de papel o conexión de impresoras).</p>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Sistema y Programas</a>
                                    </header>
                                    <p>Incidencias en el software del sistema operativo o aplicaciones específicas, como errores al abrir programas, actualizaciones fallidas o bloqueos inesperados.</p>
                                </article>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Redes e Internet</a>
                                    </header>
                                    <p>Dificultades con la conectividad, como falta de acceso a internet, problemas con Wi-Fi, redes internas o conexiones remotas lentas o inestables.</p>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Cuentas y Contraseñas</a>
                                    </header>
                                    <p>Cuestiones de acceso a cuentas, como olvido de contraseñas, bloqueos de usuario, creación de nuevas cuentas o problemas de autenticación.</p>
                                </article>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Reloj Checador</a>
                                    </header>
                                    <p>Errores en el sistema de registro de asistencia, como fallos en el reloj biométrico, problemas de sincronización o discrepancias en los registros de entrada/salida.</p>
                                </article>
                            </div>
                            <div class="col-md-6">
                                <article class="faq-page-quest">
                                    <header class="faq-page-quest-title">
                                        <a href="#">Seguridad y Prevención</a>
                                    </header>
                                    <p>Amenazas o alertas de seguridad, como virus, accesos no autorizados, configuraciones de firewall o medidas preventivas para proteger datos y equipos.</p>
                                </article>
                            </div>
                        </div>
                    </section><!--.soporte-page-questions-->
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
