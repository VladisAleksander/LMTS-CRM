<?php
    class Perfil extends Conectar {
        public function get_perfil() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql = "SELECT * FROM info_adicional";
            $sql = $conectar->prepare($sql);
            $sql->execute();
            return $resultado = $sql->fetchAll();
        }
    }

