<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    

    if(isset($_GET['id'])){
        //guardar el id del producto
        $id_producto=$_GET['id'];
        $sql = "SELECT * from productos inner join categorias on categorias.id_cat=productos.id_cat where id_producto=$id_producto";
        $info_producto=$db->seleccionarDatos($sql);


        foreach($info_producto as $info_producto)
        $id=$info_producto['id_producto'];
        $nombre=$info_producto['nom_producto'];
        $estado=$info_producto['estado'];
        $precio=$info_producto['precio'];
        $existencia=$info_producto['existencia'];
        $descripcion=$info_producto['descripcion'];
        $categoria=$info_producto['nom_cat'];
        

    }    
    $sql = "SELECT * from categorias";
    $categorias=$db->seleccionarDatos($sql);   
   
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Producto</title>
    <style>
        
        .contenido{
            position: relative;
        }
        .cont
        {
            width: 100%;
        }
        .productoimg
        {
            width: 10%;
            padding-top: 15% !important;
            padding-left: 15% !important;
            padding-bottom: 5% !important;
        }
        .carousel-item img
        {
            width: 70% !important;
            margin: auto !important;
            
        }
        .productotop
        {
            padding-top: 10% !important;
            padding-right: 10% !important;
        }
        .productobott
        {
            padding-top: 5% !important;
            padding-right: 5% !important;
            margin-left: 7%  !important;
            margin-right: 3%  !important;
            color: #494747;
        }
        h1 {
            font-size: 3.5em;
            color: #383838;
            margin-left: 1em;

        }
        h3
        {
           font-size: 1.5em;
           color:#000000;
           margin-left: 2.5em;            
        }
        .estado{
            font-size: 2.5em;
            color:#0A0044;
            margin-left: 1.5em;
        }
        .precio{
            font-size: 2.5em;
            color:#EF0000;
            margin-left: 1.5em;
        }
        .contador{
            display:flex;
            width: 200px;
            height: 60px;
            border-radius: 40px;
        }
        .menos
        {
            
            border: none;
            font-size: 2em;
            background:none;
            margin-top: .3em;
            margin-left: 10px;  
        }
        .mas
        {            
            border: none;
            font-size: 2em;
            background: none;
            margin-top: .1em;
            margin-right:12px;  
        }
        .sombra{ -webkit-box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.62);
                -moz-box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.62);
                box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.62);
        }

        h6 {
            width: 30%;
            font-size: 2em;
            margin-top: .4em;
            margin-left: 13px;
        }
        /* .btn-primary{
            margin-top: 15px;
            background-color: #3A40D6 !important;
            font-size:2em;
            algin: center;
            width: 100%;
            height: 100%;
            border-radius: 40px;
        }
        .btn-primary:hover{
            margin-top: 15px;
            background-color: #3A40D6 !important;
            font-size:2.1em;
            algin: center;
            width: 100%;
            height: 100%;
            border-radius: 40px;
        } */
        .cont-back{
            position: relative;
            width: 100%;
            height: 150px;
        }
        .icono{
            margin-top: 2em;
            margin-left:2em;
            width: 30px;
            height: 30px;
            color: #202124;
        }
        

a{
  text-decoration: none;
}
        

    </style>
</head>
<body>

<?php
include('../../../templates/navbar/navbar.php');
?>




<br>

    <div class="producto">
  
    <div class="contenido"><br>
  

        <div class="row">
            <div class="cont-back">
                <a href="../../../index.php" class="">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" fill="currentColor" class="bi bi-arrow-left icono" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z"/>
                </svg>  
            </a>
            </div>
            
            <div class="col-sm-12 col-md-6 ">
                <div class="productotop">
                <div id="carouselExampleControlsNoTouching" class="carousel carousel-dark slide" data-bs-touch="false">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                             <img src="https://gold-fieber.com/wp-content/uploads/Pokemonblue1.jpg" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="https://fs-prod-cdn.nintendo-europe.com/media/images/10_share_images/games_15/game_boy_4/H2x1_GB_PokemonBlue_enGB_image1600w.jpg" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
                    <span class="carousel-control-next-icon dark" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
                </div>
                
            <div class="col-sm-12 col-md-6 contenido">
                    <div class="productotop">
                        <h1>
                           <?php echo $nombre ?>
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
                            Categoria: <?php echo $categoria ?>
                        </h3>                        
                    </div>
                    <div class="productobott">
                        
                           <?php 
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
                            <form action="http://localhost/geekhaven/src\scripts\cart\addPrdCart.php" method="GET">
                            <div class="mb-3">
                                <!--prd--> 
                                <input type="hidden"name ="id" id="id" value="<?php echo $id;?>">
                                <!-- usr -->
                                <input type="hidden" name ="usr" id="usr" value="<?php echo $usr;?>">
                                <!-- orden --> 
                                <!-- cantidad -->
                                <div class="col-3 ms-1">
                                    <h3 class="ms-1">Cantidad</h3>
                                    <input style="text-align:center; border-radius:20px; width:65%; height:100%" type="number" min="1" max="<?php echo $existencia;?>"class="form-control fs-9" placeholder="1" name="cantidad" id="cantidad" >
                                </div><br>
                                <h3 class="ms-2">Descripcion</h3> 
                                    <p class="ms-2 justify-content-center"><?php echo $descripcion; 
                                    if(empty($descripcion)){
                                        echo '<p style="color:red"> Lo sentimos, este producto no cuenta con una descripcion.</p>';
                                    }
                                    ?></p>
                                    <br><br>    
                                
                                </div><br>
                                <!-- enviar -->
                                <button type="submit" class="btn btn-dark col-12 p-2 fs-3" data-bs-toggle="modal" data-bs-target="#add">
                                AÑADIR AL CARRITO
                                </button>
                            
                            </form>
                    </div>
            </div>
        </div>
    </div>

    </div>
   <br><br>

   <br>
<br><br><br><br><br><br>
   <div class="container">
<?php include '../../../templates/footer.html';?>
<script src="../../../bootstrap/js/buscador.js"></script>
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>