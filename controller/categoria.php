<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Categoria.php";
    $categorias = new Categoria();
    $datos = $categorias->get_categoria();
    $html = "<option  value='' disabled selected>- Seleccione una categoria -</option>";
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "combo":
                $data = Array();
                foreach ($datos as $row) {
                    $html .= "<option value='" . $row["c_id"] . "'>" . $row["c_name"] . "</option>";
                }
                echo $html;
            break;
        }
    } else {
        $html = "<option value=''>No hay categorias</option>";
    }
?>
