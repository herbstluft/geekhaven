<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>Operacion Exitosa!</title>
  </head>
  <body class="">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
    <?php

//falta añadir campo imagen a universo para insertar la imagen
if($_GET['id']){
$universo=$_GET['id'];

//Validar si hay productos con ese universo
$ValidarProductosQry="SELECT productos.id_producto, productos.nom_producto from productos join universo on productos.universo_id = universo.id_universo join detalle_orden on detalle_orden.id_producto = productos.id_producto
where universo.id_universo =$universo and detalle_orden.estatus=1";
$ValidarProductos=$db->seleccionarDatos($ValidarProductosQry);

if(!empty($ValidarProductos)){
  header("Location:/geekhaven/src/views/admin/html/editUniverso.php?mensaje=failed&uni=$universo");
}
else{
$deleteUniversoQry="DELETE FROM `universo` WHERE `id_universo`='$universo'";
$deleteUniverso=$db->ejecutarConsulta($deleteUniversoQry);

header("Location:/geekhaven/src/views/admin/html/editUniverso.php?mensaje=success&uni=$universo");
}
}
?>
  </body>
</html>