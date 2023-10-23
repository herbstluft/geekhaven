
<?php
session_start();
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();

//id_usuario activo_ se pone la condicion if para saber el id del usuario logueado
if(isset($_SESSION['admin'])){
    $id=$_SESSION['admin'];
}
if(isset($_SESSION['user'])){
    $id=$_SESSION['user'];
}




//Datos de la publicacion
if(isset($_SESSION['pub_id'])){

    
    echo $_SESSION['pub_id'];







}



$id_amigo = $_SESSION['id_friend'];

$sql="SELECT usuarios.imagen as imagen_amigo from usuarios  WHERE usuarios.id_usuario=$id_amigo";
$img_profile_friend=$db->seleccionarDatos($sql);
foreach ($img_profile_friend as $img_friend)
    $img_f=$img_friend['imagen_amigo'];

$sql="SELECT usuarios.imagen as imagen_mia from usuarios  WHERE usuarios.id_usuario=$id";
$img_profile_friend=$db->seleccionarDatos($sql);
foreach ($img_profile_friend as $img_friend)
    $img_m=$img_friend['imagen_mia'];


//Ver todas mis conversaciones con un case para sacar el nombre de la persona con la que hablo
$sql = "SELECT PR.nombre as remitente, remitente.id_usuario as id_remitente, PD.nombre as destinatario, mensajes.mensaje, mensajes.fecha as Fecha
FROM mensajes

INNER JOIN usuarios as remitente ON remitente.id_usuario = mensajes.id_remitente 
INNER JOIN usuarios as destinatario ON destinatario.id_usuario = mensajes.id_destinatario
INNER JOIN personas as PD ON PD.id_persona = destinatario.id_persona
INNER JOIN personas as PR ON PR.id_persona = remitente.id_persona

WHERE (remitente.id_usuario = $id AND destinatario.id_usuario = $id_amigo) 
   OR (remitente.id_usuario = $id_amigo AND destinatario.id_usuario = $id)
ORDER BY mensajes.fecha asc;";


$ver_mensajes=$db->seleccionarDatos($sql);

if(empty($ver_mensajes)){
    
}

// Definir una variable para almacenar los chats


         if (isset($_SESSION['user']) && $id == $_SESSION['user']) {
          $mi_chats = '<div class="chat">     <br>     <center>
          <div>
             <div style="border 5px solid white; margin-bottom:10px">
             <img class="profile-image" style="margin-right:-20px" src="/geekhaven/src/views/user/img_profile/'.$img_m.'" >
             <img class="profile-image" src="/geekhaven/src/views/admin/html/img_profile/'.$img_f.'">
             </div>
             <p style="font-size:15px;color:white">Ahora están conectados en ChatPhone.</p>
             <img class="profile-image" src="https://gifdb.com/images/high/cute-wave-emoji-hand-59s88kk0zj3xho40.gif">
          </div>
          </center> <br>   ' ;
 
      } elseif (isset($_SESSION['admin']) && $id == $_SESSION['admin']) {
        $mi_chats = '<div class="chat">     <br>     <center>
        <div>
           <div style="border 5px solid white; margin-bottom:10px">
           <img class="profile-image" style="margin-right:-20px" src="/geekhaven/src/views/admin/html/img_profile/'.$img_m.'" >
           <img class="profile-image" src="/geekhaven/src/views/user/img_profile/'.$img_f.'">
           </div>
           <p style="font-size:15px;color:white">Ahora están conectados en ChatPhone.</p>
           <img class="profile-image" src="https://gifdb.com/images/high/cute-wave-emoji-hand-59s88kk0zj3xho40.gif">
        </div>
        </center> <br>   ' ;
      }

       



foreach ($ver_mensajes as $mensaje) {
    $remitente = $mensaje['remitente'];
    $mensaje_texto = $mensaje['mensaje'];
    $remitente_id = $mensaje['id_remitente'];
    $id_usuario_activo = $_SESSION['id_friend'];
    $clase_css = ($remitente_id == $id_usuario_activo) ? 'yours' : 'mine';
    // Construir el mensaje HTML
   


    $mi_chats .= '<div class="' . $clase_css . ' messages">';
    $mi_chats .= '<div class="message last">' . $mensaje_texto . '</div>';
    $mi_chats .= '</div>';

}


// Cerrar el contenedor de chat
$mi_chats .= '</div>' ;

// Devolver el contenido HTML como respuesta
echo $mi_chats;

?>
