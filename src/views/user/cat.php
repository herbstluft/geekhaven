<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;

    $sql = "SELECT * FROM categorias";
    $categorias =$db->seleccionarDatos($sql);

    if (isset($_GET['id'])) {
        $id_categoria = $_GET['id'];
      
        echo "El ID de la categoría es: " . $id_categoria;
      } else {
        echo "ID de categoría no proporcionado en la URL.";
       
      }                    

      $sql = "SELECT * from productos inner JOIN categorias on categorias.id_cat=productos.id_cat WHERE categorias.id_cat='$id_categoria';";
      $prd=$db->seleccionarDatos($sql);


      $sqlMasPo = "SELECT p.id_producto, p.nom_producto, p.precio, c.nom_cat, SUM(d.cantidad) AS total_vendido
     FROM detalle_orden AS d
    INNER JOIN productos AS p ON d.id_producto = p.id_producto    INNER JOIN categorias AS c ON p.id_cat = c.id_cat
   WHERE c.id_cat = '$id_categoria' 
    GROUP BY p.id_producto, p.nom_producto, p.precio
    ORDER BY total_vendido DESC
    LIMIT 10";
      $populares=$db->seleccionarDatos($sqlMasPo);

      $sql3 = "SELECT * from productos inner JOIN categorias on categorias.id_cat=productos.id_cat WHERE categorias.id_cat='$id_categoria' and productos.nom_producto >= 'A' AND productos.nom_producto <= 'Z'
      ORDER BY productos.nom_producto asc";
      $productosaz=$db->seleccionarDatos($sql3);

      $sql4 = "SELECT * from productos inner JOIN categorias on categorias.id_cat=productos.id_cat WHERE categorias.id_cat='$id_categoria' and productos.nom_producto >= 'A' AND productos.nom_producto <= 'Z'
      ORDER BY productos.nom_producto DESC";
      $productosza=$db->seleccionarDatos($sql4);

  

?>
<!--INICIO HTML--->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modernize F</title>
    <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
    <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />

</head>


<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/geekhaven/templates/navbar_user.php'); ?>




<div class="container-fluid">
    
<center><h1>Busca entre nuestras opciones</h1></center>
<br>
   
        <div >
        <form action="cat.php" method="get">
            <input type="hidden" name="cat" value=$id_categoria>
            <label>Ordenar Por:</label>
            <br><br>
            <select name="filtro1" class="select" id="filtro1">
                <option name="Original" value="opcion1">Original</option>
                <option name="po" value="opcion2">Populares</option>
                <option name="az" value="opcion3">De la A a la Z</option>
                <option name="za" value="opcion4">De la Z a la A</option>

            </select>
            <br><br>
        </form>
        </div>

<br><br>       
  <!------------------------------------------TARJETAS---------------------------------->



  <?php


?>

    <div class="row">
        <div id="">

            <div class="col-12" id="contenidoopcion1" style="display:block;">
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
                                        <span><button type="button"
                                                style="border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top: -5px; position: relative">Ver
                                                mas....</button></span>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>

        //SECCION PARA MAS POPULARES

        <div class="col-12" id="contenidoopcion2" style="display:none;">
            <div class="row" style="width: 100%">
                <?php foreach ($populares as $popular) {?>
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
                            <span class="card__category"> <?php echo $popular['nom_cat']; ?></span>
                            <h3 class="card__title"><?php echo $popular['nom_producto']; ?></h3>
                            <div class="row">
                                <div class="col-4 text-end">
                                    <span style="color: red; font-size: 20px;"><?php echo $popular['precio']; ?></span>
                                </div>
                                <div class="col-6" style="margin-left: 16%">
                                    <span><button type="button"
                                            style="border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top: -5px; position: relative">Ver
                                            mas....</button></span>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>




    //SECCION PARA A-Z

<div class="col-12" id="contenidoopcion3" style="display:none;">
    <div class="row" style="width: 100%">
        <?php foreach ($productosaz as $productoaz) {?>
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
                    <span class="card__category"> <?php echo $productoaz['nom_cat']; ?></span>
                    <h3 class="card__title"><?php echo $productoaz['nom_producto']; ?></h3>
                    <div class="row">
                        <div class="col-4 text-end">
                            <span style="color: red; font-size: 20px;"><?php echo $productoaz['precio']; ?></span>
                        </div>
                        <div class="col-6" style="margin-left: 16%">
                            <span><button type="button"
                                    style="border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top: -5px; position: relative">Ver
                                    mas....</button></span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <?php } ?>
    </div>
</div>
</div>



//SECCION PARA Z-A

<div class="col-12" id="contenidoopcion4" style="display:none;">
    <div class="row" style="width: 100%">
        <?php foreach ($productosza as $productoza) {?>
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
                    <span class="card__category"> <?php echo $productoza['nom_cat']; ?></span>
                    <h3 class="card__title"><?php echo $productoza['nom_producto']; ?></h3>
                    <div class="row">
                        <div class="col-4 text-end">
                            <span style="color: red; font-size: 20px;"><?php echo $productoza['precio']; ?></span>
                        </div>
                        <div class="col-6" style="margin-left: 16%">
                            <span><button type="button"
                                    style="border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top: -5px; position: relative">Ver
                                    mas....</button></span>
                        </div>
                    </div>
                </div>
            </article>
        </div>
        <?php } ?>
    </div>
</div>
</div>






 



        <script src="../../../bootstrap/js/buscador.js"></script>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="user.js"></script>

        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>

</body>

</html>