<?php
    require_once "../dbconn.php";
    if (isset($_GET['book_delete'])) {
        $id = base64_decode($_GET['book_delete']);

        $query = "DELETE FROM `books` WHERE `id` = '$id'";
        mysqli_query($conn, $query);
        header('location: manage-book.php');
    }
?>