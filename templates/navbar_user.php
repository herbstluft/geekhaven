<?php 
session_start();
$HOST=$_SERVER['SERVER_NAME'];
if(isset($_SESSION['user'])){
  $sql="SELECT * FROM personas INNER JOIN usuarios on personas.id_persona=usuarios.id_persona WHERE usuarios.id_usuario='$_SESSION[user]'";

    $datos_user=$db->seleccionarDatos($sql);
foreach($datos_user as $datos_user){
$datos_user_imagen=$datos_user['imagen'];
$nombre=$datos_user['nombre'];
}

}


$sql="select * from categorias";
$categorias=$db->seleccionarDatos($sql);


?>
<style>
  .sidebar-nav ul .sidebar-item.selected>.sidebar-link, .sidebar-nav ul .sidebar-item.selected>.sidebar-link.active, .sidebar-nav ul .sidebar-item>.sidebar-link.active {
    background-color: #005aff;
    color: #fff;
}
</style>

<?php

if(isset($_SESSION['user'])){

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
           $carrito=$db->seleccionarDatos($carritoConsulta);
          if(!empty($carrito)){
?>
                <!-- Modal CARRITO -->
           <div class="modal  fade modal-lg" id="modalCarritoasd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                 <div class="modal-content" style="background:none">
                                   <div class="text-center modal-header" style="background: #ffffffc4;backdrop-filter: blur(50px);color: black;border-radius: 20px;margin-bottom: 15px;margin-top: 5px;">
                                     <h1 class="modal-title fs-5 text-center" id="exampleModalLabel" style="color:black; margin: auto;width: 100%;">CARRITO</h1>
                                     <button type="button" class="btn-close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body" style="background: #ffffffc4;backdrop-filter: blur(50px);color: black;border-radius: 10px 10px 0px 0px;">
                                     <table>
                                       <?php
                                       
                                       foreach($carrito as $res)
                                       {?>
                                         <tr style="padding-bottom:10px;">
                                         <th scope="row">
                                           <img src="https://commondatastorage.googleapis.com/images.pricecharting.com/3a92f94cd232e24534e431b9e4faf3da91be9c7755232f9b04141f04e676e09c/240.jpg" style="width: 90%; border-radius: 20px; margin-bottom:10px;"class="col-2"alt="">
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
                                   <div class="modal-footer " style=" border-top: 1px solid #cacaca85; margin-top: 0px;border-radius: 0px 0px 10px 10px; background: #ffffffc4;backdrop-filter: blur(50px);color: black;">
                                     
                              
                                     <div class="row" style="width:100%">
                                    <div class="col-4">
                                    <center><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></center>
                                  </div>

                                    <div class="col-4">
                                    <center><a href="http://localhost/geekhaven/src/scripts/cart/vaciarCart.php?id_orden=<?php echo $id_orden; ?>" class="btn btn-danger">Vaciar Carrito</a></center>
                                    </div>

                                    <div class="col-4">
                                    <center><a href="http://localhost/geekhaven/src/views/user/carrito.php?id_orden=<?php echo $id_orden; ?>&usr=<?php echo $usr; ?>" class="btn btn-primary">Hacer pedido</a></center>
                                    </div>

                                   </div>
                                   
                             
                                      
                                    
                                   </div>
                                 </div>
                               </div>
                             </div>
                       </a>
          <?php }}?>


          
    <?php
   }}
   elseif(empty($carrito)){
    ?>
    <div class="modal  fade modal-lg" id="modalCarritoasd" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                               <div class="modal-dialog">
                                 <div class="modal-content" style="background:none">
                                   <div class="text-center modal-header" style="background: #ffffffc4;backdrop-filter: blur(50px);color: black;border-radius: 20px;margin-bottom: 15px;margin-top: 5px;">
                                     <h1 class="modal-title fs-5 text-center" id="exampleModalLabel" style="color:black; margin: auto;width: 100%;">CARRITO</h1>
                                     <button type="button" class="btn-close btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                   </div>
                                   <div class="modal-body" style="background: #ffffffc4;backdrop-filter: blur(50px);color: black;border-radius: 10px 10px 0px 0px;">
                                     <table>
                                         <tr style="padding-bottom:10px;">
                                         <th scope="row">
                                           <img src="https://commondatastorage.googleapis.com/images.pricecharting.com/3a92f94cd232e24534e431b9e4faf3da91be9c7755232f9b04141f04e676e09c/240.jpg" style="width: 90%; border-radius: 20px; margin-bottom:10px;"class="col-2"alt="">
                                         </th>
                                             <td colspan="1" class="col-12"></td>
                                       </tr>
                        
                                     </table>
                                   </div>
                                  
                                   <div class="modal-footer " style=" border-top: 1px solid #cacaca85; margin-top: 0px;border-radius: 0px 0px 10px 10px; background: #ffffffc4;backdrop-filter: blur(50px);color: black;">
                                     
                              
                                     <div class="row" style="width:100%">
                                    <div class="col-4">
                                    <center><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></center>
                                  </div>  
                                   </div>
                                 </div>
                               </div>
                             </div>
                       </a>
    <?php
   }
?>
<!--  Body Wrapper -->
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar" style="    background: #ffffffde; backdrop-filter: blur(70px);">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="/geekhaven/index.php" class="text-nowrap logo-img">
            <svg style="width:80;" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="black" class="bi bi-joystick" viewBox="0 0 16 16">
              <path d="M10 2a2 2 0 0 1-1.5 1.937v5.087c.863.083 1.5.377 1.5.726 0 .414-.895.75-2 .75s-2-.336-2-.75c0-.35.637-.643 1.5-.726V3.937A2 2 0 1 1 10 2z"></path>
              <path d="M0 9.665v1.717a1 1 0 0 0 .553.894l6.553 3.277a2 2 0 0 0 1.788 0l6.553-3.277a1 1 0 0 0 .553-.894V9.665c0-.1-.06-.19-.152-.23L9.5 6.715v.993l5.227 2.178a.125.125 0 0 1 .001.23l-5.94 2.546a2 2 0 0 1-1.576 0l-5.94-2.546a.125.125 0 0 1 .001-.23L6.5 7.708l-.013-.988L.152 9.435a.25.25 0 0 0-.152.23z"></path>
            </svg>

            <b style="color: black;">GeekHaven</b>
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#a5a5a5" class="bi bi-x" viewBox="0 0 16 16">
  <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
</svg>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
        
            <li class="sidebar-item">
              <a class="sidebar-link" href="/geekhaven/index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Inicio</span>
              </a>
            </li>

            
            <li class="sidebar-item">
              <a class="sidebar-link" href="/geekhaven/src/views/user/buscar.php" aria-expanded="false">
                <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
  <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
</svg>
                </span>
                <span class="hide-menu">Buscar</span>
              </a>
            </li>

            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Categorias</span>
            </li>

            <?php
                foreach($categorias as $categorias){
            ?>
            <li class="sidebar-item">
              <a class="sidebar-link" href="html/agregar_producto.php" aria-expanded="false">
            
                <span class="hide-menu"><?php echo $categorias['nom_cat'] ?></span>
              </a>
            </li>

            <?php
               }
            ?>



<?php if(!isset($_SESSION['user'])){
?>

<li>
<div class="unlimited-access hide-menu bg-light-primary position-relative mb-7 mt-5 rounded">
            <div class="d-flex">
              <div class="unlimited-access-title me-3">
                <h6 class="fw-semibold fs-4 mb-6 text-dark w-85">GeekHaven</h6>
                <a href="/geekhaven/src/views/user/login.php" style=" background-color: #005aff; color: #fff;" class="btn fs-2 fw-semibold lh-sm" style="">Entrar</a>
              </div>
              <div class="unlimited-access-img">
                <img src="/geekhaven/src/views/admin/assets/images/backgrounds/rocket.png" alt="" class="img-fluid">
              </div>
            </div>
          </div>
          <br>
</li>
<?php
}
    else{?>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Compras</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="http://<?php echo $HOST?>/geekhaven/src/views/user/pedidos.php" aria-expanded="false">
                <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bag-fill" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
</svg>
                </span>
                <span class="hide-menu">Mis compras</span>
              </a>
            </li>

            <li class="sidebar-item">
              <a class="sidebar-link" href="" aria-expanded="false">
                <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
</svg>
                </span>
                <span class="hide-menu">Pendientes</span>
              </a>
            </li>


            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Mensajeria</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/geekhaven/templates/mensajeria/index.php" aria-expanded="false">
                <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-fill" viewBox="0 0 16 16">
  <path d="M8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6-.097 1.016-.417 2.13-.771 2.966-.079.186.074.394.273.362 2.256-.37 3.597-.938 4.18-1.234A9.06 9.06 0 0 0 8 15z"/>
</svg>
                </span>
                <span class="hide-menu">Chats</span>
              </a>
            </li>


      
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Seguridad</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="html/authentication-login.html" aria-expanded="false">
                <span>
                 <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
  <path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  <path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg>
                </span>
                <span class="hide-menu">Cambiar contraseña</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="/geekhaven/src/views/user/mi_cuenta.php" aria-expanded="false">
                <span>
                 <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-shield-lock" viewBox="0 0 16 16">
  <path d="M5.338 1.59a61.44 61.44 0 0 0-2.837.856.481.481 0 0 0-.328.39c-.554 4.157.726 7.19 2.253 9.188a10.725 10.725 0 0 0 2.287 2.233c.346.244.652.42.893.533.12.057.218.095.293.118a.55.55 0 0 0 .101.025.615.615 0 0 0 .1-.025c.076-.023.174-.061.294-.118.24-.113.547-.29.893-.533a10.726 10.726 0 0 0 2.287-2.233c1.527-1.997 2.807-5.031 2.253-9.188a.48.48 0 0 0-.328-.39c-.651-.213-1.75-.56-2.837-.855C9.552 1.29 8.531 1.067 8 1.067c-.53 0-1.552.223-2.662.524zM5.072.56C6.157.265 7.31 0 8 0s1.843.265 2.928.56c1.11.3 2.229.655 2.887.87a1.54 1.54 0 0 1 1.044 1.262c.596 4.477-.787 7.795-2.465 9.99a11.775 11.775 0 0 1-2.517 2.453 7.159 7.159 0 0 1-1.048.625c-.28.132-.581.24-.829.24s-.548-.108-.829-.24a7.158 7.158 0 0 1-1.048-.625 11.777 11.777 0 0 1-2.517-2.453C1.928 10.487.545 7.169 1.141 2.692A1.54 1.54 0 0 1 2.185 1.43 62.456 62.456 0 0 1 5.072.56z"/>
  <path d="M9.5 6.5a1.5 1.5 0 0 1-1 1.415l.385 1.99a.5.5 0 0 1-.491.595h-.788a.5.5 0 0 1-.49-.595l.384-1.99a1.5 1.5 0 1 1 2-1.415z"/>
</svg>
                </span>
                <span class="hide-menu">Datos personales</span>
              </a>
            </li>
           
            <?php  }  ?>

          </ul>
          

          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header" style="    background: #ffffffde;backdrop-filter: blur(70px);">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

            <?php if(!isset($_SESSION['user'])){?>
<a href="/geekhaven/src/views/user/login.php"> <button type="button" class="btn" style="background: #005aff; color:white">Iniciar Session</button></a>
            <?php  } 
              else{?>
 <li> <?php echo $nombre ?> </li>
              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="/geekhaven/src/views/user/img_profile/<?php echo $datos_user_imagen;?>" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="/geekhaven/src/views/user/mi_cuenta.php" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">Mi cuenta</p>
                    
                  
                  
                    <a href="/geekhaven/src/scripts/logout.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Cerrar sesion</a>
                  </div>
                </div>
              </li>
              <li>
              
              </li>
              <!-- CARRITO -->

              <?php  
              if(isset($_SESSION['user'])){
                
              ?>
             <li>
             <?php }
if(isset($_SESSION)){ 
  $validarBoton="SELECT PRD.id_producto,PRD.nom_producto, PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat, detalle_orden.id_orden
  FROM usuarios
  JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
  JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
  WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0";
  $validarbtn=$db->seleccionarDatos($validarBoton);

  
  ?>


<button type="button" class="btn mb-1" data-bs-toggle="modal" data-bs-target="#modalCarritoasd">
  <!-- NUMERO DE PRODUCTOS EN CARRITO-->
  <?php

  if(isset($id_orden)){
  $CantidadDePrdQry="SELECT COUNT(*) AS productos FROM(SELECT PRD.id_producto,PRD.nom_producto, PRD.descripcion, usuarios.id_usuario as usr, detalle_orden.cantidad as cantidad, detalle_orden.estatus as stat, detalle_orden.id_orden
  FROM usuarios
  JOIN detalle_orden on usuarios.id_usuario=detalle_orden.id_usuario
  JOIN (SELECT * from productos) as PRD on PRD.id_producto = detalle_orden.id_producto
  WHERE usuarios.id_usuario = $usr and detalle_orden.estatus=0 and detalle_orden.id_orden=$id_orden) as PCN";
  $Cantidad=$db->seleccionarDatos($CantidadDePrdQry);

  if(!empty($Cantidad)){
  ?>
    <span style="width:37px; background:#005aff; z-index:0"class="mt-3 position-absolute top-0 start-100 translate-middle badge rounded-pill">
      <?php
      foreach($Cantidad as $res){
        echo $res['productos'];
      }
      ?>
    </span>
    <?php }
    else{

    }
    ?>
<?php  } 
 ?>
<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="black" class="bi bi-bag-fill" viewBox="0 0 16 16">
  <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5z"/>
</svg>
</button>
             </li>
             <?php  
}
}
              ?>
          
            </ul>
          </div>
        </nav>
        <?php
        
        ?>
      </header>
      <!--  Header End -->