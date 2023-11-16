<?php
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database();
               ?>
          
          <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Geek Haven</title>
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />
  
</head>

<body>


<?php
include('../../../templates/navbar_user.php');
?>



    <br><br>
    <div class="container mt-5">

   
          <div class="container">
            <div class="row gx-lg-5 align-items-center">
              <div class="col-lg-6 mb-5 mb-lg-0 text-center" >
              <svg style="width:80;" xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="black" class="bi bi-joystick" viewBox="0 0 16 16">
              <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"></path>
              <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"></path>
            </svg>
                <h1 class="my-5 display-5 fw-bold ls-tight">
                 Exclusivo para Geeks, donde la Innovación  <br style="margin-bottom:10px">
                  <span style="color:#005aff"> es la Norma.</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                ¡Bienvenido a nuestra tienda en línea, exclusiva para geeks, donde la innovación es la norma! Explora un mundo de productos tecnológicos, coleccionables y gadgets que satisfarán tu pasión por la cultura geek. ¡Descubre lo que tu lado geek ha estado esperando!
                </p>
              </div>

              <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="">
                  <div class="card-body py-5 px-md-5">
                    <form action="registrouser.php" method="POST">
                      <!-- 2 column grid layout with text inputs for the first and last names -->
                      <div class="row">

                      <h2 style="margin-bottom:50px; font-weight:bold" class=" text-center">Crea una cuenta</h2>
                      
                      <div class="col-md-6 mb-4">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nombre" required >
                        <label for="floatingInput">Nombre</label>
                      </div>
                    </div>  
                    <div class="col-md-6 mb-4">
                      <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="apellido" required >
                        <label for="floatingInput">Apellidos</label>
                      </div>
                    </div>  


                    
                        <div class="form-outline mb-4">
                        <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingInput" name="correo" required >
                        <label for="floatingInput">Correo electrónico</label>
                      </div>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>


                      
                      <div class="form-outline mb-4">
                        <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" name="telefono" required >
                        <label for="floatingInput">+52 0000000000 </label>
                      </div>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>


                      <div class="col-md-6 mb-4">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" name="contrasena1" required >
                        <label for="floatingInput">Contraseña</label>
                      </div>
                    </div>  
                    <div class="col-md-6 mb-4">
                      <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" name="contrasena2" required >
                        <label for="floatingInput">Confirmar contraseña</label>
                      </div>
                    </div>  



                      <!-- Checkbox -->
                      <div class="form-check d-flex justify-content-center mb-4">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#005aff" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                      </svg> &ensp;
                        <label class="form-check-label" for="form2Example33">
                        Productos geek para mentes curiosas.
                        </label>
                      </div>

                      <!-- Submit button -->
                     <center>
                      <br>
                     <button type="submit" style="background-color:#005aff; color: white" class="btn btn-block mb-4" >
                        Crear cuenta
                      </button>
                     </center>

                      <!-- Register buttons -->
                      <div class="text-center">
                       <a href="login.php" style="color: #005aff"> Iniciar Sesion </a>
                      </div>


                    </form>
                  </div>
                </div>
              </div>
              <?php

    
//extraer datos del formulario
    if($_POST){

    extract($_POST);

    $verficiacion_nombres="SELECT * from personas WHERE personas.nombre='$nombre' and  personas.apellido='$apellido'";
    $valor_nombres=$db->seleccionarDatos($verficiacion_nombres);

    if(empty($valor_nombres)){

      $verficiacion_telefono="SELECT * from usuarios WHERE usuarios.telefono='$telefono'";
      $valor_telefono=$db->seleccionarDatos($verficiacion_telefono);   
        if(empty($valor_telefono)){

          $verficiacion_correo="SELECT * from personas WHERE personas.correo='$correo'";
          $valor_correo=$db->seleccionarDatos($verficiacion_correo);      
          if(empty($valor_correo)){

                  if($contrasena1==$contrasena2)
                      {
                            $insert_reg="INSERT INTO personas (nombre, apellido, correo, info) VALUES ('$nombre', '$apellido', '$correo', '¡Hola, Estoy usando GeekHaven!')";
                            $db->ejecutarConsulta($insert_reg);
                  
                            //obtener el id del cliente
                            $cadena="select personas.id_persona as id from personas WHERE personas.nombre='$nombre' and personas.apellido='$apellido' and personas.correo='$correo'";
                  
                            $id=$db->seleccionarDatos($cadena);
                  
                           
                            
                            foreach ($id as $i)
                            $id_persona= $i['id'];
                    
                            //Encriptar contraseña
                            $passCifrada1 = password_hash($contrasena2,PASSWORD_DEFAULT);
                            $passCifrada = "$passCifrada1";

                            $insert_user="INSERT INTO usuarios (telefono, contrasena, id_persona,tipo_usuario,imagen) VALUES ('$telefono','$passCifrada','$id_persona',1,'default.jpg')";
                            $db->ejecutarConsulta($insert_user);
                
                         
                            echo  "<div class='alert alert-success text-center' role='alert' style='margin-left:10%; margin-right:10%;'>
                            Cuenta creada exitosamente, <a href='login.php'> Inicie sesión </a>!
                          </div>";    
                          /*Registro exitoso y despues se dirige a la pagina principal*/
                      }
                      else{
                        echo  "<div class='alert alert-warning text-center' role='alert' style='margin-left:10%; margin-right:10%;'>
                        Las contraseñas no coinciden!
                      </div>";    
                      }  

          } 
          else{
            echo  "<div class='alert alert-danger text-center' role='alert' style='margin-left:10%; margin-right:10%;'>
            Este correo ya existe, eliga otro!
          </div>";  
        }
      }
          else{
            echo  "<div class='alert alert-danger text-center' role='alert' style='margin-left:10%; margin-right:10%;'>
            Este numero ya existe, introduzca otro!
          </div>";   
        }  
      
    


     

    }
    else{
      echo  "<div class='alert alert-danger text-center' role='alert' style='margin-left:10%; margin-right:10%;'>
      Estos nombres ya existen en el sistema!
    </div>";                
      
    }
  }

?>



            </div>
          </div>
   



  <script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/geekhaven/bootstrap/js/buscador.js"></script>


  <script>
document.addEventListener("DOMContentLoaded", function () {
  const scrollAppearElements = document.querySelectorAll(".scroll-appear");

  const options = {
    root: null, // viewport
    rootMargin: "0px",
    threshold: 0,
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("appear");
      } else {
        entry.target.classList.remove("appear");
      }
    });
  }, options);

  scrollAppearElements.forEach((element) => {
    observer.observe(element);
  });
});
</script>
</body>

</html>

