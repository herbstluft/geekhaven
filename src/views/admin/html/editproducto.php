<?php
    session_start();
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;
    if(isset($_GET['id'])){
         $_SESSION ['id_producto']=$_GET['id'];
        $id =  $_SESSION ['id_producto'];

    }
    if(isset($_POST['guardar_producto'])){
        $id = $_POST['id'];
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
        $update_nombre_nuveo = "UPDATE `productos` SET `nom_producto` = '$nombre' WHERE id_producto =$_SESSION[id_producto];";
        $update_nombre=$db->ejecutarConsulta($update_nombre_nuveo);
    
        //Actualizar precio
        $update_precio_nuveo = "UPDATE `productos` SET `precio` = '$precio' WHERE id_producto = $_SESSION[id_producto] ";
        $update_precio=$db->ejecutarConsulta($update_precio_nuveo);
    
        //Actualizar descripcion
        $update_descripcion_nuveo = "UPDATE `productos` SET `descripcion` = '$descripcion' WHERE id_producto = $_SESSION[id_producto]";
        $update_descripcion=$db->ejecutarConsulta($update_descripcion_nuveo);

        //Actualizar existencia
        $update_existencia_nuevo = "UPDATE `productos` SET `existencia` = '$existencia' WHERE id_producto = $_SESSION[id_producto]";
        $update_existencia = $db->ejecutarConsulta($update_existencia_nuevo);

         //Actualizar estado
        $update_estado_nuveo = "UPDATE `productos` SET `estado` = '$estado' WHERE id_producto = $_SESSION[id_producto]";
        $update_estado=$db->ejecutarConsulta($update_estado_nuveo);

        //Actualizar categoria
        $update_categoria_nuevo = "UPDATE `productos` SET `id_cat` = $categoria WHERE id_producto = $_SESSION[id_producto]";
        $update_categoria = $db->ejecutarConsulta($update_categoria_nuevo);

        //Actualizar tipo
        $update_tipo_nuveo = "UPDATE `productos` SET `tipo_id` = '$tipo' WHERE id_producto =$_SESSION[id_producto]";
        $update_tipo=$db->ejecutarConsulta($update_tipo_nuveo);

        //Actualizar universo
        $update_universo_nuveo = "UPDATE `productos` SET `universo_id` = $universo WHERE id_producto = $_SESSION[id_producto]";
        $update_universo=$db->ejecutarConsulta($update_universo_nuveo);

        //Actualizar costo
        $update_costo_nuveo = "UPDATE `productos` SET `precio_base` = '$costo' WHERE id_producto = $_SESSION[id_producto]";
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
  <link rel="shortcut icon" type="image/png" href="../../views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>
<title><?php echo $id; ?></title>
<body>

<?php include('navbar.php') ?>
<br><br><br><br>
<div class="row">
          <div class="cont-back">
              <a href="/geekhaven/src/views/admin/html/editar_producto.php" class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
              </svg>  
          </a>
          </div>

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
            //Consulta para ver el id y el nombre de la categoria a la que pertenece el producto $_SESSION['id_productos']
               $sql = "SELECT * from categorias inner join productos on productos.id_cat=categorias.id_cat where productos.id_producto=$_SESSION[id_producto]";
               $categorias = $db->seleccionarDatos($sql);

             // Sacar el id y el nombre del producto con el foreach
               foreach ($categorias as $cat) 
               $id_cat_del_producto=$_cat['id_cat'];
                ?> <option  selected value="<?php echo $cat['id_cat'];?>"><?php echo $cat['nom_cat'];?></option>



                <?php
                //Consulta que indica que te muestre todas las categorias menos la de el id del producto
                  $sql = "SELECT * FROM categorias WHERE categorias.id_cat <> '$id_cat_del_producto';";
                  $cat_all = $db->seleccionarDatos($sql);

                  
                foreach($cat_all as $all_cat){ ?>

                 <option value="<?php echo $all_cat['id_cat'];?>"><?php echo $all_cat['nom_cat'];?></option>
                
                <?php
                }
                 ?>
        
            </select>
        </div>
        <div class="mb-3">
            <label for="tipo"><strong>Tipo:</strong></label>
            <select id="tipo" name="tipo" class="form-control" required>
            <?php
              //Consulta para ver el id y el nombre de la categoria a la que pertenece el producto $_SESSION['id_productos']
                 $sql = "SELECT * from tipo inner join productos on productos.tipo_id=tipo.id_tipo where productos.id_producto=$_SESSION[id_producto]";
                 $tipos = $db->seleccionarDatos($sql);
  
               // Sacar el id y el nombre del producto con el foreach
                 foreach ($tipos as $tipo) 
                 $id_tipo_del_producto=$_tipo['id_tipo'];
                  ?> <option  selected value="<?php echo $tipo['id_tipo'];?>"><?php echo $tipo['tipo'];?></option>
  
                  <?php
                  //Consulta que indica que te muestre todas las categorias menos la de el id del producto
                    $sql = "SELECT * FROM tipo WHERE tipo.id_tipo <> '$id_tipo_del_producto';";
                    $tipo_all = $db->seleccionarDatos($sql);
                    
                  foreach($tipo_all as $all_tipo){ ?>
  
                   <option value="<?php echo $all_tipo['id_tipo'];?>"><?php echo $all_tipo['tipo'];?></option>
                  
                  <?php
                  }
                   ?>
                
            
            </select>
        </div>
        <div class="mb-3">
            <label for="universo"><strong>Universo:</strong></label>
            <select id="universo" name="universo" class="form-control" required>
            <?php
              //Consulta para ver el id y el nombre de la categoria a la que pertenece el producto $_SESSION['id_productos']
                 $sql = "SELECT * from universo inner join productos on productos.universo_id=universo.id_universo where productos.id_producto=$_SESSION[id_producto]";
                 $universos = $db->seleccionarDatos($sql);
  
               // Sacar el id y el nombre del producto con el foreach
                 foreach ($universos as $universo) 
                 $id_universo_del_producto=$_universo['id_universo'];
                  ?> <option  selected value="<?php echo $universo['id_universo'];?>"><?php echo $universo['universo'];?></option>
  
                  <?php
                  //Consulta que indica que te muestre todas las categorias menos la de el id del producto
                    $sql = "SELECT * FROM universo WHERE universo.id_universo <> '$id_universo_del_producto';";
                    $universo_all = $db->seleccionarDatos($sql);
                    
                  foreach($universo_all as $all_universo){ ?>
  
                   <option value="<?php echo $all_universo['id_universo'];?>"><?php echo $all_universo['universo'];?></option>
                  
                  <?php
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
            <input type="number" name="costo" id="costo"  value="<?php echo $prd_costo?>" class="form-control" placeholder="Escribe el costo base del producto aquí " required>
        </div>
        <br>
                <input type="hidden" name ="id"value="<?php echo $id; ?>">
       

                <center> <button type="submit" name="guardar_producto" class="btn" style="background: #005aff; padding-left:30px; padding-right:30px; color:white">Guardar Cambios</button></center>

        </div>
        </form>

    </div>
    <br><br><br>
</div>   



  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>