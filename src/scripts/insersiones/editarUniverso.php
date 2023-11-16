<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;




    if (isset($_FILES['imagen']['name']) && isset($_POST['universo'])) {
        $nombre_archivo = uniqid() . '_' . basename($_FILES['imagen']['name']);
        $carpeta_destino = 'img_u/';
        $ruta_imagen = $carpeta_destino . $nombre_archivo;

        if (move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_imagen)) {
            // Inserta la ruta de la imagen en la base de datos
            $universo = $_POST['universo'];
            $id = $_POST['id'];
            $insertQry = "UPDATE`universo` SET `universo`='$universo', `img`='$ruta_imagen' WHERE id_universo='$id'";
            $insert = $db->ejecutarConsulta($insertQry);
            
            if ($insert === false) {
                die('Error al insertar datos en la base de datos.');
                
            }

            echo 'Imagen subida y guardada exitosamente.';
        } else {
            $universo = $_POST['universo'];
            $id = $_POST['id'];
            $insertQry = "UPDATE`universo` SET `universo`='$universo' WHERE id_universo='$id'";
        $insert = $db->ejecutarConsulta($insertQry);

        if ($insert === false) {
            die('Error al insertar el universo en la base de datos.');
        }
        echo 'edicion guardada exitosamente.';
        }
    } else {
        echo "Parámetros incorrectos en la solicitud.";
    }
 header("Location:/geekhaven/src/views/admin/html/editUniverso.php");