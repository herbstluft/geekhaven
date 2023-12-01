<?php

use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;


if ($_SERVER["REQUEST_METHOD"] === "POST")  {

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $existencia = $_POST['existencia'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];
    $universo = $_POST['universo'];
    $fecha_actual = $_POST['fecha'];
    $costo = $_POST['costo'];

    $sql = "INSERT INTO productos (nom_producto, precio, descripcion, existencia, estado, id_cat, tipo_id, universo_id, fecha, precio_base) 
    VALUES ('$nombre', '$precio', '$descripcion', '$existencia', '$estado', '$categoria', '$tipo', '$universo', '$fecha_actual', '$costo')";
    
    $result = $db->ejecutarConsulta($sql);

     // Verificar si la consulta fue exitosa
  if ($result) {
      

    header("Location:/var/www/geekhaven/src/views/admin/html/agregar_producto.php?mensaje=success");

} else {
  echo "Error en la operación. Consulta: $result";
}

    $sql= "SELECT * FROM productos WHERE nom_producto = '$nombre' AND fecha = '$fecha_actual';";
    $result = $db->seleccionarDatos($sql);
    foreach($result as $res){
        $id_prd= $res['id_producto'];
    }


}

?>



<?php

if (isset($_FILES['imagen'])) {
  $id_usuario = $_POST['id_usuario'];

  // Carpeta temporal para almacenar las imágenes
  $carpeta_temporal = 'img_producto/';
  if (!is_dir($carpeta_temporal)) {
      mkdir($carpeta_temporal, 0755, true);
  }

  // Comprobamos si se ha subido una sola imagen
  if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['imagen']['tmp_name'])) {
      // Comprobamos si el fichero es una imagen
      if ($_FILES['imagen']['type'] == 'image/png' || $_FILES['imagen']['type'] == 'image/jpeg') {

          // Guardamos los datos de la imagen
          $nombre_imagen = $_FILES['imagen']['name'];
          $ruta_temporal = $_FILES['imagen']['tmp_name'];
          $ruta_destino = $carpeta_temporal . $nombre_imagen;

          // Movemos la imagen a la carpeta temporal
          if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
              // Guardar el nombre de la imagen en la base de datos
              $db->ejecutarConsulta("INSERT INTO img_productos (id_producto, nombre_imagen) VALUES ($id_prd, '$nombre_imagen')");
          }
      } else {
          $validar = false;
      }
  } else {
      $validar = false;
  }
}




?>