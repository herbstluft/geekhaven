<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;


//si hay un metodo FIles[imagen]
if (isset($_FILES['imagen'])){
  
  
  $id_usuario = $_POST['id_usuario'];

   // Carpeta temporal para almacenar las imágenes
   $carpeta_temporal = 'img_pub_trq/';
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
              $db->ejecutarConsulta("INSERT INTO imagenes (id_usuario, nombre_imagen) VALUES ($id_usuario, '$nombre_imagen')");
          }
      }
  }
	}
	else $validar=false;
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GeekMarket Publica Productos En Linea</title>
    <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
    <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />
</head>

<style>

</style>

<body>
    <?php
    // Incluye tu navbar o cualquier otro contenido común
    include('../../../templates/navbar_user.php');
    ?>

    <div class="container-fluid">
        <div style="padding: 20px">


            <h2 class="text-center">GeekMarket Publica Productos En Linea</h2>
            <p class="text-center" style="color:#838383; font-size:20px">Publica y vende</p>

            <form action="crear_publicacion.php" method="post" enctype="multipart/form-data">
                <div class="col-12">
                    <label class="form-label">Nombre Del Producto</label>
                    <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre del producto (Obligatorio)" style="padding:15px" required>
                </div>

                <br>

                <div class="col-12">
                    <label class="form-label">Descripcion de la publicacion</label>
                    <textarea class="form-control" name="descripcion" rows="3" placeholder="Descripcion (Obligatorio)" required></textarea>
                    <small>Limite De Caracteres: 50</small>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-6 col-lg-6"><br>
                        <label class="form-label">Estado Del Producto</label>
                        <select class="form-select" style="margin-top:0px; padding:15px " aria-label="Default select example" name="estado_producto" id="estado_producto">
                            <option value="Nuevo">Nuevo</option>
                            <option value="Semi-usado">Semi-usado</option>
                            <option value="Usado">Usado</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-lg-6"><br>
                        <label class="form-label">Precio Del Producto</label>
                        <input type="text" class="form-control" name="precio_producto" placeholder="$ Precio del producto (Obligatorio)" style="padding:15px" required>
                    </div>
                </div>

                




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

                <input type="hidden" name="id_usuario" value="41">
                <center> <button type="submit" name="guardar_datos_personales" class="btn" style="background: #005aff; padding-left:30px; padding-right:30px; color:white">Publicar</button></center>

            </div>






          </form>



        </div>
    </div>


<!--Este es necesario para que funcione el de agregar imagenes-->

    <script src="/geekhaven/bootstrap/js/upload_photo_multiple.js"></script>
    <script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
    <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
    <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>
