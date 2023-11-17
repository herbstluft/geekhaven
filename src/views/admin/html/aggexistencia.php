<?php
use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;


if(isset($_GET['id'])){
    $_SESSION ['id_producto']=$_GET['id'];
   $id =  $_SESSION ['id_producto'];
}


if(isset($_SESSION['id_producto'])){
            
    
    $productoQry = "SELECT productos.nom_producto, productos.precio, productos.estado, categorias.nom_cat, tipo.tipo, universo.universo, productos.existencia FROM productos join categorias ON productos.id_cat = categorias.id_cat join tipo on productos.tipo_id = tipo.id_tipo JOIN universo ON productos.universo_id = universo.id_universo where productos.id_producto  = $id;";
                    $producto = $db->seleccionarDatos($productoQry);
    

    foreach($producto as $res){
        $prd_nom = $res['nom_producto'];
        $prd_precio = $res['precio'];
        $prd_exist = $res['existencia'];
        $prd_estado = $res['estado'];
        $prd_cat = $res['nom_cat'];
        $prd_tipo = $res['tipo'];
        $prd_universo = $res['universo'];

    }
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

    <?php include('navbar.php') ?>


    <div class="container">
        
    </div>
    <br><br><br><br><br><br>


    <div class="container">
    <div class="row">
          <div class="cont-back">
              <a href="/geekhaven/src/views/admin/html/agregar_existencia.php" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>  
          </a>
          </div>
    
    <?php
if(isset($_GET['mensaje'])){    
    if($_GET['mensaje'] == 'success'){
        ?>
        <center>
        <div class="alert alert-success" role="alert">
            <strong>Existencia Actualizada con exito</strong> 
        </div>
        </center>
        
        <?php
    }  
}

    ?>
    <div class="container">
    <center><h1><?php echo $prd_nom;?></h1></center><br>
    <div class="mb-3">
                <label for="precio" class="form-label"><strong>Precio:</strong> $<?php echo $prd_precio; ?></label>
            </div>
            <div class="mb-3">
                <label for="estado" class="form-label"><strong>Estado:</strong> <?php echo $prd_estado; ?></label>
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label"><strong>Categoría:</strong> <?php echo $prd_cat; ?></label>
            </div>
            <div class="mb-3">
                <label for="tipo" class="form-label"><strong>Tipo:</strong> <?php echo $prd_tipo; ?></label>
            </div>
            <div class="mb-3">
                <label for="universo" class="form-label"><strong>Universo:</strong> <?php echo $prd_universo; ?></label>
            </div>
        </div>

    </div>
        <br><br>
    <div class="container">
        <form action="aggrexistencia.php" method="POST" enctype="multipart/form-data">
              
            <div class="mb-3">
                <label for="existencia" class="form-label"><strong>Existencia</strong></label>
                <input type="text" name="existencia" id="existencia"   value="<?php echo $prd_exist?>" class="form-control" placeholder="Escribe la existencia del producto aquí" required>
            </div>
            <div class="mb-3">
                <input type="hidden" value="<?php echo $id?> "name="id">
                <center> <button  type="submit" name="guardar_producto" class="btn" style="background: #005aff; padding-left:30px; padding-right:30px; color:white">Guardar Cambios</button></center>
            <div class="mb-3">

        </form>
        <br><br>
        <br>

    </div>
    </div>




