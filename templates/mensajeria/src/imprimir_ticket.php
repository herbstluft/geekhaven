<?php
session_start();
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();


if(isset($_GET['id_publicacion']))
{
    //guardar el id de la publicacion
$id_publicacion=$_GET['id_publicacion'];

//hacer una consulta para saber todo de la publicacion y quien la publico
$sql="select id_pub, titulo, precio, descripcion, pub_trq.estado as 'estado_producto', estatus as 'estado_de_venta', usuarios.id_usuario, personas.nombre, personas.apellido from pub_trq INNER JOIN usuarios on usuarios.id_usuario=pub_trq.id_usuario inner join personas on personas.id_persona=usuarios.id_persona where id_pub=$id_publicacion and pub_trq.estatus=1";
$info_publicacion=$db->seleccionarDatos($sql);

//Datos de la publicacion
foreach($info_publicacion as $info_pub){
$publicacion_id=$info_pub['id_pub'];
$publicacion_nombre=$info_pub['nombre'];
$publicacion_precio=$info_pub['precio'];
$publicacion_descripcion=$info_pub['descripcion'];
$publicacion_estado_del_producto=$info_pub['estado_producto'];
$publicacion_estado_de_venta=$info_pub['estado_de_venta'];
$nombre_del_vendedor=$info_pub['nombre'].' '.$info_pub['apellido'];
$publicacion_id_usuario_vendedor=$info_pub['id_usuario'];
}

echo $publicacion_id;
echo $publicacion_nombre;
echo $publicacion_precio;
echo $publicacion_descripcion;
echo $publicacion_estado_del_producto;
echo $publicacion_estado_de_venta;
echo $nombre_del_vendedor;
echo $publicacion_id_usuario_vendedor;


}


?>