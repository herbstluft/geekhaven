<?php
    session_start();
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;

    $ProductosQry="SELECT * from productos ;";
    $Productos=$db->seleccionarDatos($ProductosQry);

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Producto</title>
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
          <th scope="col">Nombre</th>
          <th scope=""></th>
          <th scope=""></th>
        </tr>
      </thead>
      <tbody>
      <?php
            foreach($Productos as $res){
                $nombre= $res['nom_producto'];
                $id= $res['id_producto'];
            ?>
        <tr>
          <th scope="row" class="fs-5"><strong> <?php echo $nombre;?></strong></th>
          <td> <a href="/geekhaven/src/views/admin/html/editproducto.php?id=<?php echo $id; ?>" class="fs-5 text-primary">Editar</a></td>
          <td><a href="/geekhaven/src/views/admin/html/eliminar_producto.php?id=<?php echo $id;?>"class="fs-5 text-danger eliminar-producto" data-bs-toggle="modal" data-bs-target="#confirmarEliminarModal">Eliminar</a></td>
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
  <!-- Agrega esto al final de tu archivo HTML justo antes del cierre del body -->
<div class="modal fade" id="confirmarEliminarModal" tabindex="-1" aria-labelledby="confirmarEliminarModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmarEliminarModalLabel">Confirmar Eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ¿Estás seguro de que deseas eliminar este producto?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <a id="eliminarProductoLink" href="/geekhaven/src/views/admin/html/eliminar_producto.php" class="btn btn-danger">Sí, eliminar</a>
      </div>
    </div>
  </div>
</div>

  </body>
 
