<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    
    $sql = "SELECT * from categorias";

    $categorias=$db->seleccionarDatos($sql);
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
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
            margin-left: 5%  !important;
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
            margin-left: 3.5em;    
            display:flex;
            width: 110px;
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
        .btn-primary{
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
        }
        .cont-back{
            position: relative;
            width: 100%;
            height: 150px;
        }
        .icono{
            margin-top: 2em;
            margin-left:2em;
            width: 50px;
            height: 50px;
            color: #202124;
        }
        .icono:hover{
            
            width: 60px;
            height: 60px;
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
                            Pokemon BLUE VERSION - NINTENDO GAME BOY
                        </h1>
                        <h2 class="estado">
                            Estado: Sellado
                        </h2>
                        <h2 class="precio">
                            MXN $1100.00
                        </h2>
                        <h3>
                            Existencia: 10
                        </h3>
                        <h3>
                            Cantidad
                        </h3>
                        <div class="contador sombra">
                            <button class="menos" id="menos">-</button>
                            <h6>1</h6>
                            <button class="mas" id="mas">+</button>
                        </div>
                    </div>
                    <div class="productobott">
                        <h4>Descripcion</h4>
                        <hr>
                        <br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, magni dolores. Neque harum fuga molestiae adipisci quia atque deserunt exercitationem ea voluptas, illo assumenda voluptatibus natus suscipit ex rem esse. Neque doloribus quos laborum eligendi quam optio iure consectetur sequi earum commodi voluptatum amet, fuga nam voluptatibus eaque ipsam sunt voluptate reiciendis temporibus rem eius, maxime doloremque quod! Ea, temporibus! Officia quam quidem omnis, vero illo aliquid reiciendis numquam ad cupiditate ipsam accusamus harum sapiente dignissimos, adipisci sint beatae voluptatum laborum qui et. Labore voluptates sit impedit cum iste. Architecto esse quae fugiat atque tempora facilis excepturi ad soluta mollitia?</p>
                        <a href="" class="btn btn-primary">ANADIR AL CARRITO </a>
                    </div>
            </div>
        </div>
    </div>

    </div>
   <br><br>
   <hr>
   <br>

   <div class="container">
<?php include '../../../templates/footer.html';?>
<script src="../../../bootstrap/js/buscador.js"></script>
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>