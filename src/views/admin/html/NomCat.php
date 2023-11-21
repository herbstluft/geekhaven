<?php
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;

    $mensajeExito = '';

    // Verificar si se ha enviado un ID de categoría para editar
    if (isset($_GET['id'])) {
        $idCategoria = $_GET['id'];
        $categoria = $db->seleccionarDatos("SELECT * FROM categorias WHERE id_cat = :id", array(':id' => $idCategoria));

        // Procesar la actualización del nombre de la categoría
        if (isset($_GET['nuevoNombre'])) {
            $nuevoNombre = $_GET['nuevoNombre'];
            $db->ejecutarConsulta("UPDATE categorias SET nom_cat = :nuevoNombre WHERE id_cat = :id", array(':nuevoNombre' => $nuevoNombre, ':id' => $idCategoria));

            // Mensaje de éxito
            $mensajeExito = '¡Nombre de categoría actualizado exitosamente!';
        }
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Editar Categoría</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <!-- Agregado el enlace al CSS de Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
    <link href="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>
</head>

<body>
<?php include('navbar.php') ?>
    <div class="container-fluid">
        <h1>Editar Categoría</h1>

        <?php
            if (isset($categoria)) {
                // Mostrar el formulario de edición
        ?>
                <form action="" method="GET">
                    <input type="hidden" name="id" value="<?php echo $idCategoria; ?>">
                    <div class="form-group">
                        <label for="nuevoNombre">Nuevo Nombre:</label>
                        <input type="text" class="form-control" name="nuevoNombre" value="<?php echo $categoria[0]['nom_cat']; ?>" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </form>
                <br>   <br>
        <?php
        if (!empty($mensajeExito)) {
            // Mostrar el mensaje de éxito con estilos de Bootstrap
            echo '<div class="alert alert-success" role="alert">' . $mensajeExito . '</div>';
        }
            } else {
                // Mostrar un mensaje de error o redireccionar si no se proporciona un ID de categoría válido
                echo "<p class='text-danger'>Error: No se proporcionó un ID de categoría válido.</p>";
            }
        ?>
    </div>

    <!-- Agregado el enlace al JS de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script>
        // Aquí deberías tener una tabla con el ID "tabla" en tu HTML
        var tabla = document.querySelector("#tabla");
        var dataTable = new DataTable(tabla, {
            perPage: 15,
            perPageSelect: [15, 20, 15, 30, 35, 40]
        });
    </script>
</body>

</html>
