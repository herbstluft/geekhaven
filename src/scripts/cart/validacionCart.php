<?php
session_start();
$_SESSION['user'];
use MyApp\data\Database;
require(__DIR__ . '/../../../vendor/autoload.php');
$db = new Database;

$HOST=$_SERVER['SERVER_NAME'];

if ($_GET['orden']){
$id_orden=$_GET['orden'];
$usr=$_SESSION['user'];
}
// OBTENER LOS PRODUCTOS DEL CARRITO PARA VALIDARLOS CON LA CANTIDAD QUE HAY EN INVENTARIO
$ProcuctosTicket="SELECT PRD.id_producto,PRD.nom_producto, PRD.precio,PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as Dcantidad, detalle_orden.estatus as stat, PRD.existencia 
FROM usuarios
JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 and detalle_orden.id_orden=$id_orden";
$Productos=$db->seleccionarDatos($ProcuctosTicket);

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
  <body class="d-flex vw-100 vh-100 align-items-center justify-content-center">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>




<?php

//SI LA CONSULTA TIENE RESULTADOS (EL CARRITO SI TIENE PRODUCTOS) QUE HAGA EL PROCEDIMIENTO DE VALIDACION

//COMPARAR LA CANTIDAD DE PRODUCTOS EN EL CARRITO CON LA CANTIDAD DE PRODUCTOS EN INVENTARIO. SI LA CANTIDAD ES MENOR O IGUAL A LA DEL INVENTARIO ENTONCES SE CAMBIA EL STATUS DEL DETALLE ORDEN A 1 (PEDIDO PENDIENTE POR ENTREGAR) Y SI LA CANTIDAD DE PRODUCTOS EN EL CARRITO ES MAYOR A LA EXISTENCIA SE BORRARA ESE PRODUCTO DEL CARRITO
foreach($Productos as  $res){
    $id_producto=$res['id_producto'];
    if($res['Dcantidad']<=$res['existencia']){
        $ActualizarStatusQry="UPDATE `detalle_orden` SET `estatus`=1 
        WHERE `id_orden`=$id_orden 
        AND `id_usuario`=$usr
        AND`id_producto`=$id_producto";
        $ActualizarStatus=$db->ejecutarConsulta($ActualizarStatusQry);
        //ELIMINAR PRODUCTOS DEL INVENTARIO
        $cantAct=$res['existencia'];
        $cantPrd=$res['Dcantidad'];
        $cantNew=$cantAct-$cantPrd;
        $ElimnarQry="UPDATE `productos` SET `existencia`=$cantNew WHERE `id_producto`=$id_producto";
        $EliminarPrd=$db->ejecutarConsulta($ElimnarQry);
    }
      else if ($res['Dcantidad']>$res['existencia']){
        
        $EliminarPrdQry="DELETE FROM `detalle_orden`
        WHERE `id_orden`=$id_orden 
        AND `id_usuario`=$usr
        AND`id_producto`=$id_producto";
        $EliminarPrd=$db->ejecutarConsulta($EliminarPrdQry);
      } 
    }

    //VALIDAR SI DESPUES DE LA VALIDACION SIGUE HABIENDO PRODUCTOS EN EL CARRITO, SI ES ASI MANDARA EL ID DE LA ORDEN AL SCRIPT PARA IMPRIMIR EL TICKET EN PDF, SI NO MANDARA UNA ALERTA DE QUE EL CARRITO ESTA VACIO Y LO REDIRIGIRA AL INDEX
    $validacionQry="SELECT PRD.id_producto,PRD.nom_producto, PRD.precio,PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as Dcantidad, detalle_orden.estatus as stat, PRD.existencia 
    FROM usuarios
    JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
    JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
    WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 and detalle_orden.id_orden=$id_orden";
    if (!empty($validacionQry)){
        echo '<div class="alert alert-primary" role="alert">
        <h4 class="alert-heading">TU TICKET DEBE DESCARGARSE EN BREVE</h4>
        <p>Si tu ticket ya ha sido descargado puedes volver a la pagina</p>
        <hr>
        <center>
        <a href="http://'.$HOST.'/geekhaven/" class="btn btn-primary pt-2 pb-2 fs-5">Click aqui para volver</a>
        </center>';
        header('refresh: 1; url=http://'.$HOST.'/geekhaven/src/scripts/cart/ticketCart.php?id_orden='.$id_orden);
    }
    else if (empty($validacionQry)){
        echo '<div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">LO SIENTO</h4>
        <p>Ya no tenemos esos productos en inventario, añade otros productos a tu carrito e intentalo mas tarde </p>
        <hr>
        <p class="mb-0"></p>
      </div>';
        header("refresh: 3; url=http://'.$HOST.'/geekhaven/");
    }
    
?>
</html>