<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    $db1 = new Database;


    if (isset($_GET['id'])) {
        $id_categoria = $_GET['id'];
      }                


?>
<!--INICIO HTML--->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nombre_categoria; ?> </title>
    <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
    <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />

</head>


<body>



    <script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/geekhaven/bootstrap/js/buscador.js"></script>
        <script src="user.js"></script>

        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>


    </body>

</html>