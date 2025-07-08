<?php
    class Estatus extends Conectar {
        public function get_estatus() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM estatus WHERE st_stat=1;";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>
