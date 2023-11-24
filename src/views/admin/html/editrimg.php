<?php
   use MyApp\data\Database;
   require("../../../../vendor/autoload.php");
   $db = new Database;

   if(isset($_POST['id'])){
    
    $id = $_POST['id'];
    $img =$_FILES['imagen[]'];
    
 
 }
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
              
              $db->ejecutarConsulta("UPDATE img_productos SET nombre_imagen = '$nombre_imagen' WHERE id_producto = $id_prd");
              
              header("Location:/geekhaven/src/views/admin/html/editimagen.php?mensaje=success");
            }
      } else {
          $validar = false;
      }
  } else {
      $validar = false;
  }
}
?>