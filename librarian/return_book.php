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
                <li><a href="javascript:avoid(0)">Students</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
            <h4 class="section-subtitle"><b>All Students</b></h4>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Rool</th>
                                <th>Phone</th>
                                <th>Book name</th>
                                <th>Book image</th>
                                <th>Book Issue Date</th>
                                <th>Return Book</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = "SELECT issue_books.book_issue_date, issue_books.id, issue_books.book_id, students.fname, students.lname, students.roll,students.phone, books.book_name, books.book_image
FROM issue_books
INNER JOIN students on students.id = issue_books.student_id
INNER JOIN books ON books.id = issue_books.book_id
WHERE issue_books.book_return_date = ''";
                            $result = mysqli_query($conn, $query);
                            while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                <tr>
                                    <td> <?= ucwords($row['fname'] . " " . $row['lname'])?></td>
                                    <td> <?= $row['roll'] ?> </td>
                                    <td> <?= $row['phone'] ?> </td>
                                    <td> <?= $row['book_name'] ?> </td>
                                    <td><img style="width: 50px" src="../images/books/<?= $row['book_image'] ?>" alt=""> </td>
                                    <td> <?= $row['book_issue_date'] ?> </td>
                                    <td><a href="return_book.php?id=<?= $row['id'] ?>&bookid=<?= $row['book_id'] ?>">Return Book</a></td>
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

<?php
    if (isset($_GET['id'])) {
        $bookid = $_GET['bookid'];
        $id = $_GET['id'];
        $date = date('d-m-y');
        $query = "UPDATE `issue_books` SET `book_return_date` = '$date' WHERE `id`= '$id'";
        $result = mysqli_query($conn, $query);

        if ($result) {
            mysqli_query($conn, "UPDATE `books` SET `available_qty` = `available_qty`+1 WHERE id = '$bookid'" );
            ?>
            <script type="text/javascript">
                alert("Book Return Successfully");
                javascript:history.go(-1);    // REFRESH PAGE
            </script>
            <?php
        }

        else {
            ?>
            <script type="text/javascript">
                alert("Book Return failed!");
            </script>
            <?php
        }

    }
?>

<?php
require_once("footer.php");
?>