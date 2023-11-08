<?php
    session_start();
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;
    if(isset($_GET['id'])){
         $_SESSION['id_producto'] = $_GET['id'];
        $id = $_SESSION['id_producto'];

    }
    if(isset($_POST['guardar_producto'])){

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
    
        //Actualizar nombre
        $update_nombre_nuveo = "UPDATE `productos` SET `nom_producto` = '$nombre' WHERE `productos`.`id_producto` = $_SESSION[id_producto];
        ";
        $update_nombre=$db->ejecutarConsulta($update_nombre_nuveo);
    
        //Actualizar precio
        $update_precio_nuveo = "UPDATE `productos` SET `precio` = '$precio' WHERE `productos`.`id_producto` = $_SESSION[id_producto];";
        $update_precio=$db->ejecutarConsulta($update_precio_nuveo);
    
        //Actualizar descripcion
        $update_descripcion_nuveo = "UPDATE `productos` SET `descripcion` = '$descripcion' WHERE `productos`.`id_producto` = $_SESSION[id_producto];";
        $update_descripcion=$db->ejecutarConsulta($update_descripcion_nuveo);

        //Actualizar existencia
        $update_existencia_nuveo = "UPDATE `productos` SET `existencia` = '$existencia' WHERE `productos`.`id_producto` = $_SESSION[id_producto];";
        $update_existencia=$db->ejecutarConsulta($update_existencia_nuveo);

        //Actualizar estado
        $update_estado_nuveo = "UPDATE `productos` SET `estado` = $estado WHERE `productos`.`id_producto` = $_SESSION[id_producto];";
        $update_estado=$db->ejecutarConsulta($update_estado_nuveo);

        //Actualizar categoria
        $update_categoria_nuveo = "UPDATE `productos` SET `id_cat` = $categoria WHERE `productos`.`id_producto` = $_SESSION[id_producto];";
        $update_categoria=$db->ejecutarConsulta($update_categoria_nuveo);

        //Actualizar tipo
        $update_tipo_nuveo = "UPDATE `productos` SET `tipo_id` = $tipo WHERE `productos`.`id_producto` = $_SESSION[id_producto]; ";
        $update_tipo=$db->ejecutarConsulta($update_tipo_nuveo);

        //Actualizar universo
        $update_universo_nuveo = "UPDATE `productos` SET `universo_id` = $universo WHERE `productos`.`id_producto` = $_SESSION[id_producto];";
        $update_universo=$db->ejecutarConsulta($update_universo_nuveo);

        //Actualizar costo
        $update_costo_nuveo = "UPDATE `productos` SET `precio_base` = '$costo' WHERE `productos`.`id_producto` = $_SESSION[id_producto];";
        $update_costo=$db->ejecutarConsulta($update_costo_nuveo);

        }


        if(isset($_SESSION['id_producto'])){
            
        $productoQry="SELECT * from productos where productos.id_producto=$_SESSION[id_producto]";
        $producto=$db->seleccionarDatos($productoQry);

        foreach($producto as $res){
            $prd_nom = $res['nom_producto'];
            $prd_precio = $res['precio'];
            $prd_desc = $res['descripcion'];
            $prd_exist = $res['existencia'];
            $prd_estado = $res['estado'];
            $prd_cat = $res['id_cat'];
            $prd_tipo = $res['tipo_id'];
            $prd_universo = $res['universo_id'];
            $prd_fecha = $res['fecha'];
            $prd_costo = $res['precio_base'];
        }
        }


       

  
?>
<!doctype html>
<html lang="en">
    

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="../../views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>

<?php include('navbar.php') ?>

<!--  Header End -->

<br><br><br><br>
<h1 align="center">Editar Producto</h1>
<div class="container">
    <div class="row">
        
    <form action="editproducto.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="nombre" class="form-label"><strong>Nombre</strong></label>
            <input type="text" name="nombre" id="nombre" value="<?php echo $prd_nom?>" class="form-control" placeholder="Escribe el nombre del producto aquí" required>
        </div>       
        <div class="mb-3">
            <label for="precio" class="form-label"><strong>Precio</strong></label>

            <input type="number" name="precio" id="precio"  value="<?php echo $prd_precio?>" class="form-control" placeholder="Escribe el precio del producto aquí" required>
        </div>
        <div class="mb-3">
            <label for="existencia" class="form-label"><strong>Existencia</strong></label>
            <input type="text" name="existencia" id="existencia"   value="<?php echo $prd_exist?>" class="form-control" placeholder="Escribe la existencia del producto aquí" required>
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label"><strong>Descripción</strong></label>
            <textarea name="descripcion" id="descripcion"  class="form-control" placeholder="Escribe una descripción del producto" required><?php echo $prd_desc?></textarea>
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
            <input type="number" name="costo" id="costo"  value="<?php echo $prd_costo?>" class="form-control" placeholder="Escribe el costo base del producto aquí" required>
        </div>
        <br>

       

                <center> <button type="submit" name="guardar_producto" class="btn" style="background: #005aff; padding-left:30px; padding-right:30px; color:white">Guardar Cambios</button></center>

        </div>
        </form>

    </div>
</div>   



  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>