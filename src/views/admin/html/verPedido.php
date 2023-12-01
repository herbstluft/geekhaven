<?php
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;

    $HOST=$_SERVER['SERVER_NAME'];
    if(isset($_GET['id_orden'])){
        $id_orden=$_GET['id_orden'];
      }
    

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Orden <?php echo $id_orden?></title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>

<?php include('navbar.php') ?>

<!--  Header End -->
   <div class="container-fluid">
   <div class="container">
<div class="row">
 <div class="col-md-12">
  
  <h1 class="text-center" style="margin-lefT:25px">Detalle del pedido</h1>
  

    <!------------------------------------Lista-------------------------------------->
    <br>
   
<div class="container">
<div class="row">

        <div class="col-12" style="background:white; padding:25px; margin-bottom:30px; border-radius:10px; box-shadow: 0 0 6px rgb(123 123 123 / 30%);">

            <div class="row">
                <div class="col-6">
                    <p><b> <?php 
                    $fechaQry="SELECT orden.fecha from orden WHERE id_orden=$id_orden";
                    $fecha=$db->seleccionarDatos($fechaQry);
                    foreach($fecha as $res){
                    echo $res['fecha'];} ?></b></p>
                </div>
                <div class="col-6 text-end">
                    <b style="color:#0d6efd">Noº de pedido  #<?php echo $id_orden ?></b>
                </div>
            </div>

            <hr style="opacity:0.1">

            <?php
$productosOrdenQry="SELECT orden.fecha,productos.id_producto, productos.nom_producto,detalle_orden.cantidad,productos.precio, (productos.precio*detalle_orden.cantidad) as 'total', usuarios.telefono, CONCAT(personas.nombre, personas.apellido) AS 'nombre', personas.correo 
from personas join usuarios on personas.id_persona=usuarios.id_persona 
JOIN detalle_orden on usuarios.id_usuario = detalle_orden.id_usuario 
JOIN productos on detalle_orden.id_producto = productos.id_producto
JOIN categorias on productos.id_cat = categorias.id_cat
JOIN orden on orden.id_orden = detalle_orden.id_orden WHERE detalle_orden.id_orden=$id_orden";
$productosOrden=$db->seleccionarDatos($productosOrdenQry);
foreach ($productosOrden as $mis_compras){
    $nombre_producto=$mis_compras['nom_producto'];
    $cantidad_ind=$mis_compras['cantidad'];
    $tel=$mis_compras['telefono'];
    $precio_ind=$mis_compras['precio'];
    $total=$mis_compras['total'];
    $nombre_usr=$mis_compras['nombre'];
    $correo=$mis_compras['correo'];

?>
            <div class="row">
                <div class="col-5" style="margin-bottom:30px">
                <img src="/var/www/geekhaven/src/views/admin/html/img_producto/<?php $id_producto=$mis_compras['id_producto'];
                     $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                     $sacarImg=$db->seleccionarDatos($sacarImgQry);
                foreach($sacarImg as $imagPrd){
                echo $imagPrd['nombre_imagen'];?>" class="d-block" width="135"  height="135" alt="..."><?php echo "";}?>
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
                    $cantidad_tot="SELECT sum(detalle_orden.cantidad) as 'c' from detalle_orden where detalle_orden.id_orden=$id_orden";
                    $cantidad_total=$db->seleccionarDatos($cantidad_tot);
                    foreach($cantidad_total as $res){
                        echo $res['c'].' '. 'Productos';} 
                    ?>
                    </p>
                   
                </div>
                <div class="col-6 text-center" >
                   <h3 style="margin-top:20px;color:red">Total</h3>
                    <p style="color:black; font-size:20px"><?php 
                    $total_pedidoQry="SELECT TRUNCATE(PRD.total, 2) as 'total' FROM (SELECT orden.fecha,productos.nom_producto,detalle_orden.cantidad,productos.precio, SUM(productos.precio*detalle_orden.cantidad) as 'total', usuarios.telefono, CONCAT(personas.nombre, personas.apellido) AS 'nombre', personas.correo 
                    from personas join usuarios on personas.id_persona=usuarios.id_persona 
                    JOIN detalle_orden on usuarios.id_usuario = detalle_orden.id_usuario 
                    JOIN productos on detalle_orden.id_producto = productos.id_producto
                    JOIN categorias on productos.id_cat = categorias.id_cat
                    JOIN orden on orden.id_orden = detalle_orden.id_orden WHERE detalle_orden.id_orden=$id_orden) as PRD";
                    $total_pedido=$db->seleccionarDatos($total_pedidoQry);
                    foreach($total_pedido as $res){
                    echo '$' . $res['total'];} ?></p>
                </div>
            </div>
        </div>        
   </div>
</div>

<center> <button data-bs-toggle="modal" data-bs-target="#exampleModal1" type="button" class="btn btn-success col-12 fs-5 mb-2">Finalizar Venta</button></center> 

<!-- Modal Finalizar Venta-->
<div class="modal fade " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="exampleModalLabel">FINALIZAR VENTA</h3>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Estas seguro de que quieres hacer esto?</strong><br> Despues de dar click en "Finalizar Venta" la accion no podra deshacerse
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/var/www/geekhaven/src/scripts/ventas/finalizarVenta.php?orden=<?php echo $id_orden?>"class="btn btn-primary">Finalizar venta</a>
      </div>
    </div>
  </div>
</div>
<center> <button data-bs-toggle="modal" data-bs-target="#exampleModal2" type="button" class="btn btn-danger col-12 fs-5 mb-2">Declinar Venta</button></center> 
<!-- Modal Declinar Venta-->
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Declinar venta</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <strong>Estas seguro de que quieres hacer esto?</strong><br> Despues de dar click en "Declinar Venta" la accion no podra deshacerse
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="/var/www/geekhaven/src/scripts/ventas/declinarVenta.php?orden=<?php echo $id_orden?>"class="btn btn-primary">Declinar venta</a>
      </div>
    </div>
  </div>
</div>
<center><a href="listaPedidos.php"><button type="button" class="btn btn-primary col-12 fs-5 mb-2">Volver</button></a></center>

  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>