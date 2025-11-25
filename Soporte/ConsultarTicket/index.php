<?php
    require_once '../../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../../view/Main/head.php'; ?>
        <title>Consultar Ticket :: TechCareMX</title>
        <link rel="icon" href="../../public/img/favicon.png" type="image/png">
    </head>
    <body class="with-side-menu">

        <?php   require_once '../../view/Main/header.php'; ?>

        <div class="mobile-menu-left-overlay"></div>
        
        <?php   require_once '../../view/Main/nav.php'; ?>

        <div class="page-content"> <!-- Contenido de la página -->
            <div class="container-fluid">
                <header class="section-header">
                    <div class="tbl">
                        <div class="tbl-row">
                            <div class="tbl-cell">
                                <h3>Consultar Ticket</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../../Home">Inicio</a></li>
                                    <li><a href="../">Soporte</a></li>
                                    <li class="active">Tickets</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">
                    <table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                    <?php
                        if ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) { //Soporte Técnico, Soporte de Software o Soporte de Redes
                            ?>
                                <thead>
                                    <tr>
                                        <th class="text-center" id="lblTicketID" style="width: 15%;">Ticket ID</th>
                                        <th class="text-center" id="lblCreacion">Creación</th>
                                        <th class="text-center d-none d-sm-table-cell" id="lblTitulo" style="width: 70%;">Título</th>
                                        <th class="text-center" id="lblArea">Área</th>
                                        <th class="text-center" id="lblUsuario" style="width: 15%;">Usuario</th>
                                        <th class="text-center" id="lblCategoria">Categoría</th>
                                        <th class="text-center" id="lblSubCategoria" style="width: 25%;">Subcategoría</th>
                                        <th class="text-center" id="lblPrioridad" style="width: 5%;">Prioridad</th>
                                        <th class="text-center" id="lblEstatus">Estatus</th>
                                        <th class="text-center" id="lblAcciones" style="width: 5%;"></th>
                                    </tr>
                                </thead>
                            <?php
                        } else { // Resto de áreas
                            ?>
                                <thead>
                                    <tr>
                                        <th class="text-center" id="lblTicketID" style="width: 15%;">Ticket ID</th>
                                        <th class="text-center d-none d-sm-table-cell" id="lblTitulo" style="width: 55%;">Título</th>
                                        <th class="text-center" id="lblCreacion">Creación</th>
                                        <th class="text-center" id="lblEstatus">Estatus</th>
                                        <th class="text-center" id="lblAcciones" style="width: 5%;"></th>
                                    </tr>
                                </thead>
                            <?php
                        }
                    ?>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div><!--.table-responsive-->
            </div><!--.container-fluid-->
        </div><!--Contenido de la página-->
        <?php   require_once '../../view/Main/js.php'; ?>
        <script type="text/javascript" src="../../public/js/tickets/consult.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
