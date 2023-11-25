<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database;

if($_GET['categoria']){
    $categoria=$_GET['categoria'];
    $id=$_GET['id'];
}
// VALIDAR SI LA CATEGORIA INGRESADA YA EXISTE
$validacionQry="SELECT * from cetegoria where nom_cat='$categoria'";
$validacion=$db->seleccionarDatos($validacionQry);
if(!empty($validacion)){
    header("Location:/geekhaven/src/views/admin/html/editCategoria.php?mensaje=failed&cat=$categoria&id=$id");
}
else{
$updateQry="UPDATE `categoria` SET `nom_cat`='$catgeoria' WHERE `id_cat`=$id";
$update=$db->ejecutarConsulta($updateQry);
header("Location:/geekhaven/src/views/admin/html/editCategoria.php?mensaje=success&cat=$categoria&id=$id");
}
