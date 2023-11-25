<?php
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database();
 $db1 = new Database;

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Carrito de Compras</title>
  <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <style>
    
  </style>
</head>
<body>
<?php
include('../../../templates/navbar_user.php');
?>
  <br><br><br>
  <h1 align="center" class="">CARRITO</h1>
  <br>
  <div class="container">
    <div class="row">
      <div class="col">
        <table class="table table-borderless" style="text-align:center">
          <thead>
            <tr>
              <th scope="col" colspan="2" >Producto</th>
              <th scope="col">Cantidad</th>
              <th>Precio Unitario</th>
              <th scope="col">Total</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if($_GET['id_orden']&&$_GET['usr']){
              $id_orden=$_GET['id_orden'];
              $usr=$_GET['usr'];}
              // USAR EL ID DE LA ORDEN PARA OBTENER TODOS LOS PRODUCTOS DEL CARRITO
              $carritoConsulta="SELECT PRD.id_producto,PRD.nom_producto,PRD.precio, PRD.precio*detalle_orden.cantidad as total ,PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat FROM usuarios JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 and detalle_orden.id_orden=$id_orden and PRD.existencia >0 ORDER BY `total`";
              $carrito=$db->seleccionarDatos($carritoConsulta);
            foreach($carrito as $res){
            ?>
            <tr>
              <th scope="row">
              <img src="/geekhaven/src/views/admin/html/img_producto/<?php $id_producto=$res['id_producto'];
                     $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                     $sacarImg=$db->seleccionarDatos($sacarImgQry);
                foreach($sacarImg as $imagPrd){
                echo $imagPrd['nombre_imagen'];?>" class="d-block" width="80"  height="80" alt="..."><?php echo "";}?>
              </th>
              <td class="fs-3"><br><?php echo $res['nom_producto'];?></td>
              <td class="fs-3"><br><?php echo $res['cantidad'];?></td>
              <td class="fs-3"><br><?php echo '$'.$res['precio'];?></td>
              <td class="fs-3"><br><?php echo '$'.$res['total'];?> <br> <a href="http://localhost/geekhaven/src/scripts/cart/quitarPrdCart.php?id=<?php echo $res['id_producto'];?>&usr=
                                             <?php echo $usr;?>&ord=<?php echo $id_orden?>&cantidad=<?php echo $res['cantidad'];?>" class="btn btn-outline-dark border-0"><strong>Quitar</strong></a></td>
            </tr>
            <?php echo "";}?>
          </tbody>
        </table>
      </div>
      <div class="col">
        <table class="table table-borderless" style="text-align:center">
        <thead>
            <tr>
              <th scope="col" colspan="2" ><h1>TOTAL</h1></th>
            </tr>
          </thead>
          <tbody >
              <tr>
                <td >
                  <h2 class="text-danger">MXN</h2>
                </td>
                <td>
                  <h2>
                    <?php
                     // SACAR TOTAL
              $totalQRY="SELECT TRUNCATE (PTT.total, 2) as total
              FROM (SELECT sum(PT.mult) as total from (SELECT PRD.id_producto,PRD.nom_producto, (PRD.precio*detalle_orden.cantidad) as 'mult',PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat
                FROM usuarios
                JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
                JOIN (SELECT * from productos where productos.existencia>0) as PRD on PRD.id_producto = detalle_orden.id_producto
                WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 and detalle_orden.id_orden=$id_orden) as PT) PTT";
                $total=$db->seleccionarDatos($totalQRY);
                foreach($total as $res){
                  echo "$",$res['total'];
                }
                    ?>
                  </h2>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <h2 class="fs-5 text-primary">
                    Al presionar el boton de <strong>Finalizar compra</strong> se imprimira un ticket de compra con las instrucciones para pagar y recoger tu pedido 
                  </h2>
                </td>
              </tr>
              <tr>
                <td colspan="2">
                  <a href="/geekhaven/src/scripts/cart/validacionCart.php?orden=<?php echo $id_orden ?>" class="col-12 btn btn-danger" style="font-size: 20px">FINALIZAR COMPRA</a>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  
  
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="../../../bootstrap/js/buscador.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
</body>
</html>