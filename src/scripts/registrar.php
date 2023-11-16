<?php
use MyApp\data\Database;
            require("../../vendor/autoload.php");
            $db = new Database();

            // Obtener los valores del formulario

$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono=$_POST['telefono'];
$correo = $_POST['correo'];
$contrasena1 = $_POST['contrasena1'];
$contrasena2= $_POST['contrasena2'];

?>

<!DOCTYPE html>
<html lang="en" style="background-color: #f7f7f7;">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--Boostrap-->   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../views-index/estilos.css">
        <!--Boostrap--> 

        <style>
        #cargando {
            font-size: 24px;
            text-align: center;
        }
        @-webkit-keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@keyframes spin {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
@-webkit-keyframes pulse {
  50% {
    background: white;
  }
}
@keyframes pulse {
  50% {
    background: white;
  }
}


.loading {
  border-radius: 50%;
  width: 24px;
  height: 24px;
  border: 0.25rem solid rgba(255, 255, 255, 0.2);
  border-top-color: #4e4e4e;
  -webkit-animation: spin 1s infinite linear;
          animation: spin 1s infinite linear;
}


 /* Estilos del enlace */
 .enlace {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border-radius: 5px;
            transition: opacity 1s ease; /* Transición lenta de 1 segundo */
        }

        /* Cambiar color de fondo al pasar el cursor sobre el enlace */
        .enlace:hover {
            background-color: #0056b3;
        }

        /* Estilos para ocultar gradualmente la página */
        .desvanecer {
            opacity: 0;
            pointer-events: none;
            transition: opacity 1s ease; /* Transición lenta de 1 segundo */
        }
        
    </style>
</head>



<body >


<br>
<div style="margin-left: 10%; margin-right: 10%;">
    
    <div class="row">
        <div class="col-12 col-lg-10 sombras offset-lg-1" style="padding: 5%; margin-bottom: 7%; background-color: white; border-radius: 30px;">
        <br>


        <div class="row ">
            &ensp;&ensp;
            <div class="offset-1 offset-lg-2 col-2 text-center">
                <svg version="1.1" width="55px" height="55px" fill="#2787f5" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 46 46" enable-background="new 0 0 46 46" xml:space="preserve">
                    <polygon opacity="0.7" points="45,11 36,11 35.5,1 "></polygon>
                    <polygon points="35.5,1 25.4,14.1 39,21 "></polygon>
                    <polygon opacity="0.4" points="17,9.8 39,21 17,26 "></polygon>
                    <polygon opacity="0.7" points="2,12 17,26 17,9.8 "></polygon>
                    <polygon opacity="0.7" points="17,26 39,21 28,36 "></polygon>
                    <polygon points="28,36 4.5,44 17,26 "></polygon>
                    <polygon points="17,26 1,26 10.8,20.1 "></polygon>
                </svg>
            </div>

            &ensp;
            <div class="col-5 text-center">
                <h1 style="margin-top: 10px;">ChatPhone</h1>
            </div>
        </div>
        <br>

        <center>   <div class="loading"></div>  </center>
        <script>
            // Espera 5 segundos (5000 milisegundos) y luego oculta el elemento
            setTimeout(function() {
                var loadingDiv = document.querySelector('.loading');
                loadingDiv.style.display = 'none';
            }, 10000);
        </script>
    

    <?php
//verificar si existen en la base de datos
$sql_nom = "SELECT * from personas where personas.nombre='$nombre'";
        $verificacion_nombre = $db->seleccionarDatos($sql_nom);
$sql_correo = "SELECT * from personas where personas.correo='$correo'";
	      $verificacion_correo = $db->seleccionarDatos($sql_correo);
$sql_tel = "SELECT * from usuarios where telefono=$telefono";
				$verificacion_telefono = $db->seleccionarDatos($sql_tel);



//si no existe y lanza 0 resultados, registrara
	if(empty($verificacion_nombre) && empty($verificacion_correo)  &&  empty($verificacion_telefono)   && $contrasena1==$contrasena2  ){
?>
   <p class="text-center" style="color:green; display:none;" id="mensaje">¡Usted Ha Registrado Correctamente!</p>

<script>
    // Espera 3 segundos (3000 milisegundos) y luego muestra el mensaje
    setTimeout(function() {
        var mensaje = document.getElementById('mensaje');
        mensaje.style.display = 'block';
    }, 10000);
</script>

<?php

						}
          else{ ?>
           <p class="text-center" style="color:red; display:none;" id="mensaje">Corriga los errores mostrados.</p>

<script>
    // Espera 3 segundos (3000 milisegundos) y luego muestra el mensaje
    setTimeout(function() {
        var mensaje = document.getElementById('mensaje');
        mensaje.style.display = 'block';
    }, 10000);
</script>

 <?php } ?>


        <br>

        

        <h3 style="font-size: 18px;font-weight: 500;color: #4e4e4e; letter-spacing: .009em;line-height: 1.16667;">Nombre de Usuario</h3>
        
        <div id="uno-warning">
          <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </svg> &ensp; &ensp;
              <div>
                Verificando....
              </div>
            </div>
          </div>

          <script>
        // Espera 3 segundos (3000 milisegundos) y luego oculta el elemento
        setTimeout(function() {
            var unoDiv = document.getElementById('uno-warning');
            unoDiv.style.display = 'none';
        }, 1000);
    </script>

<?php

	//Verificar si ese usuario o correo existe
	$sql = "SELECT * from personas where personas.nombre='$nombre'";
        $verificacion_nombre = $db->seleccionarDatos($sql);

	if(empty($verificacion_nombre)){
?>
    <div id="uno-success" style="display: none;">
          <div class="alert alert-success d-flex align-items-center" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg> &ensp; &ensp;
              <div>
                Verificado Correctamente
              </div>
            </div>
          </div>

    <script>
        // Espera 5 segundos (5000 milisegundos) y luego muestra el div
        setTimeout(function() {
            var miDiv = document.getElementById('uno-success');
            miDiv.style.display = 'block'; // Otra opción es 'inline', 'inline-block', o el valor de display adecuado para tu diseño.
        }, 1000); // Cambia '5000' a la cantidad de milisegundos que desees esperar antes de mostrar el div.
    </script>
<?php
  }
  else{
?>
    <div id="uno-danger" style="display: none;">
          <div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
              </svg>&ensp; &ensp;
              <div>
                Nombre Existente
              </div>
            </div>
          </div>

    <script>
        // Espera 5 segundos (5000 milisegundos) y luego muestra el div
        setTimeout(function() {
            var miDiv = document.getElementById('uno-danger');
            miDiv.style.display = 'block'; // Otra opción es 'inline', 'inline-block', o el valor de display adecuado para tu diseño.
        }, 1000); // Cambia '5000' a la cantidad de milisegundos que desees esperar antes de mostrar el div.
    </script>

<?php
  }
?>










<h3 style="font-size: 18px;font-weight: 500;color: #4e4e4e; letter-spacing: .009em;line-height: 1.16667;">Número de Teléfono </h3>
        
        <div id="dos-warning">
          <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </svg> &ensp; &ensp;
              <div>
                Verificando....
              </div>
            </div>
          </div>

          <script>
        // Espera 3 segundos (3000 milisegundos) y luego oculta el elemento
        setTimeout(function() {
            var unoDiv = document.getElementById('dos-warning');
            unoDiv.style.display = 'none';
        }, 3000);
    </script>

<?php

	//Verificar si ese usuario o correo existe
  $sql = "SELECT * from usuarios where telefono=$telefono";
  $verificacion_telefono = $db->seleccionarDatos($sql);

  if(empty($verificacion_telefono)){
?>
    <div id="dos-success" style="display: none;">
          <div class="alert alert-success d-flex align-items-center" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>&ensp; &ensp;
              <div>
                Verificado Correctamente
              </div>
            </div>
          </div>

    <script>
        // Espera 5 segundos (5000 milisegundos) y luego muestra el div
        setTimeout(function() {
            var miDiv = document.getElementById('dos-success');
            miDiv.style.display = 'block'; // Otra opción es 'inline', 'inline-block', o el valor de display adecuado para tu diseño.
        }, 3000); // Cambia '5000' a la cantidad de milisegundos que desees esperar antes de mostrar el div.
    </script>
<?php
  }
  else{
?>
    <div id="dos-danger" style="display: none;">
          <div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
              </svg>&ensp; &ensp;
              <div>
                Teléfono Existente
              </div>
            </div>
          </div>

    <script>
        // Espera 5 segundos (5000 milisegundos) y luego muestra el div
        setTimeout(function() {
            var miDiv = document.getElementById('dos-danger');
            miDiv.style.display = 'block'; // Otra opción es 'inline', 'inline-block', o el valor de display adecuado para tu diseño.
        }, 3000); // Cambia '5000' a la cantidad de milisegundos que desees esperar antes de mostrar el div.
    </script>

<?php
  }
?>









<h3 style="font-size: 18px;font-weight: 500;color: #4e4e4e; letter-spacing: .009em;line-height: 1.16667;">Correo Electrónico</h3>
        
        <div id="tres-warning">
          <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </svg> &ensp; &ensp;
              <div>
                Verificando....
              </div>
            </div>
          </div>

          <script>
        // Espera 3 segundos (3000 milisegundos) y luego oculta el elemento
        setTimeout(function() {
            var unoDiv = document.getElementById('tres-warning');
            unoDiv.style.display = 'none';
        }, 5000);
    </script>

<?php

	//Verificar si ese usuario o correo existe
  $sql = "SELECT * from personas where personas.correo='$correo'";
  $verificacion_correo = $db->seleccionarDatos($sql);
  if(empty($verificacion_correo)){
?>
    <div id="tres-success" style="display: none;">
          <div class="alert alert-success d-flex align-items-center" role="alert">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg> &ensp; &ensp;
              <div>
                Verificado Correctamente
              </div>
            </div>
          </div>

    <script>
        // Espera 5 segundos (5000 milisegundos) y luego muestra el div
        setTimeout(function() {
            var miDiv = document.getElementById('tres-success');
            miDiv.style.display = 'block'; // Otra opción es 'inline', 'inline-block', o el valor de display adecuado para tu diseño.
        }, 5000); // Cambia '5000' a la cantidad de milisegundos que desees esperar antes de mostrar el div.
    </script>
<?php
  }
  else{
?>
    <div id="tres-danger" style="display: none;">
          <div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
              </svg>&ensp; &ensp;
              <div>
                Correo  Existente
              </div>
            </div>
          </div>

    <script>
        // Espera 5 segundos (5000 milisegundos) y luego muestra el div
        setTimeout(function() {
            var miDiv = document.getElementById('tres-danger');
            miDiv.style.display = 'block'; // Otra opción es 'inline', 'inline-block', o el valor de display adecuado para tu diseño.
        }, 5000); // Cambia '5000' a la cantidad de milisegundos que desees esperar antes de mostrar el div.
    </script>

<?php
  }
?>









<h3 style="font-size: 18px;font-weight: 500;color: #4e4e4e; letter-spacing: .009em;line-height: 1.16667;">Contraseña</h3>
        
        <div id="cuatro-warning">
          <div class="alert alert-warning d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-info-circle-fill" viewBox="0 0 16 16">
                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
                </svg> &ensp; &ensp;
              <div>
                Verificando....
              </div>
            </div>
          </div>

          <script>
        // Espera 3 segundos (3000 milisegundos) y luego oculta el elemento
        setTimeout(function() {
            var unoDiv = document.getElementById('cuatro-warning');
            unoDiv.style.display = 'none';
        }, 7000);
    </script>

<?php

	//Verificar contraseñas
  if ($contrasena1==$contrasena2) {
?>
    <div id="cuatro-success" style="display: none;">
          <div class="alert alert-success d-flex align-items-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
              </svg>&ensp; &ensp;
              <div>
                Verificado Correctamente
              </div>
            </div>
          </div>

    <script>
        // Espera 5 segundos (5000 milisegundos) y luego muestra el div
        setTimeout(function() {
            var miDiv = document.getElementById('cuatro-success');
            miDiv.style.display = 'block'; // Otra opción es 'inline', 'inline-block', o el valor de display adecuado para tu diseño.
        }, 7000); // Cambia '5000' a la cantidad de milisegundos que desees esperar antes de mostrar el div.
    </script>
<?php
  }
  else{
?>
    <div id="cuatro-danger" style="display: none;">
          <div class="alert alert-danger d-flex align-items-center" role="alert">
              <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-x-circle-fill" viewBox="0 0 16 16">
              <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
              </svg>&ensp; &ensp;
              <div>
                No coincide la contraseña
              </div>
            </div>
          </div>

    <script>
        // Espera 5 segundos (5000 milisegundos) y luego muestra el div
        setTimeout(function() {
            var miDiv = document.getElementById('cuatro-danger');
            miDiv.style.display = 'block'; // Otra opción es 'inline', 'inline-block', o el valor de display adecuado para tu diseño.
        }, 7000); // Cambia '5000' a la cantidad de milisegundos que desees esperar antes de mostrar el div.
    </script>

<?php
  }
?>


<br>



<?php
	if(empty($verificacion_nombre) && empty($verificacion_correo)  &&  empty($verificacion_telefono)   && $contrasena1==$contrasena2  ){

              $sql= "INSERT INTO personas (nombre, apellido, correo, info) VALUES ('$nombre', '$apellido','$correo',' ¡Hola! Estoy usando ChatPhone.')";
							$db->ejecutarConsulta($sql);

              // Obtener id de persona registrada
              $consulta_id_persona="Select * from personas where personas.nombre='$nombre' and  personas.apellido= '$apellido' and personas.correo='$correo'";
              $datos_persona=$db->seleccionarDatos($consulta_id_persona);
              foreach ($datos_persona as $datos) {
               $id_persona = $datos['id_persona']; //variable en la que se guarda el ID


               // Generar un hash de contraseña segura
              $hash_contrasena = password_hash($contrasena2, PASSWORD_DEFAULT);

        
               $sql= "INSERT INTO usuarios (telefono,contrasena, id_persona) VALUES ($telefono, '$hash_contrasena', $id_persona)";
               $db->ejecutarConsulta($sql);

              }
 //si todo esta bien me mostrara el boton de inicar session
?>
 <center>
        <div id="botonContainer" style="display:none;">
            <button style="margin-left: -7%; border:none; border-radius:15px; background-color: #0071e3; color: white; padding: 10px 25px; " onclick="redirectToPage()">IniciZar sesión</button>
        </div>
    </center>

    <script>
        // Función para mostrar el botón después de 3 segundos
        setTimeout(function() {
            document.getElementById('botonContainer').style.display = 'block';
        }, 10000); // 3000 milisegundos = 3 segundos

        // Función JavaScript para redirigir
        function redirectToPage() {
            // Cambia la URL a la que deseas redirigir
            window.location.href = '../../views-index/login.php'; // Reemplaza con la URL que desees
        }
    </script>
<?php

						}



//Si esta mal me aparecera el boton para ir atras y corregir todo
          else{ ?>

<center>
        <div id="botonContainer" style="display:none;">
            <button type="submit" style="margin-left: -7%; border:none; border-radius:15px; background-color: #0071e3; color: white; padding: 10px 25px; " name="crearchatphone" onclick="goBack()">Volver</button>
        </div>
    </center>

    <script>
        // Función para mostrar el botón después de 3 segundos
        setTimeout(function() {
            document.getElementById('botonContainer').style.display = 'block';
        }, 10000); // 3000 milisegundos = 3 segundos

        // Función JavaScript para regresar
        function goBack() {
            window.history.back();
        }
    </script>

    
    </div>     
  </div>

 <?php } ?>










  </div>


    

 





</body>
</html>