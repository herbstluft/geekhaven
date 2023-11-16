<?php
   use MyApp\data\Database;
   require("../../../vendor/autoload.php");
   $db = new Database;

if(isset($_GET['id_o'])){
  $id_orden=$_GET['id_orden'];
  $cantidad=$_GET['cantidad'];
  $total=$_GET['total'];
  $fecha=$_GET['fecha'];
  $usr=$_GET['usr'];
  $sql = "SELECT productos.nom_producto as 'nombre_ind', productos.precio as 'precio_ind', detalle_orden.cantidad as 'cant_ind' from detalle_orden INNER JOIN productos on productos.id_producto=detalle_orden.id_producto WHERE detalle_orden.id_orden=$id_orden and detalle_orden.id_usuario=$usr";

  $mis_compras=$db->seleccionarDatos($sql);
}

 

 

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
</head>
<!--STYLE-->
    <style>

        body {
            background:white;
            
        }

</style>


<body>
    <!----------------------------------------------------->
    <?php
include('../../../templates/navbar_user.php');
?>
    <!----------------------------------------------------->


    

    
    <br>
    <br><br><br>
<div class="container">
<div class="row">
 <div class="col-md-12">
  
  <h1 class="text-center" style="margin-lefT:25px">Detalle de compra</h1>
  

    <!------------------------------------Lista-------------------------------------->
    <br>
   
<div class="container">
<div class="row">

        <div class="col-12" style="background:white; padding:25px; margin-bottom:30px; border-radius:10px; box-shadow: 0 0 6px rgb(123 123 123 / 30%);">

            <div class="row">
                <div class="col-6">
                    <p><b> <?php echo $fecha ?></b></p>
                </div>
                <div class="col-6 text-end">
                    <b style="color:#0d6efd">Noº de pedido  #<?php echo $id_orden ?></b>
                </div>
            </div>

            <hr style="opacity:0.1">

            <?php

foreach ($mis_compras as $mis_compras){
    $nombre_producto=$mis_compras['nombre_ind'];
    $cantidad_ind=$mis_compras['cant_ind'];
    $precio_ind=$mis_compras['precio_ind'];

?>
          
            <div class="row">
                <div class="col-5" style="margin-bottom:30px">
                    <img src="mj.jpg" style="width:120px; height:120px; border-radius:10px" alt="" srcset="">
                </div>

                <div class="col-7 text-center" style="padding-top:30px">
                    <h5><?php echo $nombre_producto ?></h5>
                    <p><?php echo '$' . $precio_ind ; ?></p><br>
                    <p style="color:red">Cantidad: &ensp; <b style="color:black"><?php echo $cantidad_ind ?></b></p>


                </div>
            </div>
            
    <hr style="opacity:0.2">
            <?php
}
?>
        

            <div class="row">
                <div class="col-6 text-center">
                <h3 style="margin-top:20px;color:red">Cantidad total</h3>
                    <p style="color:black; font-size:20px">
                    <?php 
                        echo $cantidad.' '. 'Productos'; 
                    ?>
                    </p>
                   
                </div>
                <div class="col-6 text-center" >
                   <h3 style="margin-top:20px;color:red">Total</h3>
                    <p style="color:black; font-size:20px"><?php echo '$' . $total; ?></p>
                </div>
            </div>
        </div>



        



        

        



        
   </div>
</div>


<center><a href="misCompras.php?usr=<?php echo $usr?>"><button type="button" class="btn btn-primary col-12 fs-5">Regresar atras</button></a></center>

<br>
<br>
<br>
<!--Banner Recien llegados-->
<br>    
<hr>

<div class="container">
<?php include '../../../templates/footer.html';?>
</div>
<script src="../../../bootstrap/js/buscador.js"></script>
<script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>

</body>
</html>