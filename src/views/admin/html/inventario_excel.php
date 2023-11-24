<?php

// Configurar encabezados para un archivo CSV
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename=archivo.csv');


// Incluir la sesión y la conexión a la base de datos
session_start();
use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;


// Salida CSV
$delimiter = ",";
$newline = "\n";

// Imprimir encabezados
echo "Nombre del Producto{$delimiter}Categoría{$delimiter}Universo{$delimiter}Tipo{$delimiter}Precio publico{$delimiter}Precio de provedor{$delimiter}Existencia{$newline}";

// Imprimir filas de datos
$nom_productos = $_POST['nom_producto'];
$nom_cats = $_POST['nom_cat'];
$universos = $_POST['universo'];
$tipos = $_POST['tipo'];
$precios = $_POST['precio'];
$precios_base = $_POST['precio_base'];
$existencias = $_POST['existencia'];

// Iterar sobre cada conjunto de valores
for ($i = 0; $i < count($nom_productos); $i++) {
    $nom_producto = $nom_productos[$i];
    $nom_cat = $nom_cats[$i];
    $universo = $universos[$i];
    $tipo = $tipos[$i];
    $precio = $precios[$i];
    $precio_base = $precios_base[$i];
    $existencia = $existencias[$i];

    // Procesar cada conjunto de valores según sea necesario
    echo "\"{$nom_producto}\"{$delimiter}\"{$nom_cat}\"{$delimiter}\"{$universo}\"{$delimiter}\"{$tipo}\"{$delimiter}\"\${$precio}\"{$delimiter}\"\${$precio_base}\"{$delimiter}\"{$existencia}\"{$newline}";
}
?>

