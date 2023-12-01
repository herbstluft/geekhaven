<?php
session_start();
$_SESSION['user'];
$usr=$_SESSION['user'];

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
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"/>
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>Hello, world!</title>
  </head>
  <body class="d-flex vw-100 vh-100 align-items-center justify-content-center">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>


<?php
// Obtener el id orden para hacer una sentencia que borre todos los productos de esa orden
if($_GET['id_orden']){

$id_orden=$_GET['id_orden'];

// $OrdenesDetalladasQry="SELECT detalle_orden.id_do
// FROM usuarios
// JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
// JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
// WHERE usuarios.id_usuario = 40 and detalle_orden.estatus=0 and detalle_orden.id_orden=$id_orden";
// $OrdenesDetalladas=$db->seleccionarDatos($OrdenesDetalladasQry);

    $BorrarDOQry="DELETE FROM `detalle_orden` WHERE `detalle_orden`.`id_orden`=$id_orden";
    $BorrarDO=$db->ejecutarConsulta($BorrarDOQry);

    $pagAnterior= $_SERVER['HTTP_REFERER'];
    header("Location:".$_SERVER['HTTP_REFERER']."");
}
else{
    echo '
            <div class="container">
            <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">ALGO SALIO MAL :(</h4>
            <p>LO SENTIMOS DEBE HABER UN ERROR CON TU ORDEN, VUELVE A INTENTARLO MAS TARDE</p>
            <hr>
            <p class="mb-0"></p>
            </div>';
            header("refresh:2;url=http://localhost/var/www/geekhaven/index.php");
}