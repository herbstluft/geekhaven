<?php

use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;


if(isset($_POST['id'])){
    
   $id = $_POST['id'];
   $existencia = $_POST ['existencia'];

}
if(isset($_POST['guardar_producto'])){


    //Update Existencia
    $update_existencia_nuevo = "UPDATE `productos` SET `existencia` = '$existencia' WHERE id_producto = $id";
    $update_existencia = $db->ejecutarConsulta($update_existencia_nuevo);


    
    header("location:/geekhaven/src/views/admin/html/aggexistencia.php?mensaje=success&id=$id");
}

?>

