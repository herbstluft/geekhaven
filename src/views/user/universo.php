<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    $db1 = new Database;

    $sql = "SELECT * FROM universo";
    $universo =$db->seleccionarDatos($sql);

    if (isset($_GET['id'])) {
        $id_uni = $_GET['id'];
      }                

      $sql = "SELECT * from productos inner JOIN universo on universo.id_universo=productos.universo_id WHERE universo.id_universo='$id_uni' and productos.existencia>0";
      $prd=$db->seleccionarDatos($sql);


      $sqlMasPo = "SELECT p.existencia, p.id_producto, p.nom_producto, p.precio, u.id_universo, SUM(d.cantidad) AS total_vendido
      FROM detalle_orden AS d
     INNER JOIN productos AS p ON d.id_producto = p.id_producto    INNER JOIN universo AS u ON p.universo_id = u.id_universo
    WHERE u.id_universo = '$id_uni' and p.existencia>0
     GROUP BY p.id_producto, p.nom_producto, p.precio
     ORDER BY total_vendido DESC
     LIMIT 10;";
      $populares=$db->seleccionarDatos($sqlMasPo);

      $sql3 = "SELECT * FROM productos INNER JOIN universo ON productos.universo_id = universo.id_universo WHERE universo.id_universo = $id_uni AND productos.existencia > 0 AND productos.nom_producto >= 'A' AND productos.nom_producto <= 'Z' ORDER BY productos.nom_producto ASC;
      ";
      $productosaz=$db->seleccionarDatos($sql3);

      $sql4 = "SELECT * FROM productos INNER JOIN universo ON productos.universo_id = universo.id_universo WHERE universo.id_universo = $id_uni AND productos.existencia > 0 AND productos.nom_producto >= 'A' AND productos.nom_producto <= 'Z' ORDER BY productos.nom_producto DESC";
      $productosza=$db->seleccionarDatos($sql4);

  

      $sql = "SELECT * FROM universo WHERE id_universo = '$id_uni'";
      $nom_universo = $db->seleccionarDatos($sql);
      
      foreach ($nom_universo as $nom_uni) {
          $nombre_universo = $nom_uni['universo'];
      }

?>
<!--INICIO HTML--->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $nombre_universo; ?> </title>
    <link rel="shortcut icon" type="image/png" href="/var/www/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/var/www/geekhaven/src/views/admin/assets/css/styles.min.css" />
    <link rel="stylesheet" href="/var/www/geekhaven/bootstrap/css/estilos.css" />

</head>


<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/var/www/geekhaven/templates/navbar_user.php'); ?>




<div class="container-fluid">
    
<center><h1> <?php echo $nombre_universo; ?> </h1></center>
<br>

<div class="search-container">
        <form class="d-flex primary" role="search" style="witdh:100%" id="miFormulario">

        <svg style="align-self:center; margin-left:20px" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"></path>
</svg>

            <input data-table="table_id" name="filtro1" class="light-table-filter" type="text" id="search-input" placeholder=" Buscar en GeekHaven"> 
            <input type="hidden" name="id" value="<?php echo $id_uni; ?>">
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





 
  <!------------------------------------------TARJETAS---------------------------------->

<center style="margin-left:20px" >
<div class="row" style="width: 100%; display:none;"  id="contenidoopcion1" >
                <?php foreach ($prd as $prd) {
                    ?>

                    <div class="col-sm-6 col-xl-3">
                            
                            <div class="scroll-appear">
                                <div class="card overflow-hidden rounded-2">
                                
                                <div class="position-relative">
                                <a href="/var/www/geekhaven/src/views/user/productos.php?id=<?php echo $prd['id_producto']; ?>">
    <?php
    $id_producto_prd = $prd['id_producto'];
    $sacarImgQry_prd = "SELECT * FROM productos INNER JOIN img_productos ON img_productos.id_producto = productos.id_producto WHERE productos.id_producto = $id_producto_prd GROUP BY img_productos.id_producto ";
    $sacarImg_prd = $db1->seleccionarDatos($sacarImgQry_prd);

    foreach ($sacarImg_prd as $img_prd) {
        $img_nombre_prd = $img_prd['nombre_imagen'];
    }
    ?>

    <?php if (!empty($img_nombre_prd)) { ?>
        <img src="/var/www/geekhaven/src/views/admin/html/img_producto/<?php echo $img_nombre_prd; ?>" class="d-block w-100" height="310px" alt="...">
    <?php } else { ?>
        <img src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" class="d-block w-100" height="310px" alt="...">
    <?php } ?>
</a>

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
                                        <?php echo $prd['universo']; ?>                  </ul>
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
                                <a href="/var/www/geekhaven/src/views/user/productos.php?id=<?php echo $popular['id_producto']; ?>">
    <?php
    $id_producto_popular = $popular['id_producto'];
    $sacarImgQry_popular = "SELECT * FROM productos INNER JOIN img_productos ON img_productos.id_producto = productos.id_producto WHERE productos.id_producto = $id_producto_popular GROUP BY img_productos.id_producto ";
    $sacarImg_popular = $db1->seleccionarDatos($sacarImgQry_popular);

    foreach ($sacarImg_popular as $img_popular) {
        $img_nombre_popular = $img_popular['nombre_imagen'];
    }
    ?>

    <?php if (!empty($img_nombre_popular)) { ?>
        <img src="/var/www/geekhaven/src/views/admin/html/img_producto/<?php echo $img_nombre_popular; ?>" class="d-block w-100" height="310px" alt="...">
    <?php } else { ?>
        <img src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" class="d-block w-100" height="310px" alt="...">
    <?php } ?>
</a>

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
                                        <?php echo $popular['universo']; ?>                  </ul>
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
                                <a href="/var/www/geekhaven/src/views/user/productos.php?id=<?php echo $productoaz['id_producto']; ?>">
    <?php
    $id_producto_az = $productoaz['id_producto'];
    $sacarImgQry_az = "SELECT * FROM productos INNER JOIN img_productos ON img_productos.id_producto = productos.id_producto WHERE productos.id_producto = $id_producto_az GROUP BY img_productos.id_producto ";
    $sacarImg_az = $db1->seleccionarDatos($sacarImgQry_az);

    foreach ($sacarImg_az as $img_az) {
        $img_nombre_az = $img_az['nombre_imagen'];
    }
    ?>

    <?php if (!empty($img_nombre_az)) { ?>
        <img src="/var/www/geekhaven/src/views/admin/html/img_producto/<?php echo $img_nombre_az; ?>" class="d-block w-100" height="310px" alt="...">
    <?php } else { ?>
        <img src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" class="d-block w-100" height="310px" alt="...">
    <?php } ?>
</a>


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
                                        <?php echo $productoaz['nom_universo']; ?>                  </ul>
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
                                   
                                   <a href="/var/www/geekhaven/src/views/user/productos.php?id=<?php echo $productoza['id_producto'];
                                   
                                  $id_producto=$productoza['id_producto'];
                     $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                     $sacarImg=$db1->seleccionarDatos($sacarImgQry);
                foreach($sacarImg as $imgza){
                $img_za = $imgza['nombre_imagen'];} ?>"> 

                <?php     if(!empty($img_za)){ ?>
                    <img src="/var/www/geekhaven/src/views/admin/html/img_producto/<?php echo $img_za ?>" class="d-block w-100"  height="310px" alt="...">

                <?php } else{ ?>
                    <img src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" class="d-block w-100"  height="310px" alt="...">
                <?php
                }
                ?>
                                                
                
            </a>



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
                                        <?php echo $productoza['universo']; ?>                  </ul>
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

            
            $SQL = "SELECT * from productos inner JOIN universo on universo.id_universo=productos.universo_id WHERE universo.id_universo='$id_uni' and productos.existencia >0;";
            $con = $db->seleccionarDatos($SQL);

            if (!empty($con)) {
                foreach ($con as $fila) {
                    ?>
                  
                        <div class="col-sm-6 col-xl-3">
                            
                        <div class="scroll-appear">
                            <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
    <a href="/var/www/geekhaven/src/views/user/productos.php?id=<?php echo $fila['id_producto']?>">


    <?php $id_producto=$fila['id_producto'];
                     $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                     $sacarImg=$db1->seleccionarDatos($sacarImgQry);

                foreach($sacarImg as $img){
                $img0 = $img['nombre_imagen'];
                }
            
                if(!empty($img0)){ ?>
    <img src="/var/www/geekhaven/src/views/admin/html/img_producto/<?php echo $img0 ?>" class="d-block w-100"  height="310px" alt="...">

                <?php
                } else{ ?>
    <img src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" class="d-block w-100"  height="310px" alt="...">

                <?php
                }
            ?>
                
    
                
            
            </a>


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
      <?php echo $fila['universo']  ?>                  </ul>
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





    <script src="/var/www/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/var/www/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/var/www/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/var/www/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/var/www/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/var/www/geekhaven/bootstrap/js/buscador.js"></script>
        <script src="user.js"></script>

        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>


    </body>

</html>