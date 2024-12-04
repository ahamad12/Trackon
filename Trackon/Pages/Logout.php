<?php
    session_start();
    if (isset($_POST['logout'])) {
        if (isset($_SESSION['userId'])) {
            session_destroy();
            header("location: Login.php");
            exit();
        }
    }
?>
