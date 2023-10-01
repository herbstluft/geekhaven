<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Producto</title>
    <link rel="stylesheet" href="../../../bootstrap/css/estilos.css">
</head>
<body>

<?php include '../../../templates/navbar/navbar.html';?>
<br>
    <div class="producto">
  
    <div class="container" >
    <br>

        <div class="row">
           <center>
           <div class="cont-back">
            <a href="../../../index.php" type="button" style=" border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top:40px; position:relative; top:50px; left:15px">Volver atras </a>
            </div>
           </center>
            
            <div class="col-sm-12 col-md-6 text-center">
                <div class="productotop" style="border-radius:12px; border:1px solid rgba(0, 0, 0, 0.097);  box-shadow: 0px 13px 10px -7px rgb(0 0 0 / 10%);">
                <div style="position:relative; left:20px" id="carouselExampleControlsNoTouching" class="carousel carousel-dark slide" data-bs-touch="false">
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
                <br><br>
            </div>
                </div>
                
            <div class="col-sm-12 col-md-6 contenido ">
                    <div class="productotop">
                        <h1 class="h1">
                            Pokemon BLUE VERSION - NINTENDO GAME BOY
                        </h1>
                        <h2 class="estado">
                            Estado: Sellado
                        </h2>
                        <h2 class="precio">
                            MXN $1100.00
                        </h2>
                        <h3 style="margin-left:60px">
                            Cantidad
                        </h3 class="h3">
                        <div class="contador sombra">
                            <button class="menos" id="menos">-</button>
                            <h6 class="h6">1</h6>
                            <button class="mas" id="mas">+</button>
                        </div>
                    </div>
                    <div class="productobott">
                        <h4>Descripcion</h4>
                        <hr>
                        <br>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo, magni dolores. Neque harum fuga molestiae adipisci quia atque deserunt exercitationem ea voluptas, illo assumenda voluptatibus natus suscipit ex rem esse. Neque doloribus quos laborum eligendi quam optio iure consectetur sequi earum commodi voluptatum amet, fuga nam voluptatibus eaque ipsam sunt voluptate reiciendis temporibus rem eius, maxime doloremque quod! Ea, temporibus! Officia quam quidem omnis, vero illo aliquid reiciendis numquam ad cupiditate ipsam accusamus harum sapiente dignissimos, adipisci sint beatae voluptatum laborum qui et. Labore voluptates sit impedit cum iste. Architecto esse quae fugiat atque tempora facilis excepturi ad soluta mollitia?</p>
                       <br>
                        <center>
                       <a class="text-center" href="src/views/user/productos.php" type="button" style=" width:70%; border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; font-size:25px ">Añadir al carrito </a>
                       </center>
                    </div>
            </div>
        </div>
    </div>

    </div>
   <br><br>
   <hr>
   <br>

   <div class="container text-center" style="padding-left:5%">
        <?php include '../../../templates/footer.html';?>
    </div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>