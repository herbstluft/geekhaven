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
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $producto = $_POST['id'];
  $comprobacionQry="SELECT productos.nom_producto from productos where productos.nom_producto=$producto";
  $comprobacion = $db->seleccionarDatos($comprobacionQry);
 
    if (isset($_FILES['imagen']['name'])) {
        $nombre_archivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
        $carpeta_destino = 'img_producto/';
        $ruta_imagen = $carpeta_destino . $nombre_archivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
            // Inserta la ruta de la imagen en la base de datos
            $insertQry = "UPDATE `img_productos` SET `nombre_imagen` = '$nombre_archivo' WHERE `id_producto` = $producto";
            $insert = $db->ejecutarConsulta($insertQry);

            if ($insert === false) {
                die('Error al insertar datos en la base de datos.');
            }

            
        } else {
            echo 'Error al mover la imagen al servidor.';
        }
    } else {
        echo "Parámetros incorrectos en la solicitud.";
    }
    header("Location:/geekhaven/src/views/admin/html/editimagen.php?mensaje=success&id=$producto");
} 

else {
    echo "Acceso no permitido.";

    
}

?>


  </body>
</html>
