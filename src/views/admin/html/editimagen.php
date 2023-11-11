<?php

    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;
    if(isset($_GET['id'])){
        $_SESSION ['id_producto']=$_GET['id'];
       $id =  $_SESSION ['id_producto'];
    }

    if(isset($_POST['guardar_imagen'])){
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $fecha_actual = $_POST['fecha'];
    //Actualizar costo
    $update_imagen_nuveo = "UPDATE `productos` SET `precio_base` = '$costo' WHERE id_producto = $_SESSION[id_producto]";
    $update_costo=$db->ejecutarConsulta($update_costo_nuveo);

    }

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />

</head>
<body>
<?php include('navbar.php') ?>

<?php


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
                $db->ejecutarConsulta("INSERT INTO img_productos (id_producto,nombre_imagen) VALUES ('$id_prd','$nombre_imagen')");
            }
        }
    }
      }
      else $validar=false;
    }
  }

?>
<br><br><br>

        <form action="editimagen.php" method="post" enctype="multipart/form-data">
            <div class="my-form"  style="display: contents; margin-top: 0;">
                <div id="drop-area">
                    <center>
                        <p>Puede subir varios archivos con el cuadro de diálogo de archivos.</p>
                    </center>
                    <center>
                        <input type="file" id="fileElem" name="imagen[]" value="" multiple accept="image/*" onchange="handleFiles(this.files)"> 
                        <label class="button" for="fileElem">Seleccione las imagenes</label>
                        <br><br>
                        <progress id="progress-bar" max=100 value=0 style="width:100%;"></progress>
                    </center>      
                         <center>
                <div id="gallery" /> </div>
                         </center>
                </div>
        
                        <center> <button type="submit" name="guardar_imagen" class="btn" style="background: #005aff; padding-left:30px; padding-right:30px; color:white">Guardar Cambios</button></center>
        
                </div>
                </form>
        
</body>

          <!--Este es necesario para que funcione el de agregar imagenes-->
        
          <script src="/geekhaven/bootstrap/js/upload_photo_multiple.js"></script>
          <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
          <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
          <script src="../assets/js/sidebarmenu.js"></script>
          <script src="../assets/js/app.min.js"></script>
          <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</html>