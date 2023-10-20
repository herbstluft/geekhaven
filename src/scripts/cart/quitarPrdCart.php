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
<?php
use MyApp\data\Database;
require(__DIR__ . '/../../../vendor/autoload.php');
$db = new Database;

// Obteniendo los datos del producto en 1 carrito
if(isset($_GET['id'])){
    $IDproducto=$_GET['id'];
    $usuario=$_GET['usr'];
    $orden=$_GET['ord'];
    $cantidad=$_GET['cantidad'];
}

    // Comprobando la cantidad para descontar 1 a la cantidad de productos en el carrito o borrar el producto del carrito
try{    
    if ($cantidad>1){
            $cantNueva=$cantidad -1;
            $updateQtySentence="UPDATE `detalle_orden` SET `cantidad`='$cantNueva'WHERE `detalle_orden`.id_producto=$IDproducto and
            `detalle_orden`.id_usuario=$usuario and
            `detalle_orden`.id_orden=$orden";
            $updateQTY=$db->ejecutarConsulta($updateQtySentence);
        }else if ($cantidad<=1){
            $deletePrdCart="DELETE FROM `detalle_orden` WHERE`detalle_orden`.id_producto=$IDproducto and
            `detalle_orden`.id_usuario=$usuario and
            `detalle_orden`.id_orden=$orden";
            $deletePrd=$db->ejecutarConsulta($deletePrdCart);
        }
    }
    catch(Exeption $e){
        echo "Error alv: ", $e->getMessage(), "\n";
    };
    /*: Undefined variable $usr in C:\xampp\htdocs\geekhaven\src\scripts\cart\quitarPrdCart.php on line 19
Error en la consulta: SQLSTATE[42000]: Syntax error or access violation: 1064 You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near 'and `detalle_orden`.id_orden=15' at line 2*/

    
 header("Location: http://localhost/geekhaven/src/views/user/carrito.php?id_orden=$orden&usr=$usuario");