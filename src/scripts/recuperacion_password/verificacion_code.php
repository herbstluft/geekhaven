<?php
use MyApp\data\Database;
            require("../../../vendor/autoload.php");
            $db = new Database();

            // Obtener los valores del formulario del codigo y traer el id del usuario
            $codigo=$_POST['codigo']; 
            $id_usuario=$_GET['id'];


            //consultar el codigo de verificacion generado y guardado en la base de datos para compararlo
        $sql="Select * from usuarios where usuarios.id_persona=$id_usuario";
        $todo=$db->seleccionarDatos($sql);

        foreach($todo as $all){
            $codigo_db=$all['codigo_reset_passwd'];
        }
     
//si el codigo de la base datos es igual al que se escribio se mostrara el form para cambiar la contraseña
        if($codigo_db==$codigo){

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
            </svg> Restablece tu contraseña</h1>
                                   <br>
            
                                    <div class="col-11 col-md-8 col-lg-6"  style="margin: auto;">
            
            
            
                                    
                                        <form action="change_passwd.php?id_us=<?php echo $id_usuario ?>" method="post">
                                                <div class="form-floating">
                                                    <input style="width:100%; margin:auto; background-color:#ebf1f7; color: #848484; margin-bottom:1.5%;  border:0px; border-radius:10px; height:8%;" class="form-control input" type="password" id="nc" name="nc" minlength="8"   required >
                                                    <label for="floatingInput">Nueva contraseña &ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                    </label> 
                                                </div>
                                                <br>
                                                <div class="form-floating">
                                                    <input style="width:100%; margin:auto; background-color:#ebf1f7; color: #848484; margin-bottom:1.5%;  border:0px; border-radius:10px; height:8%;" class="form-control input" type="password" id="cc" name="cc" minlength="8"   required >
                                                    <label for="floatingInput">Confirma tu contraseña&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;&ensp;
                                                    </label> 
                                                </div>
                                                                          
            <br>
            
                                            <center>
                                                <button type="submit" style="margin-left: 5.5%; border:none; border-radius:15px; background-color: #0071e3; color: white; padding: 10px 25px; ">Restablecer</button>
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

<?php
        }
        else{

            ?>
            <!DOCTYPE html>
            <html lang="en" style="background-color: white;">
            <head>
                <meta charset="UTF-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
            
                <!--Boostrap-->   
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
                <link rel="stylesheet" href="../../../views-index/estilos.css">
                    <!--Boostrap--> 
            </head>
            
            <body style="background-color: white;">
            
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
            
                        
                    <br><br><br>
            
                    <div class="container" style="padding-left: 10%; padding-right: 10%;">
                    <center><h1 style="position:relative; margin-top:80px; font-weight:500; font-size:30px">Lo sentimos, ha habido un problema</h1></center>
                    <div class="text-center alert alert-danger" role="alert" style="position:absolute; left:10%; top:35%; width:80%; padding:2%"> El codigo que ha ingresado es incorrecto</div>
            
            
            <center>
                    <div id="botonContainer" style="position:relative; padding-top:200px">
                        <button type="submit" style="margin-left: -7%; border:none; border-radius:15px; background-color: #0071e3; color: white; padding: 10px 25px; " name="crearchatphone" onclick="goBack()">Volver</button>
                    </div>
                </center>
            
                <script>
            
                    // Función JavaScript para regresar
                    function goBack() {
                        window.history.back();
                    }
                </script>
                    
                    </div>
            
                    </div>
            
                    <script src="../../../bootstrap/js/transiciondeentrada.js"></script>
            
            </body>
            </html>
            
             <?php       

        }
        
   ?>



   




