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
  <title>Lista de Pedidos</title>
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
   <button type="button" class="btn btn-success col-12 fs-5 ">Exportar a Excel<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ms-1 pb-1 bi bi-file-earmark-spreadsheet" viewBox="0 0 16 16">
  <path d="M14 14V4.5L9.5 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2M9.5 3A1.5 1.5 0 0 0 11 4.5h2V9H3V2a1 1 0 0 1 1-1h5.5zM3 12v-2h2v2zm0 1h2v2H4a1 1 0 0 1-1-1zm3 2v-2h3v2zm4 0v-2h3v1a1 1 0 0 1-1 1zm3-3h-3v-2h3zm-7 0v-2h3v2z"/>
</svg>
</button><br>
<form action="/geekhaven/src/scripts/tickets/pedidos_ticket.php" method="post">
<button type="submit" name="enviar" class="btn btn-danger mt-2 col-12 fs-5 ">Exportar a PDF<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="ms-1 pb-1 bi bi-filetype-pdf" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5zM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.38.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
</svg>
</button>
</form>
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