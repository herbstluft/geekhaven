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
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />
    
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

<?php
if(isset($_GET['id'])){
    $id_prd=$_GET['id'];

    //buscar la imagen de el producto para imprimirla
    $ImagenesQry="SELECT nombre_imagen as img FROM img_productos where img_productos.id_producto=$id_prd";
    $Imagenes=$db->seleccionarDatos($ImagenesQry);

    if(isset($_GET['mensaje'])){
      if($_GET['mensaje']=='success'){
        ?><br><br>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <center><strong>Imagen actualizada con exito</strong> ahora tus clientes podran verla en la pagina principal</center>
        </div>
        <?php
      }
    } else{
      ?>
      <br><br><br><br>
      <div class="row">
        <div class="col-sm-12 col-md-6">
        <h2 align="center" class="text-primary">Imagen actual</h2>
      <?php foreach($Imagenes as $res){?>
      <center>  <img width="410" height="410" src="/geekhaven/src/views/admin/html/img_producto/<?php echo $res['img']?>" ></center> 
        </div>
           
      <?php
    }
  }
  ?>
  <div class="col-sm-12 col-md-5 me-5">
    
    <form action="\geekhaven\src\views\admin\html\editrimg.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Inserta la nueva imagen</label>
        <input type="file"id="image" name="imagen" accept="image/*"class="form-control" required>
        <div id="emailHelp" class="form-text">Al insertar una nueva imagen se borrara la imagen actual</div>
        <input type="hidden" name="id"value="<?php echo $id?>">
      </div>
      <button type="submit" class="btn btn-primary">Guardar Cambios</button>
    </form>
  </div>
  </div>
  <?php
}
?>
 <script src="/geekhaven/bootstrap/js/upload_photo_multiple.js"></script>
          <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
          <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
          <script src="../assets/js/sidebarmenu.js"></script>
          <script src="../assets/js/app.min.js"></script>
          <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
 </body>
</html>
<?php

