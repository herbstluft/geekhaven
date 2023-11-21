<?php

// Configurar encabezados para un archivo CSV
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=archivo.csv');

// Incluir la sesión y la conexión a la base de datos
session_start();
use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;

// Consulta SQL
$SQL = "SELECT * FROM productos INNER JOIN categorias ON categorias.id_cat=productos.id_cat inner join universo on productos.universo_id=universo.id_universo inner join tipo on tipo.id_tipo = productos.tipo_id   ORDER BY productos.nom_producto ASC ";
$con = $db->seleccionarDatos($SQL);

// Salida CSV
$delimiter = ",";
$newline = "\n";

// Imprimir encabezados
echo "Nombre del Producto{$delimiter}Categoría{$delimiter}Universo{$delimiter}Tipo{$delimiter}Precio publico{$delimiter}Precio de provedor{$delimiter}Existencia{$newline}";

// Imprimir filas de datos
if (!empty($con)) {
    foreach ($con as $fila) 
        // Imprimir datos en celdas con comillas dobles
        echo "\"{$fila['nom_producto']}\"{$delimiter}\"{$fila['nom_cat']} \"{$delimiter}\"{$fila['universo']} \"{$delimiter}\"{$fila['tipo']}  \"{$delimiter}\"\${$fila['precio']}\"{$delimiter}\"\${$fila['precio_base']} \"{$delimiter}\"{$fila['existencia']}\"{$newline}";
    
}
?>
