<?php
    require_once '../../config/conexion.php';
    session_destroy();
    $conectar = new Conectar();
    header("Location: " . $conectar->ruta() . "index.php");
    exit();
?>
