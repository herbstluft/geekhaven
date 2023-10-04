<?php
// Verifica si se ha recibido una solicitud POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibe el valor del campo oculto 'id_categoria' enviado desde la solicitud AJAX
    $idCategoria = $_POST["id_categoria"];
    
    // Realiza alguna acción o procesamiento con el valor recibido
    // Por ejemplo, puedes mostrarlo o usarlo en una consulta a la base de datos
    echo "Valor de id_categoria recibido: " . $idCategoria;
    
    // Puedes realizar otras acciones aquí según tus necesidades
} else {
    // Si no se ha recibido una solicitud POST, muestra un mensaje de error
    echo "Error: No se ha recibido una solicitud POST.";
}
?>
