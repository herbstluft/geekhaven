<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;

if($_GET['categoria']){
    $categoria=$_GET['categoria'];
    $id=$_GET['id'];
}

$updateQry="UPDATE `categoria` SET `nom_cat`='$catgeoria' WHERE `id_cat`=$id";
$update=$db->ejecutarConsulta($updateQry);

header("Location:/geekhaven/src/views/admin/html/editUniverso.php");