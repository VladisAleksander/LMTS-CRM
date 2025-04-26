<?php
    class Location extends Conectar {
        public function get_location() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM areas WHERE a_stat=1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>
