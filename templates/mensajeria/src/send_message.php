
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




    $sql = "SELECT id_conversacion
        FROM conversaciones
        WHERE (id_usuario1 = $id AND id_usuario2 = $_SESSION[id_friend] AND id_pub = $_SESSION[pub_id])
           OR (id_usuario1 = $_SESSION[id_friend] AND id_usuario2 = $id AND id_pub = $_SESSION[pub_id])";

$id_conversacion = $db->seleccionarDatos($sql); // Suponiendo que esto te devuelve un solo valor.


if (!empty($id_conversacion)) {
    // El chat existe, entonces puedes insertar el mensaje en ese chat.
    $sql = "INSERT INTO mensajes (id_remitente, id_destinatario, id_conversacion, mensaje, fecha)
            VALUES ($id, $_SESSION[id_friend], $id_conversacion, '$mensaje', current_timestamp())";
    $enviar_mensaje = $db->ejecutarConsulta($sql);
} else {
    // El chat no existe, primero debes crearlo y luego insertar el mensaje.
    $sql_insert_new_chat = "INSERT INTO conversaciones (id_usuario1, id_usuario2, id_pub)
                            VALUES ($id, $_SESSION[id_friend], $_SESSION[pub_id])";
    $insert_chat = $db->ejecutarConsulta($sql_insert_new_chat);

    // Después de crear el chat, obtén el ID del chat recién creado.
    $sql_id_conversacion = "SELECT id_conversacion
                            FROM conversaciones
                            WHERE (id_usuario1 = $id AND id_usuario2 = $_SESSION[id_friend] AND id_pub = $_SESSION[pub_id])
                               OR (id_usuario1 = $_SESSION[id_friend] AND id_usuario2 = $id AND id_pub = $_SESSION[pub_id])";
    
    $id_conversacion_new_chat = $db->seleccionarDatos($sql_id_conversacion);

    // Inserta el mensaje en el chat recién creado.
    $insert_message = "INSERT INTO mensajes (id_remitente, id_destinatario, id_conversacion, mensaje, fecha)
                     VALUES ($id, $_SESSION[id_friend], $id_conversacion_new_chat, '$mensaje', current_timestamp())";
    $send_mensaje = $db->ejecutarConsulta($insert_message);
}

}


?>