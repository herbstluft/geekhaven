<?php
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database;

 if($_GET['orden']){
    $id_orden=$_GET['orden'];
  }
  // establecer zona hoaria
    date_default_timezone_set("America/Mexico_City");

  // asignar a una variable la fecha actual
    $fechaHoy= date("Y-m-d H:i:s");
  $RelizarVentaQry="UPDATE `detalle_orden` SET `estatus`='2',`fecha_detalle`='$fechaHoy'WHERE `id_orden`=$id_orden";
  $RelizarVenta=$db->ejecutarConsulta($RelizarVentaQry);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <!-- https://cdnjs.com/libraries/twitter-bootstrap/5.0.0-beta1 -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />

    <!-- Icons: https://getbootstrap.com/docs/5.0/extend/icons/ -->
    <!-- https://cdnjs.com/libraries/font-awesome -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

    <title>Finalizar Venta</title>
  </head>
  <body class="d-flex vw-100 vh-100 align-items-center justify-content-center">
    
  <div class="container mt-5"">
  <div class="alert alert-success" role="alert">
    <div class="row">
    <h1 class="alert-heading col-12" align="center">Venta Finalizada</h1>
    </div>
        
  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php header("refresh:2;url=/geekhaven/src/views/admin/html/listaPedidos.php");