<?php
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database();


 $sql = "SELECT * from categorias";

 $categorias=$db->seleccionarDatos($sql);
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <title>Carrito</title>
  <style>
    .contenido{
      width: 100%;
      position: relative;
      
    }
    .productos{
      margin-left: 3em;
    }
    .carrito{
      border: 2px solid #eee;
      width: 100%px;
      height: 90%;
      padding-top: 2em;
      margin-bottom:2em;
    }
    h1{
      padding-top: 2em;
      text-align: center;
      font-size: 4em;
    }
    table img {
      width: 150px;
      height: 150px;
    }
    .contadores{
      color:red;
      font-size:1.5em;
    }
    .nombre-prod{
      color:#383838;
    }
    td h6{
      text-decoration: underline #383838;
      color:#383838;
    }
    td h6:hover{
      text-decoration: none;
      color:black;
      font-size:18px;
    }
    .total{
      margin-top:7px;
    }
    .total-precio{
      color:red;
      margin-top: 5px;
    }
    .moneda{
      margin-top: 5px;
    }
    .carrito h2{
      font-size: 3em;
    }
    .carrito p{
      margin-top:2em;
      color:#383838;
      font-size:1.5em;
      text-align:center;
    }
    .carrito hr{
      margin-top:3em;
    }
    .botn{
      border:none;
      border-radius: 10px;
      background-color:#AC0909 !important;
      width: 90%;
      height:60px;
      padding-top:9px;
      font-size:2em;
      color: white;
      text-align:center;
    }
    .botn:hover{
      border:none;
      border-radius: 10px;
      background-color:gray !important;
      width: 90%;
      height:60px;
      padding-top:9px;
      font-size:2.1em;
      color: white;
    }
    
    .cont-back{
      position: relative;
      width: 100%;
      height: 150px;
        }
    .icono{
      margin-top: 5em;
      margin-left:2em;
      width: 50px;
      height: 50px;
      color: #202124;
        }
   .icono:hover{
      width: 60px;
      height: 60px;
      color: #202124;
        }
        a{
          text-decoration:none;
        }
    
  </style>
</head>
<body>
<?php
include('../../../templates/navbar/navbar.php');
?>

  <div class="contenido">
  <div class="cont-back">
                <a href="../../../index.php" class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>  
            </a>
            </div>
    <h1 align="center">CARRITO</h1>
  <div class="">
    
    <div class="row">
      <div class="col-sm-12 col-md-5 col-lg-6 productos">
        <div class="row">
        <table class="table table-hover table-borderless">
          <thead>
            <tr>
              <th scope="col subtitulos" align="center"><h2>PRODUCTO</h2></th>
              <th scope="col" colspan=1></th>
              <th scope="col"align="center"><h2>CANTIDAD</h2></th>
              <th scope="col" align="center"><h2>PRECIO</h2></th>
            </tr>
          </thead>
          <tbody>
            <?php 

              //OBTENER EL ID DE LA ORDEN Y DEL USUARIO
              if($_GET['id_orden']&&$_GET['usr']){
                $id_orden=$_GET['id_orden'];
                $usr=$_GET['usr'];}
                // USAR EL ID DE LA ORDEN PARA OBTENER TODOS LOS PRODUCTOS DEL CARRITO
                $carritoConsulta="SELECT PRD.id_producto,PRD.nom_producto, PRD.precio,PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat
                FROM usuarios
                JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
                JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
                WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 and detalle_orden.id_orden=$id_orden";
                $carrito=$db->seleccionarDatos($carritoConsulta);

                foreach ($carrito as $res) {
                  ?>
                    <tr>
              <th scope="row">
                <img src="https://commondatastorage.googleapis.com/images.pricecharting.com/3a92f94cd232e24534e431b9e4faf3da91be9c7755232f9b04141f04e676e09c/240.jpg" alt="">
              </th>
                  <td colspan="1" class="nombre-prod"><?php echo $res['nom_producto'];?></td>
                  <td align="center"class ="contadores">
                  <?php echo $res['cantidad'];?>
                    <br>
                    <a href="http://localhost/geekhaven/src/scripts/cart/quitarPrdCart.php?id=<?php echo $res['id_producto'];?>&usr=
                      <?php echo $usr;?>&ord=<?php echo $id_orden;?>&cantidad=<?php echo $res['cantidad'];?>" class="btn btn-outline-dark border-0">Quitar</a>
                  </td>
                  <td><h3  class="text-danger"align="center"><?php $precioU=$res['precio']; $cant=$res['cantidad']; $precioT=$precioU*$cant; echo $precioT?></h3></td>
             </tr>
                  <?php  };
              
            ?>
         </tbody>
        </table>
      </div>
    </div>
      <div class="col-sm-12 col-md-5 col-lg-5 carrito">
        <div class="row">
          <h2 class="total col-sm-12 col-md-12 col-lg-12">TOTAL</h2> <br>
          <h2 class="col-sm-5  col-md-2 moneda">MXN</h2><br>
          <?php
          $TotalQry="SELECT TRUNCATE(SUM(PRDT.precio * PRDT.cantidad),2) as TOTAL FROM
          (SELECT PRD.id_producto,PRD.nom_producto, PRD.precio,PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat
                          FROM usuarios
                          JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
                          JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
                          WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 and detalle_orden.id_orden=$id_orden) as PRDT";
          $Total=$db->seleccionarDatos($TotalQry);
          foreach($Total as $res){
          ?>
          <h2 class="col-sm-5 col-md-5 total-precio"><?php
          echo $res['TOTAL']
           ?></h2>
          <?php
          }
          ?>
        </div> 
        <br>
        <hr>
        <div class="row">
        <p class="col-12">
          Las entregas de los productos son entregados 
          exclusivamente en la tienda. Oprime el boton de 
          “FINALIZAR COMPRA” para imprimir tu ticket de 
          compra y sigue las instrucciones que muestra tu ticket 
          de compra
        </p>
        <a href="http://<?php echo $_SERVER['SERVER_NAME'];?>/geekhaven/src/scripts/cart/validacionCart.php?orden=<?php echo $id_orden; ?>" class="botn col-12 m-5"> FINALIZAR COMPRA</a> 
        </div>
       
      </div>
    </div> 
  </div>
  </div>
  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="../../../bootstrap/js/buscador.js"></script>
</body>
</html>