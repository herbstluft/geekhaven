<?php
   use MyApp\data\Database;
   require("../../../../vendor/autoload.php");
   $db = new Database;

   if(isset($_POST['id'])){
    
    $id = $_POST['id'];
    $img =$_FILES['imagen[]'];
 
 }

    // Eliminar imágenes actuales asociadas al producto
    $deleteImgQuery = "DELETE FROM img_productos WHERE id_producto =$id;";
    $db->ejecutarConsulta($deleteImgQuery);

    //si hay un metodo FIles[imagen]
    if (isset($_FILES['imagen'])){  
  $id_usuario = $_POST['id_usuario'];

   // Carpeta temporal para almacenar las imágenes
   $carpeta_temporal = 'img_producto/';
   if (!is_dir($carpeta_temporal)) {
       mkdir($carpeta_temporal, 0755, true);
   }

    //cuenta las imagenes que hay en el array
    $cantidad= count($_FILES["imagen"]["tmp_name"]);
    //recorre cada una de las imagenes para saber el nombre de cada una de ellas
    for ($i=0; $i<$cantidad; $i++){
    //Comprobamos si el fichero es una imagen
    if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg'){
    
    //guardamos los datos de cada imagen, por ejemplo el nombre
    if (!empty($_FILES['imagen']['name'][0])) {
      $nombre_imagenes = $_FILES['imagen']['name'];
      $rutas_temporales = $_FILES['imagen']['tmp_name'];
      
  
      for ($i = 0; $i < count($nombre_imagenes); $i++) {
          $nombre_imagen = $nombre_imagenes[$i];  //aqui se guarda el nombre de la imagen
          $ruta_temporal = $rutas_temporales[$i];
          $ruta_destino = $carpeta_temporal . $nombre_imagen;
  
          //movemos las imagenes a la carpeta temporal, en este caso se creo una llamada img_pub_trq
          if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
              // Guardar el nombre de la imagen en la base de datos
              //update
              $db->ejecutarConsulta("UPDATE `img_productos` SET `nombre_imagen`='$nombre_imagen' WHERE `id_producto`='$id'");
          }
      }
  }
    }
    else $validar=false;
  }
  header("location:/geekhaven/src/views/admin/html/editimagen.php?mensaje=success&id=$id");



}
?>