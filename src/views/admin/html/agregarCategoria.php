<?php
use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;
$mensaje = '';

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["categoria"])) {
    $categoria = $_GET["categoria"];
  
    // Verificar si la categoría ya existe en la base de datos
    $sql = "SELECT COUNT(*) FROM categorias WHERE nom_cat = :categoria";
    $params = array(":categoria" => $categoria);
    $result = $db->ejecutarConsulta($sql, $params);
  
    if ($result !== false) {
        $filas = $result->fetchColumn();
        if ($filas > 0) {
            $mensaje = "<div class='alert alert-danger'>La categoría '$categoria' ya existe.</div>";
        } else {
            $sql = "INSERT INTO categorias (nom_cat) VALUES (:categoria)";
            $params = array(":categoria" => $categoria);
            $result = $db->ejecutarConsulta($sql, $params);
      
            if ($result !== false) {
                $mensaje = "<div class='alert alert-success'>¡Éxito! Se registro la categoria '$categoria' correctamente.</div>";
            } else {
                $mensaje = "<div class='alert alert-danger'>Error al agregar la categoría.</div>";
            }
        }
    } else {
        $mensaje = "<div class='alert alert-danger'>Error al verificar la categoría.</div>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agregar Categoria</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
<?php include('navbar.php') ?>

<!--  Header End -->

<br><br><br><br>
<h1 align="center">Añadir Categoria</h1>
<div class="container">
    <div class="row">
        <form action="/var/www/geekhaven/src/views/admin/html/agregarCategoria.php" method="get">
          <div class="mb-3">
            <label for="categoria" class="form-label">Nombre de la Categoria</label>
            <input type="text" class="form-control" name="categoria" id="cate" placeholder="Categoria" required>
            
          </div>
          

          <button type="submit" class="btn btn-primary col-12 fs-5">Añadir Categoria</button>
        </form>

        <br>
    </div>
</div>   
<!-- Mostrar el mensaje de éxito o de categoría existente -->
<div class="container">
    <br>
    <div class="row">
        <center>
            <?php
            if (!empty($mensaje)) {
                echo "<div >$mensaje</div>";
            }
            ?>
        </center>
    </div>
</div>



  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>

  </body>
</html>