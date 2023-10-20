<?php
    use MyApp\data\Database;
    require("vendor/autoload.php");
    $db = new Database;
    
    //ocultar warnings
error_reporting(E_ERROR | E_PARSE);
    $resultado = "select * from usuarios";
   
//extraer datos del formulario
    

    //Favoritos del mes    
    $sql = "SELECT p.id_producto as 'id_producto', p.nom_producto as 'nombre', p.precio as 'precio', c.nom_cat as 'categoria', COUNT(*) as cantidad_vendida
    FROM detalle_orden as do
    INNER JOIN productos p ON do.id_producto = p.id_producto
    INNER join categorias c on c.id_cat=p.id_cat
    WHERE MONTH(do.fecha_detalle) = MONTH(CURRENT_DATE)
    GROUP BY do.id_producto, p.nom_producto
    ORDER BY cantidad_vendida DESC limit 6;";
    $favoritos_del_mes=$db->seleccionarDatos($sql);


    //ofertas
    $sql="SELECT * from productos INNER JOIN categorias on categorias.id_cat=productos.id_cat WHERE productos.estado='oferta';";
    $ofertas=$db->seleccionarDatos($sql);


    //Recien llegados
    $sql="SELECT * FROM productos inner join categorias on categorias.id_cat=productos.id_cat ORDER BY fecha desc LIMIT 6;";
    $recien_llegados=$db->seleccionarDatos($sql);
  
    //Categorias
    $sql = "SELECT * from categorias";
    $categorias=$db->seleccionarDatos($sql);
  
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Modernize Free</title>
  <link rel="shortcut icon" type="image/png" href="src/views/admin/assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="src/views/admin/assets/css/styles.min.css" />
  <link rel="stylesheet" href="bootstrap/css/estilos.css" />
  
</head>

<style>

</style>
<body>
<?php include($_SERVER['DOCUMENT_ROOT'] . '/geekhaven/templates/navbar_user.php'); ?>


      <div class="container-fluid">
       
<div class="scroll-appear">

      <h1 class="text-center" style="font-weight: 600;color: #000; font-size: 36px;">
      Geek Hasta el final, ¡Game Over!
              </h1>
        
        <br>

        
        <div id="carouselExampleDark" class="carousel carousel-light slide" >
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="10000">
      <img style="border-radius:25px;     width: 100% !important;" src="https://cdn.pixabay.com/photo/2021/09/07/07/11/joysticks-6603119_1280.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:white"; >Bienvenido a GeekHaven</h5>
        <p>Diseñado por Geeks, para Geeks. Descubre Nuestra Colección Excepcional de Productos Tecnológicos y Artículos de Colección.</p>
      </div>
    </div>
    <div class="carousel-item" data-bs-interval="2000">
      <img style="border-radius:25px;     width: 100% !important;" src="https://cdn.pixabay.com/photo/2021/10/07/20/46/playstation-6689793_1280.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5  style="color:white";>GeekHaven</h5>
        <p>Tu Espacio de Compras Exclusivo para Geeks, donde la Innovación es la Norma.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img style="border-radius:25px;     width: 100% !important;" src="https://cdn.pixabay.com/photo/2016/11/02/14/15/x-box-1791676_1280.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5  style="color:white";>Convierte tu Pasión en Realidad</h5>
        <p>GeekHaven te Ofrece una Experiencia de Compra Geek Inigualable, incluyendo Videojuegos.</p>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

</div>

<br><br>



<div class="scroll-appear">
<h3>Categorias</h3>
<br>


<?php include 'templates/carrousel.html'; ?>
<br><br><br>





<div class="scroll-appear">
<div class="container">
  
<section id="shopify-section-template--16720316268796__d094902d-6b1f-4787-b493-b2a861dfc204" class="shopify-section shopify-section--image-with-text-overlay"><style>
      #shopify-section-template--16720316268796__d094902d-6b1f-4787-b493-b2a861dfc204 {--section-outer-spacing-block: 0;--content-over-media-overlay: 0 0 0 / 0.0;}
    </style>

    <div class="section   section-blends section-full text-custom" style="--text-color: 255 255 255;"><image-banner  reveal-on-scroll="true" class="content-over-media content-over-media--auto full-bleed  text-custom" style="--text-color: 255 255 255; opacity: 1;"><img style="width:98%; height:10%; border-radius:20px" src="//www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=1920" alt="" srcset="//www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=200 200w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=300 300w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=400 400w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=500 500w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=600 600w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=700 700w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=800 800w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=900 900w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=1000 1000w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=1200 1200w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=1400 1400w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=1600 1600w, //www.gamerpoint.com.mx/cdn/shop/files/favoritos_del_mes_2.png?v=1692920156&amp;width=1800 1800w" width="1920" height="500" loading="lazy" sizes="100vw" class=""><div class="place-self-center text-center sm:place-self-center sm:text-center">
            <div class="prose"></div>
          </div></image-banner>
    </div>
</section>
</div>
<br><br>
</div>

</div>



<div class="container" style="margin-left:15px">
<div class="scroll-appear">
<div class="row">

<?php 

foreach($favoritos_del_mes as $fav_del_mes){

?>

          <div class="col-sm-6 col-xl-3">

            <div class="card overflow-hidden rounded-2">
              <div class="position-relative">
                <a href="javascript:void(0)"><img src="src/views/admin/assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
                <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
</svg>
                </a>                      
              </div>
              <div class="card-body pt-3 p-4">
                    <div style="width:100%;" >
                    <h6 class="fw-semibold fs-4 text-truncate"><?php echo $fav_del_mes['nombre']?>  </h6>
                    </div>
                <div class="d-flex align-items-center justify-content-between">
                  <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' . $fav_del_mes['precio']; ?></h6>
                  <ul class="list-unstyled d-flex align-items-center mb-0">
                  <?php echo $fav_del_mes['categoria']?>
                  </ul>
                </div>
              </div>
            </div>
          </div>

<?php 
}
?>

</div>
</div>


<div class="scroll-appear">
<br><br>
<div class="container" style="margin-left:-10px">
<div class="section   section-blends section-full text-custom" style="--text-color: 255 255 255;"><image-banner reveal-on-scroll="true" class="content-over-media content-over-media--auto full-bleed  text-custom" style="--text-color: 255 255 255; opacity: 1;"><img style="width:98%; height:10%; border-radius:20px" src="//www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=1920" alt="" srcset="//www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=200 200w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=300 300w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=400 400w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=500 500w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=600 600w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=700 700w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=800 800w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=900 900w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=1000 1000w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=1200 1200w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=1400 1400w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=1600 1600w, //www.gamerpoint.com.mx/cdn/shop/files/NUESTRAS_OFERTAS.png?v=1692920909&amp;width=1800 1800w" width="1920" height="500" loading="lazy" sizes="100vw" class=""><div class="place-self-center text-center sm:place-self-center sm:text-center">
        <div class="prose"></div>
      </div></image-banner>
</div>
</div>
<br><br>
</div>


<div class="scroll-appear">
<div class="row">

<?php
foreach($ofertas as $ofertas){
?>

<div class="col-sm-6 col-xl-3">

<div class="card overflow-hidden rounded-2">
  <div class="position-relative">
    <a href="javascript:void(0)"><img src="src/views/admin/assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
    <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
</svg>
    </a>                      
  </div>
  <div class="card-body pt-3 p-4">
        <div style="width:100%;" >
        <h6 class="fw-semibold fs-4 text-truncate"> <?php echo $ofertas['nom_producto']?> </h6>
        </div>
    <div class="d-flex align-items-center justify-content-between">
      <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' . $ofertas['precio']; ?></h6>
      <ul class="list-unstyled d-flex align-items-center mb-0">
      <?php echo $ofertas['nom_cat']?>
      </ul>
    </div>
  </div>
</div>
</div>

<?php
}
?>
</div>
</div>




<div class="scroll-appear">
<br><br>
<div class="container"  style="margin-left:-10px">
<div class="section   section-blends section-full text-custom" style="--text-color: 255 255 255;"><image-banner reveal-on-scroll="true" class="content-over-media content-over-media--auto full-bleed  text-custom" style="--text-color: 255 255 255; opacity: 1;"><img style="width:98%; height:10%;border-radius:20px" src="//www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=1920" alt="" srcset="//www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=200 200w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=300 300w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=400 400w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=500 500w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=600 600w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=700 700w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=800 800w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=900 900w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=1000 1000w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=1200 1200w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=1400 1400w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=1600 1600w, //www.gamerpoint.com.mx/cdn/shop/files/RECIEN_LLEGADOS.png?v=1692920978&amp;width=1800 1800w" width="1920" height="500" loading="lazy" sizes="100vw" class=""><div class="place-self-center text-center sm:place-self-center sm:text-center">
        <div class="prose"></div>
      </div></image-banner>
</div>
</div>
<br><br>
</div>


<div class="scroll-appear">
<div class="row">


<?php
foreach($recien_llegados as $recien_llegados){
?>

<div class="col-sm-6 col-xl-3">

<div class="card overflow-hidden rounded-2">
  <div class="position-relative">
    <a href="javascript:void(0)"><img src="src/views/admin/assets/images/products/s4.jpg" class="card-img-top rounded-0" alt="..."></a>
    <a href="javascript:void(0)" class="bg-success rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
</svg>
    </a>                      
  </div>
  <div class="card-body pt-3 p-4">
        <div style="width:100%;" >
        <h6 class="fw-semibold fs-4 text-truncate"> <?php echo $recien_llegados['nom_producto']?> </h6>
        </div>
    <div class="d-flex align-items-center justify-content-between">
      <h6 class="fw-semibold fs-4 mb-0"><?php echo '$' .' '. $recien_llegados['precio']; ?></h6>
      <ul class="list-unstyled d-flex align-items-center mb-0">
      <?php echo $recien_llegados['nom_cat']?> 
      </ul>
    </div>
  </div>
</div>
</div>

<?php
}
?>
</div>
</div>


</div>



<br><br><br>
<h2>Universos</h2>
<br><br>

<div class="container">
<div class="scroll-appear">
<div class="row">

  <div class="col-12 col-md-6 text-center" style="margin-bottom:30px">
  <article class="card card--1" style="margin-left:20px">

  <div class="card__info">
  <div>
            <img width="210" height="210" src="https://loodibee.com/wp-content/uploads/Pokemon-Symbol-logo.png" alt="controller">
          </div>
    <h3 class="card__title">Pokemon</h3>
  
  </div>
  </article>
  </div>

  <div class="col-12 col-md-6 text-center" style="margin-bottom:30px">
  <article class="card card--1" style="margin-left:20px">

  <div class="card__info">
  <img width="210" height="210" src="https://cdn.freebiesupply.com/logos/large/2x/dragonball-z-logo-png-transparent.png" alt="controller">
    <h3 class="card__title">DragonBall Z</h3>
  
  </div>
  </article>
  </div>

  <div class="col-12 col-md-6 text-center" style="margin-bottom:30px">
  <article class="card card--1" style="margin-left:20px">

  <div class="card__info">
  <img width="210" height="210" src="https://assets.stickpng.com/thumbs/5852cd4c58215f0354495f65.png" alt="controller">
    <h3 class="card__title">Naruto</h3>
  
  </div>
  </article>
  </div>


  <div class="col-12 col-md-6 text-center" style="margin-bottom:30px">
  <article class="card card--1" style="margin-left:20px">

  <div class="card__info">
  <img width="210" height="210" src="https://cdn.freebiesupply.com/logos/thumbs/2x/zelda-logo.png" alt="controller">
    <h3 class="card__title">DragonBall Z</h3>
  
  </div>
  </article>
  </div>
  

  
  <div class="col-12 col-md-6 text-center" style="margin-bottom:30px">
  <article class="card card--1" style="margin-left:20px">

  <div class="card__info">
  <img width="210" height="210" src="https://static.vecteezy.com/system/resources/previews/024/693/394/original/super-mario-logo-transparent-free-png.png" alt="controller">
    <h3 class="card__title">Super Mario</h3>
  
  </div>
  </article>
  </div>
  

  
  <div class="col-12 col-md-6 text-center" style="margin-bottom:30px">
  <article class="card card--1" style="margin-left:20px">

  <div class="card__info">
  <img width="210" height="210" src="https://static.vecteezy.com/system/resources/previews/022/100/698/original/marvel-logo-transparent-free-png.png" alt="controller">
    <h3 class="card__title">Marvel</h3>
  
  </div>
  </article>
  </div>
  
  </div>

  </div>


<br><br>
<hr>
<br><br>


<div>
<div class="scroll-appear">
    <div class="row">
        <div class="col-sm-12 col-lg-4 left">
          <h2>Nosotros</h2>
          <p class="card__category">En nuestra tienda, encontrarás una cuidadosa selección de productos de alta calidad y ediciones especiales que se adaptan a tus intereses y gustos únicos. Ya seas un fanático de las historias de superhéroes, un ávido jugador de videojuegos o un coleccionista de figuras raras, estamos aquí para satisfacer tus necesidades.</p>
          <br>
          <h2>Nuestra mision</h2>
          <p class="card__category">Somos una tienda creada con pasión por y para los coleccionistas y entusiastas del mundo geek, friki y gamer. Nos apasiona proporcionar un espacio donde puedas encontrar una amplia variedad de artículos coleccionables, desde cómics y mangas hasta videojuegos y juegos de mesa. Nuestra misión es hacer que la obtención de tus artículos favoritos sea fácil y emocionante.</p>
        </div>
    <br>
        <div class="col-sm-12 col-lg-7 text-center">
          <h1>Nuestra ubicacion</h1>
          <p class="card__category"> Av. Hidalgo 1334, Primitivo Centro, 27000 Torreón, Coah.</p>
      <iframe style="width:100%; height:90%; border-radius:15px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3600.033275675958!2d-103.46544792451171!3d25.537268477493672!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x868fd9689c38aa7b%3A0x93f069a0cb99a84!2sPlaza%20de%20la%20Tecnolog%C3%ADa%20Torre%C3%B3n!5e0!3m2!1ses!2smx!4v1696054214019!5m2!1ses!2smx" width="600" height="450" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    
      </div>

      </div>
</div>


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

</body>

</html>