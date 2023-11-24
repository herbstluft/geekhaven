<?php
session_start();
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;
    $db1 = new Database;

    $sql = "SELECT * FROM categorias";
    $categorias =$db->seleccionarDatos($sql);

 
    if (isset($_POST['min']) && isset($_POST['max'])) {

        $filtroExistencia = $_POST['min'];
        $filtroExistenciaMax =  $_POST['max'];
      
        $SQL = "SELECT * FROM productos 
        INNER JOIN categorias ON categorias.id_cat = productos.id_cat 
        INNER JOIN universo ON productos.universo_id = universo.id_universo 
        INNER JOIN tipo ON tipo.id_tipo = productos.tipo_id 
        WHERE productos.existencia BETWEEN $filtroExistencia AND $filtroExistenciaMax
        ORDER BY productos.existencia ASC";

    }
    else{
        
    $SQL = "SELECT * FROM productos 
    INNER JOIN categorias ON categorias.id_cat = productos.id_cat 
    INNER JOIN universo ON productos.universo_id = universo.id_universo 
    INNER JOIN tipo ON tipo.id_tipo = productos.tipo_id 
    ORDER BY productos.nom_producto ASC";

    }


 
    

    
      $con = $db->seleccionarDatos($SQL);

?>
<!--INICIO HTML--->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario</title>
    <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
    <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />

</head>


<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/geekhaven/src/views/admin/html/navbar.php'); ?>




<div class="container-fluid">
    
<center><h1> Inventario </h1></center>
<br>

<div class="search-container">
        <form class="d-flex primary" role="search" style="witdh:100%" id="miFormulario">

        <svg style="align-self:center; margin-left:20px" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
</svg>

            <input data-table="table_id" name="filtro1" class="light-table-filter" type="text" id="search-input" placeholder=" Buscar en Inventario"> 
            <input type="hidden" name="id" value="<?php echo $id_categoria; ?>">
        </form>
</div>


<script>
document.getElementById("miFormulario").addEventListener("submit", function(event) {
    var input = document.getElementById("search-input");
    
    if (input.value.trim() === "") {
        alert("Por favor, ingresa algo en el campo antes de enviar el formulario.");
        event.preventDefault(); // Evita que el formulario se envíe
    }
});
</script>




<div class="container">

<div>

<br><br>

<?php 
if(isset($_POST['min']) && isset($_POST['max'])){ ?>
<a href="inventario.php" style="margin-left:20px">Mostrar todos los productos</a>
<?php
}
?>

<!---Filtro de busqueda por existencia-->
<form action="inventario.php" method="post">
<div class="row">

<p style="margin-bottom:20px; font-weight:bold" class=" text-center">Busque productos entre un rango de existencias</p>

<div class="col-md-6 col-6 mb-4">
<div class="form-floating mb-3">
<input type="number" class="form-control" id="floatingInput" name="min" placeholder="Número de teléfono" oninput="validarNumero(this)" required>
<label for="floatingInput">Minimo</label>
</div>
</div>  
<div class="col-md-6  col-6 mb-4">
<div class="form-floating mb-3">
<input type="number" class="form-control" id="floatingInput" name="max" placeholder="Número de teléfono" oninput="validarNumero(this)" required>
<label for="floatingInput">Maximo</label>
</div>
</div> 

<center>    <button style="margin-bottom:20px" type="submit" class="btn btn-success"> Filtrar</button></a> </center>

</form>
<!---Filtro de busqueda por existencia-->



<script>
    function validarNumero(input) {
        // Elimina cualquier carácter que no sea un número
        input.value = input.value.replace(/[^0-9]/g, '');

        // Limita la longitud a 5 dígitos
        if (input.value.length > 10) {
            input.value = input.value.slice(0, 10);
        }
    }
</script>

</div>


<br>
<div style="margin-left:20px">
<span>
    
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="green" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
</svg>
&ensp;
    Exporte sus productos a un archivo excel para una informacion mas detallada</span>
 </div>

 <form action="inventario_excel.php" method="post">
    <?php 
    foreach ($con as $index => $send) { 
        $nom_producto = $send['nom_producto'];
        $nom_cat = $send['nom_cat']; 
        $universo = $send['universo'];
        $tipo = $send['tipo'];  
        $precio = $send['precio']; 
        $precio_base = $send['precio_base']; 
        $existencia = $send['existencia']; 
    ?>
        <!-- Campos ocultos para enviar todas las variables -->
        <input type="hidden" name="nom_producto[]" value="<?php echo htmlspecialchars($nom_producto); ?>">
        <input type="hidden" name="nom_cat[]" value="<?php echo htmlspecialchars($nom_cat); ?>">
        <input type="hidden" name="universo[]" value="<?php echo htmlspecialchars($universo); ?>">
        <input type="hidden" name="tipo[]" value="<?php echo htmlspecialchars($tipo); ?>">
        <input type="hidden" name="precio[]" value="<?php echo htmlspecialchars($precio); ?>">
        <input type="hidden" name="precio_base[]" value="<?php echo htmlspecialchars($precio_base); ?>">
        <input type="hidden" name="existencia[]" value="<?php echo htmlspecialchars($existencia); ?>">
        
        <!-- Otros campos del formulario, si los hay -->
    <?php
    }
    ?>
    <br>
    <button style="margin-left:20px" type="submit" class="btn btn-success">Exportar a Excel</button>
</form>

                  
    <?php
/*
<form action="inventario.php" method="get">
    <br>
    <label>Ordenar Por:</label>
    <div class="row">
        <div class="col-12 col-md-3">
            <select class="form-select" style="margin-top:5px;" aria-label="Default select example" name="filtro1" id="filtro1">

                <?php if (isset($_GET['filtro1']) && $_GET['filtro1'] == 'all') { ?>
                    <option selected style="margin-top:20px" value="all"> Seleccionado: Mostrar todo</option>
                <?php } ?>
                <?php if (isset($_GET['filtro1']) && $_GET['filtro1'] <> 'all') { ?>
                    <option selected value="<?php echo $categor['id_cat'] ?>">

                        <?php
                        $sql = "select * from categorias where id_cat='$_GET[filtro1]'";
                        $nom_cat = $db->seleccionarDatos($sql);

                        foreach ($nom_cat as $nom_cat)
                            echo 'Seleccionada: ' . $nom_cat['nom_cat'];
                        ?>
                    </option>
                <?php } ?>

                <option style="margin-top:20px" value="all"> Mostrar todo</option>

                <?php
                $sql = "select * from categorias";
                $categor = $db->seleccionarDatos($sql);

                foreach ($categor as $categor) {
                ?>
                    <option value="<?php echo $categor['id_cat'] ?>"> <?php echo $categor['nom_cat'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
    </div>
    <br>
    <button type="submit" class="btn" style="background: #005aff; color:white">Aplicar</button>
</form>
*/
?>

    </div>
</div>
  <br>
  <!------------------------------------------TARJETAS---------------------------------->




        <script>
            new DataTable('#table_id');
        </script>
        

        <div style="margin-left:20px"  id="contenidoopcion5">




        <table class="table">
  <thead>
    <tr>
      
      <th scope="col">Nombre</th>
      <th scope="col">Precio</th>
      <th  scope="col">Existencias</th>
      

    </tr>
  </thead>
  <tbody>

            <?php

            if (!empty($con)) {
                foreach ($con as $fila) {
                    ?>
                  
    <tr>
      <td> <?php echo $fila['nom_producto'] ?> <br> <br> <b><?php echo $fila['nom_cat'] ?></b> </td>
      <td> <?php echo '$' . $fila['precio']; ?></td>
      <td class="text-center"> <?php echo $fila['existencia'] ?></td>
    </tr>



    <?php
                }
            }
            ?>

  </tbody>
</table>


           <?php
            if(empty($con)){
              ?>

<div style="padding-top:70px">

<center><h3 style="color:#eb6d6d">Lo sentimos, no se han publicado productos por el momento.</h3></center>

</div>
              
            <?php  
            }
            ?>
        </div>
    </div>





    <script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/geekhaven/bootstrap/js/buscador_table.js"></script>
        <script src="/geekhaven/src/views/user.js"></script>

        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>


    </body>

</html>