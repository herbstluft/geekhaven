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
if($_GET['universo']){
$universo=$_GET['universo'];

$insertUniversoQry="INSERT INTO `universo`(`universo`) VALUES ('$universo')";
$insertUniverso=$db->ejecutarConsulta($insertUniversoQry);

echo " <div class='container mt-5'>
<div class='alert alert-success' role='alert'>
  <div class='row'>
  <h1 class='alert-heading col-12' align='center'>Universo Registrado!</h1>
  </div>";
}
header("Location:/geekhaven/src/views/admin/html/editarUniverso.php");
?>
  </body>
</html>
