<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    $db1= new Database;
    $HOST=$_SERVER['SERVER_NAME'];

    
    if(isset($_GET['id'])){
        //guardar el id del producto
        $id_producto=$_GET['id'];
        $sql = "SELECT * from productos inner join categorias on categorias.id_cat=productos.id_cat where id_producto=$id_producto";
        $info_producto=$db->seleccionarDatos($sql);


        foreach($info_producto as $info_producto)
        $id=$info_producto['id_producto'];
        $nombre_prd=$info_producto['nom_producto'];
        $estado=$info_producto['estado'];
        $precio=$info_producto['precio'];
        $existencia=$info_producto['existencia'];
        $descripcion=$info_producto['descripcion'];
      
        

    }    
    $sql = "SELECT * from categorias";
    $categorias=$db->seleccionarDatos($sql);   
   
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>GeekHaven</title>
  <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
</head>

<body>
<style>
  .sidebar-nav ul .sidebar-item.selected>.sidebar-link, .sidebar-nav ul .sidebar-item.selected>.sidebar-link.active, .sidebar-nav ul .sidebar-item>.sidebar-link.active {
    background-color: #005aff;
    color: #fff;
}
</style>
<?php
include '../../../templates/navbar_user.php'
?>
<!--  Header End -->
   <div class="container-fluid">
        <div class="container-fluid">
          <div style="padding:20px">
          
          <div class="producto">
  
  <div class="contenido"><br>


      <div class="row">
          <div class="cont-back">
              <a href="../../../index.php" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>  
          </a>
          </div>
          
          <div class="col-sm-12 col-md-6 ">
              <div class="productotop">
              <div id="carouselExampleControlsNoTouching" class="carousel carousel-dark slide" data-bs-touch="false">
              <?php $SacarImagenesQry="SELECT * from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto;";
              $SacarImagenes=$db1->seleccionarDatos($SacarImagenesQry);             
              ?>
                  <div class="carousel-inner" style="padding:20%">
                  <?php foreach($SacarImagenes as $img){ ?>
                  <div class="carousel-item active">
                     
                        <img src="/geekhaven/src/views/admin/html/img_producto/<?php echo $img['nombre_imagen'];?>" class="d-block w-100"  height="410px" alt="...">
                
                      </div><?php echo "";}?>
                  </div>
                  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                  <span class="carousel-control-next-icon dark" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                  </button>
              </div>
          </div>
              </div>
              
          <div class="col-sm-12 col-md-6 contenido">
                  <div class="productotop" style="margin-left: 10px;">
                      <h1>
                         <?php echo $nombre_prd ?>
                      </h1>
                      <h2 class="estado">
                          Estado: <?php echo $estado ?>
                      </h2>
                      <h2 class="precio">
                      <?php echo "$".number_format($precio, 2, '.', '.');?>
                      </h2>
                      <h3>
                          Existencia: <?php echo $existencia ?>
                      </h3>
                      <h3>
                          Categoria: <?php echo $info_producto['nom_cat']; ?>
                      </h3>                        
                  </div>
                  <div class="productobott">
                    <br>
                  <h3 class="ms-2" >Descripcion</h3> 
                                  <p class="ms-2 justify-content-center"><?php echo $descripcion; 
                                  if(empty($descripcion)){
                                      echo '<p style="color:red"> Lo sentimos, este producto no cuenta con una descripcion.</p>';
                                  }
                                  ?></p>
                         <?php 
                         if(isset($_SESSION['user'])){
                            $_SESSION['user'];

                          
                            $usr=$_SESSION['user']; 
                            $ordQry="SELECT detalle_orden.id_orden 
                            FROM usuarios
                            JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
                            JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
                            WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 LIMIT 1";
                            $ord=$db->seleccionarDatos($ordQry);
          
                          ?>
                          
                          <!-- Modal -->
                          <form action="http://localhost/geekhaven/src\scripts\cart\addPrdCart.php" method="GET">
                          <div class="mb-3">
                              <!--prd--> 
                              <input type="hidden"name ="id" id="id" value="<?php echo $id;?>">
                              <!-- usr -->
                              <input type="hidden" name ="usr" id="usr" value="<?php echo $usr;?>">
                              <!-- orden --> 
                              <!-- cantidad -->
                              <div class="col-3 ms-1">
                                  <h3 class="ms-1">Cantidad</h3>
                                  <input style="text-align:center; border-radius:5px; width:120%; height:100%" type="number" min="1" required max="<?php echo $existencia;?>"class="form-control fs-9" placeholder="1" name="cantidad" id="cantidad" >
                              </div><br>
                              
                              
                              </div>
                              <!-- enviar -->

                              <button type="submit" class="btn col-12" style="background: #005aff; font-size:18px; font-weight: bold; color:white; padding:15px;" data-bs-toggle="modal" data-bs-target="#add">Añadir al carrito</button>
                     
                          


                            
                              <?php 
                         }
                              ?>

                          </form>
                  </div>
          </div>
      </div>
  </div>

  </div>
 <br><br>

 <br>
<br> <hr style="opacity: 0.1;"><br><br><br><br><br>
 <div class="container">
<?php include '../../../templates/footer.html';?>
<script src="../../../bootstrap/js/buscador.js"></script>
</div>
 <br><br><br>

          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../admin/assets/js/sidebarmenu.js"></script>
  <script src="../admin/assets/js/app.min.js"></script>
  <script src="../admin/assets/libs/simplebar/dist/simplebar.js"></script>