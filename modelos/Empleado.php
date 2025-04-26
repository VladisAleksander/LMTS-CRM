<?php
    class Empleado extends Conectar {

        // Función para generar un e_uid único con formato AB000000
        private function generarUID($nombre, $apellido1, $conectar) {
            $iniciales = strtoupper(substr($nombre, 0, 1) . substr($apellido1, 0, 1));
            do {
                $numeros = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
                $uid = $iniciales . $numeros;
                $stmt = $conectar->prepare("SELECT COUNT(*) FROM empleados WHERE e_uid = ?");
                $stmt->execute([$uid]);
            } while ($stmt->fetchColumn() > 0);
            return $uid;
        }

        // Función para generar correo electrónico único con formato nombre.apellido1@elpunto.com
        private function generarCorreo($nombre, $apellido1, $conectar) {
            $baseCorreo = strtolower(preg_replace('/[^a-zA-Z]/', '', $nombre)) . "." . strtolower(preg_replace('/[^a-zA-Z]/', '', $apellido1));
            $correo = $baseCorreo . "@elpunto.com";
            $contador = 1;

            $stmt = $conectar->prepare("SELECT COUNT(*) FROM empleados WHERE e_mail = ?");
            $stmt->execute([$correo]);

            while ($stmt->fetchColumn() > 0) {
                $correo = $baseCorreo . $contador . "@elpunto.com";
                $stmt->execute([$correo]);
                $contador++;
            }

            return $correo;
        }

        public function insert_empleado($e_name, $e_last1, $e_last2, $e_phone, $e_pass, $pue_id, $area_id) {
            $conectar = parent::conexion();
            parent::set_names();

            $e_uid = $this->generarUID($e_name, $e_last1, $conectar);
            $e_mail = $this->generarCorreo($e_name, $e_last1, $conectar);

            $sql = "INSERT INTO empleados (e_uid, e_name, e_last1, e_last2, e_mail, e_phone, e_pass, pue_id, area_id, e_stat, e_crea, e_mod) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, 1, NOW(), NOW());";

            $sql = $conectar->prepare($sql);

            $sql->bindValue(1, $e_uid);
            $sql->bindValue(2, $e_name);
            $sql->bindValue(3, $e_last1);
            $sql->bindValue(4, $e_last2);
            $sql->bindValue(5, $e_mail);
            $sql->bindValue(6, $e_phone);
            $sql->bindValue(7, $e_pass);
            $sql->bindValue(8, $pue_id);
            $sql->bindValue(9, $area_id);

            $sql->execute();
            return $resultado = $sql->fetchAll();
        }

    }
?>
