<header class="site-header">
    <div class="container-fluid">

        <a href="#" class="site-logo">
            <img class="hidden-md-down" src="/-Empresa-El-Punto/Soporte/public/img/logo-black.png" alt="">
            <img class="hidden-lg-up" src="/-Empresa-El-Punto/Soporte/public/img/logo-black-mob.png" alt="">
        </a>

        <button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
            <span>toggle menu</span>
        </button>

        <button class="hamburger hamburger--htla">
            <span>toggle menu</span>
        </button>
        <div class="site-header-content">
            <div class="site-header-content-in">
                <div class="site-header-shown">

                    <!-- User menu -->
                    <div class="dropdown user-menu">
                        <button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img src="/-Empresa-El-Punto/Soporte/public/img/avatar-2-64.png" alt="">
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-cog"></span>Ajustes</a>
                            <a class="dropdown-item" href="#"><span class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="/-Empresa-El-Punto/Soporte/view/Main/logout.php"><span class="font-icon glyphicon glyphicon-log-out"></span>Cerrar sesión</a>
                        </div>
                    </div>

                    <button type="button" class="burger-right">
                        <i class="font-icon-menu-addl"></i>
                    </button>
                </div><!--.site-header-shown-->

                <div class="mobile-menu-right-overlay"></div>
                <div class="site-header-collapsed">
                    <div class="site-header-collapsed-in">

                        <!-- Utility Menu -->
                        <div class="dropdown dropdown-typical">
                            <a class="dropdown-toggle" id="dd-header-marketing" data-target="#" href="http://example.com" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="font-icon font-icon-cogwheel"></span>
                                <span class="lbl">Marketing automation</span>
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dd-header-marketing">
                                <a class="dropdown-item" href="#">Current Search</a>
                                <a class="dropdown-item" href="#">Search for Issues</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">Recent issues</div>
                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
                                <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
                                <div class="dropdown-more">
                                    <div class="dropdown-more-caption padding">more...</div>
                                    <div class="dropdown-more-sub">
                                        <div class="dropdown-more-sub-in">
                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-home"></span>Quant and Verbal</a>
                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-cart"></span>Real Gmat Test</a>
                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-speed"></span>Prep Official App</a>
                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-users"></span>CATprer Test</a>
                                            <a class="dropdown-item" href="#"><span class="font-icon font-icon-comments"></span>Third Party Test</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Import Issues from CSV</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">Filters</div>
                                <a class="dropdown-item" href="#">My Open Issues</a>
                                <a class="dropdown-item" href="#">Reported by Me</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Manage filters</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-header">Timesheet</div>
                                <a class="dropdown-item" href="#">Subscribtions</a>
                            </div>
                        </div>

                        <input type="hidden" id="e_idx" value="<?php echo $_SESSION["e_id"] ?>"> <!-- ID del empleado -->

                        <!-- User options -->
                        <div class="dropdown dropdown-typical">
                            <a href="#" class="dropdown-toggle no-arr">
                                <span class="font-icon font-icon-user"></span>
                                <span class="lblcontactonomx"><?php echo $_SESSION["e_name"] ?> <?php echo $_SESSION["e_last1"] ?></span>
                            </a>
                        </div>

                        <!-- Help Menu -->
                        <div class="help-dropdown">
                            <button type="button">
                                <i class="font-icon font-icon-help"></i>
                            </button>
                            <div class="help-dropdown-popup">
                                <div class="help-dropdown-popup-side">
                                    <ul>
                                        <li><a href="#">Desde el inicio</a></li>
                                        <li><a href="#" class="active">Crear un nuevo ticket</a></li>
                                        <li><a href="#">Añadir usuarios</a></li>
                                        <li><a href="#">Configuraciones</a></li>
                                        <li><a href="#">Importar datos</a></li>
                                        <li><a href="#">Exportar datos</a></li>
                                    </ul>
                                </div>
                                <div class="help-dropdown-popup-cont">
                                    <div class="help-dropdown-popup-cont-in">
                                        <div class="jscroll">
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum is simply
                                                <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Contrary to popular belief
                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                The point of using Lorem Ipsum
                                                <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum
                                                <span class="describe">There are many variations of passages of Lorem Ipsum available</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum is simply
                                                <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Contrary to popular belief
                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                The point of using Lorem Ipsum
                                                <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum
                                                <span class="describe">There are many variations of passages of Lorem Ipsum available</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum is simply
                                                <span class="describe">Lorem Ipsum has been the industry's standard dummy text </span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Contrary to popular belief
                                                <span class="describe">Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                The point of using Lorem Ipsum
                                                <span class="describe">Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text</span>
                                            </a>
                                            <a href="#" class="help-dropdown-popup-item">
                                                Lorem Ipsum
                                                <span class="describe">There are many variations of passages of Lorem Ipsum available</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- help-dropdown -->

                    </div><!--.site-header-collapsed-in-->
                </div><!--.site-header-collapsed-->
            </div><!--site-header-content-in-->
        </div><!--.site-header-content-->
    </div><!--.container-fluid-->
</header><!--.site-header-->

