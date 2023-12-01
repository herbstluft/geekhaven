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
   <h1 align="center">Editar Imagen</h1>
   <hr>
   <a href="/var/www/geekhaven/src/views/admin/html/editUniverso.php" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>  
          </a>
<?php
if($_GET['id']){
    $id_U=$_GET['id'];

    //buscar la imagen de el producto para imprimirla
    $ImagenesQry="SELECT universo.img FROM universo where universo.id_universo=$id_U";
    $Imagenes=$db->seleccionarDatos($ImagenesQry);

    if(isset($_GET['mensaje'])){
      if($_GET['mensaje']=='success'){
        ?><br><br>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <center><strong>Imagen actualizada con exito</strong> ahora tus clientes podran verla en la pagina principal</center>
        </div>
        <?php
      }
    }
    if(empty($Imagenes)){
        ?><br><br><br><br>
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <center><strong>Este universo no tiene imagenes</strong> añade una para que los clientes puedan verla!</center>
        </div>
        <?php
    }
    else{
      ?>
      <br><br><br><br>
      <div class="row">
        <div class="col-sm-12 col-md-6">
        <h2 align="center" class="text-primary">Imagen actual</h2>
      <?php foreach($Imagenes as $res){?>
      <center>  <img width="410" height="410" src="/var/www/geekhaven/src/scripts/insersiones/<?php echo $res['img']?>" ></center> 
        </div>
           
      <?php
    }
  }
  ?>
  <div class="col-sm-12 col-md-5 me-5">
    
    <form action="/var/www/geekhaven/src/scripts/insersiones/editImgUniverso.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Inserta la nueva imagen</label>
        <input type="file"id="image" name="imagen" accept="image/*"class="form-control" required>
        <div id="emailHelp" class="form-text">Al insertar una nueva imagen se borrara la imagen actual</div>
        <input type="hidden" name="id"value="<?php echo $id_U?>">
      </div>
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
  </div>
  </div>
  <?php
}
?>
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