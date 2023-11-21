<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    $db1=new Database;

    error_reporting(E_ERROR); 

    $orderClause = "DESC"; // Orden predeterminado (recientes a antiguos)
    $HOST=$_SERVER['SERVER_NAME'];
    if (isset($_GET['order']) && $_GET['order'] == 'asc') {
        $orderClause = "ASC"; // Cambia la ordenación a "antiguos a recientes"
    }

session_start();
    $usr=$_SESSION['user'];
    
    $sql = "SELECT
        p.id_producto as 'id_producto',
        o.id_orden AS 'id_venta',
        u.id_usuario as 'id_usuario',
        SUM(do.cantidad) AS 'cantidad',
        SUM(p.precio * do.cantidad) AS 'total',
        YEAR(o.fecha) AS 'anio',
        MONTH(o.fecha) AS 'mes',
        DAY(o.fecha) AS 'dia',
        p.nom_producto AS 'nombre_producto' -- Agregar información de la tabla productos
    FROM
        orden o
    JOIN detalle_orden AS do ON o.id_orden = do.id_orden
    JOIN productos p ON do.id_producto = p.id_producto
    JOIN usuarios u ON do.id_usuario = u.id_usuario
    JOIN personas ON personas.id_persona = u.id_persona
    WHERE u.id_usuario=$usr and
        do.estatus = 2
    GROUP BY
        o.id_orden
    ORDER BY do.fecha_detalle $orderClause"; // Agrega la ordenación dinámica
    

    $mis_compras=$db->seleccionarDatos($sql);

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GeekHaven</title>
  <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
  <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
<!--STYLE-->
    <style>

        body {
            background:white;
            
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

<?php
include('../../../templates/navbar_user.php');
?>
<body>
    <!----------------------------------------------------->
 
    <!----------------------------------------------------->

    <div class="" style="padding-top: 10em !important;">
        <div class="">
          <div class="" style="padding:20px">
          
          <div class="container">
<div class="row">
 <div class="col-md-12">
  <h1 class="text-center" style="margin-lefT:25px; margin-top:20px;">Pedidos pendientes por entregar</h1>

  <br>
  <!-----------------------------Filtro---------------------------------->
  <!-- <div class="select-box">
  <form method="GET" action="pedidos.php">
    <div class="select-box__current " tabindex="1" style="color: black; border-radius: 10px">
      <div class="select-box__value" style="color: black">
        <input class="select-box__input" type="radio" id="recientes" value="desc" name="order" <?php if ($orderClause == "DESC") echo "checked"; ?> />
        <p class="select-box__input-text">Ordenar:  &ensp; Reciente - Antiguo</p>
      </div>
      <div class="select-box__value">
        <input class="select-box__input" type="radio" id="antiguos" value="asc" name="order" <?php if ($orderClause == "ASC") echo "checked"; ?> />
        <p class="select-box__input-text">Ordenar: &ensp; Antiguo - Reciente</p>
      </div>
      <img class="select-box__icon" src="http://cdn.onlinewebfonts.com/svg/img_295694.svg" alt="Arrow Icon" aria-hidden="true" />
    </div>
    <ul class="select-box__list">
      <li>
        <label class="select-box__option" for="recientes" aria-hidden="aria-hidden">Pedido: Reciente - Antiguo</label>
      </li>
      <li>
        <label class="select-box__option" for="antiguos" aria-hidden="aria-hidden">Pedido: Antiguo - Reciente</label>
      </li>
    </ul>

    <button type="submit" style="margin-top:20px" class="btn btn-primary">Aplicar</button>
  </form>
</div> -->


    <!------------------------------------Lista-------------------------------------->
    <br>
   

<div class="row">



        <div >

            <!-- <div class="row">
                <div class="col-6">
                    <p><b> <?php echo $fecha ?></b></p>
                </div>
                
                <div class="col-6 text-end">
                    <b style="color:#0d6efd">Noº de pedido  #
                </div>
                
            </div>

            <hr style="opacity:0.1">

            <div class="row">
                <div class="col-5" style="margin-bottom:30px">
                 -->
                 <table class="table col-12 " id="tabla" style="background:white; padding:25px; margin-bottom:30px; border-radius:10px; box-shadow: 0 0 6px rgb(123 123 123 / 30%);">
                    <thead>
                    <th>
                        No° de Orden
                      </th>
                      <th colspan="2">
                        1er producto del pedido
                      </th>
                      <th>
                        Cantidad de productos
                      </th>
                      <th>
                        Total MXN
                      </th>
                      
                      <th>
                        Fecha de pedido
                      </th>
                      <th>

                      </th>
                    </thead>
                    <tbody>
                    <?php

                      foreach ($mis_compras as $mis_compras){
                        $id_prd=$mis_compras['id_producto'];
                          $id_venta=$mis_compras['id_venta'];
                          $id_usuario=$mis_compras['id_usuario'];
                          $cantidad=$mis_compras['cantidad'];
                          $total=$mis_compras['total'];
                          $fecha=$mis_compras['anio'];
                          $fecha1=$mis_compras['mes'];
                          $fecha2=$mis_compras['dia'];
                          $nombre_producto=$mis_compras['nombre_producto'];

                      ?>
                      <tr  style="background:white; padding:25px; margin-bottom:30px; border-radius:10px; box-shadow: 0 0 6px rgb(123 123 123 / 30%);">
                      <td>
                        <h4 align="center">
                      <?php echo $id_venta ?>
                      </h4>
                      <th>
                          <img src="/geekhaven/src/views/admin/html/img_producto/<?php $id_producto=$id_prd;
                          $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                          $sacarImg=$db1->seleccionarDatos($sacarImgQry);
                          foreach($sacarImg as $img){
                          echo $img['nombre_imagen'];}?>" 
                          class=" ms-5" width="120px" height="130px" alt="...">
                      </th>
                      <td>
                        <h5 align="center"><?php echo $nombre_producto ?></h5>
                      </td>
                      <td>
                        <h6 align="center">
                      <?php 
                    if($cantidad==1){
                        echo $cantidad.'<br>'. 'Producto';
                    }
                    elseif($cantidad > 1){
                        echo $cantidad.'<br> '. 'Productos'; 
                    }
                    ?>
                    </h6>
                      </td>
                      <td>
                        <h4 align="center" class="text-danger">
                      <?php echo '$' . $total; ?>
                      </h4>
                      </td>
                      
                      </td>
                      <td >
                        <p align="center">
                        <?php echo 'Dia: '. $fecha2.'<br>' ?>
                        
                        <?php echo 'Mes: '.$fecha1.'<br>' ?>
                        
                        <?php echo 'Año: '.$fecha ?>
                        </p>
                      </td>
                      <td>
                      <?php 
                    if($cantidad==1){ ?>
                      <p><a href="misCompras_detalle.php?id_o=<?php echo urlencode($id_venta); ?>&id_orden=<?php echo urlencode($id_venta); ?>&fecha=<?php echo urlencode($fecha); ?>&cantidad=<?php echo urlencode($cantidad); ?>&total=<?php echo urlencode($total); ?>&usr=<?php echo $usr?>"> Ver detalles de la compra</a>
                    <?php } 
                    elseif($cantidad > 1){ ?>
                        <p><a href="misCompras_detalle.php?id_o=<?php echo urlencode($id_venta); ?>&id_orden=<?php echo urlencode($id_venta); ?>&fecha=<?php echo urlencode($fecha); ?>&cantidad=<?php echo urlencode($cantidad); ?>&total=<?php echo urlencode($total); ?>&usr=<?php echo $usr?>"> Ver detalles de la compra</a>
                        </p>
                    <?php     
                    }
                    ?>
                      </td>
                      </tr>
                      
                      <?php }?>
                    </tbody>
                    
                 </table>
        <?php

?>
        
   </div>
</div>

<br>
<br>
<br>
<br>    
<hr>

<div class="container">
<?php include '../../../templates/footer.html';?>
</div>

<script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>
  <script>
    var tabla = document.querySelector("#tabla");
    var dataTable = new DataTable(tabla,{
        perPage:3,
        perPageSelect:[3,6,10,20,25,30]

    });
  </script>

</body>
</html>