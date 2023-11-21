<?php

    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;
    $db1 = new Database;

    if (isset($_GET["id"])) {
      $id = $_GET["id"];
      $imgactualqry = "SELECT img_productos.nombre_imagen from productos join img_productos on productos.id_producto=img_productos.id_producto where productos.id_producto= $id";
      $imgactual = $db->seleccionarDatos($imgactualqry);
    }

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Imagen</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />

</head>
<body>
<?php include('navbar.php') 

?>

<br><br><br><br><br>

<?php
if(isset($_GET['mensaje'])){    
  if($_GET['mensaje'] == 'success'){
      ?>
      <center>
      <div class="alert alert-success" role="alert">
          <strong>Imagen Actualizada</strong> 
      </div>
      </center>
      <br><br><br>
      
      <?php
  }  
}
?>
<div class="row">
          <div class="cont-back">
              <a href="/geekhaven/src/views/admin/html/editar_producto.php" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>  
          </a>
          </div>
        <center><h1>Editar Imagen</h1></center>
        <br><br>
        <center>
        <div class="row">
        <?php
 
  foreach($imgactual as $res){
    $img=$res['nombre_imagen'];

    $contarRegistros="SELECT COUNT(img_productos.nombre_imagen) as cuenta from productos join img_productos on productos.id_producto=img_productos.id_producto where productos.id_producto= $id";
    $contar=$db1->seleccionarDatos($contarRegistros);
    foreach($contar as $conteo){
      if($conteo['cuenta']>1){
        ?>
          
           
              <div class="col-sm-12 col-md-5 ms-5">
              <img width="210" height="210" src="/geekhaven/src/views/admin/html/img_producto/<?php echo $img?>" >
              </div>
           
                
        <?php
      }
      else{
    ?>
    
    <img width="210" height="210" src="/geekhaven/src/views/admin/html/img_producto/<?php echo $img?>" >
    <?php
    
    echo ""; }}
    }
    
  ?>
   </div>
   </center>
  <br><br>
  <div class="alert alert-danger" role="alert">
    <center><strong>ADVERTENCIA</strong> Al actualizar las imagenes se borraran las actuales</center>
  </div>
        <form action="editrimg.php" method="post" enctype="multipart/form-data">
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

                <input type="hidden"value="<?php echo $id?> "name="id">
        
                        <center> <button type="submit" name="guardar_imagen" class="btn" style="background: #005aff; padding-left:30px; padding-right:30px; color:white">Guardar Cambios</button></center>
        
                </div>
                </form>
                <br><br><br><br>
        
</body>

          <!--Este es necesario para que funcione el de agregar imagenes-->
        
          <script src="/geekhaven/bootstrap/js/upload_photo_multiple.js"></script>
          <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
          <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
          <script src="../assets/js/sidebarmenu.js"></script>
          <script src="../assets/js/app.min.js"></script>
          <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</html>