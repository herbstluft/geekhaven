<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;

    $sql = "SELECT
    o.id_orden AS 'id_venta',
    u.id_usuario as 'id_usuario',
    SUM(do.cantidad) AS 'cantidad',
    SUM(p.precio * do.cantidad) AS 'total',
    do.fecha_detalle AS 'fecha',
    p.nom_producto AS 'nombre_producto' -- Agregar información de la tabla productos
FROM
    orden o
JOIN detalle_orden AS do ON o.id_orden = do.id_orden
JOIN productos p ON do.id_producto = p.id_producto
JOIN usuarios u ON do.id_usuario = u.id_usuario
JOIN personas ON personas.id_persona = u.id_persona
WHERE u.id_usuario=35 and
    do.estatus = 1
GROUP BY
    o.id_orden";

    $mis_compras=$db->seleccionarDatos($sql);

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

        .select{
            width: 210px; /* Ancho personalizado */
            height: 30px; /* Altura personalizada */
            font-size: 14px; /* Tamaño de fuente personalizado */
            border-radius: 36px 36px 36px 36px;
            -moz-border-radius: 36px 36px 36px 36px;
            -webkit-border-radius: 36px 36px 36px 36px;
            -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.25);
            -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.25);
            box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.25);
        }


.select-box {
  position: relative;
  display: block;
  width: 100%;

  font-family: "Open Sans", "Helvetica Neue", "Segoe UI", "Calibri", "Arial", sans-serif;
  font-size: 18px;
  color: #fff;
}
li{
    margin:15px;
}
@media (min-width: 768px) {
  .select-box {
    width: 70%;
  }
}
@media (min-width: 992px) {
  .select-box {
    width: 50%;
  }
}
@media (min-width: 1200px) {
  .select-box {
    width: 30%;
  }
}
.select-box__current {
  position: relative;
  box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
  cursor: pointer;
  outline: none;
}
.select-box__current:focus + .select-box__list {
  opacity: 1;
  -webkit-animation-name: none;
          animation-name: none;
}
.select-box__current:focus + .select-box__list .select-box__option {
  cursor: pointer;
}
.select-box__current:focus .select-box__icon {
  transform: translateY(-50%) rotate(180deg);
}
.select-box__icon {
  position: absolute;
  top: 50%;
  right: 15px;
  transform: translateY(-50%);
  width: 20px;
  opacity: 0.3;
  transition: 0.2s ease;
}
.select-box__value {
  display: flex;
}
.select-box__input {
  display: none;
}
.select-box__input:checked + .select-box__input-text {
  display: block;
}
.select-box__input-text {
  display: none;
  width: 100%;
  margin: 0;
  padding: 15px;
  background-color: #fff;
}
.select-box__list {
  position: absolute;
  width: 100%;
  padding: 0;
  list-style: none;
  opacity: 0;
  -webkit-animation-name: HideList;
          animation-name: HideList;
  -webkit-animation-duration: 0.5s;
          animation-duration: 0.5s;
  -webkit-animation-delay: 0.5s;
          animation-delay: 0.5s;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
  -webkit-animation-timing-function: step-start;
          animation-timing-function: step-start;
  box-shadow: 0 15px 30px -10px rgba(0, 0, 0, 0.1);
}
.select-box__option {
  display: block;
  padding: 15px;
  background-color: black;
}
.select-box__option:hover, .select-box__option:focus {
  color: #546c84;
  background-color: #fbfbfb;
}

@-webkit-keyframes HideList {
  from {
    transform: scaleY(1);
  }
  to {
    transform: scaleY(0);
  }
}

@keyframes HideList {
  from {
    transform: scaleY(1);
  }
  to {
    transform: scaleY(0);
  }
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
  <h1 class="text-center" style="margin-lefT:25px">Mis compras</h1>
  
  <!-----------------------------Filtro---------------------------------->
  
<div class="select-box" style="border-radius:50px">
  <div class="select-box__current" tabindex="1"  style="color:black; border-radius:10px" >
    <div class="select-box__value"  style="color:black" >
      <input class="select-box__input" type="radio" id="0" value="1" name="Ben"checked="checked"/>
      <p class="select-box__input-text">Pedido: Reciente - Antiguo</p>
    </div>
    <div class="select-box__value">
      <input class="select-box__input" type="radio" id="1" value="2" name="Ben"/>
      <p class="select-box__input-text">Pedido: Antiguo - Reciente</p>
    </div>
    <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true"/>
  </div>
  <ul class="select-box__list">
    <li>
      <label class="select-box__option" for="0" aria-hidden="aria-hidden">Pedido: Reciente - Antiguo</label>
    </li>
    <li>
      <label class="select-box__option" for="1" aria-hidden="aria-hidden">Pedido: Antiguo - Reciente</label>
    </li>
    
  </ul>
</div>

    <!------------------------------------Lista-------------------------------------->
    <br>
   
<div class="container">
<div class="row">


<?php

foreach ($mis_compras as $mis_compras){
    $id_venta=$mis_compras['id_venta'];
    $id_usuario=$mis_compras['id_usuario'];
    $cantidad=$mis_compras['cantidad'];
    $total=$mis_compras['total'];
    $fecha=$mis_compras['fecha'];
    $nombre_producto=$mis_compras['nombre_producto'];

?>
        <div class="col-12" style="background:white; padding:25px; margin-bottom:30px; border-radius:10px; box-shadow: 0 0 6px rgb(123 123 123 / 30%);">

            <div class="row">
                <div class="col-6">
                    <p><b> <?php echo $fecha ?></b></p>
                </div>
                <div class="col-6 text-end">
                    <b style="color:#0d6efd">Noº de pedido  #<?php echo $id_venta ?></b>
                </div>
            </div>

            <hr style="opacity:0.1">

            <div class="row">
                <div class="col-5" style="margin-bottom:30px">
                    <img src="mj.jpg" style="width:120px; height:120px; border-radius:10px" alt="" srcset="">
                </div>

                <div class="col-7 text-center" style="padding-top:30px">
                    <h5><?php echo $nombre_producto ?></h5>
                    <p>$1220.00</p>

                    <?php 
                    if($cantidad==1){
                        echo "";
                    }
                    elseif($cantidad > 1){ ?>
                        <p><a href="pedidos_detalle.php?id_o=<?php echo urlencode($id_venta); ?>&id_orden=<?php echo urlencode($id_venta); ?>&fecha=<?php echo urlencode($fecha); ?>&cantidad=<?php echo urlencode($cantidad); ?>&total=<?php echo urlencode($total); ?>">Ver productos de la compra</a>
</p>
                    <?php     
                    }
                    ?>


                </div>
            </div>

        
    <hr style="opacity:0.1">

            <div class="row">
                <div class="col-6 text-center">
                <h3 style="margin-top:20px;color:red">Cantidad</h3>
                    <p style="color:black; font-size:20px">
                    <?php 
                    if($cantidad==1){
                        echo $cantidad.' '. 'Producto';
                    }
                    elseif($cantidad > 1){
                        echo $cantidad.' '. 'Productos'; 
                    }
                    ?>
                    </p>
                   
                </div>
                <div class="col-6 text-center" >
                   <h3 style="margin-top:20px;color:red">Total</h3>
                    <p style="color:black; font-size:20px"><?php echo '$' . $total; ?></p>
                </div>
            </div>
        </div>

        <?php
}
?>

        



        

        



        
   </div>
</div>

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