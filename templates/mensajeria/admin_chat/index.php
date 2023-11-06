
<?php

use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();

//id_usuario activo
if(isset($_SESSION['admin'])){
    $id=$_SESSION['admin'];
}

$sql = "SELECT * from pub_trq inner JOIN usuarios on pub_trq.id_usuario=usuarios.id_usuario;";
$res=$db->seleccionarDatos($sql);




?>

    



<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Propuestas</title>
  <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
</head>

<body>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/geekhaven/src/views/admin/html/navbar.php'); ?>

<!--  Header End -->
   <div class="container-fluid">
        <div class="container-fluid">
          <div class="" style="padding:20px">
          
       <center>  <h2>Publicaciones De Usuarios</h2></center>
       <br>
                    <div class="scroll-appear">
                    <div class="row">


                    <?php
            
        

                    foreach($res as $res){

          
                    ?>

            <div class="col-sm-6 col-xl-4">

                    <div class="card overflow-hidden rounded-2" style=" height:100%">
                      <center>
                      <div class="position-relative" style="height:100%">

                    
<div id="productCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000" style=" height:100%">
    <div class="carousel-inner" style=" height:100%">

    <?php 
$sql="SELECT * from img_pub_trq where img_pub_trq.id_publicacion=$res[id_pub]";
$imagenes_por_publicacion=$db->seleccionarDatos($sql);

foreach($imagenes_por_publicacion as $imagenes_por_publicacion){
$imagenes=$imagenes_por_publicacion['nombre_imagen']
    ?>
        <div class="carousel-item active" >
        
                <img src="/geekhaven/src/views/user/img_pub_trq/<?php echo $imagenes ;?>" class="d-block w-100"  height="350px" alt="...">
        
        </div>
        
        <?php 
      }
    ?>
        <!-- Agrega más elementos de carrusel con otras imágenes si es necesario -->

     
</div>
</div>

<a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
</svg>
</a>








</div>
                      </center>


                    <div class="card-body pt-3 p-4" style="display: flex; flex-direction: column; justify-content: flex-end;">
                            <div style="width:100%;" >
                            <h6 class="fw-semibold fs-4 text-truncate"> <?php echo $res['titulo']?> </h6>
                            </div>
                        <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' .' '. $res['precio']; ?></h6>
                        <ul class="list-unstyled d-flex align-items-center mb-0">
                      
                        </ul>
                        
                        </div>
                        <br>
                        <b>Descripcion</b>
                       <div style="width:100%" class="text-truncate"> <?php echo $res['descripcion']?></div>
                        <br>

<center>
<?php    
$id_usuario=$res['id_usuario'];

$sql="select * from usuarios inner join personas on usuarios.id_persona=personas.id_persona where usuarios.id_usuario=$id_usuario";
$dato=$db->seleccionarDatos($sql);
foreach ($dato as $dato){
    $imagen = $dato['imagen'];
    $nombre = $dato['nombre'];
}
echo '<img class="profile-image" style="width:35px; height:35px;border-radius:50%" src="/geekhaven/src/views/user/img_profile/'.$imagen.'" alt="Perfil Chat 1">' ?>;
  &ensp;&ensp; <a href="../conversacion.php?id_pub=<?php echo $res['id_pub'];  ?>&id_usuario=<?php echo $res['id_usuario'];?> &pub_titulo=<?php echo $res['titulo'];?> &num_new_friend=<?php echo $res['telefono']; ?>"><button type="button" class="btn" style="background:#005aff; color:white"> Mensaje &ensp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
  <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
</svg></button></a>
<br><br>
<span>Publicado por <?php echo $nombre ?></span>
</center>


                    </div>
                    </div>
                    </div>

                    <?php
                    }
                    ?>
                    </div>
                    </div>

          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>