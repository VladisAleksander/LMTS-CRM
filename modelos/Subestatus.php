<?php
    class Subestatus extends Conectar {
        public function get_subestatus($est_id) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM subestatus WHERE est_id=? AND se_stat=1;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $est_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>
