<?php
    class Acceso extends Conectar {
        public function login () {
            $conectar = parent::conexion();
            parent::set_names();
            
            # Verificar si el formulario fue enviado
            if (isset($_POST["enviar"])) {
                $userid = $_POST["e_uid"];
                $password = $_POST["e_pass"];
                
                # Verificar si los campos están vacíos
                if (empty($userid) and empty($password)) {
                    header("Location:" . Conectar::ruta() . "index.php?m=2");
                    exit();
                }

                # Verificar datos de acceso
                $sql = "SELECT * FROM empleados WHERE e_uid = ? AND e_pass = ? AND e_stat = 1";
                $stmt = $conectar->prepare($sql);
                $stmt->bindValue(1, $userid);
                $stmt->bindValue(2, $password);
                $stmt->execute();
                $resultado = $stmt->fetch();

                # Solicitar datos de la base de datos
                if (is_array($resultado) && count($resultado) > 0) {
                    $_SESSION["e_id"] = $resultado["e_id"];
                    $_SESSION["e_uid"] = $resultado["e_uid"];
                    $_SESSION["e_name"] = $resultado["e_name"];
                    $_SESSION["e_last1"] = $resultado["e_last1"];
                    $_SESSION["e_last2"] = $resultado["e_last2"];
                    $_SESSION["e_mail"] = $resultado["e_mail"];

                    # Redireccionar a la página de inicio
                    header("Location:" . Conectar::ruta() . "Home/");
                    exit();
                } else {
                    # Mensaje de error
                    header("Location:" . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }
?>
