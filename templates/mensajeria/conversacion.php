
<?php
session_start();
use MyApp\data\Database;
require("../../vendor/autoload.php");
$db = new Database();

//id_usuario activo
if(isset($_SESSION['admin'])){
    $id=$_SESSION['admin'];
}
if(isset($_SESSION['user'])){
    $id=$_SESSION['user'];
}


if(isset($_GET['id_con'])){
    //Borrar mensajes de la conversacion
    $sql="DELETE mensajes
    FROM mensajes
    INNER JOIN conversaciones
    ON conversaciones.id_conversacion = mensajes.id_conversacion
    WHERE conversaciones.id_conversacion = '$_GET[id_con]';
    ";
  
    $borrar_mensajes=$db->ejecutarConsulta($sql);
  
  }


  

//se guarda el id del nuevo amigo en caso de que sea un nuevo chat
if(isset($_GET['num_new_friend'])){
$number_new_friend=$_GET['num_new_friend'];
}
 
if(isset($_GET['num_new_friend'])){

    //info de amigo
    $sql="select * from usuarios inner join personas on usuarios.id_persona=personas.id_persona where usuarios.telefono='$number_new_friend'";
    $datos=$db->seleccionarDatos($sql);

    if(empty($datos)){
       echo "vacio";
    }

    

    foreach($datos as $todo){
    $imagen= $todo['imagen'];
    $nombre_amigo= $todo['nombre'];
    $id_amigo= $todo['id_usuario'];
    $_SESSION['id_friend']=$id_amigo;
    $info=$todo['info'];
    $correo=$todo['correo'];
    $telefono=$todo['telefono'];
    }
    
    }



if(isset($_GET['id_friend']) || isset($_GET['id_usuario'])){

            //se guarda el id en caso de que sea un chat con el que ya tengo conversaciones
            if(isset($_GET['id_friend'])){
                $id_friend=$_SESSION['id_friend']=$_GET['id_friend'];
            }

            if(isset($_GET['id_usuario'])){
            $id_friend=$_SESSION['id_friend']=$_GET['id_usuario'];
            }


//info de amigo
$sql="select * from usuarios inner join personas on usuarios.id_persona=personas.id_persona where usuarios.id_usuario=$id_friend";
$dato=$db->seleccionarDatos($sql);
foreach($dato as $todo){
$imagen= $todo['imagen'];
$nombre_amigo= $todo['nombre'];
$estado=$todo['estado'];
$info=$todo['info'];
    $correo=$todo['correo'];
    $telefono=$todo['telefono'];
}

    


}

//id conversacion_con mensajes
$sql="SELECT DISTINCT mensajes.id_conversacion as id_conversacion 
FROM mensajes 
INNER JOIN conversaciones ON conversaciones.id_conversacion = mensajes.id_conversacion 
WHERE (conversaciones.id_usuario1 = $id AND conversaciones.id_usuario2 = $_SESSION[id_friend] ) OR (conversaciones.id_usuario1 = $_SESSION[id_friend] AND conversaciones.id_usuario2 = $id);";
$id_conversacion=$db->seleccionarDatos($sql);

foreach($id_conversacion as $id_conversacion)


$id_con=$id_conversacion['id_conversacion'];



//id conversacion_sin mensajes
$sql="SELECT *
FROM conversaciones 
WHERE (conversaciones.id_usuario1 = $id AND conversaciones.id_usuario2 = $_SESSION[id_friend] ) OR (conversaciones.id_usuario1 = $_SESSION[id_friend]  AND conversaciones.id_usuario2 = $id);";
$id_conversacion=$db->seleccionarDatos($sql);

foreach($id_conversacion as $id_conversacion)


$id_con_sin_mensajes=$id_conversacion['id_conversacion'];



//borrar Chat
if(isset($_GET['borrar_conversacion'])){

    $sql="DELETE mensajes
    FROM mensajes
    INNER JOIN conversaciones
    ON conversaciones.id_conversacion = mensajes.id_conversacion
    WHERE conversaciones.id_conversacion = $id_con_sin_mensajes;
    ";
  
    $borrar_mensajes=$db->ejecutarConsulta($sql);


    $sql="UPDATE `conversaciones` SET `id_pub` = null WHERE `conversaciones`.`id_conversacion` = $id_con_sin_mensajes";
    $borrar_id_pub=$db->ejecutarConsulta($sql);

   $sql="UPDATE pub_trq SET id_conversacion = NULL WHERE `pub_trq`.`id_conversacion` = $id_con_sin_mensajes";
   $borrar_id_conversacion_pub_trq=$db->ejecutarConsulta($sql);

    $sql="DELETE FROM conversaciones WHERE `conversaciones`.`id_conversacion` = $id_con_sin_mensajes";
    $borrar_chat=$db->ejecutarConsulta($sql);

    $sql="UPDATE `pub_trq` SET `id_conversacion` = NULL WHERE `pub_trq`.`id_pub` = {$_SESSION['pub_id']};";

    header("Location: index.php");

}





//Datos de la publicacion
if(isset($_GET['id_pub'])){
    $_SESSION['pub_id'] = $_GET['id_pub'];
    $_SESSION['pub_titulo']=$_GET['pub_titulo'];
    if(isset($_GET['id_usuario'])){
        $_SESSION['pub_id_usuario'] = $_GET['id_usuario'];

    
    }
    
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/dark-mode.css">
    <link rel="stylesheet" href="css/light-mode.css">
    <link rel="stylesheet" href="css/estilos.css">
    <!--Boostrap-->   
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!--Boostrap--> 

</head>

<style>


.messages {
  margin-top: 30px;
  display: flex;
  flex-direction: column;
}

.message {
  border-radius: 20px;
  padding: 8px 15px;
  margin-top: -10px;
  margin-bottom: -0px;
  display: inline-block;
}

.yours {
  align-items: flex-start;
}

.yours .message {
  margin-right: 25%;
background:#3b3b3b;
  position: relative;
  color:white;
}



.mine {
  align-items: flex-end;
}
.mine .message {
  color: white;
  margin-left: 25%;
  background:#1c83fa;
  position: relative;
}
 

.chat-box-footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background-color: #1818186e; backdrop-filter:blur(25px); 
            padding: 10px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        #chat_input {
            flex: 1;
            padding: 10px;
            border: none;
            border-radius: 15px;
            font-size: 16px;
            background-color:#2727276e;
         outline:none;
         color:#b1b1b1;
        }

        .send {
            background: none;
            border: none;
            cursor: pointer;
        }

        .send svg {
            width: 24px;
            height: 24px;
            fill: #006ae3;
        }
        .scroll-btn {
    position: fixed;
    bottom: 80px;
    margin-left:45%;
    margin-right:45%;
    display: none;
    font-size: 24px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 50%;
    width: 50px;
    height: 50px;
    cursor: pointer;
    z-index: 1;

    }


</style>


<body id="body" class="dark-mode" style="margin: 3%;">
   




    <div class="floating-bar">
        <div class="row">
            
            <div class="col-2 text-center">
            <a href="index.php">
              <svg id="link" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
</svg>
</a>
            </div>
        
            <div class="col-8 text-center ">
                <p><?php 

                    // Imagen del perfil
    if (isset($_SESSION['user']) && $id == $_SESSION['user'] )  {
        echo '<img class="profile-image" style="width:30px; height:30px;" src="/geekhaven/src/views/admin/html/img_profile/'.$imagen.'" alt="Perfil Chat 1">';
    } elseif (isset($_SESSION['admin']) && $id == $_SESSION['admin']) {
        echo '<img class="profile-image" style="width:30px; height:30px;" src="/geekhaven/src/views/user/img_profile/'.$imagen.'" alt="Perfil Chat 1">';
    }          
                echo " $nombre_amigo -  $_SESSION[pub_titulo] ";?>  </p> 
                
            </div>

            <div class="col-2">

            <button data-bs-target="#exampleModalToggle" data-bs-toggle="modal">
                <svg id="link" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3zm5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3z"/>
                </svg>
            </button>
            </div>
          
        </div>
    </div>  



<?php
if(isset($_SESSION['admin'])){
?>
    <div style="position:fixed;bottom:10%">
        <div class="row ">
            <form action="conversacion.php" method="post">
            <div class="col-12 ">
           <a href="">
           <button type="button" class="btn position-relative" name="aceptar_oferta" style="background:#005aff; color:white">
  Aceptar Oferta
  <span class="position-absolute top-0 start-100 translate-middle p-2 bg-success border border-light rounded-circle" style=" height: 25px;margin: auto;width: 25px;">
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16" style="position: relative;right: 5px;bottom: 10px;">
  <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
</svg>
  </span>
</button>
           </a>
            </div>
            </form>
        </div>
    </div>  

<?php
} 
?>





<br>
<br>




<div id="lista_de_chats" style="margin-left:15px; margin-right:15px;">


</div>



<div class="chat-box-footer">
    <input id="chat_input" placeholder="Introduce tu mensaje aquí..." name="mensaje">
    <button id="enviarFormulario" class="send" name="enviar">
        <svg style="width:25px;height:25px; margin-left:15px" viewBox="0 0 24 24">
            <path fill="#006ae3" d="M2,21L23,12L2,3V10L17,12L2,14V21Z"></path>
        </svg>
    </button>
</div>

<button id="scrollBtn" class="scroll-btn">
    <div style="background:white; padding:3px; padding-left:4px; padding-right:15px; border-radius:20%; background:#141414c2; backdrop-filter: blur(25px)">
    <svg id="link" style="margin-top:-8px" xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-down-square" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M15 2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V2zM0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm8.5 2.5a.5.5 0 0 0-1 0v5.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V4.5z"/>
    </svg>
    </div>
</button>

<br><br><br><br>



<script>
    // JavaScript para desplazarse automáticamente hacia el final de la lista de chats
    window.onload = function() {
        var elemento = document.getElementById("lista_de_chats");
        if (elemento) {
            elemento.scrollIntoView({ behavior: "smooth", block: "end" });
        }
    };

    // Esta función desplaza la página hacia abajo después de enviar un mensaje
    function scrollToBottomOfPage() {
        $('html, body').animate({ scrollTop: $(document).height() }, 'fast');
    }

    // Esta función actualiza los chats y se desplaza hacia abajo cuando recibe un mensaje
    function actualizarChats() {
        $.ajax({
            url: 'src/mensajes.php', // Nombre de tu archivo PHP que ejecuta la consulta SQL
            type: 'GET',
            success: function(data) {
                $('#lista_de_chats').html(data); // Mostrar los resultados en el div
                scrollToBottomOfPage(); // Desplazarse al final después de recibir un mensaje
            },
            complete: function() {
                setTimeout(actualizarChats, 1000); // Realizar la próxima solicitud después de 1 segundos
            }
        });
    }

    $(document).ready(function() {
        actualizarChats(); // Iniciar la actualización periódica
    });
</script>





<script>
  
    // Esta función desplaza la página hacia abajo despues de enviar un mensaje
    
    $(document).ready(function() {
    $('#chat_input').on('keydown', function(e) {
        if (e.key === 'Enter') {
            var mensaje = $('#chat_input').val(); // Obtener el mensaje del input

            // Validar que el mensaje no esté vacío antes de enviarlo
            if (mensaje.trim() !== '') {
                e.preventDefault(); // Prevenir el comportamiento predeterminado de la tecla "Enter", que envía el formulario

                // Enviar los datos al script PHP utilizando AJAX
                enviarMensaje(mensaje);
            } else {
                // Mostrar un mensaje de error o tomar alguna acción adecuada (por ejemplo, enfocar nuevamente el campo)
                console.log('El mensaje está vacío. Por favor, ingresa un mensaje válido.');
            }
        }
    });


        
        $('#enviarFormulario').on('click', function(e) {
            e.preventDefault(); // Prevenir el comportamiento predeterminado del botón, enviar un submit
            var mensaje = $('#chat_input').val(); // Obtener el mensaje del input

            // Enviar los datos al script PHP utilizando AJAX
            enviarMensaje(mensaje);
        });

        function enviarMensaje(mensaje) {
            $.ajax({
                type: 'POST',
                url: 'src/send_message.php',
                data: {
                    mensaje: mensaje
                },
                success: function(response) {
                    // Manejar la respuesta del servidor si es necesario
                    console.log(response);

                    // Limpia el campo de entrada después de enviar el mensaje
                    $('#chat_input').val('');

                    // Desplaza la página hacia abajo después de enviar el mensaje
                    setTimeout(function() {
                        scrollToBottomOfPage();
                    },1000);
                },
                
                error: function(xhr, status, error) {
                    // Manejar errores si es necesario
                    console.error(error);
                }
            });
        }
    });
</script>




<script>
    // boton de hacia abajo
const scrollBtn = document.getElementById("scrollBtn");

window.addEventListener("scroll", () => {
    // Comprueba si el usuario está en la parte inferior de la página
    const windowHeight = window.innerHeight;
    const bodyHeight = document.body.scrollHeight;
    const scrollPosition = window.scrollY;
    
    if (scrollPosition + windowHeight >= bodyHeight) {
        scrollBtn.style.display = "none";
    } else {
        scrollBtn.style.display = "block";
    }
});

scrollBtn.addEventListener("click", () => {
    // Desplaza hacia abajo cuando se hace clic en el botón
    window.scrollTo({
        top: document.body.scrollHeight,
        behavior: "smooth"
    });
});

</script>



<div class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-fullscreen">
    <div class="modal-content" style="backdrop-filter: saturate(180%) blur(20px);
    background-color:  rgb(0 0 0 / 75%);
    border: 0px;">
      <div class="modal-body">


    <div class="container">
    <svg data-bs-dismiss="modal" aria-label="Close" xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>
    </div>

        <!--Formulario de datos del chat-->
        <div>
            <center>

            <?php 

                    // Imagen del perfil
    if (isset($_SESSION['user']) && $id == $_SESSION['user'] )  {
        echo '<img class="profile-image"style="margin-bottom:10px; width:90px; height:90px;" src="/geekhaven/src/views/admin/html/img_profile/'.$imagen.'" alt="Perfil Chat 1">';
    } elseif (isset($_SESSION['admin']) && $id == $_SESSION['admin']) {
        echo '<img class="profile-image" style="margin-bottom:10px; width:90px; height:90px;" src="/geekhaven/src/views/user/img_profile/'.$imagen.'" alt="Perfil Chat 1">';
    }          
    ?>

           <p style="font-size:20px;color:white"><b><?php echo $nombre_amigo ?></b></p>
           <p style="font-size:16px; color:white"> <?php echo $info ?></p>
           </center>

<div class="container">
    <div class="row">
        <div class="col-5">
            <p style="font-size:19px; color:white; font-weight:bolder;">Teléfono</p>
            <p style="font-size:16px; color:white; margin-top:-10px"> +52 <?php echo $telefono ?></p>
        </div>
        <div class="offset-5 col-2 text-right">
            <div style="background:#171717; border-radius:10px; width:45px; height:45px" class="text-center">
                <p class="w-100">
                    <svg id="link" style="margin-top:12px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-telephone-plus-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>
                </p>
            </div>
        </div>
    </div>
<br>

    <div class="row">
        <div class="col-5">
            <p style="font-size:19px; color:white; font-weight:bolder;">Correo</p>
            <p style="font-size:16px; color:white; margin-top:-10px"> <?php echo $correo ?></p>
        </div>
        <div class="offset-5 col-2 text-right">
            <div style="background:#171717; border-radius:10px; width:45px; height:45px" class="text-center">
                <p class="w-100">
                    <svg id="link" style="margin-top:12px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                        <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
                        <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
                    </svg>
                </p>
            </div>
        </div>
    </div>


    <br>

<div class="row">
    <div class="col-5">
        <p style="font-size:19px; color:white; font-weight:bolder;">Estado</p>
        <p style="font-size:16px; margin-top:-10px"> 
            <?php if($estado==1){
                ?>
                <p style="color:green">Activo</p>
            <?php
            }
            if($estado==0){
                ?>
                <p style="color:red">Desconectado</p>
            <?php
            }
            ?>
        </p>
    </div>
    <div class="offset-5 col-2 text-right">
        <div style="background:#171717; border-radius:10px; width:45px; height:45px" class="text-center">
            <p class="w-100">
                <svg id="link" style="margin-top:12px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-line" viewBox="0 0 16 16">
                    <path d="M8 0c4.411 0 8 2.912 8 6.492 0 1.433-.555 2.723-1.715 3.994-1.678 1.932-5.431 4.285-6.285 4.645-.83.35-.734-.197-.696-.413l.003-.018.114-.685c.027-.204.055-.521-.026-.723-.09-.223-.444-.339-.704-.395C2.846 12.39 0 9.701 0 6.492 0 2.912 3.59 0 8 0ZM5.022 7.686H3.497V4.918a.156.156 0 0 0-.155-.156H2.78a.156.156 0 0 0-.156.156v3.486c0 .041.017.08.044.107v.001l.002.002.002.002a.154.154 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157Zm.791-2.924a.156.156 0 0 0-.156.156v3.486c0 .086.07.155.156.155h.562c.086 0 .155-.07.155-.155V4.918a.156.156 0 0 0-.155-.156h-.562Zm3.863 0a.156.156 0 0 0-.156.156v2.07L7.923 4.832a.17.17 0 0 0-.013-.015v-.001a.139.139 0 0 0-.01-.01l-.003-.003a.092.092 0 0 0-.011-.009h-.001L7.88 4.79l-.003-.002a.029.029 0 0 0-.005-.003l-.008-.005h-.002l-.003-.002-.01-.004-.004-.002a.093.093 0 0 0-.01-.003h-.002l-.003-.001-.009-.002h-.006l-.003-.001h-.004l-.002-.001h-.574a.156.156 0 0 0-.156.155v3.486c0 .086.07.155.156.155h.56c.087 0 .157-.07.157-.155v-2.07l1.6 2.16a.154.154 0 0 0 .039.038l.001.001.01.006.004.002a.066.066 0 0 0 .008.004l.007.003.005.002a.168.168 0 0 0 .01.003h.003a.155.155 0 0 0 .04.006h.56c.087 0 .157-.07.157-.155V4.918a.156.156 0 0 0-.156-.156h-.561Zm3.815.717v-.56a.156.156 0 0 0-.155-.157h-2.242a.155.155 0 0 0-.108.044h-.001l-.001.002-.002.003a.155.155 0 0 0-.044.107v3.486c0 .041.017.08.044.107l.002.003.002.002a.155.155 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156Z"/>
                </svg>
            </p>
        </div>
    </div>

<br>

<?php if(empty($id_con)){
    
}
else{

?>

<div class="col-5">
            <p style="font-size:17px; color:white; font-weight:bolder;">Buscar mensajes</p>
            <p style="font-size:16px; color:white; margin-top:-10px"> Encuentra mensajes especificos.</p>
        </div>
        <div class="offset-5 col-2 text-right">
            <div style="background:#171717; border-radius:10px; width:45px; height:45px" class="text-center">
                <p class="w-100"data-bs-target="#exampleModalToggle2" data-bs-toggle="modal" >
                <svg id="link" style="margin-top:12px"  xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                </svg>
                </p>
            </div>
        </div>


        <br>
    

    <div class="col-5">
        
            <p style="font-size:17px; color:red; font-weight:bolder;">Vaciar mensajes</p>
            <p style="font-size:16px; color:white; margin-top:-10px"> Elimina todos los mensajes de la conversacion</p>
        </div>
        <div class="offset-5 col-2 text-right">
            <div style="background:#171717; border-radius:10px; width:45px; height:45px" class="text-center">
                <p class="w-100">
               <a href="conversacion.php?id_con=<?php echo $id_con?>&id_friend=<?php if(isset($_GET['id_friend'])){ echo $_GET['id_friend'];} ?>&num_new_friend=<?php if(isset($_GET['num_new_friend'])){echo $number_new_friend;} ?> &pub_titulo=<?php echo  $_SESSION['pub_titulo'] ?> ">
               <svg style="margin-top:12px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                        <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                    </svg>
               </a>
                </p>
            </div>
        </div>


<br>

<div class="col-5">
            <p style="font-size:17px; color:red; font-weight:bolder;">Eliminar Chat</p>
            <p style="font-size:16px; color:white; margin-top:-10px"> Elimina de tu lista de chats.</p>
        </div>
        <div class="offset-5 col-2 text-right">
            <div style="background:#171717; border-radius:10px; width:45px; height:45px" class="text-center">
                <p class="w-100">
                <a href="conversacion.php?borrar_conversacion=<?php if(empty($id_con)){
                    echo $id_con_sin_mensajes;
                } else{ echo $id_con;} ?>&id_friend=<?php if(isset($_GET['id_friend'])){ echo $_GET['id_friend'];} ?>&num_new_friend=<?php if(isset($_GET['num_new_friend'])){echo $number_new_friend;} ?> ">
                    <svg style="margin-top:12px" xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" class="bi bi-trash2-fill" viewBox="0 0 16 16">
                        <path d="M2.037 3.225A.703.703 0 0 1 2 3c0-1.105 2.686-2 6-2s6 .895 6 2a.702.702 0 0 1-.037.225l-1.684 10.104A2 2 0 0 1 10.305 15H5.694a2 2 0 0 1-1.973-1.671L2.037 3.225zm9.89-.69C10.966 2.214 9.578 2 8 2c-1.58 0-2.968.215-3.926.534-.477.16-.795.327-.975.466.18.14.498.307.975.466C5.032 3.786 6.42 4 8 4s2.967-.215 3.926-.534c.477-.16.795-.327.975-.466-.18-.14-.498-.307-.975-.466z"/>
                    </svg>
                </a>
                </p>
            </div>
        </div>
<?php 
}
?>



   


    





</div>






</div>





        </div>
        <!--Formulario de datos del chat-->

      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Modal 2</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Hide this modal and show the first with the button below.
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModalToggle" data-bs-toggle="modal">Back to first</button>
      </div>
    </div>
  </div>
</div>



    <script src="../bootstrap/js/script.js"></script>
</body>
</html>