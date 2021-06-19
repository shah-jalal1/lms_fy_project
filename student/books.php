<?php
    require_once "header.php";
?>


<!-- content HEADER -->
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            <li><a href="#">books</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">

<!--    SEARCH BAR-->
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-content">
                <form action="" method="post">
                    <div class="row pt-md">
                        <div class="form-group col-sm-9 col-lg-10">
                            <span class="input-with-icon">
                                <input type="text" class="form-control" id="lefticon" name="search_name" placeholder="Search" required>
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                        <div class="form-group col-sm-3  col-lg-2 ">
                            <button type="submit" class="btn btn-primary btn-block" name="search books" >Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        if (isset($_POST['search_books'])) {
            $search_name = $_POST['search_name']
            ?>
            <div class="col-sm-12">

                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <!--                    Show ALl books-->
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM `books` WHERE `book_name` LIKE '%$search_name%' ");
                            $count = mysqli_num_rows($result);
                            if ($count > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    ?>

                                    <div class="col-sm-3 col-md-2">
                                        <img style="width: 100%; height: 200px" src="../images/books/<?= $row['book_image'] ?>" alt="">
                                        <p style="text-align: center; margin-top: 5px; font-size: 15px;"><?= $row['book_name'] ?></p>
                                        <p style="text-align: center; margin-top: -5px; font-size: 15px;"><b>Book Edition : </b><?= $row['book_edition'] ?></p>
                                        <p style="text-align: center; margin-top: -5px; font-size: 15px;"><b>Available : </b><?= $row['available_qty'] ?></p>
                                    </div>

                                    <?php
                                }
                            }
                            else {
                                ?>
                                    <h2>Books Not Found</h2>
                                <?php
                            }

                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }

        else {
            ?>
            <div class="col-sm-12">

                <div class="panel">
                    <div class="panel-content">
                        <div class="row">
                            <!--                    Show ALl books-->
                            <?php
                            $result = mysqli_query($conn, "SELECT * FROM books");
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                <div class="col-sm-3 col-md-2">
                                    <img style="width: 100%; height: 200px" src="../images/books/<?= $row['book_image'] ?>" alt="">
                                    <p style="text-align: center; margin-top: 5px; font-size: 15px;"><?= $row['book_name'] ?></p>
                                    <p style="text-align: center; margin-top: -5px; font-size: 15px;"><b>Book Edition : </b><?= $row['book_edition'] ?></p>
                                    <p style="text-align: center; margin-top: -5px; font-size: 15px;"><b>Available : </b><?= $row['available_qty'] ?></p>
                                </div>

                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>

            </div>
            <?php
        }
    ?>


</div>

<?php
    require_once "footer.php";
?>
