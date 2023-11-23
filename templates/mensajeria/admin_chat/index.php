
<?php

use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();

//id_usuario activo
if(isset($_SESSION['admin'])){
    $id=$_SESSION['admin'];
}

$sql = "SELECT pub_trq.*, usuarios.estado as estado_usuario
FROM pub_trq
INNER JOIN usuarios ON pub_trq.id_usuario = usuarios.id_usuario;";

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
          <div class="" style="padding:0px">
          
       <center>  <h2>Publicaciones De Usuarios</h2></center>
       <br>
                    <div class="scroll-appear">
                    <div class="row">




                    <?php


if (!empty($res)) {
    foreach ($res as $res) {
        $sql = "SELECT * from img_pub_trq where img_pub_trq.id_publicacion=$res[id_pub]";
        $imagenes_por_publicacion = $db->seleccionarDatos($sql);
        ?>

        <div class="col-sm-6 col-xl-4" style="margin-top:10px; margin-bottom:10px">
            <div class="card" style="height: 100%;">
                <div class="card-body">
                    <?php if (!empty($imagenes_por_publicacion)) { ?>
                        <img src="/geekhaven/src/views/user/img_pub_trq/<?php echo $imagenes_por_publicacion[0]['nombre_imagen']; ?>" class="card-img-top" height="310px" alt="No hay imágenes">
                    <?php } else { ?>
                        <img src="https://static.vecteezy.com/system/resources/previews/004/141/669/non_2x/no-photo-or-blank-image-icon-loading-images-or-missing-image-mark-image-not-available-or-image-coming-soon-sign-simple-nature-silhouette-in-frame-isolated-illustration-vector.jpg" class="card-img-top" height="310px" alt="...">
                    <?php } ?>

                    <div class="card-body pt-3 p-4">
                        <h6 class="fw-semibold fs-4 text-truncate">
                            <?php if (!empty($res['descripcion'])) {
                                echo $res['titulo'];
                            } else {
                                echo $_POST['titulo'];
                            } ?>
                        </h6>

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
                                <!-- Agrega elementos adicionales según sea necesario -->
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

                        <b>Estado</b>
                        <?php 
                      echo $res['estado'];
                        ?>

                        <br>

                        <center>
                            <?php
                            $id_usuario = $res['id_usuario'];
                            $sql = "select * from usuarios inner join personas on usuarios.id_persona=personas.id_persona where usuarios.id_usuario=$id_usuario";
                            $dato = $db->seleccionarDatos($sql);
                            foreach ($dato as $dato) {
                                $imagen = $dato['imagen'];
                                $nombre = $dato['nombre'];
                            }
                            echo '<img class="profile-image" style="width:35px; height:35px;border-radius:50%; margin-top:15px" src="/geekhaven/src/views/user/img_profile/' . $imagen . '" alt="Perfil Chat 1">';
                            ?>
                            &ensp;&ensp; 
                            <form method="post" action="mis_publicaciones.php" style="display:inline">
                                <input type="hidden" name="id_pub" value="<?php echo $res['id_pub'] ?>">
                                <input type="hidden" name="id_usuario" value="<?php echo $res['id_usuario']?>">
                                <input type="hidden" name="id_usuario" value="<?php echo $imagenes_por_publicacion[0]['nombre_imagen']; ?>">
                                <input type="hidden" name="titulo" value="<?php echo $res['titulo']?>">
                                <input type="hidden" name="precio" value="<?php echo $res['precio']?>">
                                <input type="hidden" name="descripcion" value="<?php echo $res['descripcion']?>">
                                &ensp; <a href="../conversacion.php?id_pub=<?php echo $res['id_pub'];  ?>&id_usuario=<?php echo $res['id_usuario'];?> &pub_titulo=<?php echo $res['titulo'];?> &num_new_friend=<?php echo $res['telefono']; ?>"><button type="button" class="btn" style="background:#005aff; color:white; margin-top:20px"> Mensaje &ensp; <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-chat-text-fill" viewBox="0 0 16 16">
  <path d="M16 8c0 3.866-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.584.296-1.925.864-4.181 1.234-.2.032-.352-.176-.273-.362.354-.836.674-1.95.77-2.966C.744 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7zM4.5 5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h7a.5.5 0 0 0 0-1h-7zm0 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4z"/>
</svg></button></a>
<br><br>
                            </form>
                           
                            <span>Publicado por <?php echo $nombre ?></span>
                        </center>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
}
 else {
    ?>

    <div style="padding-top:70px">
        <center><h3 style="color:#eb6d6d">No han publicado productos por el momento.</h3></center>
    </div>

<?php
}
?>




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