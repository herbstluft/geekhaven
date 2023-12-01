<?php

ob_start();
session_start();
$_SESSION['user'];
$host=$_SERVER['SERVER_NAME'];
use MyApp\data\Database;
require(__DIR__ . '/../../../vendor/autoload.php');
$db = new Database;
$usr=$_SESSION['user'];
//obtener el ID de la orden y del usuario
if ($_GET['id_orden']){
$id_orden=$_GET['id_orden'];

}
//Sacar el precio total del pedido
$TotalPedidoQry="SELECT TRUNCATE(SUM(PRDT.precio * PRDT.cantidad),2) as TOTAL FROM (SELECT PRD.id_producto,PRD.nom_producto, PRD.precio,PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat FROM usuarios JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=1 and detalle_orden.id_orden=$id_orden) as PRDT;";
$Total=$db->seleccionarDatos($TotalPedidoQry);

//OBTENER los productos de la compra
$ProductosPedidoQry="SELECT PRD.id_producto,PRD.nom_producto, PRD.precio,PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat FROM usuarios JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=1 and detalle_orden.id_orden=$id_orden";

$ProductosPedido=$db->seleccionarDatos($ProductosPedidoQry);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
    />

  </head>
  <body>
    <div class="mx-auto  p-5" style="width:60%">
        <H1 align="center">TICKET REIMPRESO</H1>
        
            <h3 align="center">Este es un ticket reimpreso emitido por GeekHaven NO ES EL TICKET ORIGINAL</h3>
            
            <h4 align="center">Muchas gracias por comprar con nosotros!</h4>
    </div>
    <div class=" ">
        <h1 align="center" class="text-dark">PEDIDO</h1>
        <h2 align="center" class="text-danger">No° de pedido:<?php echo $id_orden;?></h2>
        <?php foreach($Total as $res){?>
        <h3>Total: $<?php echo $res['TOTAL'];}?></h3>

        <div class="table-responsive">
        <table class="table table-striped">
  <thead>
    <tr class="">
    <th scope="col">SKU</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio unitario</th>
      <th scope="col">Precio Total</th>
      
    </tr>
  </thead>
  <tbody>
    <?php
    foreach($ProductosPedido as $res){
        $id_producto=$res['id_producto'];
        $TotalPrdQry="SELECT TRUNCATE(SUM(PRDT.precio * PRDT.cantidad),2) as TOTAL FROM (SELECT PRD.id_producto,PRD.nom_producto, PRD.precio,PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat FROM usuarios JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=1 and detalle_orden.id_orden=$id_orden) as PRDT 
        WHERE PRDT.id_producto =$id_producto";
        $totalPrd=$db->seleccionarDatos($TotalPrdQry);

    ?>
    
    <tr>
      <th scope="row"><?php echo $res['id_producto']; ?></th>
      <td><?php echo $res['nom_producto']; ?></td>
      <td align="center"><?php echo $res['cantidad']; ?></td>
      <td align="center"><?php echo $res['precio']; ?></td>
      <td align="center"><?php foreach($totalPrd as $to){ echo $to['TOTAL'];}}?></td>
    </tr>
  </tbody>
</table>
        </div>
        

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
<?php
$html=ob_get_clean();
 require_once '../dompdf/autoload.inc.php';

 use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

// formato carta
$dompdf->setPaper('letter');
// formato horizontal
// $dompdf-setPaper('A4','Landscape');

$dompdf->render();

$dompdf->stream("ticket1.pdf",array("Attachment"=>true));

$HOST=$_SERVER['SERVER_NAME'];
header("refresh: 3; url=http://'.$HOST.'/var/www/geekhaven/");
?>