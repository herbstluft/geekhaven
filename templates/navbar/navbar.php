<?php
session_start();
?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
<link rel="stylesheet" href="../../bootstrap/css/estilos.css">
<style>
  *{
    font-family: 'Lalezar', cursive;
  }
.barra{
    width: 100%;
    position: fixed;
    z-index: 100;
}

.sombras{
  box-shadow: 0px -1px 8px -2px rgba(0,0,0,0.04);
-webkit-box-shadow: 0px -1px 8px -2px rgba(0,0,0,0.04);
-moz-box-shadow: 0px -1px 8px -2px rgba(0,0,0,0.04);
}

a{
  text-decoration: none;
}

</style>

<div class="d-none d-lg-block">
    <nav style="padding-left: 60px;  padding-top: 1%; padding-bottom: 1%;    backdrop-filter: saturate(180%) blur(20px);
            background-color: rgba(8, 8, 8, 0.849);" class="barra ">
                <div class="row">
                  
                    <div class="col-2 " data-bs-toggle="modal" data-bs-target="#opciones" >
                         <svg width="22" height="22" viewBox="0 0 18 18"><polyline id="globalnav-menutrigger-bread-bottom" fill="none" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 12, 16 12" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-bottom"><animate id="globalnav-anim-menutrigger-bread-bottom-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 12, 16 12; 2 9, 16 9; 3.5 15, 15 3.5"></animate><animate id="globalnav-anim-menutrigger-bread-bottom-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 15, 15 3.5; 2 9, 16 9; 2 12, 16 12"></animate></polyline><polyline id="globalnav-menutrigger-bread-top" fill="none" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 5, 16 5" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-top"><animate id="globalnav-anim-menutrigger-bread-top-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 5, 16 5; 2 9, 16 9; 3.5 3.5, 15 15"></animate><animate id="globalnav-anim-menutrigger-bread-top-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 3.5, 15 15; 2 9, 16 9; 2 5, 16 5"></animate></polyline></svg>
                    </div>
                    
                    <div class="col-8 text-center">
                      <a href="/geekhaven/index.php">
                      <svg style="margin-top: -7px;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-joystick" viewBox="0 0 16 16">
                        <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"/>
                        <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"/>
                      </svg>
                      &ensp;
                      <strong style="color: white; font-size: 18px;">GeekHaven</strong>
                      </a>
                    </div>
    
                    <div class="col-2">
                        <a href="" style="margin-right: 15px;" data-bs-target="#search" data-bs-toggle="modal">
                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg>
                        </a>

                        <!--login -->
                        <?php
                        $acceso=0;
                        if(isset($_SESSION['user'])){
                          ?>
                          <a href="http://localhost/geekhaven/src/views/user/perfilUsr.php" style="margin-right: 15px;">
                          <?php
                        }
                        else{
                          ?>
                          <a href="http://localhost/geekhaven/src/views/user/login.php" style="margin-right: 15px;">
                          <?php
                        }
                        ?>
                        
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="white" class="bi bi-person" viewBox="0 0 16 16">
                                <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                              </svg>
                        </a>
                         <!-- CARRITO -->
                         <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalCarrito">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="white" class="bi bi-bag" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                              </svg>
                        </button>
                           
                    </div>
                </div>
            </nav>
            </div>



            <!-- SCRIPT CARRITO -->




            <?php
            use MyApp\data\Database;
            require(__DIR__ . '/../../vendor/autoload.php');
            $db = new Database;
            //Igualar variable usr a la id de la sesion
            $usr=$_SESSION['user'];
             // ver si ya tiene ordenes en estado 0 
            $ordcompQry="SELECT COUNT(ord.id_orden) as orden FROM
              (SELECT detalle_orden.id_orden 
              FROM usuarios
              JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
              JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
              WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 LIMIT 1) as ord
              GROUP BY ord.id_orden";
              $ordcomp=$db->seleccionarDatos($ordcompQry);

                // si hay ordenes en estado 0 (0 es el estado de una orden cuando esta en el carrito) se ejecuta lo siguiente
                 if(!empty($ordcomp)){
                        // Obtener el id de la orden
                        $IdOrdenQry="SELECT detalle_orden.id_orden 
                        FROM usuarios
                        JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
                        JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
                        WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 LIMIT 1";
                        $IdOrden=$db->seleccionarDatos($IdOrdenQry);

                        // Una vez obtenido el id se ejecuta un foreach para usar el id_orden para visualizar el carrito
                        foreach ($IdOrden as $idOrdenObtenida){
                          
                          // Igualar la orden a una variable para poder usarla en consultas
                          $id_orden=$idOrdenObtenida['id_orden'];
                        // obtener los productos del carrito dependiendo la orden 
                        $carritoConsulta="SELECT PRD.id_producto,PRD.nom_producto, PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat, detalle_orden.id_orden
                        FROM usuarios
                        JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
                        JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
                        WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 and detalle_orden.id_orden=$id_orden";
                        $carrito=$db->seleccionarDatos($carritoConsulta);?>
                             <!-- Modal CARRITO -->
                        <div class="modal fade" id="modalCarrito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:white">CARRITO</h1>
                                                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <table>
                                                    <?php
                                                    
                                                    foreach($carrito as $res)
                                                    {?>
                                                      <tr>
                                                      <th scope="row">
                                                        <img src="https://commondatastorage.googleapis.com/images.pricecharting.com/3a92f94cd232e24534e431b9e4faf3da91be9c7755232f9b04141f04e676e09c/240.jpg" style="width: 90%"class="col-2"alt="">
                                                      </th>
                                                          <td colspan="1" class="col-6"><?php echo $res['nom_producto']?></td>
                                                          <td align="center"class ="col-2">
                                                          <?php echo $res['cantidad']; ?>
                                                            <br>
                                                          <a href="http://localhost/geekhaven/src/scripts/cart/quitarPrdCart.php?id=<?php echo $res['id_producto'];?>&usr=
                                                          <?php echo $usr;?>&ord=<?php echo $res['id_orden'];?>&ord=<?php echo $res['id_orden'];?>&cantidad=<?php echo $res['cantidad'];?>" class="btn btn-outline-dark border-0">Quitar</a>
                                                          </td>
                                                    </tr>
                                                    <?php
                                                      }
                                                    ?>
                                                  </table>
                                                </div>
                                                <?php
                                                // PARA VACIAR EL CARRITO HAY QUE ENVIAR LA VARIABLE DE LA ORDEN PARA CONSULTAR TODAS LAS ORDENES DETALLADAS QUE TIENEN DICHA ORDEN PARA ELIMINARLAS Y ASI VACIAR EL CARRITO
                                                // PARA HACER EL PEDIDO HAY QUE ENVIAR LA VARIABLE DE LA ORDEN POR EL LINK PARA CONSULTAR LAS ORDENES DETALLADAS QUE TENGAN DICHA ORDEN PARA PROCEDER A FINALIZAR EL PEDIDO
                                                ?>
                                                <div class="modal-footer bg-dark"">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <a href="http://localhost/geekhaven/src/scripts/cart/vaciarCart.php?id_orden=<?php echo $id_orden; ?>" class="btn btn-danger">Vaciar Carrito</a>
                                                  <a href="http://localhost/geekhaven/src/views/user/carrito.php?id_orden=<?php echo $id_orden; ?>&usr=<?php echo $usr; ?>" class="btn btn-primary">Hacer pedido</a>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </a>
                       <?php }?>


                       
                 <?php
                }// AQUI TERMINA EL IF PARA VER SI HAY ORDENES
                else if(empty($ord)){  
                  echo '?>
                      <!-- Modal CARRITO -->
                      <div class="modal fade" id="modalCarrito" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                              <div class="modal-content">
                                                <div class="modal-header bg-dark">
                                                  <h1 class="modal-title fs-5" id="exampleModalLabel" style="color:white">CARRITO</h1>
                                                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                  <table>
                                                      <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                        <strong>AUN NO HAY PRODUCTOS EN EL CARRITO</strong>
                                                      </div>
                                                  </table>
                                                </div>
                                               
                                                <div class="modal-footer bg-dark"">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                    </a>
                  <?php;
                 ';}?>
              
                    </div>
                </div>
            </nav>
            </div>
    
    
    
           <div class="d-lg-none d-block">
            <nav style="padding-left:3%;  backdrop-filter: saturate(180%) blur(20px);
            background-color: rgba(8, 8, 8, 0.849);  padding: 12px; color: white;" class="barra">
                
                <div class="row">
    
                  <div class="col-8">
                     <a href="/geekhaven/index.php">
                  <button style="border: 0px ; margin-left: 5px; margin-top: 0px; background-color: transparent;" class="" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <svg style="margin-top: -7px;" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="white" class="bi bi-joystick" viewBox="0 0 16 16">
                      <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"/>
                      <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"/>
                    </svg>
                    &ensp;
                    <strong style="color: white; font-size: 18px;">GeekHaven</strong>
                  </button>
                </a>
                </div>
    
    
                <div class="col-4 text-end">
                  <a href="" style="margin-right: 16px;" data-bs-target="#search" data-bs-toggle="modal">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="white" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                      </svg>
                </a>
               
                <a href="" style="margin-right: 16px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="white" class="bi bi-bag" viewBox="0 0 16 16">
                        <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z"/>
                      </svg>
                </a>
    
                <a href="" style="margin-right: 0px;" data-bs-toggle="modal" data-bs-target="#opciones" >
                  <svg width="19" height="19" viewBox="0 0 18 18"><polyline id="globalnav-menutrigger-bread-bottom" fill="none" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 12, 16 12" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-bottom"><animate id="globalnav-anim-menutrigger-bread-bottom-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 12, 16 12; 2 9, 16 9; 3.5 15, 15 3.5"></animate><animate id="globalnav-anim-menutrigger-bread-bottom-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 15, 15 3.5; 2 9, 16 9; 2 12, 16 12"></animate></polyline><polyline id="globalnav-menutrigger-bread-top" fill="none" stroke="white" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" points="2 5, 16 5" class="globalnav-menutrigger-bread globalnav-menutrigger-bread-top"><animate id="globalnav-anim-menutrigger-bread-top-open" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 2 5, 16 5; 2 9, 16 9; 3.5 3.5, 15 15"></animate><animate id="globalnav-anim-menutrigger-bread-top-close" attributeName="points" keyTimes="0;0.5;1" dur="0.24s" begin="indefinite" fill="freeze" calcMode="spline" keySplines="0.42, 0, 1, 1;0, 0, 0.58, 1" values=" 3.5 3.5, 15 15; 2 9, 16 9; 2 5, 16 5"></animate></polyline></svg>
                </a>
                </div>
    
                </div>
            </nav>
        </div>

        






<!-- Modal categorias menu -->
<div class="modal fade" id="opciones" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen-lg"> <!-- Utiliza modal-fullscreen-lg para pantalla completa en LG -->
    <div class="modal-content">
      
      <div class="row">
        <div class="col-12 text-end" style="padding-top: 10px;" data-bs-dismiss="modal">
          <svg style="margin-right: 15px;"  xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>

       
        </div>
      </div>
     
      <div>
        <ul style="text-decoration: none; list-style: none; font-size: 30px; font-weight: 500;">
          <div class="row">

          <?php foreach ($categorias as $categorias) { ?>

            <div class="col-10" data-bs-target="#subopciones" data-bs-toggle="modal" style="margin-top:3px">
              <li class="text-truncate"> <?php echo $categorias['nom_cat'] ?> </li>
            </div>
            <div class="col-1 text-end" data-bs-target="#subopciones" data-bs-toggle="modal">
              <svg style="opacity:0.4; margin-left: 0px;" xmlns="http://www.w3.org/2000/svg" width="19" height="19" fill="#000" class="bi bi-chevron-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
              </svg>
            </div>

            <?php } ?>
            
         
            <br>

            <hr style="width:90%; margin-top:20px">
            <li style="font-size:15px"><a href="http://localhost/geekhaven/src/views/user/login.php">Iniciar Sesion</a></li>


          </div>
        </ul>
      </div>
    
    </div>
  </div>
</div>













<!-- Modal categorias menu -->
<div class="modal fade" id="search" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-side">
    <div class="modal-content">
      
    <div class="row">
      <div class="col-12 text-end" style="padding-top: 10px;" data-bs-dismiss="modal">
          <svg style="margin-right: 15px;" xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="#333336" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </div>

        <br>
    </div>

    <div class="row">
    <div class="col-1 text-end" style="margin-left:20px">
        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="#333336" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
        </svg>
      </div>
      
      <div class="col-9" >
      <form class="d-flex primary" role="search" >
        <input data-table="table_id" class="light-table-filter" type="text" name="buscar" style="border:none; width:100%; font-size:27px; border:none; outline:none; margin-top:-7px; font-weight: bold;" placeholder="Buscar">
      </form>
      </div>
    </div>
      

    <br>
   

  <div class="contenido_de_buscar" style="margin-left:10px; margin-right:10px;">

    <section class="cards">
    
    <script>
      new DataTable('#table_id');
    </script>
    
<div class="table-responsive" style="margin:10px; padding-top:0px">

<table class="table_id text-center"  style="width:100%; font-size:19px; border:0px" >


<?php

               
$SQL="SELECT id_producto, nom_producto,precio from productos";
$con=$db->seleccionarDatos($SQL);

if(!empty($con)){
  foreach($con as $fila) {
?>



<td>
<a href="/geekhaven/src/views/user/productos.php?id=<?php echo $fila['id_producto']?>" style="color:black">
<div>
<p><?php echo $fila['nom_producto']?></p> <center><hr style="background:black; width:50%; opacity:0"></center> <b style="top:-30px; color:red; position:relative"><?php echo "$".number_format($fila['precio'], 2, '.', '.');?></b> <center><hr style="background:black; width:50%; position:relative; top:-30px; opacity:0"></center>
</div>  
</a>
</td>



</tr>


<?php
}
}

?>
</table>
</div>

      </section>
  </div>

  

    </div>
  </div>
</div>
