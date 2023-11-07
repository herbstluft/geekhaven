<?php
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database;

 if($_GET['orden']){
    $id_orden=$_GET['orden'];
  }

  //actualizar existencia
    //Consulta
    $prodExsQry="SELECT  detalle_orden.estatus, productos.nom_producto, productos.existencia, detalle_orden.cantidad,productos.id_producto, detalle_orden.id_orden FROM
    productos join detalle_orden on productos.id_producto = detalle_orden.id_producto where id_orden = $id_orden";
    $prodExs=$db->seleccionarDatos($prodExsQry);

    //execute
    foreach($prodExs as $res){
      $producto = $res['id_producto'];
      $cant = $res['cantidad'];
      $exist = $res['existencia'];

      $nuevaExist = $exist + $cant;

      //Insertar nueva existencia

      $updateQry="UPDATE `productos` SET `existencia`='$nuevaExist' WHERE `id_producto`=$producto";
      $update = $db->ejecutarConsulta($updateQry);
    }


  // establecer zona hoaria
    date_default_timezone_set("America/Mexico_City");

  // asignar a una variable la fecha actual
    $fechaHoy= date("Y-m-d H:i:s");
  $declinarVentaQry="DELETE FROM `detalle_orden` WHERE `id_orden`= $id_orden";
  $declinarVenta=$db->ejecutarConsulta($declinarVentaQry);

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

    <title>VENTA DECLINADA</title>
  </head>
  <body class="d-flex vw-100 vh-100 align-items-center justify-content-center">
    
  <div class="container mt-5"">
  <div class="alert alert-danger" role="alert">
    <div class="row">
    <h1 class="alert-heading col-12" align="center">VENTA DECLINADA</h1>
    </div>
        
  </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php header("refresh:2;url=/geekhaven/src/views/admin/html/listaPedidos.php");