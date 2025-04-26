<?php
    # Llamar a la conexión de la base de datos
    require_once "config/conexion.php";

    # Verificar si el formulario fue enviado
    if (isset($_POST["enviar"]) && $_POST["enviar"] == "si") {
        require_once "modelos/Acceso.php";
        $acceso = new Acceso();
        $acceso->login();
    }
?>
 
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Sporte :: Iniciar Sesión</title>

        <link href="public/img/favicon.144x144.png" rel="apple-touch-icon" type="image/png" sizes="144x144">
        <link href="public/img/favicon.114x114.png" rel="apple-touch-icon" type="image/png" sizes="114x114">
        <link href="public/img/favicon.72x72.png" rel="apple-touch-icon" type="image/png" sizes="72x72">
        <link href="public/img/favicon.57x57.png" rel="apple-touch-icon" type="image/png">
        <link href="public/img/favicon.png" rel="icon" type="image/png">
        <link href="public/img/favicon.ico" rel="shortcut icon">
        <link rel="stylesheet" href="public/css/separate/pages/login.min.css">
        <link rel="stylesheet" href="public/css/lib/font-awesome/font-awesome.min.css">
        <link rel="stylesheet" href="public/css/lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/main.css">
    </head>
    <body>
        <div class="page-center">
            <div class="page-center-in">
                <div class="container-fluid">
                    <form class="sign-box" action="" method="post" id="login_form">
                        <div class="sign-avatar">
                            <img src="public/img/avatar-sign.png" alt="">
                        </div>
                        <header class="sign-title" lbl="lbltitulo">Acceso Usuario</header>

                        <?php
                            if (isset($_GET["m"])) {
                                switch ($_GET["m"]) {
                                    case '1': # Mensaje de error por usuario y/o contraseña incorrectos
                                        ?>
                                            <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                                    <span>El usuario y/o contraseña incorrectos.</span>
                                                </div>
                                            </div>
                                        <?php
                                        break;
                                    case '2': # Mensaje de error por campos vacíos
                                        ?>
                                            <div class="alert alert-danger" role="alert">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="d-flex align-items-center justify-content-start">
                                                    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
                                                    <span>Los campos están vacíos.</span>
                                                </div>
                                            </div>
                                        <?php
                                        break;
                                    default:
                                        # Código por defecto
                                        break;
                                }
                            }
                        ?>
                        
                        <div class="form-group">
                            <input type="text" id="e_mail" name="e_mail" class="form-control" placeholder="Correo"/>
                        </div>
                        <div class="form-group">
                            <input type="password" id="e_pass" name="e_pass" class="form-control" placeholder="Contraseña"/>
                        </div>
                        
                        <div class="form-group">
                            <div class="float-left reset">
                                <a href="#" id="btnsoporte">Acceso Soporte</a>
                            </div>

                            <div class="float-right reset">
                                <a href="password-reset.php">Restablecer contraseña</a>
                            </div>
                        </div>

                        <input type="hidden" name="enviar" class="form-control" value="si">
                        <button type="submit" class="btn btn-rounded">Iniciar sesión</button>
                    </form>
                </div>
            </div>
        </div><!--.page-center-->


        <script src="public/js/lib/jquery/jquery.min.js"></script>
        <script src="public/js/lib/tether/tether.min.js"></script>
        <script src="public/js/lib/bootstrap/bootstrap.min.js"></script>
        <script src="public/js/plugins.js"></script>
        <script type="text/javascript" src="public/js/lib/match-height/jquery.matchHeight.min.js"></script>
        <script>
            $(function() {
                $('.page-center').matchHeight({
                    target: $('html')
                });

                $(window).resize(function(){
                    setTimeout(function(){
                        $('.page-center').matchHeight({ remove: true });
                        $('.page-center').matchHeight({
                            target: $('html')
                        });
                    },100);
                });
            });
        </script>
        <script src="public/js/app.js"></script>
    </body>

    <!-- Footer -->
    <div class="page-center-in" style="text-align: center; padding: 20px; background-color: #f8f9fa; position: fixed; bottom: 0; width: 100%;">
        <?php
            # Obtener el año actual
            $today = date("F, Y");
            
            # Mostrar el año actual
            echo "&copy; " . $today . " Laughing Man Tech Services | Todos los derechos reservados";
        ?>
    </div>
</html>
