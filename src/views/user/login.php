<?php
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database();


 $sql = "SELECT * from categorias";

 $categorias=$db->seleccionarDatos($sql);

 
?>

<?php
         
         if($_POST){
           extract($_POST);
                 $consulta_hash="Select * from usuarios inner join
                 personas on personas.id_persona=usuarios.id_persona 
                 where usuarios.telefono='$phone'";
                 $date_person=$db->seleccionarDatos($consulta_hash);
                 
                 foreach ($date_person as $decrypted)
                 $password_hash= $decrypted['contrasena'];
             
                 $id_usuario=$decrypted['id_usuario'];
                 
         
               if(password_verify($password,$password_hash)){
                 session_start();
                 $_SESSION['user']=$id_usuario;
                 header("Location:../../../index.php");
                 
               }
               
              }
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


<?php
include('../../../templates/navbar/navbar.php');
?>



    <br><br>
    <div class="container mt-5">
        <div class="formulario">
            <br><br>
            <center><h2><strong>Iniciar Sesion</strong></h2></center>
            <br><br>
            <form action="login.php" method="post">
                <div class="mb-3">
                    <input type="number" class="form-control" id="phone" name="phone" placeholder="Numero de telefono">
                </div>
                <br>
                <div class="mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Tu contraseña">
                    <a href="olvido.php">¿Olvidaste tu contraseña?</a>
                    <br>
                    <br>
                    <center>  <button type="submit" class="btn bg-danger text-white btn-lg" style="width: 350px;">Iniciar Sesion</button></center>


                </div>
            </form>


                <center><a href="registrouser.php">Registrarse</a></center>
  </main>
<br><br>
<?php
    if($_POST){

             if(!password_verify($password,$password_hash)) { 
                 echo  "<div class='alert alert-danger text-center' role='alert' style='margin-left:10%; margin-top:-2%; margin-bottom:7%; margin-right:10%;'>
                 Contraseña o numero incorrecto.
               </div>";  
               }
        
              }
      
         
         ?>


  <br><br><br><br><br><br>
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

<script src="../../../bootstrap/js/buscador.js"></script>

</html>

