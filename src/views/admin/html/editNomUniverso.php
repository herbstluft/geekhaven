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
    
    <title>Editar Nombre</title>
  </head>
  <body class="">
    <?php
    include('navbar.php')
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
<br><br><br>
   <h1 align="center">Editar Nombre</h1>
   <hr>

<?php
if($_GET['id']){
    $id_U=$_GET['id'];

    //buscar la imagen de el producto para imprimirla
    $ImagenesQry="SELECT * FROM universo where universo.id_universo=$id_U";
    $Imagenes=$db->seleccionarDatos($ImagenesQry);

    if(isset($_GET['mensaje'])){
      if($_GET['mensaje']=='success'){
        ?><br><br>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          <center><strong>Nombre actualizado con exito!</strong> ahora tus clientes podran verlo en la pagina principal</center>
        </div>
        <?php
      }
    }
    
    if(!isset($Imagenes)){
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
        <center>
        <h2 align="center" class="text-primary">Como se ve actualmente</h2>
       <?php foreach($Imagenes as $res){
             $img=$res['img'];
         ?>
          <div class="col-12 col-md-6 text-center" style="margin-bottom:30px">
          <article class="card card--1" style="margin-left:20px">

          <div class="card__info">
          <img width="210" height="210" src="/geekhaven/src/scripts/insersiones/<?php echo $res['img']?>" >
            <h3 class="card__title"><?php echo $res['universo'];?></h3>
            </center>
          </div>
          </article>
          
          
  <?php
  echo ""; }

    }
  
  ?>
  <div class="col-sm-12 col-md-5">
    
    <form action="/geekhaven/src/scripts/insersiones/editNomUniverso.php" method="post" enctype="multipart/form-data">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Inserta el nuevo nombre</label>
        <input type="text" name="universo" value ="<?php foreach($Imagenes as $res){echo $res['universo'];} ?>"class="form-control" required>
        <div id="emailHelp" class="form-text"></div>
        <input type="hidden" name="id"value="<?php echo $id_U?>">
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

//  header("Location:/geekhaven/src/views/admin/html/editUniverso.php");