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

$deleteUniversoQry="DELETE FROM `universo` WHERE `id_universo`='$universo'";
$deleteUniverso=$db->ejecutarConsulta($deleteUniversoQry);

echo " <div class='container mt-5'>
<div class='alert alert-success' role='alert'>
  <div class='row'>
  <h1 class='alert-heading col-12' align='center'>Universo Eliminado</h1>
  </div>";
}
header("Location:/geekhaven/src/views/admin/html/editarUniverso.php");
?>
  </body>
</html>