<?php
    require_once "../config/conexion.php";
    require_once "../modelos/Subcategoria.php";
    $subcategorias = new Subcategoria();
    $datos = $subcategorias->get_subcategoria($_POST["cat_id"]);
    $html = "<option  value='' disabled selected>- Seleccione una subcategoria -</option>";
    if (isset($_GET["op"])) {
        switch ($_GET["op"]) {
            case "combo":
                $data = Array();
                foreach ($datos as $row) {
                    $html .= "<option value='" . $row["sc_id"] . "'>" . $row["sc_name"] . "</option>";
                }
                echo $html;
            break;
        }
    } else {
        $html = "<option value=''>No hay subcategorias</option>";
    }
?>
