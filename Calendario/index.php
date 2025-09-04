<?php
    require_once '../config/conexion.php';
    if (isset($_SESSION['e_id'])) {
?>

<?php   require_once '../view/Main/head.php'; ?>
        <title>Calendario :: TechCareMX</title>
    </head>
    <body class="with-side-menu">

        <?php   require_once '../view/Main/header.php'; ?>

        <div class="mobile-menu-left-overlay"></div>
        
        <?php   require_once '../view/Main/nav.php'; ?>

        <!-- Contenido de la página -->
        <div class="page-content">
            <div class="container-fluid">
                <div class="box-typical">
                    <div class="calendar-page">
                        <div class="calendar-page-content">
                            <div class="calendar-page-title">Calendario</div>
                            <div class="calendar-page-content-in">
                                <div id='calendar'></div>
                            </div><!--.calendar-page-content-in-->
                        </div><!--.calendar-page-content-->

                        <div class="calendar-page-side">
                            <section class="calendar-page-side-section">
                                <div class="calendar-page-side-section-in">
                                    <div id="side-datetimepicker"></div>
                                </div>
                            </section>

                            <section class="calendar-page-side-section">
                                <header class="box-typical-header-sm">Evento el 16 de Septiembre</header>
                                <div class="calendar-page-side-section-in">
                                    <ul class="exp-timeline">
                                        <li class="exp-timeline-item">
                                            <div class="dot"></div>
                                            <div>10:00</div>
                                            <div class="color-blue-grey">Nombre del evento 1</div>
                                        </li>
                                        <li class="exp-timeline-item">
                                            <div class="dot"></div>
                                            <div>11:00</div>
                                            <div class="color-blue-grey">Nombre del evento 2</div>
                                        </li>
                                    </ul>
                                </div>
                            </section>

                            <section class="calendar-page-side-section">
                                <header class="box-typical-header-sm">Filtros</header>
                                <div class="calendar-page-side-section-in">
                                    <ul class="colors-guide-list">
                                        <li>
                                            <div class="color-double green"><div></div></div>
                                            Citas
                                        </li>
                                        <li>
                                            <div class="color-double"><div></div></div>
                                            Reuniones
                                        </li>
                                        <li>
                                            <div class="color-double orange"><div></div></div>
                                            Supervisión
                                        </li>
                                        <li>
                                            <div class="color-double red"><div></div></div>
                                            Cita Médica
                                        </li>
                                        <li>
                                            <div class="color-double coral"><div></div></div>
                                            Entrenamiento
                                        </li>
                                    </ul>
                                </div>
                            </section>
                        </div><!--.calendar-page-side-->
                    </div><!--.calendar-page-->
                </div><!--.box-typical-->
            </div><!--.container-fluid-->
        </div> <!--Contenido de la página-->

        

        <?php   require_once '../view/Main/js.php'; ?>
        <script type="text/javascript" src="../public/js/calendar/calendar.js"></script>
    </body>
</html>
<?php
    } else {
        header('Location:'.Conectar::ruta().'index.php');
    }
?>
