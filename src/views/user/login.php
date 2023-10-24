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


    <div class="row  justify-content-center">
       <center>
         <div class="col-12">
          <div  style="border-radius: 1rem;">
            <div class="row g-0">
  
              <div class="col-md-6 offset-lg-2 col-lg-8 offset-lg-2 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">

                  <form>

                    <div class="text-center mb-3 pb-1"  >
                    <svg style="width:80;" xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="black" class="bi bi-joystick" viewBox="0 0 16 16">
                      <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"></path>
                      <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"></path>
                    </svg>
                    </div>

                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar sesión en su cuenta</h5>

                    <div class="form-outline mb-4">
                      <input type="email" id="form2Example17" class="form-control form-control-lg">
                      <label class="form-label" for="form2Example17" style="margin-left: 0px;">Email address</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>

                    <div class="form-outline mb-4">
                      <input type="password" id="form2Example27" class="form-control form-control-lg">
                      <label class="form-label" for="form2Example27" style="margin-left: 0px;">Password</label>
                    <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64px;"></div><div class="form-notch-trailing"></div></div></div>

                    <div class="pt-1 mb-4">
                      <button class="btn btn-dark btn-lg btn-block" type="button">Login</button>
                    </div>

                    <a class="small text-muted" href="#!">Forgot password?</a>
                    <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="#!" style="color: #393f81;">Register here</a></p>
                    <a href="#!" class="small text-muted">Terms of use.</a>
                    <a href="#!" class="small text-muted">Privacy policy</a>
                  </form>

                </div>
              </div>
            </div>
          </div>
        </div>
       </center>
      </div>

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

