<?php
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;

    $UniversosQry="SELECT * from universo;";
    $Universos=$db->seleccionarDatos($UniversosQry);

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar Universo</title>
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
            foreach($Universos as $res){
                $nombre= $res['universo'];
                $id= $res['id_universo'];
            ?>
        <tr>
          <th scope="row" class="fs-5"><strong> <?php echo $nombre;?></strong></th>
          <td> <a href="/geekhaven/src/scripts/insersiones/editarUniverso.php?id=<?php echo $id;?>" class="fs-5 text-primary">Editar</a></td>
          <td><a href="/geekhaven/src/scripts/insersiones/borrarUniverso.php?id=<?php echo $id;?>" class="fs-5 text-danger">Eliminar</a></td>
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