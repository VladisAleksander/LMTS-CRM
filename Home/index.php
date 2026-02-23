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

            <div class="container-fluid"></div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="row">

                            <div class="col-sm-3">
                                <article class="statistic-box purple">
                                    <div>
                                        <div class="number" id="lbltotal">12</div>
                                        <div class="caption"><div>Total de Tickets</div></div>
                                    </div>
                                </article>
                            </div>

                            <div class="col-sm-3">
                                <article class="statistic-box red">
                                    <div>
                                        <div class="number" id="lbltotal">2</div>
                                        <div class="caption"><div>Tickets Nuevos</div></div>
                                    </div>
                                </article>
                            </div>

                            <div class="col-sm-3">
                                <article class="statistic-box yellow">
                                    <div>
                                        <div class="number" id="lbltotalabiertos">9</div>
                                        <div class="caption"><div>Tickets Abiertos</div></div>
                                    </div>
                                </article>
                            </div>

                            <div class="col-sm-3">
                                <article class="statistic-box green">
                                    <div>
                                        <div class="number" id="lbltotalcerrados">3</div>
                                        <div class="caption"><div>Tickets Cerrados</div></div>
                                    </div>
                                </article>
                            </div>

                        </div>
                    </div>
                </div><!--.row-->
            </div>

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
