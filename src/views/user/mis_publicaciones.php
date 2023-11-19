<?php

use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();
error_reporting(E_ERROR); 
session_start();
//id_usuario activo
if(isset($_SESSION['user'])){
    $id=$_SESSION['user'];
}

$sql = "SELECT * from pub_trq inner JOIN usuarios on pub_trq.id_usuario=usuarios.id_usuario WHERE pub_trq.id_usuario=$id;";
$res=$db->seleccionarDatos($sql);






//borrar publicacion


if(isset($_POST['id_pub'])){



 $id_pub=$_POST['id_pub'];

  $id_usuario=$_POST['id_usuario'];


  

  //Boton de Borrar publicaicon

//verificar primero si no existen mensajes que involucren la publicacion
$sql="SELECT id_conversacion
FROM conversaciones
WHERE (id_usuario1 = $id AND id_usuario2 = 41 AND id_pub = $id_pub)
   OR (id_usuario1 = 41 AND id_usuario2 = $id AND id_pub = $id_pub) ";

$rest=$db->seleccionarDatos($sql);

if(empty($rest)){

  
    $sql = "DELETE FROM img_pub_trq WHERE img_pub_trq.id_publicacion=$id_pub";
   $db->ejecutarConsulta($sql);


    $sql = "DELETE FROM pub_trq WHERE `pub_trq`.`id_pub` = $id_pub and id_usuario=$id";
    $db->ejecutarConsulta($sql);
 
    header("Location: mis_publicaciones.php");


}


}




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
<body>

<?php include($_SERVER['DOCUMENT_ROOT'] . '/geekhaven/templates/navbar_user.php'); ?>

<!--  Header End -->
   <div class="container-fluid">
        <div class="container-fluid">
          <div class="" style="padding:0px">
          
       <center>  <h2>Mis publicaciones</h2></center>
       <br>
                    <div class="scroll-appear">
                    <div class="row">


                    <?php

    if(!empty($res)){
                    foreach($res as $res){

          
                    ?>

            <div class="col-sm-6 col-xl-4" style="margin-top:10px; margin-bottom:10px">

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

        
<?php if(empty($imagenes)){ ?>
        
        <img src="https://cdn.pixabay.com/photo/2023/08/31/18/18/purple-coneflower-8225677_960_720.jpg" class="d-block w-100"  height="310px" alt="...">
        
        <?php
        }else{
        ?>
                <img src="/geekhaven/src/views/user/img_pub_trq/<?php echo $imagenes ;?>" class="d-block w-100"  height="310px" alt="No hay imagenes">
        <?php }  ?>

        </div>
        
        <?php 
      }
    ?>
        <!-- Agrega más elementos de carrusel con otras imágenes si es necesario -->

     
</div>
</div>

<?php if(!empty($imagenes)){ ?>
        
  <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
</svg>
</a>
        <?php
        }else{  }  ?>









</div>
                      </center>


                    <div class="card-body pt-3 p-4" style="display: flex; flex-direction: column; justify-content: flex-end;">
                            <div style="width:100%;" >
                            <h6 class="fw-semibold fs-4 text-truncate"> <?php    if (!empty($res['descripcion'])) {
        echo $res['titulo'];
    } else {
        echo $_POST['titulo'];
    } ?> </h6>
                            </div>
                        <div class="d-flex align-items-center justify-content-between">
                        <h6 class="fw-semibold fs-4 mb-0">
    <?php
    if (!empty($res['precio'])) {
        echo '$' . ' ' . $res['precio'];
    } else {
        echo $_POST['precio'];
    }
    ?>
</h6>

                        <ul class="list-unstyled d-flex align-items-center mb-0">
                      
                        </ul>
                        
                        </div>
                        <br>
                        <b>Descripcion</b>
                        <div style="width:100%" class="text-truncate">
    <?php
    if (!empty($res['descripcion'])) {
        echo $res['descripcion'];
    } else {
        echo $_POST['descripcion'];
    }
    ?>
</div>

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
echo '<img class="profile-image" style="width:35px; height:35px;border-radius:50%; margin-top:15px" src="/geekhaven/src/views/user/img_profile/'.$imagen.'" alt="Perfil Chat 1">' ?>
  &ensp;&ensp; <form method="post" action="mis_publicaciones.php" style="display:inline">
  
  <input type="hidden" name="id_pub" value="<?php echo $res['id_pub'] ?>">
  <input type="hidden" name="id_usuario" value="<?php echo $res['id_usuario']?>">
  <input type="hidden" name="id_usuario" value="<?php echo $imagenes?>">  
  <input type="hidden" name="titulo" value="<?php echo $res['titulo']?>"> 
  <input type="hidden" name="precio" value="<?php echo $res['precio']?>">
  <input type="hidden" name="descripcion" value="<?php echo $res['descripcion']?>">  

  <button type="submit" class="btn" style="background:#ff0000; margin-top:15px; color:white"> Borrar publicacion &ensp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash2-fill" viewBox="0 0 16 16">
  <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
</svg></button></form>
<br><br>
<span>Publicado por mi</span>
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


          <?php }
          else{?>

<div style="padding-top:70px">

<center><h3 style="color:#eb6d6d">No has publicado productos por el momento.</h3></center>

</div>

<?php }?>


        </div>
      </div>
    </div>
  </div>


  <script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>


  <?php 
  
  if(!empty($rest)){


        ?>
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
                          <p style="position: relative; top: 5px; color: #2f2e2e">Hay chats vinculados a esta publicacion. 
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ff0000" class="bi bi-dash-circle-fill" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM4.5 7.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7z"/>
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
    document.addEventListener('DOMContentLoaded', function () {
        // Muestra la notificación
        document.getElementById('contenedor').style.display = 'block';

        // Reproduce el sonido al hacer clic en la notificación
        var audio = document.getElementById('notificationSound');
        document.getElementById('contenedor').addEventListener('click', function () {
            audio.play();
        });
    });
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
      
          
      }

  ?>



  
