<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    $db1 = new Database;

    $sql = "SELECT * FROM categorias";
    $categorias =$db->seleccionarDatos($sql);

    if (isset($_GET['id'])) {
        $id_categoria = $_GET['id'];
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

  


      $sql="select * from categorias where id_cat='$id_categoria'";
      $nom_categoria=$db->seleccionarDatos($sql);
      foreach ($nom_categoria as $nom_cat)
      $nombre_categoria=$nom_cat['nom_cat'];

?>
<!--INICIO HTML--->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geek Haven</title>
    <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
    <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />

</head>


<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/geekhaven/templates/navbar_user.php'); ?>




<div class="container-fluid">
    
<center><h1> <?php echo $nombre_categoria; ?> </h1></center>
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





    <div>
        <form action="cat.php" method="get">
            <input type="hidden" name="cat" value=$id_categoria>
            <br>
            <label>Ordenar Por:</label>
           <div class="row">
            <div class="col-12 col-md-3">
            <select class="form-select" style="margin-top:5px;" aria-label="Default select example" name="filtro1" id="filtro1" >
                <option name="Original" value="opcion1">Original</option>
                <option name="po" value="opcion2">Populares</option>
                <option name="az" value="opcion3">De la A a la Z</option>
                <option name="za" value="opcion4">De la Z a la A</option>

            </select>
            </div>


           </div>
          
        </form>
    </div>
  
  <!------------------------------------------TARJETAS---------------------------------->

<center style="margin-left:20px" >
<div class="row" style="width: 100%; display:none;"  id="contenidoopcion1" >
                <?php foreach ($prd as $prd) {
                    ?>

                    <div class="col-sm-6 col-xl-3">
                            
                            <div class="scroll-appear">
                                <div class="card overflow-hidden rounded-2">
                                
                                <div class="position-relative">
                                    <a href="/geekhaven/src/views/user/productos.php?id=<?php echo $prd['id_producto']?>"><img src="/geekhaven/src/views/admin/html/img_producto/<?php $id_producto=$prd['id_producto'];
                     $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                     $sacarImg=$db1->seleccionarDatos($sacarImgQry);
                foreach($sacarImg as $img){
                echo $img['nombre_imagen'];?>" class="d-block w-100"  height="310px" alt="..."><?php echo $img['nombre_imagen'];}?></a>
                                    <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"></path>
                                    </svg>
                                        </a>                      
                                </div>


                                    <div class="card-body pt-3 p-4">
                                        <div style="width:100%;">
                                            <h6 class="fw-semibold fs-4 text-truncate"> <?php echo $prd['nom_producto']; ?>  </h6>
                                    </div>
                                    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' .  $prd['precio']; ?></h6>
                                        <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <?php echo $prd['nom_cat']; ?>                  </ul>
                                    </div>


                                </div>
                            </div>
                        
                                </a>
                            </div>
    
                             
                        </div>
                 

                <?php } ?>
    </div>



            <div class="row" style="width: 100%; display:none;"  id="contenidoopcion2" >
                <?php foreach ($populares as $popular) {?>

                    <div class="col-sm-6 col-xl-3">
                            
                            <div class="scroll-appear">
                                <div class="card overflow-hidden rounded-2">
                                
                                <div class="position-relative">
                                    <a href="/geekhaven/src/views/user/productos.php?id=<?php echo $popular['id_producto']?>"><img src="/geekhaven/src/views/admin/html/img_producto/<?php $id_producto=$popular['id_producto'];
                     $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                     $sacarImg=$db1->seleccionarDatos($sacarImgQry);
                foreach($sacarImg as $img){
                echo $img['nombre_imagen'];?>" class="d-block w-100"  height="310px" alt="..."><?php echo $img['nombre_imagen'];}?></a>
                                    <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"></path>
                                    </svg>
                                        </a>                      
                                </div>


                                    <div class="card-body pt-3 p-4">
                                        <div style="width:100%;">
                                            <h6 class="fw-semibold fs-4 text-truncate"> <?php echo $popular['nom_producto']; ?>  </h6>
                                    </div>
                                    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' .  $popular['precio']; ?></h6>
                                        <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <?php echo $popular['nom_cat']; ?>                  </ul>
                                    </div>


                                </div>
                            </div>
                        
                                </a>
                            </div>
    
                             
                        </div>
                 

                <?php } ?>
    </div>



<div class="row" style="width: 100%; display:none;"  id="contenidoopcion3" >
                <?php foreach ($productosaz as $productoaz) {?>

                    <div class="col-sm-6 col-xl-3">
                            
                            <div class="scroll-appear">
                                <div class="card overflow-hidden rounded-2">
                                
                                <div class="position-relative">
                                    <a href="/geekhaven/src/views/user/productos.php?id=<?php echo $productoaz['id_producto']?>"><img src="/geekhaven/src/views/admin/html/img_producto/<?php $id_producto=$productoaz['id_producto'];
                     $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                     $sacarImg=$db1->seleccionarDatos($sacarImgQry);
                foreach($sacarImg as $img){
                echo $img['nombre_imagen'];?>" class="d-block w-100"  height="310px" alt="..."><?php echo $img['nombre_imagen'];}?></a>
                                    <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"></path>
                                    </svg>
                                        </a>                      
                                </div>


                                    <div class="card-body pt-3 p-4">
                                        <div style="width:100%;">
                                            <h6 class="fw-semibold fs-4 text-truncate"> <?php echo $productoaz['nom_producto']; ?>  </h6>
                                    </div>
                                    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' .  $productoaz['precio']; ?></h6>
                                        <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <?php echo $productoaz['nom_cat']; ?>                  </ul>
                                    </div>


                                </div>
                            </div>
                        
                                </a>
                            </div>
    
                             
                        </div>
                 

                <?php } ?>
    </div>




<div class="row" style="width: 100%; display:none;"  id="contenidoopcion4" >


                <?php foreach ($productosza as $productoza) {?>

                    <div class="col-sm-6 col-xl-3">
                            
                            <div class="scroll-appear">
                                <div class="card overflow-hidden rounded-2">
                                
                                <div class="position-relative">
                                    <a href="/geekhaven/src/views/user/productos.php?id=<?php echo $productoza['id_producto']?>"><img src="/geekhaven/src/views/admin/html/img_producto/<?php $id_producto=$productoza['id_producto'];
                     $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                     $sacarImg=$db1->seleccionarDatos($sacarImgQry);
                foreach($sacarImg as $img){
                echo $img['nombre_imagen'];?>" class="d-block w-100"  height="310px" alt="..."><?php echo $img['nombre_imagen'];}?></a>
                                    <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
                                    <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"></path>
                                    </svg>
                                        </a>                      
                                </div>


                                    <div class="card-body pt-3 p-4">
                                        <div style="width:100%;">
                                            <h6 class="fw-semibold fs-4 text-truncate"> <?php echo $productoza['nom_producto']; ?>  </h6>
                                    </div>
                                    
                                    <div class="d-flex align-items-center justify-content-between">
                                        <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' .  $productoza['precio']; ?></h6>
                                        <ul class="list-unstyled d-flex align-items-center mb-0">
                                        <?php echo $productoza['nom_cat']; ?>                  </ul>
                                    </div>


                                </div>
                            </div>
                        
                                </a>
                            </div>
    
                             
                        </div>
                 

                <?php } ?>
    </div>


    </center>


 




        <script>
            new DataTable('#table_id');
        </script>
        

        <div class="row"  style="margin-left:20px"  id="contenidoopcion5">
            <?php

            
            $SQL = "SELECT * from productos inner JOIN categorias on categorias.id_cat=productos.id_cat WHERE categorias.id_cat='$id_categoria';";
            $con = $db->seleccionarDatos($SQL);

            if (!empty($con)) {
                foreach ($con as $fila) {
                    ?>
                  
                        <div class="col-sm-6 col-xl-3">
                            
                        <div class="scroll-appear">
                            <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
    <a href="/geekhaven/src/views/user/productos.php?id=<?php echo $fila['id_producto']?>"><img src="/geekhaven/src/views/admin/assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
    <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"></path>
</svg>
    </a>                      
  </div>
  <div class="card-body pt-3 p-4">
        <div style="width:100%;">
        <h6 class="fw-semibold fs-4 text-truncate"> <?php echo $fila['nom_producto']  ?>  </h6>
        </div>
    <div class="d-flex align-items-center justify-content-between">
      <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' . $fila['precio']; ?></h6>
      <ul class="list-unstyled d-flex align-items-center mb-0">
      <?php echo $fila['nom_cat']  ?>                  </ul>
    </div>
  </div>
                            </div>
                            </div>
                            </a>
                        </div>
                  
                    <?php
                }
            }
            else{
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
  <script src="/geekhaven/bootstrap/js/buscador.js"></script>
        <script src="user.js"></script>

        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>


    </body>

</html>