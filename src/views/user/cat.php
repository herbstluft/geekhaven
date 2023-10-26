<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;

    $sql = "SELECT * FROM categorias";
    $categorias =$db->seleccionarDatos($sql);
    
    ?>

    ?>
    <!doctype html>
    <html lang="en">
    
    <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />
  
</head>
    <body>
    
    <?php include('../../../templates/navbar_user.php') ?>

    <div class="container-fluid">



   <!------------------------------------------FILTRO 1: SELECT----------------------------------->
<?php

$sql = "SELECT * from productos inner JOIN categorias on categorias.id_cat=productos.id_cat WHERE categorias.nom_cat='Comics'";

if(isset($_GET['filtro1'])) {

if($_GET['filtro1']=='az'){
    $sql = "SELECT * from productos inner JOIN categorias on categorias.id_cat=productos.id_cat WHERE categorias.nom_cat='Comics' and productos.nom_producto >= 'A' AND productos.nom_producto <= 'Z'
    ORDER BY productos.nom_producto asc";
}

}

if(isset($_GET['filtro1'])=='za'){
if($_GET['filtro1']=='za'){

$sql = "SELECT * from productos inner JOIN categorias on categorias.id_cat=productos.id_cat WHERE categorias.nom_cat='Comics' and productos.nom_producto >= 'A' AND productos.nom_producto <= 'Z'
ORDER BY productos.nom_producto DESC";

}
}

if(isset($_GET['filtro1'])=='popu'){
if($_GET['filtro1']=='popu'){

$sql = "SELECT p.id_producto, p.nom_producto, p.precio, SUM(d.cantidad) AS total_vendido
FROM detalle_orden AS d
INNER JOIN productos AS p ON d.id_producto = p.id_producto
INNER JOIN categorias AS c ON p.id_cat = c.id_cat
WHERE c.nom_cat = 'Comics' 
GROUP BY p.id_producto, p.nom_producto, p.precio
ORDER BY total_vendido DESC
LIMIT 10";

}
}







$prd=$db->seleccionarDatos($sql);

?>


    

<div class="row" style= "margin:80px">

    <div class="col-3" >
        
        <form action="cat.php" method="get">
                <label>Ordenar Por:</label> 
                <br><br>
                    <select name="filtro1" class="select" id="filtro1">
                    <option name="popu" value="popu">Populares</option>
                    <option name="az" value="az">De la A a la Z</option>
                    <option name="za"value="za">De la Z a la A<</option>
                    <option name="menor"value="menor">Precio: Menor a Mayor</option>  
                    <option name="mayor"value="mayor">Precio: Mayor a Menor</option>                          
                    </select>
                <br><br>
        

            <center>
                <div style="margin-left:30%">
                <span>  
                     <button type="submit" style="border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 5px 15px; top:-10px; position:relative">Buscar</button>
                </span>
                </div>
            </center>
            </form>

        <?php

      ?>
  </div> <!--FINAL DEL DIV COL-2-->

  <!------------------------------------------TARJETAS---------------------------------->
  <?php

?>
 <div class="row">
          
<div class="col-12">
    <div class="row" style="width: 100%">
        <?php foreach ($prd as $prd) {?>
            <div class="col-sm-12 col-md-12 col-lg-9 col-xl-4" style="margin-bottom:30px">
                <article class="card card--1" style="margin-left: 40px;">
                    <div class="card__info-hover">
                        <!-- Contenido de la tarjeta -->
                    </div>
                    <div class="card__img"></div>
                    <a href="#" class="card_link">
                        <div class="card__img--hover"></div>
                    </a>
                    <div class="card__info">
                        <span class="card__category"> <?php echo $prd['nom_cat']; ?></span>
                        <h3 class="card__title"><?php echo $prd['nom_producto']; ?></h3>
                        <div class="row">
                            <div class="col-4 text-end">
                                <span style="color: red; font-size: 20px;"><?php echo $prd['precio']; ?></span>
                            </div>
                            <div class="col-6" style="margin-left: 16%">
                                <span><button type="button" style="border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top: -5px; position: relative">Ver mas....</button></span>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
        <?php } ?>
    </div>
</div>
<!------------------------------------------FIN---------------------------------->










      <script src="../../../bootstrap/js/buscador.js"></script>
      <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
      <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
      <script src="../assets/js/sidebarmenu.js"></script>
      <script src="../assets/js/app.min.js"></script>
      <script src="../assets/libs/simplebar/dist/simplebar.js"></script>