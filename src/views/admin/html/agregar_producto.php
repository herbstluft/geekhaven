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
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />

</head>

<body>

<?php include('navbar.php') ?>

<!--  Header End -->
   <div class="container-fluid">
        <div class="container-fluid">
          <div  style="padding:20px">

          <div class="container-fluid">
        <div style="padding: 20px">


        <?php

if ($_SERVER["REQUEST_METHOD"] === "POST")  {

    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $existencia = $_POST['existencia'];
    $estado = $_POST['estado'];
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];
    $universo = $_POST['universo'];
    $fecha_actual = $_POST['fecha'];
    $costo = $_POST['costo'];

    $sql = "INSERT INTO productos (nom_producto, precio, descripcion, existencia, estado, id_cat, tipo_id, universo_id, fecha, precio_base) 
    VALUES ('$nombre', '$precio', '$descripcion', '$existencia', '$estado', '$categoria', '$tipo', '$universo', '$fecha_actual', '$costo')";
    
    $result = $db->ejecutarConsulta($sql);


}

?>



<?php


//si hay un metodo FIles[imagen]
if (isset($_FILES['imagen'])){  
    $id_usuario = $_POST['id_usuario'];
  
     // Carpeta temporal para almacenar las imágenes
     $carpeta_temporal = 'img_producto/';
     if (!is_dir($carpeta_temporal)) {
         mkdir($carpeta_temporal, 0755, true);
     }
  
      //cuenta las imagenes que hay en el array
      $cantidad= count($_FILES["imagen"]["tmp_name"]);
      //recorre cada una de las imagenes para saber el nombre de cada una de ellas
      for ($i=0; $i<$cantidad; $i++){
      //Comprobamos si el fichero es una imagen
      if ($_FILES['imagen']['type'][$i]=='image/png' || $_FILES['imagen']['type'][$i]=='image/jpeg'){
      
      //guardamos los datos de cada imagen, por ejemplo el nombre
      if (!empty($_FILES['imagen']['name'][0])) {
        $nombre_imagenes = $_FILES['imagen']['name'];
        $rutas_temporales = $_FILES['imagen']['tmp_name'];
    
        for ($i = 0; $i < count($nombre_imagenes); $i++) {
            $nombre_imagen = $nombre_imagenes[$i];  //aqui se guarda el nombre de la imagen
            $ruta_temporal = $rutas_temporales[$i];
            $ruta_destino = $carpeta_temporal . $nombre_imagen;
    
            //movemos las imagenes a la carpeta temporal, en este caso se creo una llamada img_pub_trq
            if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
                // Guardar el nombre de la imagen en la base de datos
                $db->ejecutarConsulta("INSERT INTO img_producto (img_producto) VALUES ('$nombre_imagen')");
            }
        }
    }
      }
      else $validar=false;
    }
  }



?>

            <h2 class="text-center">GeekMarket Publica Productos En Linea</h2>
            <p class="text-center" style="color:#838383; font-size:20px">Publica y vende</p>

            <form action="agregar_producto.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
            <label for="nombre" class="form-label"><strong>Nombre</strong></label>
            <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Escribe el nombre del producto aquí" required>
        </div>       
        <div class="mb-3">
            <label for="precio" class="form-label"><strong>Precio</strong></label>
            <input type="text" name="precio" id="precio" class="form-control" placeholder="Escribe el precio del producto aquí" required>
        </div>
        <div class="mb-3">
            <label for="existencia" class="form-label"><strong>Existencia</strong></label>
            <input type="text" name="existencia" id="existencia" class="form-control" placeholder="Escribe la existencia del producto aquí" required>
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
            <input type="text" name="costo" id="costo" class="form-control" placeholder="Escribe el costo base del producto aquí" required>
        </div>
        <br>


                




                <div class="my-form"  style="display: contents; margin-top: 0;">
                
                <div id="drop-area">
                   <center>
                   <p>Puede subir varios archivos con el cuadro de diálogo de archivos.</p>
                   </center>
                    <center>
                      <input type="file" id="fileElem" name="imagen[]" value="" multiple accept="image/*" onchange="handleFiles(this.files)">
                   
                 
                    <label class="button" for="fileElem">Seleccione las imagenes</label>
                  <br><br>
                  <progress id="progress-bar" max=100 value=0 style="width:100%;"></progress>

                  </center>
                  

                 <center>
                 <div id="gallery" /> </div>
                 </center>
                </div>

                <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['user'] ?>">
                <center> <button type="submit" name="guardar_datos_personales" class="btn" style="background: #005aff; padding-left:30px; padding-right:30px; color:white">Publicar</button></center>

            </div>






          </form>



        </div>
    </div>

          

          </div>
        </div>
      </div>
    </div>
  </div>
  <!--Este es necesario para que funcione el de agregar imagenes-->

  <script src="/geekhaven/bootstrap/js/upload_photo_multiple.js"></script>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>