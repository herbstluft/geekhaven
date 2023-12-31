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
   <?php 
if (isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] == 'success') {
      $idFail=$_GET['uni'];
        $NombreUniQry="SELECT universo.universo from universo where universo.id_universo=$idFail";
        $nombreUni=$db->seleccionarDatos($NombreUniQry);
        foreach($nombreUni as $name){
          $NombreUni=$name['universo'];
        echo " <br<div class='container mt-5'>
      <div class='alert alert-warning' role='alert'>
        <div class='row'>
        <center>El producto se ha actualizado a: "."<strong> "." $NombreUni"."</strong> "." con exito</center>
        Producto Eliminado<br>
        </div>
        </div>
        </div>";
    }}
    elseif ($_GET['mensaje'] == 'failed') {
        $idFail=$_GET['uni'];
        $NombreUniQry="SELECT universo.universo from universo where universo.id_universo=$idFail";
        $nombreUni=$db->seleccionarDatos($NombreUniQry);
        foreach($nombreUni as $name){
            $NombreUni=$name['universo'];
        echo " <br<div class='container mt-5'>
      <div class='alert alert-danger' role='alert'>
        <div class='row'>
        <center>El universo"."<strong> "." $NombreUni"."</strong> "." no puede ser eliminado porque aun hay productos con este universo</center>
        <br>
        </div>
        </div>
        </div>";
    }
    }

}
?>
    <table class="table" id="tabla">
      <thead>
        <tr>
          <th scope="col">Nombre</th>
          <th scope=""></th>
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
          <td> <a href="editImgUniverso.php?id=<?php echo $id?>" class="fs-5 text-primary">Editar Imagen</a></td>
          <td> <a href="editNomUniverso.php?id=<?php echo $id?>" class="fs-5 text-primary">Editar Nombre</a></td>
          <td><a href="/var/www/geekhaven/src/scripts/insersiones/borrarUniverso.php?id=<?php echo $id;?>" class="fs-5 text-danger">Eliminar</a></td>
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