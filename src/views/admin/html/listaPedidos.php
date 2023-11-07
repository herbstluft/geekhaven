<?php
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;

    $pedidosPendientesQry="SELECT productos.nom_producto, detalle_orden.id_orden,SUM(detalle_orden.cantidad) as 'cant', usuarios.telefono, CONCAT(personas.nombre, personas.apellido) AS 'nombre', personas.correo 
    from personas join usuarios on personas.id_persona=usuarios.id_persona 
    JOIN detalle_orden on usuarios.id_usuario = detalle_orden.id_usuario 
    JOIN productos on detalle_orden.id_producto = productos.id_producto
    JOIN categorias on productos.id_cat = categorias.id_cat WHERE detalle_orden.estatus=1  GROUP by detalle_orden.id_orden";
    $pedidosPendientes=$db->seleccionarDatos($pedidosPendientesQry);

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pedidos pendientes</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
  <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
</head>
<style>
</style>
<body>

<?php include('navbar.php') ?>

<!--  Header End -->
   <div class="container-fluid">
    <table class="table" id="tabla">
      <thead>
        <tr>
          <th scope="col">No° Orden</th>
          <th scope="col">Telefono</th>
          <th scope="col">Mail</th>
          <th scope="col">Nombre</th>
          <th scope="col">Cantidad</th>
        </tr>
      </thead>
      <tbody>
      <?php
            foreach($pedidosPendientes as $res){
                $id_orden= $res['id_orden'];
                $cantidad = $res['cant'];
                $tel=$res['telefono'];
                $nom_u=$res['nombre'];
                $correo= $res['correo'];

            ?>
        <tr>
          <th scope="row" class=""> <a href="/geekhaven/src/views/admin/html/verPedido.php?id_orden=<?php echo $id_orden?>" class="fs-5"><h5 align="center" class="text-info"><?php echo $id_orden ?>&nbsp&nbsp&nbsp&nbsp</a></h5></th>
          <td><?php echo $tel ?></td>
          <td><?php echo $correo ?></td>
          <td><?php echo $nom_u ?></td>
          <td><?php echo $cantidad ?></td>
        </tr>
        <?php
            }
          ?>
      </tbody>
    </table>
        <div class="container-fluid">
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script>
    var tabla = document.querySelector("#tabla");
    var dataTable = new DataTable(tabla,{
        perPage:15,
        perPageSelect:[15,20,15,30,35,40]

    });
  </script>