<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    $db1= new Database;
    $HOST=$_SERVER['SERVER_NAME'];

    
    if(isset($_GET['id'])){
        //guardar el id del producto
        $id_producto=$_GET['id'];
        $sql = "SELECT * from productos inner join categorias on categorias.id_cat=productos.id_cat INNER JOIN img_productos on img_productos.id_producto= productos.id_producto where img_productos.id_producto=$id_producto";
        $info_producto=$db->seleccionarDatos($sql);


        foreach($info_producto as $info_producto)
        $id=$info_producto['id_producto'];
        $nombre_prd=$info_producto['nom_producto'];
        $estado=$info_producto['estado'];
        $precio=$info_producto['precio'];
        $existencia=$info_producto['existencia'];
        $descripcion=$info_producto['descripcion'];
        $imagen=$info_producto['nombre_imagen'];
      
        

    }    
    $sql = "SELECT * from categorias";
    $categorias=$db->seleccionarDatos($sql);   
   
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Productos</title>
  <link rel="shortcut icon" type="image/png" href="/var/www/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/var/www/geekhaven/src/views/admin/assets/css/styles.min.css" />
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
          <div class="cont-back" style="margin-top:-40px">
              <a href="../../../index.php" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>  
          </a>
          </div>
          
          <div class="col-sm-12 col-md-6 ">
            
                      
                  <?php 

                     if(!empty($imagen)){ ?>
<center><img src="/var/www/geekhaven/src/views/admin/html/img_producto/<?php echo $imagen; ?>" class="img-fluid" style="max-width: 100%;margin-top:50px; max-height: 400px;" alt="..."></center>
                        <?php 
                        }
                        else { ?>
<center><img src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg"class="img-fluid" style="max-width: 100%;margin-top:50px; max-height: 400px;" alt="..."></center>
                        <?php }
                    ?>
                
                  <br>
              
          
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
                          <form action="http://localhost/var/www/geekhaven/src\scripts\cart\addPrdCart.php" method="GET">
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



  <?php
  if (isset($_SESSION['message'])) { ?>
                                             
                               <style>
                                
                               .notification-container {
                                   position: fixed;
                                   bottom: 8%;
                                   left: 22%;
                                   width: 75%;
                                   margin-left: 3px;
                                   background-color: rgba(255, 255, 255, 0.419);
                                   backdrop-filter: blur(10px);
                                   border-radius: 20px;
                                   margin-right: 0;
                                   overflow: hidden;
                                   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                               }
                               /* Nuevo contenedor debajo del contenedor principal */
                               .additional-container {
                                   position: fixed;
                                   left: 23.5%;
                                   width: 73%;
                                   bottom: 7%;
                                   height: 100px;
                                   backdrop-filter: blur(10px);
                                   background-color: rgba(255, 255, 255, 0.419);
                                   border-radius: 20px;
                                   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                               }
                               .additional-container2 {
                                   position: fixed;
                                   left: 25.5%;
                                   width: 70%;
                                   bottom:7%;
                                   backdrop-filter: blur(60px);
                                   height: 100px;
                                   background-color: rgba(255, 255, 255, 0.419);
                                   border-radius: 20px;
                                   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                               }
                               /* Lista de notificaciones */
                               .notification-list {
                                   padding: 10px;
                               }
                               
                               /* Estilo de cada notificación */
                               .notification-item {
                                   padding: 10px;
                                   display: flex;
                                   align-items: center;
                                   transition: background-color 0.3s;
                               }
                               
                               
                               .notification-content {
                                   flex-grow: 1;
                               }
                               .notification-container {
                                   position: fixed;
                                   bottom: 14%;
                                   left: 22%;
                                   width: 75%;
                                   margin-left: 3px;
                                   background-color: rgba(255, 255, 255, 0.419);
                                   backdrop-filter: blur(10px);
                                   border-radius: 20px;
                                   margin-right: 0;
                                   overflow: hidden;
                                   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                               }
                               /* Nuevo contenedor debajo del contenedor principal */
                               .additional-container {
                                   position: fixed;
                                   left: 23.5%;
                                   width: 73%;
                                   bottom: 13%;
                                   height: 100px;
                                   backdrop-filter: blur(10px);
                                   background-color: rgba(255, 255, 255, 0.419);
                                   border-radius: 20px;
                                   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                               }
                               .additional-container2 {
                                   position: fixed;
                                   left: 25.5%;
                                   width: 70%;
                                   bottom: 12%;
                                   backdrop-filter: blur(60px);
                                   height: 100px;
                                   background-color: rgba(255, 255, 255, 0.419);
                                   border-radius: 20px;
                                   box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
                               }
                               /* Lista de notificaciones */
                               .notification-list {
                                   padding: 10px;
                               }
                               
                               /* Estilo de cada notificación */
                               .notification-item {
                                   padding: 10px;
                                   display: flex;
                                   align-items: center;
                                   transition: background-color 0.3s;
                               }
                               
                               
                               .notification-content {
                                   flex-grow: 1;
                               }
                               </style>
                               
                               <div class="additional-container2" id="contenedor2">
                                       <!-- Contenido del nuevo contenedor aquí -->
                                   </div>
                                   <!-- Nuevo contenedor debajo del contenedor principal -->
                                   <div class="additional-container" id="contenedor1">
                                       <!-- Contenido del nuevo contenedor aquí -->
                                   </div>
                               
                                   <div class="notification-container" id="contenedor">
                                       <div class="notification-list">
                                           <!-- Ejemplo de notificaciones -->
                                           <div class="notification-item">
                                               <div class="notification-content">
                                                   <span class="d-block d-md-none" style="position: fixed; left:80%; font-size: 14px; color: #0d6efd;" onclick="ocultarContenedores()">Cerrar</span>
                                                   <span class="d-none d-md-block" style="position: fixed; left:89%; font-size: 14px; color: #0d6efd;" onclick="ocultarContenedores()">Cerrar</span>
                                                   <strong style="color:black">Notificación</strong>
                                                   <p style="position: relative; top: 5px; color: #2f2e2e">Producto añadido correctamente <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#198754" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                 <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                               </svg></p>
                                               </div>
                                           </div>
                                       </div>
                                   </div>
                               
                               
                                   <audio id="notificationSound" preload="auto">
                                       <source src="notificacion.mp3" type="audio/mpeg">
                                       <!-- Agrega otros formatos de audio si es necesario -->
                                   </audio>
                                   <script>
                                       // Muestra la notificación
                                       document.getElementById('contenedor').style.display = 'block';
                               
                                       // Reproduce el sonido
                                       var audio = document.getElementById('notificationSound');
                                       audio.play();
                                   </script>
                               
                                   <script>
                                       function ocultarContenedores() {
                                           // Ocultar los contenedores con JavaScript
                                           document.getElementById('contenedor1').style.display = 'none';
                                           document.getElementById('contenedor2').style.display = 'none';
                                           document.getElementById('contenedor').style.display = 'none';
                                       }
                                   </script>
                               <?php
                                                               unset($_SESSION['message']);
                                                           }
                                         
                                                         ?>
                                                         
                               
                               