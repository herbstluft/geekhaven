<?php
   use MyApp\data\Database;
   require("../../../vendor/autoload.php");
   $db = new Database;

if(isset($_GET['id_o'])){
  $id_orden=$_GET['id_orden'];
  $cantidad=$_GET['cantidad'];
  $total=$_GET['total'];
  $fecha=$_GET['fecha'];

  $sql = "SELECT productos.nom_producto as 'nombre_ind', productos.precio as 'precio_ind', detalle_orden.cantidad as 'cant_ind' from detalle_orden INNER JOIN productos on productos.id_producto=detalle_orden.id_producto WHERE detalle_orden.id_orden=$id_orden and detalle_orden.id_usuario=35";

  $mis_compras=$db->seleccionarDatos($sql);
}

 

 

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--Boostrap-->   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!--Boostrap--> 
<link rel="stylesheet" href="../../../bootstrap/css/estilos.css">
</head>
<!--STYLE-->
    <style>

        body {
            font-family: Arial, sans-serif;
            background:#ededed;
            
        }

</style>


<body>
    <!----------------------------------------------------->
    <?php
include('../../../templates/navbar/navbar.php');
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
    $id_usuario=$mis_compras['id_usuario'];
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
            <?php
}
?>
        
    <hr style="opacity:0.1">

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


<center><a href="pedidos.php"><button type="button" class="btn btn-primary">Regresar atras</button></a></center>

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


</body>
</html>