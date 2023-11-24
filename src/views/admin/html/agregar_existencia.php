<?php
use MyApp\data\Database;
require("../../../../vendor/autoload.php");
$db = new Database;
$db1 = new Database;


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

    <?php include('navbar.php') ?>




<div class="container-fluid">


<center><h1>Buscar el producto que quieres editar</h1></center>
<br>
   
        <div class="search-container">
        <form class="d-flex primary" role="search" style="witdh:100%">

        <svg style="align-self:center; margin-left:20px" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>

            <input  data-table="table_id" class="light-table-filter" type="text"  id="search-input" placeholder=" Buscar en GeekHaven"> 
        </form>
        </div>

<br><br>       

        <script>
            new DataTable('#table_id');
        </script>
        

        <div class="row"  style="margin-left:20px">
            <?php
            $SQL = "SELECT * from productos where estatus= 1 and existencia >=0";
            $con = $db->seleccionarDatos($SQL);

            if (!empty($con)) {
                foreach ($con as $fila) {
                  
                  $id_producto=$fila['id_producto'];
                  $sacarImgQry="SELECT *  from productos INNER JOIN img_productos on img_productos.id_producto=productos.id_producto where productos.id_producto=$id_producto GROUP by img_productos.id_producto ";
                  $sacarImg=$db1->seleccionarDatos($sacarImgQry);
                    ?>
                  
                        <div class="col-sm-6 col-xl-3">
                            
                        <div class="scroll-appear">
                            <div class="card overflow-hidden rounded-2">
                            <div class="position-relative">
    <a href="/geekhaven/src/views/admin/html/aggexistencia.php?id=<?php echo $fila['id_producto']?>"><img src="/geekhaven/src/views/admin/html/img_producto/<?php 
                foreach($sacarImg as $img){
                echo $img['nombre_imagen'];}?>" class="d-block w-100"  height="310px" alt="..."></a>
    <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
<path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"></path>
</svg>
    </a>                      
  </div>
  <div class="card-body pt-3 p-4">
        <div style="width:100%;">
        <h6 class="fw-semibold fs-4 text-truncate"> <?php echo $fila['nom_producto']  ?>  </h6>
        </div>
    <div class="d-flex align-items-center justify-content-between">
      <h6 class="fw-semibold fs-4 mb-0">Existencia: <?php echo  $fila['existencia']; ?></h6>
      <ul class="list-unstyled d-flex align-items-center mb-0">
                      </ul>
    </div>
  </div>
                            </div>
                            </div>
                            </a>
                        </div>
                  
                    <?php
                }
            }
            else{
              ?>

<button type="button" class="btn btn-primary">Primary</button>
              
            <?php  
            }
            ?>
        </div>
    </div>








<br><br>

   




    
</div>







<script src="/geekhaven/src/views/admin/assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/sidebarmenu.js"></script>
  <script src="/geekhaven/src/views/admin/assets/js/app.min.js"></script>
  <script src="/geekhaven/src/views/admin/assets/libs/simplebar/dist/simplebar.js"></script>



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



<script src="/geekhaven/bootstrap/js/buscador.js"></script>