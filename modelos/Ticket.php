<?php
    class Ticket extends Conectar {
        
        // Función para generar número de ticket único
        private function generarTicketID($conectar) {
            $fecha = date("Ymd");
            $maxIntentos = 10;
    
            for ($i = 0; $i < $maxIntentos; $i++) {
                $sql = "SELECT COUNT(*) as total FROM tickets WHERE DATE(t_crea) = CURDATE()";
                $stmt = $conectar->prepare($sql);
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $conteo = $row['total'] + 1 + $i; // se suma $i para evitar duplicado en intentos
    
                $codigo = str_pad($conteo, 3, "0", STR_PAD_LEFT);
                $t_num = "INC$fecha$codigo";
    
                // Verificamos si ya existe ese número
                $check = $conectar->prepare("SELECT COUNT(*) FROM tickets WHERE t_num = ?");
                $check->execute([$t_num]);
                $existe = $check->fetchColumn();
    
                if ($existe == 0) {
                    return $t_num;
                }
            }
    
            throw new Exception("No fue posible generar un número de ticket único después de varios intentos.");
        }

        public function insert_ticket($t_tit, $area_id, $emp_id, $t_phone, $cat_id, $scat_id, $t_desc) {
            $conectar = parent::conexion();
            parent::set_names();

            // Obtener número de ticket único
            $t_num = $this -> generarTicketID($conectar);
            
            $sql = "INSERT INTO tickets (t_num, t_tit, area_id, emp_id, t_phone, cat_id, scat_id, niv_id, est_id, sest_id, t_desc, t_crea, t_upd) VALUES (?, ?, ?, ?, ?, ?, ?, 4, 1, 1, ?, NOW(), NOW());";
            
            $sql = $conectar->prepare($sql);
            
            $sql -> bindValue(1, $t_num);
            $sql -> bindValue(2, $t_tit);
            $sql -> bindValue(3, $area_id);
            $sql -> bindValue(4, $emp_id);
            $sql -> bindValue(5, $t_phone);
            $sql -> bindValue(6, $cat_id);
            $sql -> bindValue(7, $scat_id);
            $sql -> bindValue(8, $t_desc);
            $sql -> execute();
            return $t_num;
        }

        public function update_ticket($t_id, $t_tit, $area_id, $t_phone, $cat_id, $scat_id, $niv_id, $est_id, $sest_id, $t_desc, $t_close_user = null) {
            $conectar = parent::conexion();
            parent::set_names();
            
            // Si el ticket está en estado "Cerrado", actualiza también el usuario que lo cerró y la fecha de cierre
            if ($est_id == 6 && $t_close_user !== null) {
                $sql = "UPDATE tickets 
                        SET t_tit        = ?, 
                            area_id      = ?, 
                            t_phone      = ?, 
                            cat_id       = ?, 
                            scat_id      = ?, 
                            niv_id       = ?, 
                            est_id       = ?, 
                            sest_id      = ?, 
                            t_desc       = ?, 
                            t_close_user = ?,
                            t_close      = NOW(), 
                            t_upd        = NOW()
                        WHERE t_id = ?;";
                
                $sql = $conectar->prepare($sql);
        
                $sql->bindValue(1,  $t_tit);
                $sql->bindValue(2,  $area_id);
                $sql->bindValue(3,  $t_phone);
                $sql->bindValue(4,  $cat_id);
                $sql->bindValue(5,  $scat_id);
                $sql->bindValue(6,  $niv_id);
                $sql->bindValue(7,  $est_id);
                $sql->bindValue(8,  $sest_id);
                $sql->bindValue(9,  $t_desc);
                $sql->bindValue(10, $t_close_user); 
                $sql->bindValue(11, $t_id);
            } else {
                // Si no está cerrado, no se actualiza el campo t_close_user ni t_close y forzamos t_close_user a NULL
                $sql = "UPDATE tickets 
                        SET t_tit        = ?, 
                            area_id      = ?, 
                            t_phone      = ?, 
                            cat_id       = ?, 
                            scat_id      = ?, 
                            niv_id       = ?, 
                            est_id       = ?, 
                            sest_id      = ?, 
                            t_desc       = ?, 
                            t_close_user = NULL,
                            t_close      = NULL,
                            t_upd        = NOW()
                        WHERE t_id = ?;";
                
                $sql = $conectar->prepare($sql);
        
                $sql->bindValue(1,  $t_tit);
                $sql->bindValue(2,  $area_id);
                $sql->bindValue(3,  $t_phone);
                $sql->bindValue(4,  $cat_id);
                $sql->bindValue(5,  $scat_id);
                $sql->bindValue(6,  $niv_id);
                $sql->bindValue(7,  $est_id);
                $sql->bindValue(8,  $sest_id);
                $sql->bindValue(9,  $t_desc);
                $sql->bindValue(10, $t_id);
            }

            $sql -> execute();
            return $sql->rowCount(); // Devuelve cuántas filas se actualizaron
        }        

        public function listarTicketUsuario($emp_id) {
            $conectar = parent::conexion();
            parent::set_names();
            
            $sql = "SELECT
                tickets.t_id,
                tickets.t_num,
                tickets.t_tit,
                tickets.area_id,
                tickets.emp_id,
                tickets.t_phone,
                tickets.cat_id,
                tickets.scat_id,
                tickets.niv_id,
                tickets.est_id,
                tickets.sest_id,
                tickets.t_desc,
                tickets.t_crea,
                empleados.e_name,
                empleados.e_last1,
                areas.a_name,
                categorias.c_name,
                subcategorias.sc_name,
                estatus.st_name,
                subestatus.se_name,
                prioridad.n_name
                FROM tickets
                INNER JOIN empleados ON tickets.emp_id  = empleados.e_id
                INNER JOIN areas ON tickets.area_id = areas.a_id
                INNER JOIN categorias ON tickets.cat_id = categorias.c_id
                INNER JOIN subcategorias ON tickets.scat_id = subcategorias.sc_id
                INNER JOIN estatus ON tickets.est_id = estatus.st_id
                INNER JOIN subestatus ON tickets.sest_id = subestatus.se_id
                INNER JOIN prioridad ON tickets.niv_id = prioridad.n_id
                WHERE tickets.emp_id = ?";
            
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1, $emp_id);

            $sql -> execute();
            return $resultado = $sql->fetchAll();
        }

        public function listarTicket() {
            $conectar = parent::conexion();
            parent::set_names();
            
            $sql = "SELECT
                tickets.t_id,
                tickets.t_num,
                tickets.t_tit,
                tickets.area_id,
                tickets.emp_id,
                tickets.t_phone,
                tickets.cat_id,
                tickets.scat_id,
                tickets.niv_id,
                tickets.est_id,
                tickets.sest_id,
                tickets.t_desc,
                tickets.t_crea,
                empleados.e_name,
                empleados.e_last1,
                areas.a_name,
                categorias.c_name,
                subcategorias.sc_name,
                estatus.st_name,
                subestatus.se_name,
                prioridad.n_name
                FROM tickets
                INNER JOIN empleados ON tickets.emp_id  = empleados.e_id
                INNER JOIN areas ON tickets.area_id = areas.a_id
                INNER JOIN categorias ON tickets.cat_id = categorias.c_id
                INNER JOIN subcategorias ON tickets.scat_id = subcategorias.sc_id
                INNER JOIN estatus ON tickets.est_id = estatus.st_id
                INNER JOIN subestatus ON tickets.sest_id = subestatus.se_id
                INNER JOIN prioridad ON tickets.niv_id = prioridad.n_id";
            
            $sql = $conectar->prepare($sql);

            $sql -> execute();
            return $resultado = $sql->fetchAll();
        }

        public function listarTicketDetalle($tick_id) {
            $conectar = parent::conexion();
            parent::set_names();
            
            $sql = "SELECT
                ticket_detalles.td_id,
                ticket_detalles.tick_id,
                ticket_detalles.td_desc,
                ticket_detalles.td_crea,
                tickets.t_num,
                empleados.e_name,
                empleados.e_last1,
                empleados.e_last2,
                areas.a_name,
                puestos.p_tit
                FROM ticket_detalles
                INNER JOIN tickets ON ticket_detalles.tick_id  = tickets.t_id
                INNER JOIN empleados ON ticket_detalles.emp_id  = empleados.e_id
                INNER JOIN areas ON empleados.area_id = areas.a_id
                INNER JOIN puestos ON empleados.pue_id = puestos.p_id
                WHERE tick_id = ?";
            
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1, $tick_id);

            $sql -> execute();
            return $resultado = $sql->fetchAll();
        }

        public function listarTicketID($tick_id) {
            $conectar = parent::conexion();
            parent::set_names();
            
            $sql = "SELECT
                tickets.t_id,
                tickets.t_num,
                tickets.t_tit,
                tickets.area_id,
                tickets.emp_id,
                tickets.t_phone,
                tickets.cat_id,
                tickets.scat_id,
                tickets.niv_id,
                tickets.est_id,
                tickets.sest_id,
                tickets.t_desc,
                tickets.t_crea,
                empleados.e_name,
                empleados.e_last1,
                empleados.e_last2,
                empleados.e_mail,
                empleados.e_phone,
                areas.a_name,
                categorias.c_name,
                subcategorias.sc_name,
                estatus.st_name,
                subestatus.se_name,
                prioridad.n_name
                FROM tickets
                INNER JOIN empleados ON tickets.emp_id  = empleados.e_id
                INNER JOIN areas ON tickets.area_id = areas.a_id
                INNER JOIN categorias ON tickets.cat_id = categorias.c_id
                INNER JOIN subcategorias ON tickets.scat_id = subcategorias.sc_id
                INNER JOIN estatus ON tickets.est_id = estatus.st_id
                INNER JOIN subestatus ON tickets.sest_id = subestatus.se_id
                INNER JOIN prioridad ON tickets.niv_id = prioridad.n_id
                WHERE tickets.t_id = ?";
            
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1, $tick_id);

            $sql -> execute();
            return $resultado = $sql->fetchAll();
        }

        public function insert_ticket_detalle($tick_id, $emp_id, $td_desc) {
            $conectar = parent::conexion();
            parent::set_names();
            
            $sql = "INSERT INTO ticket_detalles (tick_id, emp_id, td_desc, td_crea, td_stat) VALUES (?, ?, ?, NOW(), 1);";
            
            $sql = $conectar->prepare($sql);
            
            $sql -> bindValue(1, $tick_id);
            $sql -> bindValue(2, $emp_id);
            $sql -> bindValue(3, $td_desc);
            $sql -> execute();
            return $resultado = $sql->fetchAll();
        }
    }

?>
