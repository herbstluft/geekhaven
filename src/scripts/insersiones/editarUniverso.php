<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;

if($_GET['id']){
    $id=$_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['imagen']['name']) && isset($_POST['universo'])) {
        $nombre_archivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
        $carpeta_destino = 'img_u/';
        $ruta_imagen = $carpeta_destino . $nombre_archivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
            // Inserta la ruta de la imagen en la base de datos
            $universo = $_POST['universo'];
            $insertQry = "INSERT INTO `universo`(`universo`, `img`) VALUES ('$universo','$ruta_imagen')";
            $insert = $db->ejecutarConsulta($insertQry);

            if ($insert === false) {
                die('Error al insertar datos en la base de datos.');
            }

            echo 'Imagen subida y guardada exitosamente.';
        } else {
            die('Error al mover la imagen al servidor.');
        }
    } else {
        echo "Parámetros incorrectos en la solicitud.";
    }
} else {
    echo "Acceso no permitido.";
}

