<?php 
session_start();
$_SESSION['user'];
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
  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.bundle.min.js"></script>

</html>

<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;

//obtener la orden del usuario para ver si tiene





 if(isset($_GET['id'])){
     $producto=$_GET['id'];
     $cantidad=$_GET['cantidad'];
    $usr=$_SESSION['user'];

    if($cantidad<1){
        echo '
        <div class="container p-3 mt-3 col-5">
        <div class="alert alert-danger" role="alert">
        <h4 class="alert-heading">NO SE PUDO AÑADIR EL ARTICULO AL CARRITO</h4>
        <p>DEBE INTRODUCIR UNA CANTIDAD</p>
        <hr>
        <p class="mb-0">SERA REDIRIGIDO AL PRODUCTO DE NUEVO</p>
        </div>';
    }
    else if ($cantidad>0){

        // ver si ya tiene ordenes en estado 0 
        $ordQry="SELECT COUNT(ord.id_orden) as orden FROM
        (SELECT detalle_orden.id_orden 
                 FROM usuarios
                 JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
                 JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
                 WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 LIMIT 1) as ord
                 GROUP BY ord.id_orden";
                 $ord=$db->seleccionarDatos($ordQry);

                // si hay ordenes 
                 if(!empty($ord)){
                    foreach($ord as $totalOrd){
                        $total=$totalOrd['orden'];
                       // Buscar la orden para insertarla en un nuevo detalle_orden
                        $buscarOrdenQry1="SELECT orden.id_orden 
                        FROM usuarios
                        JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
                        JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
                        JOIN orden on orden.id_orden=detalle_orden.id_orden
                        WHERE usuarios.id_usuario = 40 and detalle_orden.estatus=0 LIMIT 1";
                        $buscarOrden1=$db->seleccionarDatos($buscarOrdenQry1);
                        // Sacar el valor de la otden para insertarlo en un nuevo detalle orden
                        foreach($buscarOrden1 as $ord){
                            $id_orden=$ord['id_orden'];

                            // comparar si el producto ya esta en algun detalle_orden
                            $CompararProductoQry="SELECT  productos.id_producto as producto, detalle_orden.id_do as id_detalle
                            FROM 	productos 
                            JOIN 	detalle_orden on detalle_orden.id_producto=productos.id_producto
                            WHERE 	productos.id_producto=$producto and detalle_orden.id_orden=$id_orden and detalle_orden.estatus=0 and detalle_orden.id_usuario=$usr";
                            $CompararProducto=$db->seleccionarDatos($CompararProductoQry);
                            // Si la consulta no tiene registros la variabe $CompararProducto estara vacia lo que significa que no hay productos con las caracteristicas que buscamos

                            // Si esta vacia se va a insertar un nuevo producto en el carrito
                            if(empty($CompararProducto)){
                                //INSERTAR EL PRODUCTO, CANTIDAD, USUARIO, ESTATOS Y ORDEN
                                $InsertarDetalleOrdQry="INSERT INTO `detalle_orden`( `id_producto`, `cantidad`, `id_usuario`, `estatus`, `id_orden`) VALUES ('$producto','$cantidad','$usr',0,'$id_orden')";
                                $InsertarDetalleOrd=$db->ejecutarConsulta($InsertarDetalleOrdQry);
                            }
                            // Si no esta vacia tendremos que obtener el id del detalle_orden que tiene ese producto y con esos datos hacer un update especificando el id de producto
                           
                            else if(!empty($CompararProducto)){
                                foreach($CompararProducto as $dato){
                                    // Consulta para sacar el detalle_orden
                                    $ConsultaDetalleOrdQry="SELECT detalle_orden.id_do
                                    FROM orden 
                                    JOIN detalle_orden on orden.id_orden=detalle_orden.id_orden
                                    JOIN productos on productos.id_producto=detalle_orden.id_producto
                                    JOIN usuarios on detalle_orden.id_usuario=usuarios.id_usuario
                                    WHERE usuarios.id_usuario=$usr 
                                    AND productos.id_producto=$producto
                                    AND orden.id_orden=$id_orden";
                                    $DetalleOrden=$db->seleccionarDatos($ConsultaDetalleOrdQry);
                                    // ejecutar el update
                                    foreach($DetalleOrden as $do){
                                        // establecer variable del detalle_orden
                                        $id_do=$do['id_do'];
                                        //establecer variable de la nueva cantidad
                                            //buscar la cantidad actual
                                            $cantidadDoQry="SELECT `cantidad`FROM `detalle_orden` WHERE detalle_orden.id_do=$id_do";
                                            $cantidadDo=$db->seleccionarDatos($cantidadDoQry);
                                            foreach($cantidadDo as $cantDo){
                                                $qty=$cantDo['cantidad'];
                                                $nuevaCant=$qty+$cantidad;
                                                
                                                $UpdateQry="UPDATE `detalle_orden` SET `cantidad`='$nuevaCant'
                                                WHERE `id_do`=$id_do
                                                AND `id_producto`=$producto
                                                AND `id_usuario`=$usr
                                                AND `estatus`=0
                                                AND `id_orden`=$id_orden";
                                                $Update=$db->ejecutarConsulta($UpdateQry);
                                                
                                            }



                                    }
                                }
                            }

                                                         
                            }
                        }
                    }
                // si no hay ordenes
                if(empty($ord)){  

                // establecer zona hoaria
                date_default_timezone_set("America/Mexico_City");

                    // asignar a una variable la fecha actual
                $fechaHoy= date("Y-m-d H:i:s");
                // insertar una orden nueva
                $InsertarOrdenQry="INSERT INTO `orden`(`fecha`, `usr`) VALUES ('$fechaHoy','$usr');
                ";
                 $InsertarOrden=$db->ejecutarConsulta($InsertarOrdenQry);
                // Buscar la orden para insertarla en un nuevo detalle_orden
                $buscarOrdenQry="SELECT orden.id_orden FROM orden WHERE orden.usr=$usr and orden.fecha='$fechaHoy'";
                $buscarOrden=$db->seleccionarDatos($buscarOrdenQry);
                // Sacar el valor de la otden para insertarlo en un nuevo detalle orden
                foreach($buscarOrden as $ord){
                    $id_orden=$ord['id_orden'];

                    //INSERTAR EL PRODUCTO, CANTIDAD, USUARIO, ESTATOS Y ORDEN
                    $InsertarDetalleOrdQry="INSERT INTO `detalle_orden`( `id_producto`, `cantidad`, `id_usuario`, `estatus`, `id_orden`) VALUES ('$producto','$cantidad','$usr',0,'$id_orden')";
                    $InsertarDetalleOrd=$db->ejecutarConsulta($InsertarDetalleOrdQry);

                    
                }
                 }
                
               
               

            
        }
    }
$pagAnterior= $_SERVER['HTTP_REFERER'];
header("Location:".$_SERVER['HTTP_REFERER']."");

