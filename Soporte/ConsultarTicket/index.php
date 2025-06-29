<?php
    require_once '../../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../../view/Main/head.php'; ?>
        <title>El Punto :: Consultar Ticket</title>
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
                                <h3>Consultar Ticket</h3>
                                <ol class="breadcrumb breadcrumb-simple">
                                    <li><a href="../../Home">Inicio</a></li>
                                    <li><a href="../">Soporte</a></li>
                                    <li class="active">Consultar Ticket</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </header>

                <div class="box-typical box-typical-padding">
                    <table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 15%;">Ticket ID</th>
                                <th class="text-center" style="width: 10%;">Área</th>
                                <th class="text-center" style="width: 10%;">Categoría</th>
                                <th class="text-center" style="width: 15%;">Subcategoría</th>
                                <th class="text-center" style="width: 10%;">Fecha de Creación</th>
                                <th class="text-center d-none d-sm-table-cell" style="width: 50%;">Título</th>
                                <th class="text-center" style="width: 15%;">Usuario</th>
                                <th class="text-center" style="width: 10%;">Estatus</th>
                                <th class="text-center" style="width: 15%;">Prioridad</th>
                                <th class="text-center">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div><!--.table-responsive-->
            </div><!--.container-fluid-->
        </div><!--Contenido de la página-->
        <?php   require_once '../../view/Main/js.php'; ?>
        <script type="text/javascript" src="consultticket.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
