<?php
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;

    if($_GET['id']){
        $idCat=$_GET['id'];
        $nomCatQry="SELECT * FROM categorias where categorias.id_cat=$idCat";
        $nomCat=$db->seleccionarDatos($nomCatQry);
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Categoría</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <!-- Agregado el enlace al CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
</head>

<body>
<?php include('navbar.php') ?>
    <div class="container-fluid">
        
  <?php 
 if (isset($_GET['mensaje'])) {
     if ($_GET['mensaje'] == 'success') {
       $categoria=$_GET['cat'];
         echo " <br<div class='container mt-5'>
       <div class='alert alert-success' role='alert'>
         <div class='row'>
         <center>El universo se ha actualizado a: "."<strong> "." $universo"."</strong> "." con exito</center>
         </div>
         </div>
         </div>";
     }
     elseif ($_GET['mensaje'] == 'failed') {
      $categoria=$_GET['cat'];
         echo " <br<div class='container mt-5'>
       <div class='alert alert-danger' role='alert'>
         <div class='row'>
         <center>El universo"."<strong> "." $universo"."</strong> "." ya existe</center>
         <br>
         </div>
         </div>
         </div>";
     }
     }
 ?>
        <h1>Editar Categoría</h1>
        <?php ?>

                <form action="/geekhaven/src/scripts/insersiones/editarCategoria.php" method="GET">
                    <input type="hidden" name="id" value="<?php echo $idCat; ?>">
                    <div class="form-group">
                        <label for="nuevoNombre">Nuevo Nombre:</label>
                        <input type="text" class="form-control" name="categoria" value="<?php 
        foreach($nomCat as $res){
            $nombreCategoria=$res['nom_cat'];
        echo $nombreCategoria;} ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
                <br>   <br>
        
    </div>

    <!-- Agregado el enlace al JS de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script>
        // Aquí deberías tener una tabla con el ID "tabla" en tu HTML
        var tabla = document.querySelector("#tabla");
        var dataTable = new DataTable(tabla, {
            perPage: 15,
            perPageSelect: [15, 20, 15, 30, 35, 40]
        });
    </script>
</body>

</html>
