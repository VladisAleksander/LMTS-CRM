<nav class="side-menu">
    <ul class="side-menu-list">

        <!-- Principal -->
        <li class="grey with-sub">
            <a href="/LMTS-CRM/Home">
                <i class="font-icon glyphicon glyphicon-send"></i>
                <span class="lbl">Inicio</span>
            </a>
        </li>
        
        <!-- Menu de Mensajes -->
        <?php
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

        <!-- Menu de Correo -->
        <?php
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

        <!-- Menu de Empleados -->
        <?php
            if ($_SESSION["area_id"] == 10 || $_SESSION["area_id"] == 14) {
                ?>
                    <li class="blue with-sub">
                        <span>
                            <i class="font-icon font-icon-user"></i>
                            <span class="lbl">Empleados</span>
                        </span>
                        <ul>
                            <li><a href="/LMTS-CRM/Empleados/NuevoEmpleado"><span class="lbl">Nuevo Empleado</span></a></li>
                            <li><a href="/LMTS-CRM/Empleados/ConsultarEmpleado"><span class="lbl">Consultar Empleados</span></a></li>
                            <li><a href="/LMTS-CRM/Empleados/GestionarEmpleado"><span class="lbl">Gestionar Empleados</span></a></li>
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
                            <li><a href="/LMTS-CRM/Empleados/ConsultarEmpleado"><span class="lbl">Consultar Empleados</span></a></li>
                        </ul>
                    </li>
                <?php
            } else {
                ?>
                   
                <?php
            }
        ?>

        <!-- Menu de Soporte -->
        <?php
            if ($_SESSION["area_id"] == 11 || $_SESSION["area_id"] == 12 || $_SESSION["area_id"] == 14) {
                ?>
                    <li class="orange-red with-sub">
                        <span>
                            <i class="font-icon font-icon-help"></i>
                            <span class="lbl">Soporte</span>
                        </span>
                        <ul>
                            <li><a href="/LMTS-CRM/Soporte/FAQ"><span class="lbl">FAQ</span></a></li>
                            <li><a href="/LMTS-CRM/Soporte/NuevoTicket"><span class="lbl">Crear Nuevo Ticket</span></a></li>
                            <li><a href="/LMTS-CRM/Soporte/ConsultarTicket"><span class="lbl">Consultar Tickets</span></a></li>
                            <li><a href="/LMTS-CRM/Soporte/Documentacion"><span class="lbl">Documentación</span></a></li>
                        </ul>
                    </li>
                <?php
            } else {
                ?>
                   <li class="orange-red with-sub">
                        <span>
                            <i class="font-icon font-icon-help"></i>
                            <span class="lbl">Soporte</span>
                        </span>
                        <ul>
                            <li><a href="/LMTS-CRM/Soporte/FAQ"><span class="lbl">FAQ</span></a></li>
                            <li><a href="/LMTS-CRM/Soporte/NuevoTicket"><span class="lbl">Crear Nuevo Ticket</span></a></li>
                            <li><a href="/LMTS-CRM/Soporte/ConsultarTicket"><span class="lbl">Consultar Tickets</span></a></li>
                        </ul>
                    </li>
                <?php
            }
        ?>
        

        <!-- Contactos -->
        <li class="red">
            <a href="contacts.html" class="label-right">
                <i class="font-icon font-icon-contacts"></i>
                <span class="lbl">Contactos</span>
                <span class="label label-custom label-pill label-danger">69</span>
            </a>
        </li>
    </ul>

    <!-- <section>
        <header class="side-menu-title">Enlaces importantes</header>
        <ul class="side-menu-list">
            <li>
                <a href="#">
                    <i class="tag-color green"></i>
                    <span class="lbl">Sitio Principal</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color grey-blue"></i>
                    <span class="lbl">Empleados</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="tag-color red"></i>
                    <span class="lbl">Preguntas</span>
                </a>
            </li>
        </ul>
    </section> -->
</nav><!--.side-menu-->
