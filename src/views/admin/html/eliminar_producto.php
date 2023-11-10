<?php
use MyApp\data\Database;
require("../../../../vendor/autoload.php");
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
$ValidarProductosQry="SELECT productos.id_producto, productos.nom_producto from productos join universo on productos.universo_id = universo.id_universo
where universo.id_universo =$universo";
$ValidarProductos=$db->seleccionarDatos($ValidarProductosQry);

if(!empty($ValidarProductos)){
    echo " <div class='container mt-5'>
<div class='alert alert-danger' role='alert'>
  <div class='row'>
  <h1 class='alert-heading col-12' align='center'>No se puede eliminar este universo!</h1><br>
  <center><p>Aun hay productos con este universo, elimina esos productos primero para poder eliminar el universo</p></center>
  </div>";
  header("refresh:2;url=/geekhaven/src/views/admin/html/editUniverso.php");
}
else{
$deleteUniversoQry="DELETE FROM `universo` WHERE `id_universo`='$universo'";
$deleteUniverso=$db->ejecutarConsulta($deleteUniversoQry);

header("Location:/geekhaven/src/views/admin/html/editUniverso.php");
}
}
?>
  </body>
</html>