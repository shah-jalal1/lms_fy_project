<?php
    session_start();

//    session_destroy();

    unset($_SESSION['librarian_login']);

    header('location: login.php');
?>