<?php
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;

?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Agregar Producto</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
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
</style>



<body>

<?php include('navbar.php') ?>

<!--  Header End -->
<br><br>
<a href="/geekhaven/src/views/admin/html/exist_or_agg.php" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>  
          </a>
   <div class="container-fluid">
        <div class="container-fluid">
          <div  style="padding:20px">

          <div class="container-fluid">
        <div style="padding: 20px">


   

<?php 
if (isset($_GET['mensaje'])) {
    if ($_GET['mensaje'] == 'success') {
        echo " <br<div class='container mt-5'>
      <div class='alert alert-success' role='alert'>
        <div class='row'>
        <h1 class='alert-heading col-12' align='center' style='font-size: 1.5em;'>Producto Agregado</h1><br>
        </div>
        </div>
        </div>";
    }

}
?>

            <h2 class="text-center">Añadir un nuevo producto</h2>
            <p class="text-center" style="color:#838383; font-size:20px">Registro de Productos</p>

        <form action="agg_prd.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label"><strong>Nombre</strong></label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe el nombre del producto aquí" required>
        </div>       
        <div class="mb-3">
            <label for="precio" class="form-label"><strong>Precio</strong></label>
            <input type="number" name="precio" id="precio" class="form-control"  min="1" placeholder="Escribe el precio del producto aquí" required>
        </div>
        <div class="mb-3">
            <label for="existencia" class="form-label"><strong>Existencia</strong></label>
            <input type="number" name="existencia" id="existencia" class="form-control" pattern="[1-9]\d" min="1" placeholder="Escribe la existencia del producto aquí" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label"><strong>Descripción</strong></label>
            <textarea name="descripcion" id="descripcion" class="form-control" placeholder="Escribe una descripción del producto" required></textarea>
        </div>
        <div class="mb-3">
            <label for="estado"><strong>Estado:</strong></label>
            <select id="estado" name="estado" class="form-control">
            <?php
               $sql = "SELECT DISTINCT estado FROM productos WHERE estado = 'normal' OR estado = 'oferta'";
               $estados = $db->seleccionarDatos($sql);

               foreach ($estados as $estado) {
               echo '<option value="' . $estado['estado'] . '">' . $estado['estado'] . '</option>';
               }
            ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="categoria"><strong>Categoría:</strong></label>
            <select id="categoria" name="categoria" class="form-control" required>
            <?php
               $sql = "SELECT id_cat,nom_cat from categorias";
               $categorias = $db->seleccionarDatos($sql);

               foreach ($categorias as $categorias) {
                echo '<option value="' . $categorias['id_cat'] . '">' . $categorias['nom_cat'] . '</option>';
            }
            ?>  
            </select>
        </div>
        <div class="mb-3">
            <label for="universo"><strong>Tipo:</strong></label>
            <select id="universo" name="tipo" class="form-control" required>
            <?php
                $sql = "SELECT id_tipo,tipo from tipo";
                $tipos = $db->seleccionarDatos($sql);

                foreach ($tipos as $tipo) {
                echo '<option value="' . $tipo['id_tipo'] . '">' . $tipo['tipo'] . '</option>';
                }
            ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="universo"><strong>Universo:</strong></label>
            <select id="universo" name="universo" class="form-control" required>
            <?php
                $sql = "SELECT id_universo,universo FROM universo";
                $universos = $db->seleccionarDatos($sql);

                foreach ($universos as $universo) {
                echo '<option value="' . $universo['id_universo'] . '">' . $universo['universo'] . '</option>';
                }
            ?>
            </select>
        </div>
        <div class="mb-3">
            <input type="hidden" name="fecha" value="<?php date_default_timezone_set('America/Mexico_City');
                                                               $fecha_actual_completa=date("Y-m-d H:i:s"); 
                                                               echo $fecha_actual_completa; ?>">
            </div>

        <div class="mb-3">
            <label for="precio_base" class="form-label"><strong>Costo</strong></label>
            <input type="number" name="costo" id="costo" class="form-control"  min="1" placeholder="Escribe el costo base del producto aquí" required>
        </div>
        <br>

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
                <button  onclick="deleteImage()" type="button" name="guardar_datos_personales" class="btn" style="background: #ff4e4e; padding-left:30px;margin-top:19px; padding-right:30px;">
                    <svg onclick="deleteImage()" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="white" class="bi bi-trash2-fill" viewBox="0 0 16 16">
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
                <center> <button type="submit" name="guardar_datos_personales" class="btn" style="background: #005aff; padding-left:30px; padding-right:30px; color:white">Agregar Producto</button></center>

        </form>



      
  <!--Este es necesario para que funcione el de agregar imagenes-->

  <script src="/geekhaven/bootstrap/js/upload_photo_multiple.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>