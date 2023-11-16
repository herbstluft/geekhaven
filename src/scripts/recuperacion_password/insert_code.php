
<?php

if(isset($_GET['id']))

$id=$_GET['id'];
?>

<!DOCTYPE html>
<html lang="en" style="background-color:  #f7f7f7;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia Sesión</title>
    <link rel="icon" href="../img/logo .png">

    <!--Boostrap-->   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<link rel="stylesheet" href="../../../views-index/estilos.css">
    <!--Boostrap--> 
</head>


<style>
  .notification {
            background-color: #f44336;
            color: white;
            text-align: center;
            padding: 20px;
            padding-bottom:3px;
          margin-top:-50px;
            border-radius: 0px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .close-button {
            float: right;
            font-weight: bold;
            cursor: pointer;
        }
</style>

<body style="background-color: #f7f7f7;">
<div class="todo">

        <!--Barra de navegacion-->
        <nav style="padding-left: 15%; border-bottom: 1px solid #d8d8d8;     backdrop-filter: saturate(180%) blur(20px);
        background-color: rgba(255,255,255,.72);" class="barra navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
              <a style="font-weight: 500;" class="navbar-brand" href="../index.php">ChatPhone</a>
              <button style="border: 0px ; background-color: transparent;" class="" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="d-block d-sm-none bi bi-chevron-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
                <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="d-none d-sm-block d-md-none bi bi-chevron-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
                <svg  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="d-none d-md-block d-lg-none bi bi-chevron-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                </svg>
                
              </button>
              
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div style="margin-left: 45%;"></div>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link text-bar" aria-current="page" href="../../../views-index/login.php">Iniciar sesión</a>
                    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-bar" href="../../../views-index/crear-chatphone-id.php">Crear tu ChatPhone ID</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link text-bar" href="../../../views-index/preguntas.php">Preguntas frecuentes</a>
                  </li>
                </ul>
               
              </div>
            </div>
        </nav>
        <!--Barra de navegacion-->


          <!--Logo y login-->
                <div class="container">
                    <div style=" padding: 3%; padding-top: 3%;">
                    <br><br><br>

            <center>
            <svg version="1.1" width="150px" height="150px" fill="#2787f5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 46 46" enable-background="new 0 0 46 46" xml:space="preserve">
                        <polygon opacity="0.7" points="45,11 36,11 35.5,1 "></polygon>
                        <polygon points="35.5,1 25.4,14.1 39,21 "></polygon>
                        <polygon opacity="0.4" points="17,9.8 39,21 17,26 "></polygon>
                        <polygon opacity="0.7" points="2,12 17,26 17,9.8 "></polygon>
                        <polygon opacity="0.7" points="17,26 39,21 28,36 "></polygon>
                        <polygon points="28,36 4.5,44 17,26 "></polygon>
                        <polygon points="17,26 1,26 10.8,20.1 "></polygon>
                    </svg>
            </center>
            <br><br>


      
                    </div>
                  
                    
                    <!--FORM-->
                    <div  style="margin-top:-5%;">
                        <h1 style="font-size: 35px; color: rgb(73, 73, 73);; font-style: inherit;" class="text-center"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="green" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg> Codigo enviado correctamente</h1>
                        <p style="font-size: 18px; font-weight: 300; " class="text-center">Ingresa tu codigo de verificacion</p>
                       

                        <div class="col-11 col-md-8 col-lg-6"  style="margin: auto;">



                        
                            <form action="verificacion_code.php?id=<?php echo $id ?>" method="post">
                                    <div class="form-floating">
                                        <input style="width:100%; margin:auto; background-color:#ebf1f7; color: #848484; margin-bottom:1.5%;  border:0px; border-radius:10px; height:8%;" class="form-control input" type="text" id="codigo" name="codigo" maxlength="6"  required >
                                        <label for="floatingInput">Codigo de verificación &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                        </label> 
                                    </div>
                                    <a href="../../../views-index/recuperar.php" style="color:#0d6efd">¿No recibiste el código?</a>                                                   
<br><br>

                                <center>
                                    <button type="submit" style="margin-left: 5.5%; border:none; border-radius:15px; background-color: #0071e3; color: white; padding: 10px 25px; ">Comprobar</button>
                                    </center>
                                        
                               
                            </form>
                        </div>


                    </div>
                    <!--FORM-->

                </div>
                <!--Logo y login-->
                   <br><br> 



   </div>

   <script src="../../../bootstrap/js/transiciondeentrada.js"></script>
   </body>
   </html>
   

