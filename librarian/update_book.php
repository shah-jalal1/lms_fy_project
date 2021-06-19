<?php

require_once '../dbconn.php';

if (isset($_POST['update_book'])) {


    $book_name = $_POST['book_name'];
    $id = $_POST['id'];
    $book_author_name = $_POST['book_author_name'];
    $book_edition = $_POST['book_edition'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $librarian_email = $_SESSION['librarian_login'];




    $query = "UPDATE books SET `book_name`='$book_name', `book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`librarian_email`='$librarian_email' WHERE `id`='$id'";

    $result = mysqli_query($conn, $query);



    if ($result) {

        ?>
        <script type="text/javascript">
            alert('Book Update successfully. Refresh Page');
        </script>
        <?php

        header('location: manage-book.php');
    }
    else {
        ?>
        <script type="text/javascript">
            alert('Book Update failed');
        </script>
        <?php
        header('location: manage-book.php');
    }



}

?>
