<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GeekMarket</title>
    <link rel="shortcut icon" type="image/png" href="/geekhaven/src/views/admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
    <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />
</head>

<style>

/* Esto es codigo css de agregar imagen*/
.container {
  max-width: 9260px;
  margin: 30px auto;
  padding: 20px;
}

.avatar-upload {
  position: relative;
  max-width: 100%;
  margin: 50px auto;
}
.avatar-upload .avatar-edit {
  position: absolute;
  right: 12px;
  z-index: 1;
  top: 10px;
}
.avatar-upload .avatar-edit input {
  display: none;
}
.avatar-upload .avatar-edit input + label {
  display: inline-block;
  width: 34px;
  height: 34px;
  margin-bottom: 0;
  border-radius: 100%;
  background: #FFFFFF;
  border: 1px solid transparent;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
  cursor: pointer;
  font-weight: normal;
  transition: all 0.2s ease-in-out;
}
.avatar-upload .avatar-edit input + label:hover {
  background: #f1f1f1;
  border-color: #d6d6d6;
}
.avatar-upload .avatar-edit input + label:after {
  content: "\f040";
  font-family: 'FontAwesome';
  color: #757575;
  position: absolute;
  top: 10px;
  left: 0;
  right: 0;
  text-align: center;
  margin: auto;
}
.avatar-upload .avatar-preview {
    width: 357px;
    padding-top:15px;
    height: 405px;
    margin-left:-58px;
  position: relative;
  border-radius: 3%;
  border: 6px dashed black;
  box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
}
.avatar-upload .avatar-preview > div {
    margin-left:10px;
    padding-right: 20px;
  width: 330px;
  height: 300px;
  border-radius: 3%;
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
}




.variants {
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .variants > div {
    margin-right: 5px;
  }
  
  .variants > div:last-of-type {
    margin-right: 10px;
    margin-bottom:50px;
  }
   
.file {
  position: relative;
  display: flex;
  justify-content: center;
  align-items: center;
}

.file > input[type='file'] {
  display: none
}

.file > label {
  font-size: 1rem;
  font-weight: 300;
  cursor: pointer;
  outline: 0;
  user-select: none;
  border-color: rgb(216, 216, 216) rgb(209, 209, 209) rgb(186, 186, 186);
  border-style: solid;
  border-radius: 4px;
  border-width: 1px;
  background-color: hsl(0, 0%, 100%);
  color: hsl(0, 0%, 29%);
  padding-left: 16px;
  padding-right: 16px;
  padding-top: 16px;
  padding-bottom: 16px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.file > label:hover {
  border-color: hsl(0, 0%, 21%);
}

.file > label:active {
  background-color: hsl(0, 0%, 96%);
}

.file > label > i {
  padding-right: 5px;
}

.file--upload > label {
 
  border-color: hsl(204, 86%, 53%);
}

.file--upload > label:hover {
  border-color: hsl(204, 86%, 53%);
  background-color: hsl(204, 86%, 96%);
}

.file--upload > label:active {
  background-color: hsl(204, 86%, 91%);
}


/* Esto es codigo css de agregar imagen*/


</style>

<body>
    <?php
    // Incluye tu navbar o cualquier otro contenido común
    include('../../../templates/navbar_user.php');
    ?>

    <div class="container-fluid">
        <div style="padding: 20px">


        <?php

if (isset($_POST['nombre_producto'], $_POST['descripcion_producto'], $_POST['estado_producto'], $_POST['precio_producto'], $_POST['id_usuario'])) {

$nombre_producto= $_POST['nombre_producto'];
$descripcion_producto= $_POST['descripcion_producto'];
$estado_producto=$_POST['estado_producto'];
$precio_producto=$_POST['precio_producto'];
$id_usuario = $_POST['id_usuario'];

$insert_pub_trq="INSERT INTO `pub_trq` (`id_usuario`, `precio`, `descripcion`, `estado`, `estatus`, `titulo`) VALUES ($id_usuario, $precio_producto, '$descripcion_producto', '$estado_producto', 0, '$nombre_producto')";
$db->ejecutarConsulta($insert_pub_trq);

$obtener_id_de_pub="select id_pub from pub_trq where id_usuario=$id_usuario and precio=$precio_producto and descripcion='$descripcion_producto' and estado='$estado_producto' and titulo='$nombre_producto' and estatus=0";
$id_publicacion=$db->seleccionarDatos($obtener_id_de_pub);
foreach ($id_publicacion as $id_publicacion){
    $id_pub=$id_publicacion['id_pub'];
}

?>

<div class="alert alert-success" role="alert">
<center> Su producto ha sido publicado correctamente!</center>
</div>

<?php

}




//si hay un metodo FIles[imagen]
// Si hay un método $_FILES['imagen']
if (isset($_FILES['imagen'])) {
  $id_usuario = $_POST['id_usuario'];

  // Carpeta temporal para almacenar las imágenes
  $carpeta_temporal = 'img_pub_trq/';
  if (!is_dir($carpeta_temporal)) {
      mkdir($carpeta_temporal, 0755, true);
  }

  // Comprobamos si se ha subido una sola imagen
  if ($_FILES['imagen']['error'] == UPLOAD_ERR_OK && is_uploaded_file($_FILES['imagen']['tmp_name'])) {
      // Comprobamos si el fichero es una imagen
      if ($_FILES['imagen']['type'] == 'image/png' || $_FILES['imagen']['type'] == 'image/jpeg') {

          // Guardamos los datos de la imagen
          $nombre_imagen = $_FILES['imagen']['name'];
          $ruta_temporal = $_FILES['imagen']['tmp_name'];
          $ruta_destino = $carpeta_temporal . $nombre_imagen;

          // Movemos la imagen a la carpeta temporal
          if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
              // Guardar el nombre de la imagen en la base de datos
              $db->ejecutarConsulta("INSERT INTO img_pub_trq (id_publicacion, nombre_imagen) VALUES ($id_pub, '$nombre_imagen')");
          }
      } else {
          $validar = false;
      }
  } else {
      $validar = false;
  }
}



?>

            <h2 class="text-center">GeekMarket Publica Productos En Linea</h2>
            <p class="text-center" style="color:#838383; font-size:20px">Publica y vende</p>

            <form action="crear_publicacion.php" method="post" enctype="multipart/form-data">
                <div class="col-12">
                    <label class="form-label">Nombre Del Producto</label>
                    <input type="text" class="form-control" name="nombre_producto" placeholder="Nombre del producto (Obligatorio)" style="padding:15px" required>
                </div>

                <br>

                <div class="col-12">
                    <label class="form-label">Descripcion de la publicacion</label>
                    <textarea class="form-control" name="descripcion_producto" rows="3" placeholder="Descripcion (Obligatorio)" required maxlength="150"></textarea>
                    <small>Limite De Caracteres: 150</small>
                </div>

                <br>

                <div class="row">
                    <div class="col-sm-6 col-lg-6"><br>
                        <label class="form-label">Estado Del Producto</label>
                        <select class="form-select" style="margin-top:0px; padding:15px " aria-label="Default select example" name="estado_producto" id="estado_producto">
                            <option value="Nuevo">Nuevo</option>
                            <option value="Semi-usado">Semi-usado</option>
                            <option value="Usado">Usado</option>
                        </select>
                    </div>

                    <div class="col-sm-6 col-lg-6"><br>
    <label class="form-label">Precio Del Producto</label>
    <input type="number" class="form-control" name="precio_producto" placeholder="$ Precio del producto (Obligatorio)" style="padding:15px" oninput="validarNumero(this)" required>
</div>



<script>
    function validarNumero(input) {
        // Elimina cualquier carácter que no sea un número
        input.value = input.value.replace(/[^0-9]/g, '');

        // Limita la longitud a 5 dígitos
        if (input.value.length > 10) {
            input.value = input.value.slice(0, 10);
        }
    }
</script>


                </div>
<br><br>



<!---Agregar imagen-->
<center>
    <div class="container">
        <div class="avatar-upload">
            <div>
                <div class="variants">
                    <div class='file file--upload'>
                        <label for="img">
                            <i class="material-icons">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-cloud-plus-fill" viewBox="0 0 16 16">
                                    <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m.5 4v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0"/>
                                </svg> &ensp;Subir Imagen
                            </i>
                        </label>
                        <input name="imagen" type='file' id="img" accept=".png, .jpg, .jpeg" onchange="displayImage(this)" />
                    </div>
                </div>
            </div>
            <div class="avatar-preview">
                <div id="imagePreview" style="background-image: url(https://pixsector.com/cache/517d8be6/av5c8336583e291842624.png);"></div>
                <button onclick="deleteImage()" type="button" name="guardar_datos_personales" class="btn" style="background: #ff4e4e; padding-left:30px;margin-top:19px; padding-right:30px;">
                    <svg  xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                        <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                    </svg>
                </button>
            </div>
        </div>
    </div>
</center>

<script>
    function displayImage(input) {
        var file = input.files[0];
        if (file) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('imagePreview').style.backgroundImage = 'url(' + e.target.result + ')';
            };
            reader.readAsDataURL(file);
        }
    }

    function deleteImage() {
        // Eliminar la imagen actual y establecer la imagen por defecto
        document.getElementById('imagePreview').style.backgroundImage = 'url(https://pixsector.com/cache/517d8be6/av5c8336583e291842624.png)';
        // También puedes restablecer el valor del input de tipo file si es necesario
        document.getElementById('imageUpload').value = '';
    }

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#imagePreview").css("background-image", "url(" + e.target.result + ")");
                $("#imagePreview").hide();
                $("#imagePreview").fadeIn(650);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function () {
        readURL(this);
    });
</script>
<!---Agregar imagen-->



                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user'] ?>">
                <center> <button type="submit" name="guardar_datos_personales" class="btn" style="background: #005aff; width:200px; padding: 15px; font-size:18px;padding-left:30px; padding-right:30px; color:white">Publicar</button></center>

          </form>



        </div>
    </div>


<!--Este es necesario para que funcione el de agregar imagenes-->

    <script src="/geekhaven/bootstrap/js/upload_photo_multiple.js"></script>
    <script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
    <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
    <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>
</body>

</html>