<?php
  use MyApp\data\Database;
  require("../../../../vendor/autoload.php");
  $db = new Database;

?>
<!DOCTYPE html>
<html lang="en">
  <head> 
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/var/www/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/var/www/geekhaven/bootstrap/css/estilos.css" />
    
    <title>Editar Imagen</title>
  </head>
  <body class="">
    <?php
    include('navbar.php')
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
<br><br><br>
   <h1 align="center">Editar imagen del producto</h1>
   <hr>
   <a href="/var/www/geekhaven/src/views/admin/html/editar_producto.php" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>  
          </a>
   <br><br><br><br>
   <?php
   if($_GET['id']){
      $id_prd=$_GET['id'];

      if(isset($_GET['mensaje'])){
        $mensaje=$_GET['mensaje'];

          if($mensaje=='success'){
            ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <center>¡La imagen del producto ha sido <strong>editada exitosamente!</strong> </center>
        </div>
            <?php
          }
          else{
            ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <center>¡Hubo un error! <strong>la imagen no pudo ser editada.</strong> </center>
        </div>
            <?php
          }
      }
   }
   ?>
   
      <div class="row">
              
        <div class="col-sm-12 col-md-6">
        <h2 align="center" class="text-primary">Imagen actual</h2>
      <center>  
      <?php 
      //SACAR IMAGEN
      $ImgPrdQry="SELECT img_productos.nombre_imagen from img_productos join productos on img_productos.id_producto = productos.id_producto where productos.id_producto=$id_prd";
      $ImgPrd=$db->seleccionarDatos($ImgPrdQry);
      if(!empty($ImgPrd)){
      foreach($ImgPrd as $res){
        $imagen=$res['nombre_imagen'];

      ?>  
      <img width="410" height="410" src="/var/www/geekhaven/src/views/admin/html/img_producto/<?php echo $imagen;?>" ></center> 
      <?php echo "";}
      }
      else{
        ?>
        <img width="410" height="410" src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" ></center> 
        <?php
      }
      ?>
        </div>
  <div class="col-sm-12 col-md-5 ms-5">
    
    <form action="/var/www/geekhaven/src/scripts/insersiones/editImgPrd.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Inserta la nueva imagen</label>
        <input type="file"id="image" name="imagen" accept="image/*"class="form-control" required>
        <div id="emailHelp" class="form-text">Al insertar una nueva imagen se borrara la imagen actual</div>
        <input type="hidden" name="id"value="<?php echo $id_prd;?>">
      </div>
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
  </div>
  </div>>
 <script src="/var/www/geekhaven/bootstrap/js/upload_photo_multiple.js"></script>
          <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
          <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
          <script src="../assets/js/sidebarmenu.js"></script>
          <script src="../assets/js/app.min.js"></script>
          <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
 </body>
</html>
<?php

//  header("Location:/var/www/geekhaven/src/views/admin/html/editUniverso.php");