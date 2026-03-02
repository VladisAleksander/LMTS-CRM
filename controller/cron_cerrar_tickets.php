<?php
    // Incluimos tu archivo de conexión (ajusta la ruta si es necesario)
    require_once dirname(__FILE__) . '../config/conexion.php';
    //require_once "../config/conexion.php";

    class CronTicket extends Conectar {
        public function cerrarTicketsAntiguos() {
            $conectar = parent::conexion();
            parent::set_names();

            // La consulta SQL que cierra los tickets con 3 o más días de "Resueltos"
            // Nota: ID 6 = Cerrado, ID 14 = Ticket Resuelto (Subestatus)
            $sql = "UPDATE tickets
                    SET est_id = 6,
                        sest_id = 14,
                        t_close = NOW(),
                        t_upd = NOW()
                    WHERE est_id = 5
                    AND DATEDIFF(NOW(), t_upd) >= 3";
            
            $sql = $conectar->prepare($sql);
            $sql->execute();

            // Esto nos servirá para saber cuántos tickets se cerraron si revisamos el log del servidor
            $afectados = $sql->rowCount();
            echo "Tarea finalizada. Tickets cerrados automáticamente: " . $afectados;
        }
    }

    // Ejecutamos la función
    $cron = new CronTicket();
    $cron->cerrarTicketsAntiguos();
?>