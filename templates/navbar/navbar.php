<?php
    use MyApp\data\Database;
    require("vendor/autoload.php");
    $db = new Database;
    
    $sql = "SELECT * from categorias";

    $categorias=$db->seleccionarDatos($sql);
?>



<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../bootstrap/css/estilos.css">
<style>
  *{
    font-family: 'Lalezar', cursive;
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







<!-- Modal categorias menu -->
<div class="modal fade" id="subopciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg"> <!-- Utiliza modal-fullscreen-lg para pantalla completa en LG -->
    <div class="modal-content">
      
      <div class="row">
        <div class="col-2"  style="padding-top: 10px;" data-bs-target="#opciones" data-bs-toggle="modal">
          <svg style="margin-left: 25px;" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
          </svg>
        </div>

        <div class="col-10 text-end" style="padding-top: 10px;" data-bs-dismiss="modal">
          <svg style="margin-right: 15px;"  xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </div>


      </div>
     
      <div>
        <ul style="text-decoration: none; list-style: none; font-size: 30px; font-weight: 500;">
          <div class="row">
      
            <div class="col-10" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <li>Subcategoria 1 </li>
            </div>
            <div class="col-1 text-end" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <svg style="opacity:0.4; margin-left: 0px;" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <li>Subcategoria 2</li>
            </div>
            <div class="col-1 text-end option" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>
            
            <div class="col-10" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <li>Subcategoria 3</li>
            </div>
            <div class="col-1 text-end option" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <li>Subcategoria 4</li>
            </div>
            <div class="col-1 text-end option" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <li>Subcategoria 5</li>
            </div>
            <div class="col-1 text-end option" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <div class="col-10" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <li>Subcategoria 6</li>
            </div>
            <div class="col-1 text-end option" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">
              <svg style="opacity:0.4; margin-left: 0px;"  xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

          </div>
        </ul>
      </div>
    
    </div>
  </div>
</div>






<!-- Modal categorias menu -->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-side">
    <div class="modal-content">
      
    <div class="row">
      <div class="col-12 text-end" style="padding-top: 10px;" data-bs-dismiss="modal">
          <svg style="margin-right: 15px;" xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="#333336" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </div>

        <br>
    </div>

    <div class="row">
    <div class="col-1 text-end" style="margin-left:20px">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#333336" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </div>
      
      <div class="col-9">
        <input type="text" style="border:none; width:100%; font-size:27px; border:none; outline:none; margin-top:-7px; font-weight: bold;" placeholder="Buscar">
      </div>
    </div>
      

    <br>
   

  <div class="contenido_de_buscar" style="margin-left:10px; margin-right:10px;">

    <section class="cards">

      <div class="row">
      
        
      
       
        
      
       
      
        
      
        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="margin-bottom:30px">
        <article class="card card--1" style="margin-left:20px">
        <div class="card__info-hover">
          <svg class="card__like" viewBox="0 0 24 24">
          <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
      </svg>
            <div class="card__clock-info">
              <svg class="card__clock" viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z"></path>
              </svg><span class="card__time">15 min</span>
            </div>
          
        </div>
        <div class="card__img"> </div>
        <a href="#" class="card_link">
           <div class="card__img--hover"></div>
         </a>
        <div class="card__info">
          <span class="card__category"> Nintendo</span>
          <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
      
          <div class="row">
            <div class="col-4 text-end">
            <span class="d-block d-sm-none" style="color:red; font-size:14px;"> $1,449.00 </span>
            <span class="d-none d-sm-block" style="color:red; font-size:18px;"> $1,449.00 </span>
            </div>
      
            <div class="col-6 text-end" style="margin-left:10%">
          <span><button type="button" style="  border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top:-5px; position:relative">Ver </button></span>
          </div>
      
          </div>
        
        </div>
        </article>
        </div>


        <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="margin-bottom:30px">
          <article class="card card--1" style="margin-left:20px">
          <div class="card__info-hover">
            <svg class="card__like" viewBox="0 0 24 24">
            <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
        </svg>
              <div class="card__clock-info">
                <svg class="card__clock" viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z"></path>
                </svg><span class="card__time">15 min</span>
              </div>
            
          </div>
          <div class="card__img"> </div>
          <a href="#" class="card_link">
             <div class="card__img--hover"></div>
           </a>
          <div class="card__info">
            <span class="card__category"> Nintendo</span>
            <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
        
            <div class="row">
              <div class="col-4 text-end">
              <span class="d-block d-sm-none" style="color:red; font-size:14px;"> $1,449.00 </span>
              <span class="d-none d-sm-block" style="color:red; font-size:18px;"> $1,449.00 </span>
              </div>
        
              <div class="col-6 text-end" style="margin-left:10%">
            <span><button type="button" style="  border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top:-5px; position:relative">Ver </button></span>
            </div>
        
            </div>
          
          </div>
          </article>
          </div>


          <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="margin-bottom:30px">
            <article class="card card--1" style="margin-left:20px">
            <div class="card__info-hover">
              <svg class="card__like" viewBox="0 0 24 24">
              <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
          </svg>
                <div class="card__clock-info">
                  <svg class="card__clock" viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z"></path>
                  </svg><span class="card__time">15 min</span>
                </div>
              
            </div>
            <div class="card__img"> </div>
            <a href="#" class="card_link">
               <div class="card__img--hover"></div>
             </a>
            <div class="card__info">
              <span class="card__category"> Nintendo</span>
              <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
          
              <div class="row">
                <div class="col-4 text-end">
                <span class="d-block d-sm-none" style="color:red; font-size:14px;"> $1,449.00 </span>
                <span class="d-none d-sm-block" style="color:red; font-size:18px;"> $1,449.00 </span>
                </div>
          
                <div class="col-6 text-end" style="margin-left:10%">
              <span><button type="button" style="  border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top:-5px; position:relative">Ver </button></span>
              </div>
          
              </div>
            
            </div>
            </article>
            </div>

            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="margin-bottom:30px">
              <article class="card card--1" style="margin-left:20px">
              <div class="card__info-hover">
                <svg class="card__like" viewBox="0 0 24 24">
                <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
            </svg>
                  <div class="card__clock-info">
                    <svg class="card__clock" viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z"></path>
                    </svg><span class="card__time">15 min</span>
                  </div>
                
              </div>
              <div class="card__img"> </div>
              <a href="#" class="card_link">
                 <div class="card__img--hover"></div>
               </a>
              <div class="card__info">
                <span class="card__category"> Nintendo</span>
                <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
            
                <div class="row">
                  <div class="col-4 text-end">
                  <span class="d-block d-sm-none" style="color:red; font-size:14px;"> $1,449.00 </span>
                  <span class="d-none d-sm-block" style="color:red; font-size:18px;"> $1,449.00 </span>
                  </div>
            
                  <div class="col-6 text-end" style="margin-left:10%">
                <span><button type="button" style="  border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top:-5px; position:relative">Ver </button></span>
                </div>
            
                </div>
              
              </div>
              </article>
              </div>

              <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="margin-bottom:30px">
                <article class="card card--1" style="margin-left:20px">
                <div class="card__info-hover">
                  <svg class="card__like" viewBox="0 0 24 24">
                  <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
              </svg>
                    <div class="card__clock-info">
                      <svg class="card__clock" viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z"></path>
                      </svg><span class="card__time">15 min</span>
                    </div>
                  
                </div>
                <div class="card__img"> </div>
                <a href="#" class="card_link">
                   <div class="card__img--hover"></div>
                 </a>
                <div class="card__info">
                  <span class="card__category"> Nintendo</span>
                  <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
              
                  <div class="row">
                    <div class="col-4 text-end">
                    <span class="d-block d-sm-none" style="color:red; font-size:14px;"> $1,449.00 </span>
                    <span class="d-none d-sm-block" style="color:red; font-size:18px;"> $1,449.00 </span>
                    </div>
              
                    <div class="col-6 text-end" style="margin-left:10%">
                  <span><button type="button" style="  border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top:-5px; position:relative">Ver </button></span>
                  </div>
              
                  </div>
                
                </div>
                </article>
                </div>

                <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6" style="margin-bottom:30px">
                  <article class="card card--1" style="margin-left:20px">
                  <div class="card__info-hover">
                    <svg class="card__like" viewBox="0 0 24 24">
                    <path fill="#000000" d="M12.1,18.55L12,18.65L11.89,18.55C7.14,14.24 4,11.39 4,8.5C4,6.5 5.5,5 7.5,5C9.04,5 10.54,6 11.07,7.36H12.93C13.46,6 14.96,5 16.5,5C18.5,5 20,6.5 20,8.5C20,11.39 16.86,14.24 12.1,18.55M16.5,3C14.76,3 13.09,3.81 12,5.08C10.91,3.81 9.24,3 7.5,3C4.42,3 2,5.41 2,8.5C2,12.27 5.4,15.36 10.55,20.03L12,21.35L13.45,20.03C18.6,15.36 22,12.27 22,8.5C22,5.41 19.58,3 16.5,3Z"></path>
                </svg>
                      <div class="card__clock-info">
                        <svg class="card__clock" viewBox="0 0 24 24"><path d="M12,20A7,7 0 0,1 5,13A7,7 0 0,1 12,6A7,7 0 0,1 19,13A7,7 0 0,1 12,20M19.03,7.39L20.45,5.97C20,5.46 19.55,5 19.04,4.56L17.62,6C16.07,4.74 14.12,4 12,4A9,9 0 0,0 3,13A9,9 0 0,0 12,22C17,22 21,17.97 21,13C21,10.88 20.26,8.93 19.03,7.39M11,14H13V8H11M15,1H9V3H15V1Z"></path>
                        </svg><span class="card__time">15 min</span>
                      </div>
                    
                  </div>
                  <div class="card__img"> </div>
                  <a href="#" class="card_link">
                     <div class="card__img--hover"></div>
                   </a>
                  <div class="card__info">
                    <span class="card__category"> Nintendo</span>
                    <h3 class="card__title">Crisp Spanish tortilla Matzo brei</h3>
                
                    <div class="row">
                      <div class="col-4 text-end">
                      <span class="d-block d-sm-none" style="color:red; font-size:14px;"> $1,449.00 </span>
                      <span class="d-none d-sm-block" style="color:red; font-size:18px;"> $1,449.00 </span>
                      </div>
                
                      <div class="col-6 text-end" style="margin-left:10%">
                    <span><button type="button" style="  border:none; border-radius:980px; background-color: #0071e3; color: white; padding: 10px 25px; top:-5px; position:relative">Ver </button></span>
                    </div>
                
                    </div>
                  
                  </div>
                  </article>
                  </div>
      
        
      
      
        
      
      
      
      
      </div>
      </section>
  </div>

    </div>
  </div>
</div>


