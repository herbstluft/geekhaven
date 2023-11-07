<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;

if($_GET['universo']){
    $universo=$_GET['universo'];
    $id=$_GET['id'];
}

$updateQry="UPDATE `universo` SET `universo`='$universo' WHERE `id_universo`=$id";
$update=$db->ejecutarConsulta($updateQry);

header("Location:/geekhaven/src/views/admin/html/editUniverso.php");