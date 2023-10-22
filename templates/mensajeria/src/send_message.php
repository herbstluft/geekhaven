
<?php
session_start();
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();

//id_usuario activo
if(isset($_SESSION['admin'])){
    $id=$_SESSION['admin'];
}
if(isset($_SESSION['user'])){
    $id=$_SESSION['user'];
}




if(isset($_POST['mensaje'])){

    $mensaje=$_POST['mensaje'];

    //sacar el id de la conversacion a la que pertenecen
    $sql="SELECT DISTINCT mensajes.id_conversacion as id_conversacion 
    FROM mensajes 
    INNER JOIN conversaciones ON conversaciones.id_conversacion = mensajes.id_conversacion 
    WHERE (conversaciones.id_usuario1 = $id AND conversaciones.id_usuario2 = $_SESSION[id_friend] ) OR (conversaciones.id_usuario1 = $_SESSION[id_friend] AND conversaciones.id_usuario2 = $id);";

    $enviar_id=$db->seleccionarDatos($sql);

    foreach ($enviar_id as $id_con){
        $id_conversacion=$id_con['id_conversacion'];
    }
    

        //si no hay un chat creado se creara uno antes de enviar el mensaje
if(empty($enviar_id)){
    $sql="Insert into conversaciones (`id_usuario1`, `id_usuario2`) values ($id, $_SESSION[id_friend])";
    $crear_chat=$db->ejecutarConsulta($sql);

}

//se saca el id de la conversacion y se manda el mensaje
if(empty($enviar_id)){
    $sql_id_conversacion="SELECT conversaciones.id_conversacion from conversaciones
    WHERE (conversaciones.id_usuario1 = $id AND conversaciones.id_usuario2 = $_SESSION[id_friend] ) OR (conversaciones.id_usuario1 = $_SESSION[id_friend] AND conversaciones.id_usuario2 = $id);";

    $enviar_id_conversacion=$db->seleccionarDatos($sql_id_conversacion);
   
    foreach ($enviar_id_conversacion as $id_conv){
        $id_conversacion_new_chat=$id_conv['id_conversacion'];
    echo $id_conversacion_new_chat;
    }
    
    //ahora que ya se tiene el id de el nuevo chat creado insertamos el nuevo mensaje enviado en mensajes con su respectivo id_conversacion

    //insertar nuevo mensaje enviado para un nuevo chat
    $insert_message="INSERT INTO `mensajes` ( `id_remitente`, `id_destinatario`, `id_conversacion`, `mensaje`, `fecha`) VALUES ($id, $_SESSION[id_friend], $id_conversacion_new_chat, '$mensaje', current_timestamp())";
    $send_mensaje=$db->ejecutarConsulta($insert_message);
}

if(!empty($enviar_id)){
    //insertar mensaje enviado
    $sql="INSERT INTO `mensajes` ( `id_remitente`, `id_destinatario`, `id_conversacion`, `mensaje`, `fecha`) VALUES ($id, $_SESSION[id_friend], $id_conversacion, '$mensaje', current_timestamp())";
    $enviar_mensaje=$db->ejecutarConsulta($sql);

}

    
    
}

?>