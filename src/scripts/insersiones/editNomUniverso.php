 
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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $universo = $_POST['universo'];
  $id=$_POST['id'];
  // validar si el nombre que se inserto ya existe
  $validacionQry="SELECT * from universo where universo.universo='$universo'";
  $validacion=$db->seleccionarDatos($validacionQry);
  if(!empty($validacion)){
    header("Location:/var/www/geekhaven/src/views/admin/html/editNomUniverso.php?mensaje=failed&nom=$universo&id=$id");
  }
  else{
   $insertQry = "UPDATE `universo`SET`universo`='$universo' WHERE universo.id_universo=$id";
    $inertar=$db->ejecutarConsulta($insertQry);
    header("Location:/var/www/geekhaven/src/views/admin/html/editNomUniverso.php?mensaje=success&id=$id&nom=$universo");
  }
} 

else {
    echo "Acceso no permitido.";

    
}

?>


  </body>
</html>
