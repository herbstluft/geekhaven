
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


    //verificar si  un chat tiene mensajes
    $sql="SELECT DISTINCT mensajes.id_conversacion as id_conversacion 
    FROM mensajes 
    INNER JOIN conversaciones ON conversaciones.id_conversacion = mensajes.id_conversacion 
    WHERE (conversaciones.id_usuario1 = $id AND conversaciones.id_usuario2 = $_SESSION[id_friend] ) OR (conversaciones.id_usuario1 = $_SESSION[id_friend] AND conversaciones.id_usuario2 = $id and conversaciones.id_pub=$_SESSION[id_pub]);";

    $enviar_id=$db->seleccionarDatos($sql);

    foreach ($enviar_id as $id_con)
        $id_conversacion=$id_con['id_conversacion'];
    
    

        //si enviar_id esta vacio signfica que no hay mensajes en ese chat
if(empty($enviar_id)){
    
  
    //verificar si existe un chat creado sin mensajes
    $sql="SELECT *
    FROM conversaciones 
    WHERE (conversaciones.id_usuario1 = $id AND conversaciones.id_usuario2 = $_SESSION[id_friend] and conversaciones.id_pub=$_SESSION[id_pub] ) OR (conversaciones.id_usuario1 = $_SESSION[id_friend]  AND conversaciones.id_usuario2 = $id  and conversaciones.id_pub=$_SESSION[id_pub])";
    $id_conv=$db->seleccionarDatos($sql);

    foreach($id_conv as $id_conv){
        $id_co=$id_conv['id_conversacion'];
    }
    

        // si existe un chat inserta el mensaje con su respectivo chat
    if(!empty($id_co)){
        $sql="INSERT INTO `mensajes` ( `id_remitente`, `id_destinatario`, `id_conversacion`, `mensaje`, `fecha`) VALUES ($id, $_SESSION[id_friend], $id_co, '$mensaje', current_timestamp())";
        $enviar_mensaje=$db->ejecutarConsulta($sql);
    }

    //si no existe un chat, crea uno nuevo
    else{
       

        $sql_insert_new_chat="INSERT INTO `conversaciones` (`id_usuario1`, `id_usuario2`, `id_pub`) VALUES ($id, $_SESSION[id_friend], $_SESSION[pub_id])";
        $insert_chat=$db->ejecutarConsulta($sql_insert_new_chat);
        

    $sql_id_conversacion="SELECT conversaciones.id_conversacion from conversaciones
    WHERE (conversaciones.id_usuario1 = $id AND conversaciones.id_usuario2 = $_SESSION[id_friend]  ) OR (conversaciones.id_usuario1 = $_SESSION[id_friend] AND conversaciones.id_usuario2 = $id);";

    $enviar_id_conversacion=$db->seleccionarDatos($sql_id_conversacion);
   
    foreach ($enviar_id_conversacion as $id_conv){
        $id_conversacion_new_chat=$id_conv['id_conversacion'];
    echo $id_conversacion_new_chat;
    }

 //insertar nuevo mensaje enviado para un nuevo chat
 $insert_message="INSERT INTO `mensajes` ( `id_remitente`, `id_destinatario`, `id_conversacion`, `mensaje`, `fecha`) VALUES ($id, $_SESSION[id_friend], $id_conversacion_new_chat, '$mensaje', current_timestamp())";
 $send_mensaje=$db->ejecutarConsulta($insert_message);

    }

}





//si hay un chat con mensajes
else{
    //insertar mensaje enviado
    $sql="INSERT INTO `mensajes` ( `id_remitente`, `id_destinatario`, `id_conversacion`, `mensaje`, `fecha`) VALUES ($id, $_SESSION[id_friend], $id_conversacion, '$mensaje', current_timestamp())";
    $enviar_mensaje=$db->ejecutarConsulta($sql);

}

    
    
}

?>