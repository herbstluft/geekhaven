<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;
$HOST=$_SERVER['SERVER_NAME'];
if($_GET['id_orden']){

    $id_orden=$_GET['id_orden'];
    $usr=$_GET['usr'];
    $pagAnterior= $_SERVER['HTTP_REFERER'];
    }
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

    <title>DESCARGAR TICKET</title>
  </head>
  <body class="">

  
  <div class="container mt-5"">
  <div class="alert alert-primary" role="alert">
    <div class="row">
    <h4 class="alert-heading col-12" align="center">TU TICKET DEBE DESCARGARSE EN BREVE</h4>
        <p class="" align="center">Si tu ticket no se ha descargado da click <a href="http://<?php echo $HOST?>/var/www/geekhaven/src/scripts/tickets/ticketPedido.php?id_orden=<?php echo $id_orden?>&usr=<?php echo $usr?>">aqui</a></p>
        <hr>
        <p align="center">Si tu ticket ya ha sido descargado puedes volver a la pagina</p>
        
        <center>
        <a href="http://localhost/var/www/geekhaven/" class="btn btn-primary pt-2 pb-2 fs-5">Click aqui para volver</a>
        </center>
    </div>
        
  </div>
  
  <?php
  header("refresh:3;url=http://localhost/var/www/geekhaven/src/scripts/tickets/ticketPedido.php?id_orden='$id_orden'")
  ?>


<script src="/var/www/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/var/www/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/var/www/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/var/www/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/var/www/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>