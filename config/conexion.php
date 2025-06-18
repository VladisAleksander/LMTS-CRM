<?php
    session_start();

    class Conectar {
        protected $dbh;

        # Conexión a la base de datos
        protected function Conexion() {
            try {
                $conectar = $this->dbh = new PDO("mysql:local=localhost;dbname=helpdesk", "root", "Password123");
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
            return "http://localhost/LMTS-CRM/";
        }

    }

?>
