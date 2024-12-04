<?php
    define('BASE_PATH', dirname(__DIR__));


    $conn = mysqli_connect('localhost', 'root', '', 'inventorydb') or die("Connection Failed" . mysqli_connect_error());
?>