<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<!--Boostrap-->   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
<!--Boostrap--> 
<link rel="stylesheet" href="../../../bootstrap/css/estilos.css">
</head>
<!--STYLE-->
    <style>
        .titulo{
            font-size: 60px !important;
        }
        #cartas{
            left: 30px;
        }



        body {
            font-family: Arial, sans-serif;
            
        }
        h1 {
            text-align: center;
            color: #333;
            padding: auto;
            
        }

        .funko{
            
        }

        ul {
            list-style-type: none;
            padding: 1s;
        }
        li {
            margin: 5px;
            background-color: #fff;
            border : 4px solid #ccc;
            padding: 10px;
            display: flex;
            align-items: center;
            border-radius: 64px 64px 64px 64px;
            -moz-border-radius: 64px 64px 64px 64px;
            -webkit-border-radius: 64px 64px 64px 64px;

        }
        img {
            max-width: 300px;
            max-height: 300px;
            margin-right: 30px;
            border-radius: 30px 30px 30px 30px;
            -moz-border-radius: 30px 30px 30px 30px;
            -webkit-border-radius: 30px 30px 30px 30px;
        }

        .select{
            width: 205px; /* Ancho personalizado */
            height: 30px; /* Altura personalizada */
            font-size: 14px; /* Tamaño de fuente personalizado */
            border-radius: 36px 36px 36px 36px;
            -moz-border-radius: 36px 36px 36px 36px;
            -webkit-border-radius: 36px 36px 36px 36px;
            -webkit-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.25);
            -moz-box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.25);
            box-shadow: 10px 10px 5px 0px rgba(0,0,0,0.25);
        }






</style>


<body>
    <!----------------------------------------------------->
    <?php
include('../../../templates/navbar/navbar.php');
?>
    <!----------------------------------------------------->

     <!-------------------------BANNER---------------------------->
    <section id="banner">
              <div id="outer">
                <div id="hero">
                  <h2 style="color: white;" class="titulo">  <p style="-webkit-text-stroke: 3px black; "> Pedidos.</p></h2>
                </div>
              </div>
    </section>
    <!-------------------------------------------------------------> 
    

    
    <br>
    <br><br><br>
<div class="container">
<div class="row">
 <div class="col-md-12">
  <h1>Lista de Pedidos de Cliente</h1>
  <br>
  <!-----------------------------Filtro---------------------------------->
  <label>Filtrar</label>
            <select name="" class="select" >
                <option>Pendientes</option>
                <option>Entregados</option>
                <option>Cancelados</option>
                <option>Pedido: Reciente - Antiguo</option>
                <option>Pedido: Antiguo- Reciente</option>
                <option>Entregado: Antiguo - Reciente</option>
                <option>Entregado: Reciente - Antuguo</option>
            </select>

    <!------------------------------------Lista-------------------------------------->
    <hr>
    <ul>
        <li  class= "col-md-12 col-lg-12 col-xl-12">
            <img src="mj.jpg" alt="Imagen del Pedido 1">
            <div class="funko">
                <h2>FUNKO MICHAEL JACKSON</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam ducimus voluptates accusamus saepe quis a nemo totam 
                    cumque harum architecto. Distinctio iure beatae repellendus ratione ab nesciunt molestiae nisi! Molestias!</p>
                   
                   <p>Cantidad: 1</p>
                   <p>Estado: Pendiente<p>
                   <p>Total: $500</p>
                   <p>Fecha del pedido 10/10/23</p>

            </div>
        </li>
        <li class= "col-md-12 col-lg-12 col-xl-12">
            <img src="mj.jpg" alt="Imagen del Pedido 2">
            <div class="funko">
                <h2>FUNKO MICHAEL JACKSON</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam ducimus voluptates accusamus saepe quis a nemo totam 
                    cumque harum architecto. Distinctio iure beatae repellendus ratione ab nesciunt molestiae nisi! Molestias!</p>
                   
                   <p>Cantidad: 1</p>
                   <p>Estado: Entregado.<p>
                   <p>Total: $500</p>
                   <p>Fecha del pedido 10/10/23</p>

            </div>
        </li>
        <li class= "col-md-12 col-lg-12 col-xl-12">
        <img src="mj.jpg" alt="Imagen del Pedido 2">
        <div class="funko">
                <h2>FUNKO MICHAEL JACKSON</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam ducimus voluptates accusamus saepe quis a nemo totam 
                    cumque harum architecto. Distinctio iure beatae repellendus ratione ab nesciunt molestiae nisi! Molestias!</p>
                   
                   <p>Cantidad: 1</p>
                   <p>Estado: Pendiente<p>
                   <p>Total: $500</p>
                   <p>Fecha del pedido 10/10/23</p>

            </div>
        </li>
        <li class= "col-md-12 col-lg-12 col-xl-12">
            <img src="mj.jpg" alt="Imagen del Pedido 2">
            <div class="funko">
                <h2>FUNKO MICHAEL JACKSON</h2>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nam ducimus voluptates accusamus saepe quis a nemo totam 
                    cumque harum architecto. Distinctio iure beatae repellendus ratione ab nesciunt molestiae nisi! Molestias!</p>
                   
                   <p>Cantidad: 1</p>
                   <p>Estado: Entregado<p>
                   <p>Total: $500</p>
                   <p>Fecha del pedido 10/10/23</p>

            </div>
        </li>
        <!-- Agrega más elementos li para listar más pedidos si es necesario -->
    </ul>
<br>
<br>
<br>
<!--Banner Recien llegados-->
<br>    
<hr>

<div class="container">
<?php include '../../../templates/footer.html';?>
</div>
<script src="../../../bootstrap/js/buscador.js"></script>


</body>
</html>