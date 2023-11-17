<?php
use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;
session_start();
if (isset($_GET['id'])) {
  $_SESSION['id_producto'] = $_GET['id'];
  $id = $_SESSION['id_producto'];

  // Cambiar el estatus del producto a 0 y reducir la existencia a 0
  $update_query = "UPDATE `productos` SET `estatus` = 0, `existencia` = 0 WHERE id_producto = $id;";
  $result = $db->ejecutarConsulta($update_query);

  // Verificar si la consulta fue exitosa
  if ($result) {
      

        header("Location:/geekhaven/src/views/admin/html/editar_producto.php?mensaje=success");

  } else {
      echo "Error en la operación. Consulta: $result";
  }
}


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

    
  </body>
</html>