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

    // Función para insertar un nuevo ticket en la base de datos, recibiendo como parámetros el título del ticket, el área a la que pertenece, el empleado que lo creó, el teléfono de contacto, la categoría, subcategoría, descripción y equipo relacionado (si aplica)
        public function insert_ticket($t_tit, $area_id, $emp_id, $t_phone, $cat_id, $scat_id, $t_desc, $t_equip = null) {
            $conectar = parent::conexion();
            parent::set_names();

            // Obtener número de ticket único
            $t_num = $this -> generarTicketID($conectar);
            
            $sql = "INSERT INTO tickets (t_num, t_tit, area_id, emp_id, t_phone, cat_id, scat_id, niv_id, est_id, sest_id, t_desc, t_equip, t_crea, t_upd) VALUES (?, ?, ?, ?, ?, ?, ?, 4, 1, 1, ?, ?, NOW(), NOW());";
            
            $sql = $conectar->prepare($sql);
            
            $sql -> bindValue(1, $t_num);
            $sql -> bindValue(2, $t_tit);
            $sql -> bindValue(3, $area_id);
            $sql -> bindValue(4, $emp_id);
            $sql -> bindValue(5, $t_phone);
            $sql -> bindValue(6, $cat_id);
            $sql -> bindValue(7, $scat_id);
            $sql -> bindValue(8, $t_desc);
            $sql -> bindValue(9, $t_equip);
            $sql -> execute();
            return $t_num;
        }

    // Función para actualizar la información de un ticket
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

    // Función para listar la información completa de todos los tickets creados por el usuario
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

    // Función para listar la información completa de todos los tickets, mostrando el nombre completo del empleado que lo creó, el área, la categoría, subcategoría, estatus, subestatus y prioridad, además de la fecha de creación, fecha de cierre (si está cerrado) y el usuario que lo cerró (si está cerrado)
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
                tickets.t_close,
                tickets.t_close_user,
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

    // Función para listar los mensajes de un ticket específico, mostrando el nombre completo del empleado que hizo cada detalle, el área y el puesto al que pertenece, ordenados por fecha de creación de detalle de forma descendente
        public function listarTicketMensajes($tick_id) {
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
                WHERE tick_id = ?
                ORDER BY ticket_detalles.td_crea DESC";
            
            $sql = $conectar->prepare($sql);
            $sql -> bindValue(1, $tick_id);

            $sql -> execute();
            return $resultado = $sql->fetchAll();
        }

    // Función para listar la información completa de un ticket específico, mostrando el nombre completo del empleado que lo creó, el área, la categoría, subcategoría, estatus, subestatus y prioridad, además de la fecha de creación, fecha de cierre (si está cerrado) y el usuario que lo cerró (si está cerrado)
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
                tickets.t_close,
                tickets.t_close_user,
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

    // Función para insertar un nuevo detalle en un ticket específico
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


    // Funciones para la obtención del número total de tickets creados, nuevos, abiertos y cerrados, contados por usuario. Para el área de Soporte se mostrarán los totales de todos los tickets sin importar el usuario, para el resto de las áreas solo se mostrarán los totales de los tickets creados por el usuario.
        public function ticketsTotal ($t_id) { // Cantidad total de tickets creados, sin importar el usuario
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) AS TOTAL FROM tickets";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $t_id);
            $sql->execute();
            return $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function ticketsNuevos ($t_id) { // Cantidad total de tickets creados que están en estado "Nuevo"
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) AS TOTAL FROM tickets WHERE est_id = 1;";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $t_id);
            $sql->execute();
            return $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function ticketsAbiertos ($t_id) { // Cantidad total de tickets creados que están en estado "Nuevo", "En Proceso", "En Espera" o "Escalado" sin importar el usuario
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) AS TOTAL FROM tickets WHERE est_id NOT IN (5, 6)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $t_id);
            $sql->execute();
            return $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function ticketsCerrados ($t_id) { // Cantidad total de tickets creados que están en estado "Resuelto" o "Cerrado"
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) AS TOTAL FROM tickets WHERE est_id IN (5, 6)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $t_id);
            $sql->execute();
            return $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function ticketsUsuarioTotal ($emp_id) { // Cantidad total de tickets creados por el usuario
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) AS TOTAL FROM tickets WHERE emp_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $emp_id);
            $sql->execute();
            return $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        }

        public function ticketsUsuarioAbiertos ($e_id) { // Cantidad total de tickets creados que están en estado "Nuevo", "Abierto", "En Proceso" o "En Espera"
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT COUNT(*) AS TOTAL FROM tickets WHERE emp_id = ? AND est_id NOT IN (5, 6)";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1, $e_id);
            $sql->execute();
            return $resultado = $sql->fetch(PDO::FETCH_ASSOC);
        }
    }

?>
