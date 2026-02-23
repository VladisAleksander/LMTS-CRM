<nav class="side-menu">
    <ul class="side-menu-list">

        <li class="grey with-sub"> <!-- Principal -->
            <a href="/Home">
                <i class="font-icon glyphicon glyphicon-send"></i>
                <span class="lbl">Inicio</span>
            </a>
        </li>
        
        <?php // Menu de Mensajes
            if ($_SESSION["area_id"] == 14) {
                ?>
                    <li class="purple with-sub">
                        <span>
                            <i class="font-icon font-icon-comments active"></i>
                            <span class="lbl">Mensajes</span>
                        </span>
                        <ul>
                            <li><a href="messenger.html"><span class="lbl">Mensajería</span></a></li>
                            <li><a href="chat.html"><span class="lbl">Mensajes</span><span class="label label-custom label-pill label-danger">8</span></a></li>
                            <li><a href="chat-write.html"><span class="lbl">Escribir Mensaje</span></a></li>
                            <li><a href="chat-index.html"><span class="lbl">Seleccionar Usuario</span></a></li>
                        </ul>
                    </li>
                <?php
            } else {
                ?>
                   
                <?php
            }
        ?>

        <?php // Menu de Correo
            if ($_SESSION["area_id"] == 14) {
                ?>
                    <li class="red">
                        <a href="mail.html">
                            <i class="font-icon glyphicon glyphicon-send"></i>
                            <span class="lbl">Correo</span>
                        </a>
                    </li>
                <?php
            } else {
                ?>
                   
                <?php
            }
        ?>

        <?php // Menu de Recursos Humanos
            if ($_SESSION["area_id"] == 10 || $_SESSION["area_id"] == 14) {
                ?>
                    <li class="blue with-sub">
                        <span>
                            <i class="font-icon font-icon-user"></i>
                            <span class="lbl">Recursos Humanos</span>
                        </span>
                        <ul>
                        <li class="with-sub"> <!-- Sección FAQ -->
                                <span><span class="lbl">Gestión de Empleados</span></span>
                                <ul>
                                    <li><a href="/Empleados/NuevoEmpleado"><span class="lbl">Nuevo Empleado</span></a></li>
                                    <li><a href="/Empleados/ConsultarEmpleado"><span class="lbl">Consultar Empleados</span></a></li>
                                </ul>
                            </li>
                            
                        </ul>
                    </li>
                <?php
            } elseif ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12) {
                ?>
                    <li class="blue with-sub">
                        <span>
                            <i class="font-icon font-icon-user"></i>
                            <span class="lbl">Empleados</span>
                        </span>
                        <ul>
                            <li><a href="/Empleados/ConsultarEmpleado"><span class="lbl">Consultar Empleados</span></a></li>
                        </ul>
                    </li>
                <?php
            } else {
                ?>
                   
                <?php
            }
        ?>

        <?php  // Menu de Recursos Financieros
            if ($_SESSION["area_id"] == 4 || $_SESSION["area_id"] == 14) {
                ?>
                    <li class="green with-sub">
                        <span>
                            <i class="font-icon glyphicon glyphicon-usd"></i>
                            <span class="lbl">Recursos Financieros</span>
                        </span>
                        <ul>
                            <li><a href="/RecursosFinancieros/NuevoRecurso"><span class="lbl">Nuevo Recurso</span></a></li>
                            <li><a href="/RecursosFinancieros/ConsultarRecursos"><span class="lbl">Consultar Recursos</span></a></li>
                            <li><a href="/RecursosFinancieros/GestionarRecursos"><span class="lbl">Gestionar Recursos</span></a></li>
                            <li><a href="/RecursosFinancieros/NuevoRecurso"><span class="lbl">Servicios Públicos</span></a></li>
                            <li><a href="/RecursosFinancieros/NuevoRecurso"><span class="lbl">Presupuestos</span></a></li>
                        </ul>
                    </li>
                <?php
            } else {
                ?>
                   
                <?php
            }
        ?>

        <li class="blue with-sub"> <!-- Suministros -->
            <span>
                <i class="font-icon glyphicon glyphicon-paperclip"></i>
                <span class="lbl">Suministros</span>
            </span>
            <ul>
                <li><a href="/Suministros/Solicitar"><span class="lbl">Solicitar Material</span></a></li>
                <li><a href="/Suministros/MisSolicitudes"><span class="lbl">Mis Solicitudes</span></a></li>
                <?php if (in_array($_SESSION["area_id"], [4, 14])): ?>
                    <li><a href="/Suministros/Pendientes"><span class="lbl">Pendientes por Aprobar</span></a></li>
                    <li><a href="/Suministros/Ordenes"><span class="lbl">Órdenes de Compra</span></a></li>
                <?php endif; ?>
            </ul>
        </li>

        <?php // Menu de Inventario
            if ($_SESSION["area_id"] == 14) {
                ?>
                    <li class="gold">
                        <a href="#">
                            <i class="font-icon glyphicon glyphicon-list-alt"></i>
                            <span class="lbl">Inventario</span>
                        </a>
                    </li>
                <?php
            } else {
                ?>
                   
                <?php
            }
        ?>

        <li class="red"> <!-- Contactos -->
            <a href="/Contactos" class="label-right">
                <i class="font-icon font-icon-contacts"></i>
                <span class="lbl">Contactos</span>
                <span class="label label-custom label-pill label-danger">8</span>
            </a>
        </li>

        <li class="magenta"> <!-- Calendario -->
            <a href="/Calendario">
                <i class="font-icon font-icon-calend"></i>
                <span class="lbl">Calendario</span>
            </a>
        </li>

        <?php // Menu Soporte
            if ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) { // Menu Soporte solo Sistemas, Soporte y Desarrolladores
                ?>
                    <li class="orange-red with-sub">
                        <span>
                            <i class="font-icon font-icon-help"></i>
                            <span class="lbl">Soporte</span>
                        </span>
                        <ul>
                            <li class="with-sub"> <!-- Sección FAQ -->
                                <span><span class="lbl">FAQ</span></span>
                                <ul>
                                    <li><a href="/Soporte"><span class="lbl">Principal</span></a></li>
                                    <li><a href="/Soporte/FAQ"><span class="lbl">Estadísticas</span></a></li>
                                    <li class="with-sub">
                                        <span>
                                            <span class="lbl">Artículos</span>
                                        </span>
                                        <ul>
                                            <li><a href="/Soporte/FAQ/NuevoArticulo"><span class="lbl">Nuevo Artículo</span></a></li>
                                            <li><a href="/Soporte/FAQ/GestionArticulos"><span class="lbl">Gestión de Artículos</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="with-sub">
                                        <span>
                                            <span class="lbl">Categorías</span>
                                        </span>
                                        <ul>
                                            <li><a href="/Soporte/FAQ/NuevaCategoria"><span class="lbl">Nueva Categoría</span></a></li>
                                            <li><a href="/Soporte/FAQ/GestionCategorias"><span class="lbl">Gestión de Categorías</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            
                            <li class="with-sub"> <!-- Sección Gestión de Tickets -->
                                <span><span class="lbl">Gestión de Tickets</span></span>
                                <ul>
                                    <li><a href="/Soporte/NuevoTicket"><span class="lbl">Nuevo Ticket</span></a></li>
                                    <li><a href="/Soporte/ConsultarTicket"><span class="lbl">Consultar Tickets</span></a></li>
                                </ul>
                            </li>

                            <li><a href="/Soporte/Documentacion" target="_blank"><span class="lbl">Documentación</span></a></li> <!-- Sección Documentación -->

                            <li class="with-sub"> <!-- Sección Base de Conocimientos -->
                                <span><span class="lbl">Base de Conocimientos</span></span>
                                <ul>
                                    <li><a href="/Soporte/KB"><span class="lbl">Principal</span></a></li>
                                    <li class="with-sub">
                                        <span>
                                            <span class="lbl">Artículos</span>
                                        </span>
                                        <ul>
                                            <li><a href="/Soporte/KB/NuevoArticulo"><span class="lbl">Nuevo Artículo</span></a></li>
                                            <li><a href="/Soporte/KB/GestionArticulos"><span class="lbl">Gestión de Artículos</span></a></li>
                                        </ul>
                                    </li>
                                    <li class="with-sub">
                                        <span>
                                            <span class="lbl">Categorías</span>
                                        </span>
                                        <ul>
                                            <li><a href="/Soporte/KB/NuevaCategoria"><span class="lbl">Nueva Categoría</span></a></li>
                                            <li><a href="/Soporte/KB/GestionCategorias"><span class="lbl">Gestión de Categorías</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                <?php
            } else { // Menu Soporte para Usuarios
                ?>
                   <li class="orange-red with-sub">
                        <span>
                            <i class="font-icon font-icon-help"></i>
                            <span class="lbl">Soporte</span>
                        </span>
                        <ul>
                            <li><a href="/Soporte"><span class="lbl">FAQ</span></a></li>
                            <li><a href="/Soporte/NuevoTicket"><span class="lbl">Nuevo Ticket</span></a></li>
                            <li><a href="/Soporte/ConsultarTicket"><span class="lbl">Mis Tickets</span></a></li>
                        </ul>
                    </li>
                <?php
            }
        ?>
    </ul>
</nav>
