
<?php
session_start();
use MyApp\data\Database;
require("../../../vendor/autoload.php");
$db = new Database();

//id_usuario activo
if(isset($_SESSION['admin'])){
    $id=$_SESSION['admin'];
}

$sql = "SELECT * from pub_trq inner JOIN usuarios on pub_trq.id_usuario=usuarios.id_usuario;";
$res=$db->seleccionarDatos($sql);

if(isset($_GET['id_usuario'])){
    echo "Usuario:".$_GET['id_usuario'];
}

if(isset($_GET['id_pub'])){
    echo "Pub:".$_GET['id_pub'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</head>
<body>
    

<?php

foreach($res as $res){
    ?>

<b> <?php echo $res['id_usuario']?> </b> &ensp; <b> <?php echo $res['descripcion']?> </b> &ensp; <b> <?php echo $res['precio']?> </b> &ensp; <b> <?php if($res['estatus']=0){echo "Disponible";}  if($res['estatus']==1){ ?> <b style="color:red">Vendido</b> <?php }?> </b>  

<a href="../conversacion.php?id_pub=<?php echo $res['id_pub'];  ?>&id_usuario=<?php echo $res['id_usuario'];?> &num_new_friend=<?php echo $res['telefono']; ?>"><button type="button" class="btn btn-primary">Contactar</button></a>


<br><br>

<?php
}
?>
</body>
</html>