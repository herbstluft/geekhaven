<?php
use MyApp\data\Database;
require("../../vendor/autoload.php");
$db = new Database();

session_start();

session_destroy();
header("Location: /var/www/geekhaven/src/views/user/login.php");
exit();
?>