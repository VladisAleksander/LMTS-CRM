<?php
    session_start();

    date_default_timezone_set('America/Mexico_City'); // Ajuste del reloj de PHP para todo el sistema a la zona horaria de México
    class Conectar {
        protected $dbh;

        # Conexión a la base de datos
        protected function Conexion() {
            try {
                //$conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=helpdesk", "root", "Password123");
                $conectar = $this->dbh = new PDO("mysql:host=srv630.hstgr.io;dbname=u798328717_pruebas1", "u798328717_Skull", "Maverick.24");

                // Le decimos a MySQL que esta sesión trabajará en GMT-6
                $this->dbh->query("SET time_zone = '-06:00'");

                return $conectar;
            } catch (Exception $e) {
                print "¡Error de conexión!: La conexión a la base de datos no pudo ser establecida." . $e->getMessage() . "<br/>";
                die();
            }
        }

        # Mandar la información con utf8 (Para evitar problemas con tildes y ñ)
        public function set_names() {
            return $this->dbh->query("SET NAMES 'utf8'");
        }

        #Validar la ruta del proyecto
        public static function ruta() {
            return "/";
        }

    }

?>
