<?php
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();


$sql = "SELECT * from categorias";

$categorias=$db->seleccionarDatos($sql);


?>
<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<?php
include('../../../templates/navbar/navbar.php');
?>

  <header>
    <!-- place navbar here -->
  </header>
  <main>
  <style>

            a{
            color: #333;
            }
            a:hover {
              color: #FF0000; /* Rojo (#FF0000) cuando se pasa el mouse */
            }
        .formulario {
            border: 2px solid #ccc;
            padding: 20px;
            border-radius: 10px;
            max-width: 400px;
            max-height: ;
            margin: 0 auto;
            background: #F4F4F4;
        }

            #nombre {
                margin-right: 10px; /* Agrega espacio a la derecha del campo "nombre" */
            }

            #apellidos {
                margin-left: 10px; /* Agrega espacio a la izquierda del campo "apellidos" */
            }

        .form-group-horizontal {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
    <br><br>
    <div class="container mt-5">
        <div class="formulario">
            <br><br>
            <center><h2><strong>Recuperar contraseña</strong></h2></center>
            <br>
            <form>
                <div class="mb-3">
                    <input type="email" class="form-control" id="correo" placeholder="Tu correo electrónico">
                </div>
                    <br>               
                    <center>  <button type="submit" class="btn bg-danger text-white btn-lg" style="width: 350px;">Recuperar</button></center>
                        <br>
                       <center> <a href="login.php">Volver al inicio de Sesion</a></center>

                </div>

  </main>
  <div class="container">
  <?php
  
        include("../../../templates/footer.html");
    ?>
    </div>
  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>

</body>

</html>