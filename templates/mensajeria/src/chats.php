
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
//Ver todas mis conversaciones con un case para sacar el nombre de la persona con la que hablo
$sql="SELECT
    c.id_conversacion,
    CASE
        WHEN u1.id_usuario = $id THEN p2.nombre
        WHEN u2.id_usuario = $id THEN p1.nombre
    END AS nombre,
    CASE
        WHEN u1.id_usuario = $id THEN u2.imagen
        WHEN u2.id_usuario = $id THEN u1.imagen
    END AS imagen,
    CASE
        WHEN u1.id_usuario = $id THEN u2.estado
        WHEN u2.id_usuario = $id THEN u1.estado
    END AS estado,
    m.mensaje AS ultimo_mensaje,
    m.fecha AS hora_ultimo_mensaje,
    CASE
        WHEN u1.id_usuario = $id THEN u2.id_usuario
        WHEN u2.id_usuario = $id THEN u1.id_usuario
    END AS id_amigo,
    m.id_remitente AS id_persona_ultimo_mensaje  -- Agregado para mostrar el ID de la persona que envió el último mensaje
FROM
    conversaciones c
INNER JOIN
    usuarios u1 ON c.id_usuario1 = u1.id_usuario
INNER JOIN
    usuarios u2 ON c.id_usuario2 = u2.id_usuario
INNER JOIN
    personas p1 ON u1.id_persona = p1.id_persona
INNER JOIN
    personas p2 ON u2.id_persona = p2.id_persona
LEFT JOIN
    (
        SELECT
            m1.id_conversacion,
            m1.mensaje,
            m1.fecha,
            m1.id_remitente  -- Agregado para obtener el ID de la persona que envió el mensaje
        FROM
            mensajes m1
        WHERE
            (m1.fecha,  m1.id_mensaje) = (
                SELECT
                    MAX(m2.fecha), MAX(m2.id_mensaje)
                FROM
                    mensajes m2
                WHERE
                    m2.id_conversacion = m1.id_conversacion
            )
    ) AS m ON c.id_conversacion = m.id_conversacion
WHERE
    u1.id_usuario = $id  OR u2.id_usuario = $id ORDER BY hora_ultimo_mensaje DESC;;
";



$ver_mis_chats=$db->seleccionarDatos($sql);

// Definir una variable para almacenar los chats
$mi_chats = '';

foreach ($ver_mis_chats as $michats) {
    $id_amigo = $michats['id_amigo'];
    $nombrechat = $michats['nombre'];
    $imagenchat = $michats['imagen'];
    $ultimo_mensaje = $michats['hora_ultimo_mensaje'];
    // Convierte la cadena en un objeto DateTime
$fecha = new DateTime($ultimo_mensaje);
// Formatea la fecha y hora
$hora_ultimo_mensaje = $fecha->format('m/d h:i A');



    $ultimo_mensaje = $michats['ultimo_mensaje'];
    $id_persona_ultimo_mensaje=$michats['id_persona_ultimo_mensaje'];
    $conectado = $michats['estado']; // Suponiendo que 'conectado' indica si el usuario está conectado

    // Inicio del contenedor del chat
    $mi_chats .= '<div class="chat-container">';

    // Verificar si el usuario está conectado y mostrar la bolita verde
    if ($conectado == 1) {
        $mi_chats .= '<div class="status-dot"></div>';
    }
    else{
        $mi_chats .= '<div class="status-not"></div>';
    }

    // Imagen del perfil
    if (isset($_SESSION['user']) && $id == $_SESSION['user']) {
        $mi_chats .= '<img class="profile-image" src="/geekhaven/src/views/admin/html/img_profile/' . $imagenchat . '" alt="Perfil Chat 1">';
    } elseif (isset($_SESSION['admin']) && $id == $_SESSION['admin']) {
        $mi_chats .= '<img class="profile-image" src="/geekhaven/src/views/user/img_profile/' . $imagenchat . '" alt="Perfil Chat 1">';
    }
    
    
    // Contenido del chat
    $mi_chats .= '<div class="chat-content text-truncate"> ';
    $mi_chats .= '<div class="chat-header">';

    $mi_chats .= '<a style="text-decoration:none" href="conversacion.php?id_friend=' . urlencode($id_amigo) . '"><h2 class="text-truncate" id="nombrechat">' . $nombrechat . '</h2> </a>';
  
    $mi_chats .= '<div style="font-size: 12px;color: #c1c1c1; margin-top: -1%;">' . $hora_ultimo_mensaje . '</div>';
    $mi_chats .= '</div>';
    $mi_chats .= '<div class="text-truncate" id="mensajechat">';
    
    if (empty($ultimo_mensaje)) {
        $mi_chats .= "¡Unidos y conectados!";
    } else {
        //comprobar de quien fue el ultimo mensaje enviado
        if ($id_persona_ultimo_mensaje == $id_amigo) {
            $mi_chats .= '<b> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#0a85f0" class="bi bi-chat-square-text-fill" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2h-2.5a1 1 0 0 0-.8.4l-1.9 2.533a1 1 0 0 1-1.6 0L5.3 12.4a1 1 0 0 0-.8-.4H2a2 2 0 0 1-2-2V2zm3.5 1a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h9a.5.5 0 0 0 0-1h-9zm0 2.5a.5.5 0 0 0 0 1h5a.5.5 0 0 0 0-1h-5z"/>
          </svg> </b>' .  $ultimo_mensaje;
        } else {
            $mi_chats .= '<b style="color:#0a85f0"> Tú: </b>' . $ultimo_mensaje;
        }
        
    }
    
    $mi_chats .= '</div>';
    $mi_chats .= '</div>';

    // Fin del contenedor del chat
    $mi_chats .= '</div>';
}

// Devolver el contenido HTML como respuesta
echo $mi_chats;



?>
