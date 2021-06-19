<?php
    require_once("header.php");

    if (isset($_POST['issue_book'])) {
        $student_id = $_POST['student_id'];
        $book_id = $_POST['book_id'];
        $book_issue_date = $_POST['book_issue_date'];

        $query = "INSERT INTO `issue_books`(`student_id`, `book_id`, `book_issue_date`) VALUES ('$student_id', '$book_id', '$book_issue_date')";
        $result = mysqli_query($conn, $query);

        if ($result) {
            mysqli_query($conn, "UPDATE `books` SET `available_qty` = `available_qty`-1 WHERE id = '$book_id'" );
            ?>
            <script type="text/javascript">
                alert('Book issued successfully');
            </script>
            <?php
        }
        else {
            ?>
            <script type="text/javascript">
                alert('Book issued failed!');
            </script>
            <?php
        }
    }
?>



                <!-- content HEADER -->
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Issue Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                   <div class="col-sm-6 col-sm-offset-3">

                       <div class="panel">
                           <div class="panel-content">
                               <div class="row">
                                   <div class="col-md-12">
                                       <form class="form-inline" action="" method="post">
                                           <div class="form-group">
                                           <input type="number" class="form-control" name="student_id" placeholder="Enter Student Roll">
                                               <!-- <select name="student_id" class="form-control">
                                                   <option value="">Select</option>
                                                       <?php
                                                            $query = "SELECT * FROM students WHERE status='1'";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                ?>
                                                                <option value="<?= $row['id'] ?>"><?= ucwords($row['fname'] . ' ' . $row['lname'])  . ' - ( ' . $row['roll'] . ' )' ?></option>
                                                                <?php
                                                        }
                                                       ?>
                                               </select> -->
                                           </div>

                                           <div class="form-group">
                                               <button type="submit" class="btn btn-primary" name="search">Search</button>
                                           </div>
                                       </form>
                                   </div>
                               </div>

                               <?php
                                    if (isset($_POST['search'])) {
                                        $id = $_POST['student_id'];
                                        // echo $id ;
                                        $query = "SELECT * FROM students WHERE roll = '$id'";

                                        $result = mysqli_query($conn, $query);
                                        $row = mysqli_fetch_assoc($result);
                                        // echo $row['fname'];
                                        ?>

                                        <div class="panel">
                                            <div class="panel-content">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <form action="" method="post">
                                                            <div class="form-group">
                                                                <label for="name">Student Name</label>
                                                                <input type="text" class="form-control" name="name" value="<?= $row['fname'] . ' ' . $row['lname']?>" readonly>
                                                                <input type="hidden" value="<?= $row['id'] ?>" name="student_id">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Book Name</label>
                                                                <select name="book_id" class="form-control">
                                                                    <option value="">Select</option>
                                                                    <?php
                                                                    $query = "SELECT * FROM `books` WHERE `available_qty`>0";
                                                                    $result = mysqli_query($conn, $query);
                                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                                        ?>
                                                                        <option value=" <?= $row['id'] ?>"><?= $row['book_name'] ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Book Issue Date</label>
                                                                <input type="text" name="book_issue_date" class="form-control" value="<?= date('d-m-Y') ?>" readonly>
                                                            </div>

                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-primary" name="issue_book">Submit</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                               ?>

                           </div>
                       </div>

                   </div>
                </div>

<?php
    require_once("footer.php");
?>