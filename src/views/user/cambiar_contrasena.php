<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
session_start();
//ocultar warnings
error_reporting(E_ERROR | E_PARSE);



//id_usuario activo
if(isset($_SESSION['admin'])){
  $id=$_SESSION['admin'];
}
if(isset($_SESSION['user'])){
  $id=$_SESSION['user'];
}


$sql="SELECT * FROM personas INNER JOIN usuarios on personas.id_persona=usuarios.id_persona WHERE usuarios.id_usuario=$id";

$datos_user=$db->seleccionarDatos($sql);
foreach($datos_user as $datos_user){
$password_hash=$datos_user['contrasena'];
$nombre=$datos_user['nombre'];
$apellido=$datos_user['apellido'];
$info=$datos_user['info'];
$correo=$datos_user['correo'];
$img=$datos_user['imagen'];


}

?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Buscar Contraseña</title>
  <link rel="shortcut icon" type="image/png" href="../admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css">
</head>

<style>
    input[type="file"] {
    display: none;
}
.imagen-preview {
    margin: auto;
    max-width: 60px; /* Cambiamos max-width a 60px */
    max-height: 60px; /* Cambiamos max-height a 60px */
    width: 60px; /* Usamos width al 100% para que la imagen se ajuste al contenedor */
    height: 60px; /* Usamos height al 100% para que la imagen se ajuste al contenedor */
    border-radius: 50%;
    border: 0px solid #0d6efd;
    position: relative;
    top: 0px;
    background-color: #2787f552;
    object-fit: cover; /* Añadimos object-fit para que la imagen se ajuste correctamente */
}

.imagen-preview img {
  margin: auto;
  max-width: 100%;
  max-height: 100%;
  width: 75px;
  height: 75px;
  border-radius:50%;
}
  /*Lista de chats/*/
  .chat-container {
    display: flex;
    width: 100%;
    padding-left:  0px;
    padding-right: 0px;
    padding-top: 18px;
    padding-bottom: 18px;
}
.profile-image {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    margin-right: 15px;
}
.chat-content {
    flex: 1;
}
.chat-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
}
  /*Lista de chats/*/
</style>

<body>


<?php 
if(isset($_SESSION['admin'])){
  include($_SERVER['DOCUMENT_ROOT'] . '/geekhaven/src/views/admin/html/navbar.php');
}
if(isset($_SESSION['user'])){
  include($_SERVER['DOCUMENT_ROOT'] . '/geekhaven/templates/navbar_user.php');
} ?>

<!--  Header End -->
   <div class="container-fluid">
        <div class="container-fluid">
          <div class="" style="padding:20px">
          
          <div style="padding:0px">



<?php 

//Actualizar datos personales
if(isset($_POST['cambiar_contrasena'])){

  // Obtén los datos del formulario
  $contrasena_actual = $_POST['actual'];
  $nueva_contrasena = $_POST['nueva'];
  $confirmacion_contrasena = $_POST['confirmacion'];

  if (password_verify($contrasena_actual, $password_hash)) {

    if($nueva_contrasena == $confirmacion_contrasena){

      // Encripta la nueva contraseña
      $contrasena_encriptada = password_hash($nueva_contrasena, PASSWORD_DEFAULT);
      $sql_update_password="UPDATE usuarios SET contrasena = '$contrasena_encriptada' WHERE id_usuario = $id";
      $db->ejecutarConsulta($sql_update_password);

     echo '<div class="alert alert-success text-center" role="alert">
     Su Contraseña ha sido cambiada correctamente!
   </div>
   ';
    }
    else{
     echo '<div class="alert alert-danger text-center" role="alert">
     Lo sentimos, las contraseñas no coinciden
   </div>
   ';
    }

} else {
  echo '<div class="alert alert-danger text-center" role="alert">
  Lo sentimos, las contraseña actual no coincide
</div>
';
}

}
?>

  
    <h1 id="chats">Cambiar contraseña de perfil</h1>
<br>
    <div>
        <div id="back_form"  class="chat-container" >

    
    <!-- Vista previa de la imagen -->
    <style>
.feather-image {
  display: inline-block; /* Mostrar SVG por defecto */
}
</style>

  <div id="imagen-preview" class="imagen-preview">
  
<?php   
//id_usuario activo
if(isset($_SESSION['admin'])){ ?>
  <img  id="imagen-preview" src="../admin/html/img_profile/<?php echo $img;?>" onerror="this.style.display='none';" onload="">
<?php }
if(isset($_SESSION['user'])){ ?>
    <img  id="imagen-preview" src="img_profile/<?php echo $img;?>" onerror="this.style.display='none';" onload="">
<?php } ?>
  

  </div>
</label>




    
&ensp;&ensp;
            <div class="chat-content text-truncate">
                <div class="chat-header">
                    <h4 class="text-truncate" id="nombrechat"><?php echo $nombre . ' '. $apellido ?></h4>
                  
                </div>
                <div class="text-truncate" id="mensajechat" >
                  <?php echo $info ?>
                </div>
                <br> 
            </div>


            <br><br>
        </div>
        


                  <form action="cambiar_contrasena.php" method="POST">
                   <div class="col-12">
                    <label class="form-label">Contrasena Actual </label>
                    <input type="password" class="form-control" name="actual" placeholder="Escriba su contraseña actual (Obligatorio)"  style="padding:15px" required="">
                </div>
                <br>
                <div class="col-12">
                    <label class="form-label">Nueva Contrasena</label>
                    <input type="password" class="form-control" name="nueva" placeholder="Nueva contraseña (Obligatorio)" value="" style="padding:15px" required="">
                </div>
                <br>

                <div class="col-12">
                    <label class="form-label">Confirma la contraseña</label>
                    <input type="password" class="form-control" name="confirmacion" placeholder="Confirme su contraseña (Obligatorio)" value="" style="padding:15px" required="">
                </div>
                   <br>

                 
                   <br>
                  
                    
                   <center> <button type="submit" name="cambiar_contrasena"  class="btn"  style="background: #005aff; color:white">Cambiar Contraeña</button></center>
                  </form>


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