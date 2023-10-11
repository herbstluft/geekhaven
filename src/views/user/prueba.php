<?php
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database();


session_start();
$_SESSION['user'];

$sql="select * from personas inner join usuarios on personas.id_persona=usuarios.id_persona where id_usuario=$_SESSION[user];";
$datos =  $db->seleccionarDatos($sql);

foreach ($datos as $datos)
echo $datos['nombre'] . "\n";
echo $datos['apellido'] . "\n";
echo $datos['correo'] . "\n";
echo "id_usuario=" . $datos['id_usuario'] . "\n";
echo $datos['telefono'] . "\n";



 
?>