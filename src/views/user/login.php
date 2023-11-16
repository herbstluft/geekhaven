<?php
 use MyApp\data\Database;
 require("../../../vendor/autoload.php");
 $db = new Database();

    //ocultar warnings
    error_reporting(E_ERROR | E_PARSE);
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
                
                if($decrypted['tipo_usuario']==0){
                  session_start();
                  $_SESSION['admin']=$id_usuario;
                  header("Location: /geekhaven/src/views/admin/index.php");
                }
                elseif($decrypted['tipo_usuario']==1){
                  session_start();
                 $_SESSION['user']=$id_usuario;
                 header("Location:../../../index.php");
                 
               }
               
              }
             }
               ?>
          
          <!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Geek Haven</title>
  <link rel="stylesheet" href="/geekhaven/src/views/admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="/geekhaven/bootstrap/css/estilos.css" />
  
</head>

<body>


<?php
include('../../../templates/navbar_user.php');
?>



    <br><br>
    <div class="container mt-5">

   
          <div class="container">
            <div class="row gx-lg-5 align-items-center">
              <div class="col-lg-6 mb-5 mb-lg-0 text-center" >
              <svg style="width:80;" xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="black" class="bi bi-joystick" viewBox="0 0 16 16">
              <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"></path>
              <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"></path>
            </svg>
                <h1 class="my-5 display-5 fw-bold ls-tight">
                 Exclusivo para Geeks, donde la Innovación  <br style="margin-bottom:10px">
                  <span style="color:#005aff"> es la Norma.</span>
                </h1>
                <p style="color: hsl(217, 10%, 50.8%)">
                ¡Bienvenido a nuestra tienda en línea, exclusiva para geeks, donde la innovación es la norma! Explora un mundo de productos tecnológicos, coleccionables y gadgets que satisfarán tu pasión por la cultura geek. ¡Descubre lo que tu lado geek ha estado esperando!
                </p>
              </div>

              <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="">
                  <div class="card-body py-5 px-md-5">
                    <form  style="margin-bottom:0px;margin-top:90px"  action="login.php" method="post">
                      <!-- 2 column grid layout with text inputs for the first and last names -->
                      <div class="row">

                      <h2 style=" font-weight:bolder; " class=" text-center">Inicia sesión en GeekHaven</h2>
                      
                     


                   <div style="margin-top:60px">

                    
                   <div class="form-outline mb-4">
                        <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="floatingInput" name="phone" required>
                        <label for="floatingInput">Numero de telefono</label>
                      </div>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>


                      
                      <div class="form-outline mb-4">
                        <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingInput" name="password" required>
                        <label for="floatingInput">Contraseña</label>
                      </div>
                      <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>

                    <center>
                    <button type="button" class="btn  btn-floating mx-1">
                        <a href="olvido.php" style="color: #005aff; text-decoration:none"> ¿Olvidaste tu contraseña? </a>
                        </button>

                    </center>


                   </div>

                      <!-- Checkbox -->
                      <div class="form-check d-flex justify-content-center mb-4" style="margin-top:50px">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#005aff" class="bi bi-patch-check-fill" viewBox="0 0 16 16">
                        <path d="M10.067.87a2.89 2.89 0 0 0-4.134 0l-.622.638-.89-.011a2.89 2.89 0 0 0-2.924 2.924l.01.89-.636.622a2.89 2.89 0 0 0 0 4.134l.637.622-.011.89a2.89 2.89 0 0 0 2.924 2.924l.89-.01.622.636a2.89 2.89 0 0 0 4.134 0l.622-.637.89.011a2.89 2.89 0 0 0 2.924-2.924l-.01-.89.636-.622a2.89 2.89 0 0 0 0-4.134l-.637-.622.011-.89a2.89 2.89 0 0 0-2.924-2.924l-.89.01-.622-.636zm.287 5.984-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                      </svg> &ensp;
                        <label class="form-check-label" for="form2Example33">
                        Productos geek para mentes curiosas.
                        </label>
                      </div>

                      <!-- Submit button -->
                     <center>
                      <br>
                     <button type="submit" style="background-color:#005aff; color: white" class="btn btn-block mb-4" >
                     Inicia sesión
                      </button>
                     </center>

                      <!-- Register buttons -->
                      <div class="text-center">
                      
                        <button type="button" class="btn  btn-floating mx-1">
                        <a href="registrouser.php" style="color: #005aff; text-decoration:none"> Crea una cuenta </a>
                        </button>

                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <?php
    if($_POST){

             if(!password_verify($password,$password_hash)) { 
                 echo  "<div class='alert alert-danger text-center' role='alert' style='margin-left:10%; margin-top:-2%; margin-bottom:7%; margin-right:10%;'>
                 Contraseña o numero incorrecto.
               </div>";  
               }
        
              }
      
         
         ?>

            </div>
          </div>
  



  <script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="/geekhaven/bootstrap/js/buscador.js"></script>


  <script>
document.addEventListener("DOMContentLoaded", function () {
  const scrollAppearElements = document.querySelectorAll(".scroll-appear");

  const options = {
    root: null, // viewport
    rootMargin: "0px",
    threshold: 0,
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add("appear");
      } else {
        entry.target.classList.remove("appear");
      }
    });
  }, options);

  scrollAppearElements.forEach((element) => {
    observer.observe(element);
  });
});
</script>
</body>

</html>

