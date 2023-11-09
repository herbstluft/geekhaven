<?php
    session_start();
    use MyApp\data\Database;
    require("../../../../vendor/autoload.php");
    $db = new Database;
    if(isset($_GET['id'])){
         $_SESSION['id_producto'] = $_GET['id'];
        $id = $_SESSION['id_producto'];
    }


        ?>
        