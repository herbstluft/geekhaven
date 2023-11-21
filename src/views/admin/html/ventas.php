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
    // Obtiene el ID del producto desde el formulario
    $idProducto = $_POST["id_producto"];

    // Consulta SQL para obtener las ganancias del producto específico
    $sql = "SELECT 
                p.id_producto,
                p.nom_producto,
                p.precio,
                SUM(detalle_orden.cantidad * p.precio) AS ganancias_producto
            FROM 
                detalle_orden
                JOIN productos p ON detalle_orden.id_producto = p.id_producto
            WHERE 
                p.id_producto = :idProducto;";

    // Ejecuta la consulta y guarda el resultado
    $resultado = $db->seleccionarDatos($sql, [
        ':idProducto' => $idProducto
    ]);
}


//----------------------------------------------------------------------

?>
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
               <div class="report-chart">
                <canvas id="ventasTotalesChart"></canvas>
            </div>
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
        <form method="post" action="">
            <div class="form-row">
                <div class="form-group col-md-1">
                    <label for="year">Año:</label>
                    <input type="number" class="form-control" name="year" id="year" required>
                </div>

                <div class="form-group col-md-1">
                    <label for="month">Mes:</label>
                    <input type="number" class="form-control" name="month" id="month" min="1" max="12" required>
                </div>

                <div class="form-group col-md-1">
                    <label for="day">Día:</label>
                    <input type="number" class="form-control" name="day" id="day" min="1" max="31" required>
                </div>

                <div class="form-group col-md-3">
                    <label for="submitBtn" class="invisible">Consultar Ganancias</label>
                    <button type="submit" id="submitBtn" class="btn btn-primary btn-block mt-4">Consultar Ganancias</button>
                </div>
            </div>
        </form>

        <!-- Mostrar ganancias si el formulario ha sido enviado -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($gananciasFecha)) : ?>
            <h6 class="mt-4">Ganancias para la fecha seleccionada</h6>
            <p><?php echo '$' . number_format($gananciasFecha[0]['ganancias_totales'], 2); ?></p>
        <?php endif; ?>
        <hr>
        <h5>Ganancias</h5>

        <button class="btn btn-primary mb-3" id="toggleTableBtn">Mostrar/Esconder Tabla</button>

        <table class="table" id="gananciasTable">
            <thead>
                <tr>
                    <th scope="col">Periodo</th>
                    <th scope="col">Ganancias Totales</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">Año</th>
                    <td><?php echo '$' . number_format($gananciasAnio[0]['ganancias_totales'], 2); ?></td>
                </tr>
                <tr>
                    <th scope="row">Mes</th>
                    <td><?php echo '$' . number_format($gananciasMes[0]['ganancias_totales'], 2); ?></td>
                </tr>
                <tr>
                    <th scope="row">Día</th>
                    <td><?php echo '$' . number_format($gananciasDia[0]['ganancias_totales'], 2); ?></td>
                </tr>
            </tbody>
        </table>
        <br>
       <center> <button class="btn btn-success" onclick="exportToExcel('gananciasTable')">Descargar Excel</button> </center>
        
        <hr>
        <h4>Ganancias del Producto</h4>

        <!-- Formulario Bootstrap para ingresar el ID del producto -->
        <form method="post" action="" id="id">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="id_producto">ID del Producto:</label>
                    <input type="number" class="form-control" name="id_producto" id="id_producto" required>
                </div>
                <div class="form-group col-md-2">
                    <label for="submitBtn" class="invisible">Consultar Ganancias</label>
                    <button type="submit" id="submitBtn" class="btn btn-primary btn-block mt-4">Consultar Ganancias</button>
                </div>
            </div>
        </form>
        <br>
       
        
        

        <!-- Mostrar las ganancias si el formulario ha sido enviado -->
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST" && $resultado) : ?>
          <hr>
            <h5>Ganancias del Producto</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID del Producto</th>
                        <th>Nombre del Producto</th>
                        <th>Precio del Producto</th>
                        <th>Ganancias del Producto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($resultado as $row) : ?>
                        <tr>
                            <td><?php echo $row['id_producto']; ?></td>
                            <td><?php echo $row['nom_producto']; ?></td>
                            <td><?php echo '$' . number_format($row['precio'], 2); ?></td>
                            <td><?php echo '$' . number_format($row['ganancias_producto'], 2); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
  
     
   
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
