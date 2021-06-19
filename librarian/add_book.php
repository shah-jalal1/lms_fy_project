<?php
    require_once("header.php");

    if (isset($_POST['save_book'])) {
        $book_name = $_POST['book_name'];
        $book_author_name = $_POST['book_author_name'];
        $book_edition = $_POST['book_edition'];
        $book_publication_name = $_POST['book_publication_name'];
        $book_price = $_POST['book_price'];
        $book_qty = $_POST['book_qty'];
        $available_qty = $_POST['available_qty'];
        $librarian_email = $_SESSION['librarian_login'];


        $image = explode('.', $_FILES['book_image']['name']);
        $image_ext = end($image);

        $image = date('Yndhis'). '.' . $image_ext;


        $query = "INSERT INTO `books`(`book_name`, `book_image`, `book_author_name`, `book_publication_name`, `book_price`, `book_qty`, `available_qty`, `librarian_email`, `book_edition`) VALUES('$book_name', '$image', '$book_author_name', '$book_publication_name', '$book_price', '$book_qty', '$available_qty', '$librarian_email', '$book_edition')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            move_uploaded_file($_FILES['book_image']['tmp_name'], '../images/books/' . $image);
            $success = "Data save successfully";
        }
        else {
            $error = "Data not save";
        }

    }




?>



    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Students</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-6 col-sm-offset-3">

            <?php
            if (isset($success)) {
                ?>
                <div class="alert alert-success" role="alert">
                    <?= $success ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
            <?php
            if (isset($error)) {
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>

            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                <h3 class="mb-lg text-center">Add Book</h3>

                                <div class="form-group">
                                    <label for="book_name" class="col-sm-4 control-label" >Book Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="book_name" placeholder="Book Name" required>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form-control" name="book_image" placeholder="Book Image">
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label for="book_author_name" class="col-sm-4 control-label">Author Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="book_author_name" placeholder="Author Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_author_name" class="col-sm-4 control-label">Book Edition</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="book_edition" placeholder="Book Edition" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_publication_name" class="col-sm-4 control-label">Publication Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" name="book_publication_name" placeholder="Publication Name" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_price" class="col-sm-4 control-label">Book Price</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="book_price" placeholder="Book Price" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="book_qty" class="col-sm-4 control-label">Book Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="book_qty" placeholder="Book Quantity" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                                    <div class="col-sm-8">
                                        <input type="number" class="form-control" name="available_qty" placeholder="Available Quantity" required>
                                    </div>
                                </div>



                                <div class="form-group">
                                    <div class="col-sm-offset-4 col-sm-8">
                                        <button type="submit" class="btn btn-primary" name="save_book"><i class="fa fa-save"></i>Save Book</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
require_once("footer.php");
?>