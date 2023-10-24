<?php
    use MyApp\data\Database;
    require("../../../vendor/autoload.php");
    $db = new Database;
    

    if(isset($_GET['id'])){
        //guardar el id del producto
        $id_producto=$_GET['id'];
        $sql = "SELECT * from productos inner join categorias on categorias.id_cat=productos.id_cat where id_producto=$id_producto";
        $info_producto=$db->seleccionarDatos($sql);


        foreach($info_producto as $info_producto)
        $id=$info_producto['id_producto'];
        $nombre=$info_producto['nom_producto'];
        $estado=$info_producto['estado'];
        $precio=$info_producto['precio'];
        $existencia=$info_producto['existencia'];
        $descripcion=$info_producto['descripcion'];
        $categoria=$info_producto['nom_cat'];
        

    }    
    $sql = "SELECT * from categorias";
    $categorias=$db->seleccionarDatos($sql);   
   
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>Producto</title>
    <style>
        
        .contenido{
            position: relative;
        }
        .cont
        {
            width: 100%;
        }
        .productoimg
        {
            width: 10%;
            padding-top: 15% !important;
            padding-left: 15% !important;
            padding-bottom: 5% !important;
        }
        .carousel-item img
        {
            width: 70% !important;
            margin: auto !important;
            
        }
        .productotop
        {
            padding-top: 10% !important;
            padding-right: 10% !important;
        }
        .productobott
        {
            padding-top: 5% !important;
            padding-right: 5% !important;
            margin-left: 7%  !important;
            margin-right: 3%  !important;
            color: #494747;
        }
        h1 {
            font-size: 3.5em;
            color: #383838;
            margin-left: 1em;

        }
        h3
        {
           font-size: 1.5em;
           color:#000000;
           margin-left: 2.5em;            
        }
        .estado{
            font-size: 2.5em;
            color:#0A0044;
            margin-left: 1.5em;
        }
        .precio{
            font-size: 2.5em;
            color:#EF0000;
            margin-left: 1.5em;
        }
        .contador{
            display:flex;
            width: 200px;
            height: 60px;
            border-radius: 40px;
        }
        .menos
        {
            
            border: none;
            font-size: 2em;
            background:none;
            margin-top: .3em;
            margin-left: 10px;  
        }
        .mas
        {            
            border: none;
            font-size: 2em;
            background: none;
            margin-top: .1em;
            margin-right:12px;  
        }
        .sombra{ -webkit-box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.62);
                -moz-box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.62);
                box-shadow: 0px 4px 5px 0px rgba(0,0,0,0.62);
        }

        h6 {
            width: 30%;
            font-size: 2em;
            margin-top: .4em;
            margin-left: 13px;
        }
        /* .btn-primary{
            margin-top: 15px;
            background-color: #3A40D6 !important;
            font-size:2em;
            algin: center;
            width: 100%;
            height: 100%;
            border-radius: 40px;
        }
        .btn-primary:hover{
            margin-top: 15px;
            background-color: #3A40D6 !important;
            font-size:2.1em;
            algin: center;
            width: 100%;
            height: 100%;
            border-radius: 40px;
        } */
        .cont-back{
            position: relative;
            width: 100%;
            height: 150px;
        }
        .icono{
            margin-top: 2em;
            margin-left:2em;
            width: 30px;
            height: 30px;
            color: #202124;
        }
        

a{
  text-decoration: none;
}
        

    </style>
</head>
<body>

<?php
include('../../../templates/navbar/navbar.php');
?>




<br>

   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>