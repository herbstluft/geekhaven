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

        .barra{
    width: 100%;
    position: fixed;
    z-index: 100;
}

.sombras{
  box-shadow: 0px -1px 8px -2px rgba(0,0,0,0.04);
-webkit-box-shadow: 0px -1px 8px -2px rgba(0,0,0,0.04);
-moz-box-shadow: 0px -1px 8px -2px rgba(0,0,0,0.04);
}

a{
  text-decoration: none;
}
        

    </style>
</head>
<body>


<div class="d-none d-lg-block">
    <nav style="padding-left: 60px;  padding-top: 1%; padding-bottom: 1%;    backdrop-filter: saturate(180%) blur(20px);
            background-color: rgba(8, 8, 8, 0.849);" class="barra ">
                <div class="row">
                  
                    <div class="col-2 " data-bs-toggle="modal" data-bs-target="#opciones" >
                         <svg width="22" height="22" viewBox="0 0 18 18"><polyline id="globalnav-menutrigger-bread-bottom" fill="none" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 12, 16 12" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-bottom"><animate id="globalnav-anim-menutrigger-bread-bottom-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 12, 16 12; 2 9, 16 9; 3.5 15, 15 3.5"></animate><animate id="globalnav-anim-menutrigger-bread-bottom-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 15, 15 3.5; 2 9, 16 9; 2 12, 16 12"></animate></polyline><polyline id="globalnav-menutrigger-bread-top" fill="none" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 5, 16 5" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-top"><animate id="globalnav-anim-menutrigger-bread-top-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 5, 16 5; 2 9, 16 9; 3.5 3.5, 15 15"></animate><animate id="globalnav-anim-menutrigger-bread-top-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 3.5, 15 15; 2 9, 16 9; 2 5, 16 5"></animate></polyline></svg>
                    </div>
                    
                    <div class="col-8 text-center">
                      <svg style="margin-top: -7px;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-joystick" viewBox="0 0 16 16">
                        <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"/>
                        <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"/>
                      </svg>
                      &ensp;
                      <strong style="color: white; font-size: 18px;">GeekHaven</strong>
                    </div>
    
                    <div class="col-2">
                        <a href="" style="margin-right: 15px;" data-bs-target="#search" data-bs-toggle="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg>
                        </a>

                        <!--login -->
                        <a href="http://localhost/geekhaven/src/views/user/login.php" style="margin-right: 15px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                              </svg>
                        </a>
                        <!--Carrito -->
                        <a href="http://localhost/geekhaven/src/views/user/carrito.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                              </svg>
                        </a>
                    </div>
                </div>
            </nav>
            </div>
    
    
    
           <div class="d-lg-none d-block">
            <nav style="padding-left:3%;  backdrop-filter: saturate(180%) blur(20px);
            background-color: rgba(8, 8, 8, 0.849);  padding: 12px; color: white;" class="barra">
                
                <div class="row">
    
                  <div class="col-8">
                  <button style="border: 0px ; margin-left: 5px; margin-top: 0px; background-color: transparent;" class="" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg style="margin-top: -7px;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-joystick" viewBox="0 0 16 16">
                      <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"/>
                      <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"/>
                    </svg>
                    &ensp;
                    <strong style="color: white; font-size: 18px;">GeekHaven</strong>
                  </button>
                </div>
    
    
                <div class="col-4 text-end">
                  <a href="" style="margin-right: 16px;" data-bs-target="#search" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                </a>
               
                <a href="" style="margin-right: 16px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="white" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                      </svg>
                </a>
    
                <a href="" style="margin-right: 0px;" data-bs-toggle="modal" data-bs-target="#opciones" >
                  <svg width="19" height="19" viewBox="0 0 18 18"><polyline id="globalnav-menutrigger-bread-bottom" fill="none" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 12, 16 12" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-bottom"><animate id="globalnav-anim-menutrigger-bread-bottom-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 12, 16 12; 2 9, 16 9; 3.5 15, 15 3.5"></animate><animate id="globalnav-anim-menutrigger-bread-bottom-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 15, 15 3.5; 2 9, 16 9; 2 12, 16 12"></animate></polyline><polyline id="globalnav-menutrigger-bread-top" fill="none" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 5, 16 5" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-top"><animate id="globalnav-anim-menutrigger-bread-top-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 5, 16 5; 2 9, 16 9; 3.5 3.5, 15 15"></animate><animate id="globalnav-anim-menutrigger-bread-top-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 3.5, 15 15; 2 9, 16 9; 2 5, 16 5"></animate></polyline></svg>
                </a>
                </div>
    
                </div>
            </nav>
        </div>

        






<!-- Modal categorias menu -->
<div class="modal fade" id="opciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg"> <!-- Utiliza modal-fullscreen-lg para pantalla completa en LG -->
    <div class="modal-content">
      
      <div class="row">
        <div class="col-12 text-end" style="padding-top: 10px;" data-bs-dismiss="modal">
          <svg style="margin-right: 15px;"  xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>

       
        </div>
      </div>
     
      <div>
        <ul style="text-decoration: none; list-style: none; font-size: 30px; font-weight: 500;">
          <div class="row">

          <?php foreach ($categorias as $categorias) { ?>

            <div class="col-10" data-bs-target="#subopciones" data-bs-toggle="modal" style="margin-top:3px">
              <li class="text-truncate"> <?php echo $categorias['nom_cat'] ?> </li>
            </div>
            <div class="col-1 text-end" data-bs-target="#subopciones" data-bs-toggle="modal">
              <svg style="opacity:0.4; margin-left: 0px;" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <?php } ?>
            
         
            <br>

            <hr style="width:90%; margin-top:20px">
            <li style="font-size:15px"><a href="http://localhost/geekhaven/src/views/user/login.php">Iniciar Sesion</a></li>


          </div>
        </ul>
      </div>
    
    </div>
  </div>
</div>


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
</div>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>