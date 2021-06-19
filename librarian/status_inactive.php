<?php
    require_once "../dbconn.php";

    $id = base64_decode($_GET['id']);
    $query = "UPDATE students SET status = '0' WHERE id = '$id'";
    mysqli_query($conn, $query);
    header('location: students.php');
?>
