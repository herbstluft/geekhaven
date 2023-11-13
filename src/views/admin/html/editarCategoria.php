<?php
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $catQry="SELECT * from categorias where categorias.id_cat=$id";
        $cat=$db->seleccionarDatos($catQry);
    
        foreach($cat as $res){
            $c_nom = $res['nom_cat'];
        }
      
    }

  
?>
<!doctype html>
<html lang="en">
    

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../../views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
<?php include('navbar.php') ?>


<!--  Header End -->

<br><br><br><br>
<h1 align="center">Editar Categoria</h1>
<div class="container">
    <div class="row">
        <form action="/geekhaven/src/scripts/insersiones/editarUniverso.php" method="get">
          <div class="mb-3">
            <label for="universo" class="form-label">Nombre del Categoria</label>
            <input type="hidden" name="id" id="id"value="<?php echo $id; ?>">
            <input type="text" class="form-control" name="universo" id="universo" value="<?php echo $c_nom ?>" placeholder="DragonBall Z" required>
            
          </div>

          <button type="submit" class="btn btn-primary col-12 fs-5">Editar Categoria</button>
        </form>
    </div>
</div>   



  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>