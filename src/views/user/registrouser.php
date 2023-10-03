<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    
    $resultado = "select * from usuarios";

    $guardar = $db->seleccionarDatos($resultado);
   
//extraer datos del formulario
    extract($_POST);
    
    $sql = "insert into personas ( `nombre`, `apellido`, `correo`) values ('$nombre','$apellidos','$correo')";
    $db->ejecutarConsulta($sql);


?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rA6K/Q1vxgFm8z4lDf3m6JXVnF5SRhdpv4LwB5FtY2O5f5xSTF+to8SGz4SOGp2z9v" crossorigin="anonymous">
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <title>Formulario de Registro</title>
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
            max-width: 530px;
            margin: 0 auto;
            background: #F4F4F4;
        }

            #nombre {
                margin-right: 2px; /* Agrega espacio a la derecha del campo "nombre" */
            }

            #apellidos {
                margin-left: 2px; /* Agrega espacio a la izquierda del campo "apellidos" */
            }

        .form-group-horizontal {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>
<?php
include("../../../templates/navbar/navbar.html");
?>
    <br><br>
    <div class="container mt-5">
        <div class="formulario">
            <center><h2>Registro</h2></center>
            <form method="POST" action="registrouser.php">
                <div class="mb-3">
                    <label for="correo" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" name="correo" placeholder="Tu correo electrónico">
                </div>
                <div class="mb-3">
                    <label for="contrasena" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="contrasena" placeholder="Tu contraseña">
                </div>
                <div class="form-group-horizontal">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" placeholder="Tu nombre">
                    </div>
                    <div class="mb-3">
                        <label for="apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" name="apellidos" placeholder="Tus apellidos">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono</label>
                    <input type="tel" class="form-control" name="telefono" placeholder="Tu teléfono">
                </div>
              <center>  <button type="submit" class="btn bg-danger text-white btn-lg" style="width: 350px;">Registrarse</button></center>
              <br>
              <center><a href="login.php">¿Ya tienes cuenta?</a></center>
            </form>
        </div>
    </div>
    <div class="container">
  <?php
  
        include("../../../templates/footer.html");
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>
</html>