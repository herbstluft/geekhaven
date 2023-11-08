<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;

if($_GET['id']){
    $id=$_GET['id'];
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    
    if (isset($_GET['imagen'])) {
        $universo=$_GET['universo'];
        $imagenBase64 = $_GET['imagen'];

        // Decodificar la imagen Base64
        $imagenBinaria = base64_decode($imagenBase64);

        // Ruta donde guardar la imagen
        $carpeta_destino = 'img_u/';

        // Genera un nombre único para la imagen
        $nombre_archivo = uniqid() . '.jpg';

        // Ruta completa de la imagen
        $ruta_imagen = $carpeta_destino . $nombre_archivo;

        // Guardar la imagen en el servidor
        file_put_contents($ruta_imagen, $imagenBinaria);

        // Inserta el nombre de la imagen en la base de datos junto con otros datos
        // Aquí debes agregar código para insertar en la base de datos, por ejemplo, utilizando SQL
        $updateQry="UPDATE `universo` SET `universo`='$universo',`img`='$ruta_imagen' WHERE `id_universo`=$id";
        $update=$db->ejecutarConsulta($updateQry);
    }else if(isset($_GET['universo'])){
        $universo=$_GET['universo'];
        $updateUniversoQry="UPDATE `universo` SET `universo`='$universo' WHERE `id_universo`=$id";
        $updateUniverso=$db->ejecutarConsulta($updateUniversoQry);
    }else{
        echo "parametros incorrectos en la URL";
    }
} else {
    echo "Acceso no permitido.";
}


header("Location:/geekhaven/src/views/admin/html/editUniverso.php");