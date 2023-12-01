<?php
use MyApp\data\Database;

require "../../../../vendor/autoload.php";

$db = new Database;

// Deshabilitar la visualización de errores
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);
error_reporting(0);

// Consulta de ingresos por el año (con protección contra inyección SQL)
$sqlVentasTotales = "SELECT 
    YEAR(detalle_orden.fecha_detalle) AS 'año',
    SUM(detalle_orden.cantidad * productos.precio) AS total
FROM 
    orden
    JOIN detalle_orden ON orden.id_orden = detalle_orden.id_orden
    JOIN productos ON detalle_orden.id_producto = productos.id_producto
GROUP BY 
    YEAR(detalle_orden.fecha_detalle);";

// Obtener datos de ventas totales
$ingresoPorAñoTotales = $db->seleccionarDatos($sqlVentasTotales);

// Consulta de ingresos por el año sin agrupar (con protección contra inyección SQL)
$sqlVentas = "SELECT 
    YEAR(detalle_orden.fecha_detalle) AS 'año',
    SUM(detalle_orden.cantidad * productos.precio) AS total
FROM 
    orden
    JOIN detalle_orden ON orden.id_orden = detalle_orden.id_orden
    JOIN productos ON detalle_orden.id_producto = productos.id_producto;";

// Obtener datos de ventas sin agrupar
$ingresoPorTotal = $db->seleccionarDatos($sqlVentas);

// Consulta de suma de costos de productos en inventario
$sqlCostos = "SELECT SUM(productos.existencia * productos.precio_base) AS 'costos'
FROM productos 
WHERE productos.existencia > 0;";

// Obtener suma de costos de productos en inventario
$costosEnInventario = $db->seleccionarDatos($sqlCostos);

// Obtener la fecha actual
$fechaActual = date("Y-m-d");
//----------------------------------------------------------------------

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];

    // Consulta de Ganancias Totales para la fecha seleccionada
    $sqlGananciasFecha = "SELECT 
        SUM(detalle_orden.cantidad * productos.precio) AS ganancias_totales
    FROM 
        detalle_orden
        JOIN orden ON detalle_orden.id_orden = orden.id_orden
        JOIN productos ON detalle_orden.id_producto = productos.id_producto
    WHERE 
        YEAR(detalle_orden.fecha_detalle) = :year
        AND MONTH(detalle_orden.fecha_detalle) = :month
        AND DAY(detalle_orden.fecha_detalle) = :day;";

    // Obtener los resultados de la consulta
    $gananciasFecha = $db->seleccionarDatos($sqlGananciasFecha, [
        ':year' => $year,
        ':month' => $month,
        ':day' => $day
    ]);
}
//----------------------------------------------------------------------

// Ganancias Totales en lo que va del año
$sqlGananciasAnio = "SELECT 
    SUM(detalle_orden.cantidad * productos.precio) AS ganancias_totales
FROM 
    detalle_orden
    JOIN orden ON detalle_orden.id_orden = orden.id_orden
    JOIN productos ON detalle_orden.id_producto = productos.id_producto
WHERE 
    YEAR(detalle_orden.fecha_detalle) = YEAR(CURRENT_DATE);";

// Ganancias Totales en lo que va del mes
$sqlGananciasMes = "SELECT 
    SUM(detalle_orden.cantidad * productos.precio) AS ganancias_totales
FROM 
    detalle_orden
    JOIN orden ON detalle_orden.id_orden = orden.id_orden
    JOIN productos ON detalle_orden.id_producto = productos.id_producto
WHERE 
    YEAR(detalle_orden.fecha_detalle) = YEAR(CURRENT_DATE)
    AND MONTH(detalle_orden.fecha_detalle) = MONTH(CURRENT_DATE);";

// Ganancias Totales en lo que va del día
$sqlGananciasDia = "SELECT 
    SUM(detalle_orden.cantidad * productos.precio) AS ganancias_totales
FROM 
    detalle_orden
    JOIN orden ON detalle_orden.id_orden = orden.id_orden
    JOIN productos ON detalle_orden.id_producto = productos.id_producto
WHERE 
    DATE(detalle_orden.fecha_detalle) = CURRENT_DATE;";

// Obtener los resultados de las consultas
$gananciasAnio = $db->seleccionarDatos($sqlGananciasAnio);
$gananciasMes = $db->seleccionarDatos($sqlGananciasMes);
$gananciasDia = $db->seleccionarDatos($sqlGananciasDia);
//----------------------------------------------------------------------

// Inicializa la variable para almacenar el resultado de la consulta
$resultado = null;

// Verifica si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtiene el nombre del producto desde el formulario
    $nombreProducto = $_POST["nombre_producto"];

    // Consulta SQL para obtener las ganancias del producto específico por nombre
    $sql = "SELECT 
        p.id_producto,
        p.nom_producto,
        p.precio,
        SUM(detalle_orden.cantidad * p.precio) AS ganancias_producto
    FROM 
        detalle_orden
        JOIN productos p ON detalle_orden.id_producto = p.id_producto
    WHERE 
        p.nom_producto = :nombreProducto;";

    // Ejecuta la consulta y guarda el resultado
    $resultado = $db->seleccionarDatos($sql, [
        ':nombreProducto' => $nombreProducto
    ]);
}
//----------------------------------------------------------------------
// Inicializar la variable $from_date
$from_date = "";

// Inicializar el arreglo de resultados
$resultadosBusqueda = [];

// Inicializar la variable de mensaje de error
$errorMessage = "";

// Procesar el formulario de búsqueda
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_date = $_POST["from_date"];

    // Validar que la fecha sea pasada
    if (strtotime($from_date) >= time()) {
        // La fecha no es pasada, establecer el mensaje de error
        $errorMessage = "La fecha debe ser pasada.";
    } else {
        // Consulta de ingresos por el día seleccionado
        $sqlVentasDiaSeleccionado = "SELECT 
            SUM(detalle_orden.cantidad * productos.precio) AS ganancias_totales
        FROM 
            detalle_orden
            JOIN orden ON detalle_orden.id_orden = orden.id_orden
            JOIN productos ON detalle_orden.id_producto = productos.id_producto
        WHERE 
            DATE(detalle_orden.fecha_detalle) = :from_date;";

        // Obtener los resultados de la consulta
        $resultadosBusqueda = $db->seleccionarDatos($sqlVentasDiaSeleccionado, [
            ':from_date' => $from_date
        ]);
    }
}
//----------------------------------------------------------------------

// Consulta de ventas por categoría (con protección contra inyección SQL)
            $sqlVentasPorCategoria = "SELECT 
                categorias.nom_cat AS 'categoria',
                SUM(detalle_orden.cantidad * productos.precio) AS total
            FROM 
                orden
                JOIN detalle_orden ON orden.id_orden = detalle_orden.id_orden
                JOIN productos ON detalle_orden.id_producto = productos.id_producto
                JOIN categorias ON productos.id_cat = categorias.id_cat
            GROUP BY 
                categorias.id_cat;";

            // Obtener datos de ventas por categoría
            $ventasPorCategoria = $db->seleccionarDatos($sqlVentasPorCategoria);

//----------------------------------------------------------------------
        // Consulta de Ventas por Cliente
        $sqlVentasPorCliente = "SELECT CONCAT(personas.nombre, ' ', personas.apellido) as 'Cliente', 
        SUM(detalle_orden.cantidad * productos.precio) AS 'Ventas Totales'
        FROM usuarios JOIN personas ON usuarios.id_persona = personas.id_persona 
        JOIN detalle_orden ON usuarios.id_usuario = detalle_orden.id_usuario 
        JOIN productos ON detalle_orden.id_producto = productos.id_producto 
        GROUP BY usuarios.id_usuario, personas.id_persona, personas.nombre, personas.apellido 
        ORDER BY 'Ventas Totales' DESC LIMIT 3;";

        // Obtener datos de Ventas por Cliente
        $ventasPorCliente = $db->seleccionarDatos($sqlVentasPorCliente);
//----------------------------------------------------------------------
?>

<!-- Resto del código HTML... -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ventas</title>
    <link rel="shortcut icon" type="image/png" href="../../views/admin/assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .report-chart {
            display: none;
        }

        .report-table {
            display: none;
        }
    </style>
</head>

<body>
<?php include('navbar.php') ?>
    <!-- Header End -->

    <br><br><br><br>
    <h1 align="center">Ventas</h1>

    <div class="container mt-5">
        <h5>Ventas Totales en General por año</h5>
        <button class="btn btn-primary" data-toggle="collapse" data-target="#ventasTotales">Mostrar</button>
        <div id="ventasTotales" class="collapse">
            <table class="table" id="uno">
                <thead>
                    <tr>
                        <th>Año</th>
                        <th>Total de ventas</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ingresoPorAñoTotales as $venta): ?>
                        <tr>
                            <td><?php echo $venta['año']; ?></td>
                            <td><?php echo '$' . number_format($venta['total'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Agrega un contenedor para el gráfico -->
            <center>
            <div class="report-chart" style="max-width: 500px;">
            <canvas style="width: 100%;" id="ventasTotalesChart"></canvas>
            </div>
            </center>

        </div><br>
        <br>
        <center> <button class="btn btn-success" onclick="exportToExcel('uno')">Descargar Excel</button> </center>

        <hr>

        <h5>Ventas Totales en General sin agrupar</h5>
        <button class="btn btn-primary" data-toggle="collapse" data-target="#ventasTotalesSinAgrupar">Mostrar</button>
        <div id="ventasTotalesSinAgrupar" class="collapse">
            <table class="table" id="dos">
                <thead>
                    <tr>
                        <th>Total de ventas</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($ingresoPorTotal as $venta): ?>
                        <tr>
                            <td><?php echo '$' . number_format($venta['total'], 2); ?></td>
                            <td><?php echo $fechaActual; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><br>
        <br>
        <center> <button class="btn btn-success" onclick="exportToExcel('dos')">Descargar Excel</button> </center>
        <hr>

        <h5>Suma de Costos de Productos en Inventario</h5>
        <button class="btn btn-primary" data-toggle="collapse" data-target="#costosProductos">Mostrar</button>
        <div id="costosProductos" class="collapse">
            <table class="table" id="tres">
                <thead>
                    <tr>
                        <th>Costos en Inventario</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($costosEnInventario as $costo): ?>
                        <tr>
                            <td><?php echo '$' . number_format($costo['costos'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <!-- Agrega un contenedor para el gráfico -->
        </div><br><br>

        <center> <button class="btn btn-success" onclick="exportToExcel('tres')">Descargar Excel</button> </center>
        <hr>

        <h5>Ganancias por Fecha</h5>

     

    <!-- Formulario Bootstrap para seleccionar la fecha -->
    <div class="container mt-5">
        <!-- ... (código existente) ... -->

        <form action="" method="POST">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b>Del Dia</b></label>
                        <input type="date" name="from_date" class="form-control" value="<?php echo $from_date; ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label><b></b></label> <br>
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </div>

                <!-- Mostrar mensaje de error si existe -->
                <?php if (!empty($errorMessage)) : ?>
                    <div class="alert alert-danger mt-4" role="alert">
                        <?php echo $errorMessage; ?>
                    </div>
                <?php endif; ?>

                <!-- Mostrar ganancias si el formulario ha sido enviado y la fecha es pasada -->
                <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($errorMessage) && !empty($resultadosBusqueda)) : ?>
                    <h6 class="mt-4">Ganancias para el día seleccionado (<?php echo $from_date; ?>)</h6>
                    <p><?php echo '$' . number_format($resultadosBusqueda[0]['ganancias_totales'], 2); ?></p>
                <?php endif; ?>

            </div>
            <br>
        </form>
    </div>

        <hr>
    
        
        <h5>Ganancias del Producto</h5>

<!-- Formulario Bootstrap para ingresar el nombre del producto -->
<form method="post" action="" id="id">
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="nombre_producto">Nombre del Producto:</label>
            <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" required>
        </div>
        <div class="form-group col-md-2">
            <label for="submitBtn" class="invisible">Consultar Ganancias</label>
            <button type="submit" id="submitBtn" class="btn btn-primary btn-block mt-4">Consultar Ganancias</button>
        </div>
    </div>
</form>
<br>

<!-- Mostrar resultados si la consulta ha sido realizada -->
<?php if ($resultado) : ?>
    <h6 class="mt-4">Resultados para el producto seleccionado (<?php echo $resultado[0]['nom_producto']; ?>)</h6>
    <table class="table">
        <thead>
            <tr>
                <th>ID del Producto</th>
                <th>Nombre del Producto</th>
                <th>Precio del Producto</th>
                <th>Ganancias Totales</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
                <td><?php echo $resultado[0]['nom_producto']; ?></td>
                <td>$<?php echo number_format($resultado[0]['precio'], 2); ?></td>
                <td>$<?php echo number_format($resultado[0]['ganancias_producto'], 2); ?></td>
            </tr>
        </tbody>
    </table>
<?php endif; ?>
      <hr>
        <h5>Ventas por Categoría</h5>
<button class="btn btn-primary" data-toggle="collapse" data-target="#ventasPorCategoria">Mostrar</button>
<div id="ventasPorCategoria" class="collapse">
    <table class="table" id="cuatro">
        <thead>
            <tr>
                <th>Categoría</th>
                <th>Total de Ventas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ventasPorCategoria as $venta): ?>
                <tr>
                    <td><?php echo $venta['categoria']; ?></td>
                    <td><?php echo '$' . number_format($venta['total'], 2); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  
    </div> 

    <!-- Agrega un contenedor para el gráfico -->
    <hr>

<h5>Ventas por Cliente</h5>
<button class="btn btn-primary" data-toggle="collapse" data-target="#ventasPorCliente">Mostrar</button>
<div id="ventasPorCliente" class="collapse">
<table class="table" id="cuatro">
<thead>
<tr>
 
    <th>Nombre del Cliente</th>
    <th>Total de Ventas</th>
</tr>
</thead>
<tbody>
<?php foreach ($ventasPorCliente as $venta): ?>
    <tr>
        
        <td><?php echo $venta['Cliente']; ?></td>
        <td><?php echo '$' . number_format($venta['Ventas Totales'], 2); ?></td>
    </tr>
<?php endforeach; ?>
</tbody>
</table>
<br><br>
</div>
</div>


   


    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function () {
            // Ocultar la tabla al cargar la página
            $('#gananciasTable').hide();

            // Manejar clic en el botón para mostrar/ocultar la tabla
            $('#toggleTableBtn').click(function () {
                $('#gananciasTable').toggle();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            // ... (código existente) ...

            // Mostrar gráfico al hacer clic en el botón "Mostrar"
            $('#ventasTotales').on('shown.bs.collapse', function () {
                // Obtener datos para el gráfico
                var years = <?php echo json_encode(array_column($ingresoPorAñoTotales, 'año')); ?>;
                var totals = <?php echo json_encode(array_column($ingresoPorAñoTotales, 'total')); ?>;

                // Configurar y mostrar el gráfico de barras
                var ctx = document.getElementById('ventasTotalesChart').getContext('2d');
                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: years,
                        datasets: [{
                            label: 'Ventas Totales por Año',
                            data: totals,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                // Mostrar el contenedor del gráfico
                $('.report-chart').show();
            });
        });
    </script>
    <script>
    function exportToExcel(tableId) {
        var tab_text = '<html xmlns:x="urn:schemas-microsoft-com:office:excel">';
        tab_text = tab_text + '<head><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet>';

        tab_text = tab_text + '<x:Name>Sheet1</x:Name>';

        tab_text = tab_text + '<x:WorksheetOptions><x:Panes></x:Panes></x:WorksheetOptions></x:ExcelWorksheet>';
        tab_text = tab_text + '</x:ExcelWorksheets></x:ExcelWorkbook></xml></head><body>';

        tab_text = tab_text + "<table border='1px'>";
        var exportTable = document.getElementById(tableId);
        var tab = exportTable.cloneNode(true);
        tab_text = tab_text + tab.outerHTML;
        tab_text = tab_text + '</table></body></html>';

        var data_type = 'data:application/vnd.ms-excel';

        var ua = window.navigator.userAgent;
        var msieEdge = ua.indexOf("Edge");

        // Si es Edge o Internet Explorer
        if (msieEdge > 0 || !!navigator.userAgent.match(/Trident.*rv\:11\./)) {
            var blob = new Blob([tab_text], {
                type: data_type
            });
            window.navigator.msSaveBlob(blob, 'reporte.xls');
        } else {
            var blob2 = new Blob([tab_text], {
                type: data_type
            });
            var filename = 'reporte.xls';
            var elem = window.document.createElement('a');
            elem.href = window.URL.createObjectURL(blob2);
            elem.download = filename;
            document.body.appendChild(elem);
            elem.click();
            document.body.removeChild(elem);
        }
    }
</script>

</body>

</html>