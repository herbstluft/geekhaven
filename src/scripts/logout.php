<?php
use MyApp\data\Database;
require("../../vendor/autoload.php");
$db = new Database();

session_start();
$id=$_SESSION['id'];
$sql="UPDATE usuarios SET estado = 0 WHERE id_usuario = $id;";
$db->ejecutarConsulta($sql);


session_destroy();
header("Location: ../../views-index/login.php");
exit();
?>