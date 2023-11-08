<?php
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>

<?php include('navbar.php') ?>

<!--  Header End -->

<br><br><br><br>
<h1 align="center">Añadir Universo</h1>
<div class="container">
    <div class="row">
        <form action="/geekhaven/src/scripts/insersiones/agregarUniverso.php" method="get">
          <div class="mb-3">
            <label for="universo" class="form-label">Nombre del Universo</label>
            <input type="text" class="form-control" name="universo" id="universo" placeholder="DragonBall Z" required>
            
          </div>
          <div class="mb-3">
            <label for="image">Selecciona una imagen</label>
            <input id="image" type="file" name="imagen" accept="image/*"class="form-control">
            <div id="emailHelp" class="form-label">Esta imagen es la que se mostrara en la pagina principal</div>
          </div>

          <button type="submit" class="btn btn-primary col-12 fs-5">Añadir Universo</button>
        </form>
    </div>
</div>   



  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>