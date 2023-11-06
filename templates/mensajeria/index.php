
<?php

use MyApp\data\Database;
require("../../vendor/autoload.php");
$db = new Database();
session_start();
error_reporting(E_ERROR); 

//id_usuario activo
if(isset($_SESSION['admin'])){
    $id=$_SESSION['admin'];
}
if(isset($_SESSION['user'])){
    $id=$_SESSION['user'];
}



if (isset($_GET['id_pub']) && isset($_GET['id_usuario'])) {
    $id_pub = $_GET['id_pub'];
    $id_usuario = $_GET['id_usuario'];
    echo $id_pub; // Mostrará el valor de 'id_pub'
    echo $id_usuario; // Mostrará el valor de 'id_usuario'
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
    .status-dot {
  width: 10px;
  height: 10px;
  background-color: #00ff2b;
  border-radius: 50%; /* Esto crea una forma circular */
  display: inline-block;
  position: relative;
  left:45px;
  bottom:-40px;
}

.status-not {
  width: 10px;
  height: 10px;
  position: relative;
  background-color: red;
  border-radius: 50%; /* Esto crea una forma circular */
  display: inline-block;
  left:45px;
  bottom:-40px;
}

</style>

<body id="body" class="dark-mode" style="margin: 3%;">
   




    <div class="floating-bar">
        <div class="row">
            <div class="col-2 text-center">
                <p data-bs-target="#exampleModalToggle" data-bs-toggle="modal" id="link"">Más</p>
            </div>
            <div class="col-7 text-center ">
                <p style="margin-left:30px" >GeekChat</p> 
            </div>
            <div class="col-3 text-center">

            <?php
            if(isset($_SESSION['admin'])){ ?>
              <a href="/geekhaven/src/views/admin/index.php" style="text-decoration:none"> <p  id="link">Inicio</p></a>
            <?php 
            }
            if(isset($_SESSION['user'])){ ?>
              <a href="/geekhaven/index.php" style="text-decoration:none"> <p  id="link">Inicio</p></a>
            <?php 
            }
            ?>
            </div>
        </div>
    </div>





    <div id="container" class="visible" style="margin-top: 60px;">
       <h1 id="chats">Chats</h1>
       <input  id="search" type="text"  placeholder="Buscar">
    </div>



        <div class="row text-center " id="link">
            <div class="col-6">
               <a style="text-decoration: none; color: #0a85f0;" href="archivados.html">Chats Archivados</a>
            </div>
            <div class="col-6">
                Nuevo grupo
            </div>
         </div>


<br>




<div id="lista_de_chats">

</div>

<script>
function actualizarConsulta() {
    $.ajax({
        url: 'src/chats.php', // Nombre de tu archivo PHP que ejecuta la consulta SQL
        type: 'GET',
        success: function(data) {
            $('#lista_de_chats').html(data); // Mostrar los resultados en el div
        },
        complete: function() {
            setTimeout(actualizarConsulta, 01000); // Realizar la próxima solicitud después de 2 segundos
        }
    });
}

$(document).ready(function() {
    actualizarConsulta(); // Iniciar la actualización periódica
});
</script>






<div style="margin-left:2%; margin-right:2%; left:-6px" class="modal fade text-center" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content background-modal" >
    
  
      <div class="modal-body">
    <h3 class="text_modal">ChatPhone</h3>
    <p class="text_modal" style="opacity:0.9">Inicia un nuevo chat</p>
    <hr class="hr-white">

    <p id="link" data-bs-target="#exampleModalToggle2" data-bs-toggle="modal">Número de teléfono</p>
    <hr>
    <p id="link" data-bs-dismiss="modal" aria-label="Close"><b>Cancelar</b></p>

    </div>

    

    </div>
  </div>
</div>


<form action="conversacion.php" method="post">
<div class="modal fade text-center" id="exampleModalToggle2" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class=" background-modal modal-content">
      <div class="modal-body">
        <h5 class="text_modal" >ChatPhone</h5>
        <p class="text_modal" style="opacity:0.8">Introduzca el nuevo número de teléfono de la persona con la que desea conversar: </p>
        <p class="text_modal" style="opacity:0.7; margin-bottom:3%">Ex: 87xxxxxxxx</p>
        <input class="back_input_num" type="num" name="num_new_friend" placeholder="Número de teléfono"  maxlength="10" minlength="10"
    style=" 
    border: 0px;
    width: 100%;
    padding: 1.5%;
    padding-top:8px;
    padding-bottom:8px;
    border-radius: 10px;
    font-size: 18px;
    outline: 0;
    padding-left: 5%;">
<br><br><br>        
    <div class="row" style="margin-bottom:-10px">
        <div class="col-6" style="border-top:1px solid #a1a1a124; border-right:1px solid #a1a1a124">
            <p style="margin-top:15px" data-bs-dismiss="modal" aria-label="Close" id="link"><b>Cancelar</b></p>
        </div>
        <div class="col-6" style="border-top:1px solid  #a1a1a124;">
            
        <button><p class="text_modal" style="margin-top:15px" >Abrir Chat</p></button>
             
            
        </div>
    </div>

      </div>
    </div>
  </div>
</div>

</form>






          
    </div>

   
    
    
    
    
    
    
    
    
    
    
<br><br>













    <script src="../bootstrap/js/script.js"></script>
</body>
</html>