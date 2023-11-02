<?php
session_start();
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();

//id_usuario activo
if(isset($_SESSION['admin'])){
    $id = $_SESSION['admin'];
}
if(isset($_SESSION['user'])){
    $id = $_SESSION['user'];
}

if(isset($_POST['mensaje'])) {
    $mensaje = $_POST['mensaje'];

    // Obtener el ID del amigo
    if (isset($_SESSION['id_friend'])) {
        $id_friend = $_SESSION['id_friend'];
    } elseif (isset($_GET['id_usuario'])) {
        $id_friend = $_GET['id_usuario'];
    } else {
        // Manejar el caso en el que no se proporciona un ID de amigo válido
        // Puedes mostrar un mensaje de error o realizar otra acción adecuada.
        echo "Error: ID de amigo no válido.";
        exit; // O puedes redirigir o realizar otra acción apropiada.
    }

    // Consulta SQL para verificar si existe un chat
    $sql = "SELECT id_conversacion
        FROM conversaciones
        WHERE (id_usuario1 = $id AND id_usuario2 = $id_friend AND id_pub = {$_SESSION['pub_id']})
           OR (id_usuario1 = $id_friend AND id_usuario2 = $id AND id_pub = {$_SESSION['pub_id']})";

    $id_conversacion = $db->seleccionarDatos($sql);

    if (!empty($id_conversacion)) {
        // El chat existe, puedes insertar el mensaje en ese chat.
        $sql = "INSERT INTO mensajes (id_remitente, id_destinatario, id_conversacion, mensaje, fecha)
                VALUES ($id, $id_friend, {$id_conversacion[0]['id_conversacion']}, '$mensaje', current_timestamp())";
        $enviar_mensaje = $db->ejecutarConsulta($sql);
    } else {
        // El chat no existe, primero debes crearlo y luego insertar el mensaje.
        $sql_insert_new_chat = "INSERT INTO conversaciones (id_usuario1, id_usuario2, id_pub)
                            VALUES ($id, $id_friend, {$_SESSION['pub_id']})";
        $insert_chat = $db->ejecutarConsulta($sql_insert_new_chat);


        // Después de crear el chat, obtén el ID del chat recién creado.
        $sql_id_conversacion = "SELECT id_conversacion
                            FROM conversaciones
                            WHERE (id_usuario1 = $id AND id_usuario2 = $id_friend AND id_pub = {$_SESSION['pub_id']})
                               OR (id_usuario1 = $id_friend AND id_usuario2 = $id AND id_pub = {$_SESSION['pub_id']})";
    
        $id_conversacion_new_chat = $db->seleccionarDatos($sql_id_conversacion);

        // Inserta el mensaje en el chat recién creado.
        $insert_message = "INSERT INTO mensajes (id_remitente, id_destinatario, id_conversacion, mensaje, fecha)
                     VALUES ($id, $id_friend, {$id_conversacion_new_chat[0]['id_conversacion']}, '$mensaje', current_timestamp())";
        $send_mensaje = $db->ejecutarConsulta($insert_message);


        //Insertar la conversacion a la que pertenece el chat de la publicacion en la tabla pub_trq
        $sql="UPDATE `pub_trq` SET `id_conversacion` = {$id_conversacion_new_chat[0]['id_conversacion']}  WHERE `pub_trq`.`id_pub` = {$_SESSION['pub_id']};";
        $insert_id_con_pub_trq=$db->ejecutarConsulta($sql);
    }
}
?>
