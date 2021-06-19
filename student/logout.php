<?php
    session_start();

//    session_destroy();

    unset($_SESSION['student_login']);  // only this session destroy and other session still work
    header('location: sign-in.php');
?>