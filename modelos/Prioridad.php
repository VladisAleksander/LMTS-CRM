<?php
    class Prioridad extends Conectar {
        public function get_prioridad() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM prioridad WHERE n_stat=1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>
