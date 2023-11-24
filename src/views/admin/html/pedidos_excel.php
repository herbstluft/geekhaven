<?php

// Configurar encabezados para un archivo CSV
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=archivo.csv');

// Incluir la sesión y la conexión a la base de datos
session_start();
use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;

$delimiter = ",";
$newline = "\n";

// Consulta a la base de datos
$pedidosPendientesQry = "SELECT productos.nom_producto, orden.fecha as fecha, month(orden.fecha) as mes, day(orden.fecha) as dia, detalle_orden.id_orden, SUM(detalle_orden.cantidad) as 'cant', usuarios.telefono, CONCAT(personas.nombre, personas.apellido) AS 'nombre', personas.correo 
    FROM personas
    JOIN usuarios ON personas.id_persona = usuarios.id_persona 
    JOIN detalle_orden ON usuarios.id_usuario = detalle_orden.id_usuario 
    JOIN productos ON detalle_orden.id_producto = productos.id_producto
    JOIN categorias ON productos.id_cat = categorias.id_cat 
    JOIN orden ON orden.id_orden = detalle_orden.id_orden 
    WHERE detalle_orden.estatus = 1  
    GROUP BY detalle_orden.id_orden";

$pedidosPendientes = $db->seleccionarDatos($pedidosPendientesQry);

// Imprimir encabezados
echo "Estado{$delimiter}ID orden{$delimiter}Fecha y hora{$delimiter}Telefono{$delimiter}Mail{$delimiter}Nombre{$delimiter}Cantidad{$newline}";

// Iterar sobre los resultados y generar salida CSV
foreach ($pedidosPendientes as $res) {
    $id_orden = $res['id_orden'];
    $cantidad = $res['cant'];
    $tel = $res['telefono'];
    $nom_u = $res['nombre'];
    $correo = $res['correo'];
    $fecha = $res['fecha'];

    // Calcular la diferencia en días entre la fecha actual y la fecha del pedido
    $fechaPedido = strtotime($fecha);
    $fechaActual = time();
    $diferenciaDias = floor(($fechaActual - $fechaPedido) / (60 * 60 * 24));

    // Determinar el estado
    $estado = ($diferenciaDias > 15) ? "Excedido" : "En curso";

    // Imprimir datos en formato CSV con el estado
    echo "\"{$estado}\"{$delimiter}\"{$id_orden}\"{$delimiter}\"{$fecha}\"{$delimiter}\"{$tel}\"{$delimiter}\"{$correo}\"{$delimiter}\"{$nom_u}\"{$delimiter}\"{$cantidad}\"{$newline}";
}
?>
