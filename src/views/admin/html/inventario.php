<?php
session_start();
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;
    $db1 = new Database;

    $sql = "SELECT * FROM categorias";
    $categorias =$db->seleccionarDatos($sql);

    if (isset($_GET['filtro1']) && $_GET['filtro1'] == 'all') {
        $SQL = "SELECT * FROM productos INNER JOIN categorias ON categorias.id_cat=productos.id_cat inner join universo on productos.universo_id=universo.id_universo inner join tipo on tipo.id_tipo = productos.tipo_id   ORDER BY productos.nom_producto ASC ";
    }
    elseif (isset($_GET['filtro1'])) {
        $id_categoria = $_GET['filtro1'];
        $SQL = "SELECT * FROM productos INNER JOIN categorias ON categorias.id_cat=productos.id_cat inner join universo on productos.universo_id=universo.id_universo inner join tipo on tipo.id_tipo = productos.tipo_id  where categorias.id_cat='$id_categoria'  ORDER BY productos.nom_producto ASC";
    }

    else {
        $SQL = "SELECT * FROM productos INNER JOIN categorias ON categorias.id_cat=productos.id_cat inner join universo on productos.universo_id=universo.id_universo inner join tipo on tipo.id_tipo = productos.tipo_id   ORDER BY productos.nom_producto ASC ";
    }
    

    
      $con = $db->seleccionarDatos($SQL);

?>
<!--INICIO HTML--->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GeekHaven</title>
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

            <input data-table="table_id" name="filtro1" class="light-table-filter" type="text" id="search-input" placeholder=" Buscar en GeekHaven"> 
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

<div style="margin-left:20px">
<span>
    
    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="green" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
  <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
</svg>
&ensp;
    Exporte sus productos a un archivo excel para una informacion mas detallada</span>
 </div>

<a href="inventario_excel.php?<?php 
 foreach($con as $send){ ?>
 nom_producto=<?php echo $send['nom_producto']; ?>
 nom_cat=<?php echo $send['nom_cat']; ?>
 universo=<?php echo $send['universo']; ?>
 tipo=<?php echo $send['tipo']; ?>
 precio=<?php echo $send['precio']; ?>
 precio_base=<?php echo $send['precio_base']; ?>
 existencia=<?php echo $send['existencia'];
 

}?>
 
 ">
    <br>
    
    <button style="margin-left:20px;margin-bottom:20px" type="button" class="btn btn-success">Exportar Excel</button></a>
<br>
   
                  
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