<?php
    class Subcategoria extends Conectar {
        public function get_subcategoria($cat_id) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM subcategorias WHERE cat_id=? AND sc_stat=1;";
            $sql = $conectar->prepare($sql);
            $sql->bindValue(1, $cat_id);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>
