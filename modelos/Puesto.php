<?php
    class Puesto extends Conectar {
        public function get_puesto($area_id) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM puestos WHERE area_id=? AND p_stat=1;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $area_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>
