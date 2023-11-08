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
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['imagen']) && isset($_GET['universo'])) {
        $imagenBase64 = $_GET['imagen'];
        $universo = $_GET['universo'];

        // Decodificar la imagen Base64
        $imagenBinaria = base64_decode($imagenBase64);

        // Ruta donde deseas guardar la imagen
        $carpeta_destino = 'img_u/';

        // Genera un nombre único para la imagen
        $nombre_archivo = uniqid() . '.jpg';

        // Ruta completa de la imagen
        $ruta_imagen = $carpeta_destino . $nombre_archivo;

        // Guardar la imagen en el servidor
        file_put_contents($ruta_imagen, $imagenBinaria);

        // Inserta el nombre de la imagen en la base de datos junto con otros datos
        // Aquí debes agregar código para insertar en la base de datos, por ejemplo, utilizando SQL
        $insertQry="INSERT INTO `universo`(`universo`, `img`) VALUES ('$universo','$ruta_imagen')";
        $insert=$db->ejecutarConsulta($insertQry);
    } else {
        echo "Parámetros incorrectos en la URL.";
    }
} else {
    echo "Acceso no permitido.";
}


header("Location:/geekhaven/src/views/admin/html/editUniverso.php");
?>
  </body>
</html>
