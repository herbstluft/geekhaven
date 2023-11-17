<?php
use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
    <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />
    <style>
        /* Estilos adicionales para centrar y ajustar el tamaño de los botones */
        .center-buttons {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .button-container {
            text-align: center;
        }

        .btn-container {
            margin-top: 20px; /* Ajustar el espacio entre los botones */
        }

        .btn-lg {
            margin-right: 10px; /* Ajustar el espacio entre los botones */
            padding: 15px 30px;
            font-size: 18px;
        }
    </style>
</head>

<body>

    <?php include('navbar.php') ?>
    

    <div class="container-fluid">
        <!-- Contenedor centralizado para los botones -->
        <div class="row center-buttons">
            <div class="col-12 button-container">
                <!-- Contenedor adicional para ajustar el espacio entre los botones -->
                <div class="btn-container">
                    <!-- Botón para agregar existencia -->
                    <a href="/geekhaven/src/views/admin/html/agregar_existencia.php" class="btn btn-primary btn-lg">Agregar Existencia</a>

                    <!-- Botón para agregar producto -->
                    <a href="/geekhaven/src/views/admin/html/agregar_producto.php" class="btn btn-success btn-lg">Agregar Producto</a>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/sidebarmenu.js"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="assets/js/dashboard.js"></script>
</body>

</html>
