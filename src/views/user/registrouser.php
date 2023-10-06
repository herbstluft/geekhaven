<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    
//extraer datos del formulario
    extract($_POST);
    
    $sql = "insert into personas ( `nombre`, `apellido`, `correo`) values ('$nombre','$apellidos','$correo')";
    $db->ejecutarConsulta($sql);

    //obtener id
    $sql = "select * from personas where correo ='$correo' ";
    $rs = $db->seleccionarDatos($sql);
    print_r($rs);

    foreach($rs as $rs){
        echo $rs['id_persona'];
    }


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rA6K/Q1vxgFm8z4lDf3m6JXVnF5SRhdpv4LwB5FtY2O5f5xSTF+to8SGz4SOGp2z9v" crossorigin="anonymous">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Formulario de Registro</title>
    <style>
        a{
            color: #333;

        }
        a:hover {
              color: #FF0000; /* Rojo (#FF0000) cuando se pasa el mouse */
            }
        .formulario {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            max-width: 530px;
            margin: 0 auto;
            background: #F4F4F4;
        }

            #nombre {
                margin-right: 2px; /* Agrega espacio a la derecha del campo "nombre" */
            }

            #apellidos {
                margin-left: 2px; /* Agrega espacio a la izquierda del campo "apellidos" */
            }

        .form-group-horizontal {
            display: flex;
            justify-content: space-between;
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
    <br><br>
    <div class="container mt-5">
        <div class="formulario">
            <center><h2>Registro</h2></center>
            <form method="POST" action="registrouser.php">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="correo" placeholder="Tu correo electrónico">
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" placeholder="Tu contraseña">
                </div>
                <div class="form-group-horizontal">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Tu nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Tus apellidos">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" placeholder="Tu teléfono">
                </div>
              <center>  <button type="submit" class="btn bg-danger text-white btn-lg" style="width: 350px;">Registrarse</button></center>
              <br>
              <center><a href="login.php">¿Ya tienes cuenta?</a></center>
            </form>
        </div>
    </div>
    <div class="container">
  <?php
  
        include("../../../templates/footer.html");
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>