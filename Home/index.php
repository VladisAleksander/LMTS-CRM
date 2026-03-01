<?php
    require_once '../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../view/Main/head.php'; ?>
        <link rel="stylesheet" type="text/css" href="../public/css/lib/morrisjs/morris.css">
        <title>Inicio :: TechCareMX</title>
    </head>
    <body class="with-side-menu">

        <?php   require_once '../view/Main/header.php'; ?>

        <div class="mobile-menu-left-overlay"></div>
        
        <?php   require_once '../view/Main/nav.php'; ?>

        <!-- Contenido de la página -->
        <div class="page-content">
            <div class="container-fluid">
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Inicio</h3>
                            </div>
                        </div>
                    </div>
                </header>
            </div><!--.container-fluid-->

            <?php // Mostrar información de tickets dependiendo del área del usuario
                if ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) {
                    ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">

                                    <div class="col-sm-3"> <article class="statistic-box purple" onclick="window.location.href='../Soporte/ConsultarTicket/?filtro='" style="cursor: pointer;" title="Ver todos los tickets">
                                            <div>
                                                <div class="number" id="total_tickets_globales"></div>
                                                <div class="caption"><div>Tickets Creados</div></div>
                                            </div>
                                        </article>
                                    </div>

                                    <div class="col-sm-3"> <article class="statistic-box red" onclick="window.location.href='../Soporte/ConsultarTicket/?filtro=nuevos'" style="cursor: pointer;" title="Filtrar tickets nuevos">
                                            <div>
                                                <div class="number" id="total_tickets_nuevos"></div>
                                                <div class="caption"><div>Tickets Nuevos</div></div>
                                            </div>
                                        </article>
                                    </div>

                                    <div class="col-sm-3"> <article class="statistic-box yellow" onclick="window.location.href='../Soporte/ConsultarTicket/?filtro=abiertos'" style="cursor: pointer;" title="Filtrar tickets abiertos">
                                            <div>
                                                <div class="number" id="total_tickets_abiertos"></div>
                                                <div class="caption"><div>Tickets Abiertos</div></div>
                                            </div>
                                        </article>
                                    </div>

                                    <div class="col-sm-3"> <article class="statistic-box green" onclick="window.location.href='../Soporte/ConsultarTicket/?filtro=cerrados'" style="cursor: pointer;" title="Filtrar tickets cerrados">
                                            <div>
                                                <div class="number" id="total_tickets_cerrados"></div>
                                                <div class="caption"><div>Tickets Resueltos o Cerrados</div></div>
                                            </div>
                                        </article>
                                    </div>

                                </div>
                            </div>
                        </div></div>
                    <?php
                } else { // Información General para el resto de las áreas
                    ?>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="row">

                                    <div class="col-sm-6"> <article class="statistic-box purple" onclick="window.location.href='../Soporte/ConsultarTicket/?filtro='" style="cursor: pointer;" title="Ver todos mis tickets">
                                            <div>
                                                <div class="number" id="total_tickets_usuario"></div>
                                                <div class="caption"><div>Tickets Creados</div></div>
                                            </div>
                                        </article>
                                    </div>

                                    <div class="col-sm-6"> <article class="statistic-box yellow" onclick="window.location.href='../Soporte/ConsultarTicket/?filtro=abiertos'" style="cursor: pointer;" title="Ver mis tickets abiertos">
                                            <div>
                                                <div class="number" id="total_tickets_abiertos_usuario"></div>
                                                <div class="caption"><div>Tickets Abiertos</div></div>
                                            </div>
                                        </article>
                                    </div>

                                </div>
                            </div>
                        </div></div><?php
                }
            ?>

        </div><!--.page-content-->

        <?php   require_once '../view/Main/js.php'; ?>
        <script src="../public/js/lib/morrisjs/morris.min.js"></script>
        <script src="../public/js/lib/morrisjs/raphael-min.js"></script>
        <script type="text/javascript" src="../public/js/home.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
