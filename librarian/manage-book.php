<?php
require_once("header.php");

?>



    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Manage Book</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>All Books</b>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Book Name</th>
                                <th>Book Image</th>
                                <th>Author Name</th>
                                <th>Book Edition</th>
                                <th>Publication Name</th>
                                <th>Book Price</th>
                                <th>Book Quantity</th>
                                <th>Availabe Quantity</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT * FROM books";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td><?= $row['book_name'] ?></td>
                                    <td><img style="width: 50px;" src="../images/books/<?= $row['book_image'] ?>" alt=""></td>
                                    <td><?= $row['book_author_name'] ?></td>
                                    <td><?= $row['book_edition'] ?></td>
                                    <td><?= $row['book_publication_name'] ?></td>
                                    <td><?= $row['book_price'] ?></td>
                                    <td><?= $row['book_qty'] ?></td>
                                    <td><?= $row['available_qty'] ?></td>
                                    <td>
                                        <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['id'] ?>"><i class="fa fa-eye"></i></a>
                                        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#book-update-<?= $row['id'] ?>"><i class="fa fa-pencil" ></i></a>
                                        <a href="delete.php?book_delete=<?= base64_encode($row['id']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete')"><i class="fa fa-trash"></i></a>

                                </tr>
                                <?php
                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--        -------------------------------------------------------------------------------------------->
    <!--        -------------------------------------------------------------------------------------------->
    <!--                                                Delete Book START-->
    <!--    --------------------------------------------------------------------------------------------------->
    <!--    --------------------------------------------------------------------------------------------------->

<?php
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
    ?>


    <!-- Modal -->
    <div class="modal fade" id="book-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Info</h4>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>Book Name</th>
                            <td><?= $row['book_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Image</th>
                            <td><img style="width: 50px;" src="../images/books/<?= $row['book_image'] ?>" alt=""></td>
                        </tr>
                        <tr>
                            <th>Author Name</th>
                            <td><?= $row['book_author_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Edition</th>
                            <td><?= $row['book_edition'] ?></td>
                        </tr>
                        <tr>
                            <th>Publication Name</th>
                            <td><?= $row['book_publication_name'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Price</th>
                            <td><?= $row['book_price'] ?></td>
                        </tr>
                        <tr>
                            <th>Book Quantity</th>
                            <td><?= $row['book_qty'] ?></td>
                        </tr>
                        <tr>
                            <th>Availabe Quantity</th>
                            <td><?= $row['available_qty'] ?></td>
                        </tr>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <?php
}
?>


    <!--        -------------------------------------------------------------------------------------------->
    <!--        -------------------------------------------------------------------------------------------->
    <!--                                                Delete Book END-->
    <!--    --------------------------------------------------------------------------------------------------->
    <!--    --------------------------------------------------------------------------------------------------->




    <!--        -------------------------------------------------------------------------------------------->
    <!--        -------------------------------------------------------------------------------------------->
    <!--                                                Update Book START-->
    <!--    --------------------------------------------------------------------------------------------------->
    <!--    --------------------------------------------------------------------------------------------------->

<?php
$query = "SELECT * FROM books";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {

    $id = $row['id'];
    $query = "SELECT * FROM books WHERE `id` = '$id'";
    $book_info = mysqli_query($conn, $query);
    $book_info_row = mysqli_fetch_assoc($book_info);

    ?>

    <!-- Modal -->
    <div class="modal fade" id="book-update-<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label" >
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Update Book Info</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form action="" method="post">

                                        <div class="form-group">
                                            <label for="book_name" " >Book Name</label>
                                                <input type="text" class="form-control"  name="book_name" placeholder="Book Name" required value="<?= $book_info_row['book_name'] ?>">
                                                <input type="hidden" class="form-control" name="id"  value="<?= $book_info_row['id'] ?>" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="book_author_name">Author Name</label>
                                                <input type="text" class="form-control" name="book_author_name" placeholder="Author Name" required value="<?= $book_info_row['book_author_name'] ?>">
                                        </div>
                                        
                                        <!-- <div class="form-group">
                                            <label for="book_author_name">Book Edition</label>
                                                <input type="text" class="form-control" name="book_edition" placeholder="Book Edition" required value="<?= $book_info_row['book_edition'] ?>">
                                        </div> -->

                                        <div class="form-group">
                                            <label for="book_publication_name">Publication Name</label>
                                                <input type="text" class="form-control" name="book_publication_name" placeholder="Publication Name" required value="<?= $book_info_row['book_publication_name'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="book_price">Book Price</label>
                                                <input type="number" class="form-control" name="book_price" placeholder="Book Price" required value="<?= $book_info_row['book_price'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="book_qty">Book Quantity</label>
                                                <input type="number" class="form-control" name="book_qty" placeholder="Book Quantity" required value="<?= $book_info_row['book_qty'] ?>">
                                        </div>

                                        <div class="form-group">
                                            <label for="available_qty" >Available Quantity</label>
                                                <input type="number" class="form-control" name="available_qty" placeholder="Available Quantity" required value="<?= $book_info_row['available_qty'] ?>">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary" name="update_book">Update</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <?php
}

//update

if (isset($_POST['update_book'])) {


    $book_name = $_POST['book_name'];
    $id = $_POST['id'];
    $book_author_name = $_POST['book_author_name'];
    $book_publication_name = $_POST['book_publication_name'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $librarian_email = $_SESSION['librarian_login'];




    $query = "UPDATE books SET `book_name`='$book_name',`book_author_name`='$book_author_name',`book_publication_name`='$book_publication_name',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`librarian_email`='$librarian_email' WHERE `id`='$id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        ?>
        <script type="text/javascript">
            alert('Book Update successfully');
            javascript:history.go(-1)  // REFRESH PAGe
        </script>
        <?php

    }
    else {
        ?>
        <script type="text/javascript">
            alert('Book Update failed');
        </script>
        <?php

    }

}

?>

    <!--        -------------------------------------------------------------------------------------------->
    <!--        -------------------------------------------------------------------------------------------->
    <!--                                                Update Book END   -->
    <!--    --------------------------------------------------------------------------------------------------->
    <!--    --------------------------------------------------------------------------------------------------->

<?php
require_once("footer.php");
?>